<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerCategory;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PriceType;
use App\Models\Quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('orders as o')
            ->leftJoin('customers as c', 'c.id', '=', 'o.customer_id')
            ->select('o.id', 'o.created_at', 'c.name as customer_name', 'o.status', 'o.payment_status', 'o.total_after_discount')
            ->get();
        return view('dream-up.pages.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = DB::table('customers as c')
            ->leftJoin('addresses as ad', 'c.id', '=', 'ad.customer_id')
            ->leftJoin('wards as w', 'w.id', '=', 'ad.ward_id')
            ->leftJoin('areas as a', 'a.id', '=', 'w.area_id')
            ->leftJoin('customer_categories as cc', 'cc.id', '=', 'c.customer_category')
            ->select('c.*','a.name as area_name', 'w.name as ward_name', 'ad.address as address',
                'cc.discount_percent', 'cc.price_type_id as customer_price')->get();

        $products = DB::select("
            SELECT
                p.SKU,
                p.name,
                p.image,
                q.quantity,
                CONCAT('{', GROUP_CONCAT(CONCAT('\"', pr.type_id, '\"', ':', pr.price) SEPARATOR ', '), '}') AS prices
            FROM products AS p
            LEFT JOIN quantities AS q ON p.SKU = q.SKU
            LEFT JOIN prices AS pr ON p.SKU = pr.SKU
            GROUP BY p.SKU, p.name, p.image, q.quantity
        ");

        foreach ($products as $product) {
            $product->prices = json_decode($product->prices, true);
        }

        $price_types = DB::table('price_types as pt')->select('pt.type_id as type_id', 'pt.name as price_name')->get();
        return view('dream-up.pages.order.create', compact(['customers','products','price_types']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'id.max' => 'Mã đơn hàng không được quá 100 ký tự',
            'id.unique' => 'Mã đơn hàng đã tồn tại',
            'discount_id.max' => 'Mã khuyến mãi không được vượt quá 255 ký tự',
            'note.max' => 'Ghi chú không được vượt quá 255 ký tự',
            'tag.max' => 'Tags không được vượt quá 255 ký tự',
        ];

        $request->validate([
            'id' => 'max:100|unique:orders,id',
            'discount_id' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:255',
            'tag' => 'nullable|string|max:255',
        ], $messages);

        $subTotalString = $request->sub_total;
        $subTotal = (int) str_replace(',', '', $subTotalString);
        $totalAfterDiscountString = $request->total_after_discount;
        $totalAfterDiscount = (int) str_replace(',', '', $totalAfterDiscountString);
        $debtString = $request->debt;
        $debt = (int) str_replace(',', '', $debtString);
        $customerPaidString = $request->customer_paid;
        $customerPaid = (int) str_replace(',', '', $customerPaidString);
        $shippingFeeString = $request->shipping_fee;
        $shippingFee = (int) str_replace(',', '', $shippingFeeString);
        $supportFeeString = $request->support_fee;
        $supportFee = (int) str_replace(',', '', $supportFeeString);

        $data = [
            'customer_id' => $request->customer_id,
            'staff_id' => 'KNG',
            'discount_id' => $request->discount_id,
            'individual_discount_type' => $request->individual_discount_type,
            'individual_discount_value' => $request->individual_discount_value,
            'sub_total' => $subTotal,
            'total_after_discount' => $totalAfterDiscount,
            'debt' => $debt,
            'customer_paid' => $customerPaid,
            'shipping_fee' => $shippingFee,
            'support_fee' => $supportFee,
            'note' => $request->note,
            'tags' => $request->tag,
            'created_at' => now(),
            'updated_at' => now(),
            'status' => 'pending',
            'payment_status' => 'unpaid'
        ];

        if (!empty($request->id))
            $data['id'] = $request->id;
        $order = Order::create($data);

        $selectedPrice = $request->selected_price;
        $products = json_decode($request->selected_products, true);

        if (!empty($products) && is_array($products)) {
            foreach ($products as $index => $product) {
                $percent = $request->percent;
                $discountValue = $request->value;
                $totalAmount = $request->total_amount;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_SKU' => $product['SKU'],
                    'quantity' => $product['count'],
                    'price' => $product['prices'][$selectedPrice],
                    'discount_percent' =>  (int) str_replace(',', '', $percent[$index]),
                    'discount_value' => (int) str_replace(',', '', $discountValue[$index]),
                    'total_amount' => (int) str_replace(',', '', $totalAmount[$index]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $quantity = Quantity::where('SKU', $product['SKU'])->first();
                if ($quantity) {
                    $newQuantity = $quantity->quantity - $product['count'];
                    if ($newQuantity < 0) {
                        throw new \Exception("Số lượng tồn kho của sản phẩm {$product['SKU']} không đủ.");
                    }
                    $quantity->update(['quantity' => $newQuantity]);
                } else {
                    throw new \Exception("Không tìm thấy sản phẩm {$product['SKU']} trong bảng quantities.");
                }
            }
        }

        return redirect()->route('od-index')->with('success', 'Tạo đơn hàng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
