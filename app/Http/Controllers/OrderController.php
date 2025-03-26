<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerCategory;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\PriceType;
use App\Models\Quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function formatOrder($orderData, $orderDetail)
    {
        return [
                'id' => $orderData->id,
                'customer_id' => $orderData->customer_id,
                'staff_id' => $orderData->staff_id,
                'discount_id' => $orderData->discount_id,
                'individual_discount_type' => $orderData->individual_discount_type,
                'individual_discount_value' => $orderData->individual_discount_value,
                'sub_total' => $orderData->sub_total,
                'total_after_discount' => $orderData->total_after_discount,
                'debt' => $orderData->debt,
                'customer_paid' => $orderData->customer_paid,
                'shipping_fee' => $orderData->shipping_fee,
                'support_fee' => $orderData->support_fee,
                'note' => $orderData->note,
                'tag' => $orderData->tag,
                'created_at' => $orderData->created_at,
                'updated_at' => $orderData->updated_at,
                'status' => $orderData->status,
                'payment_status' => $orderData->payment_status,
                'cus_name' => $orderData->cus_name,
                'phone' => $orderData->phone,
                'email' => $orderData->email,
                'address' => $orderData->address,
                'ward' => $orderData->ward,
                'area' => $orderData->area,
                'cus_cat_name' => $orderData->cus_cat_name,
                'price_type_id' => $orderData->price_type_id,
                'payment_cat' => $orderData->payment_cat,
                'payment' => $orderData->payment,
                'price_name' => $orderData->price_name,
                'cus_debt' => $orderData->cus_debt,
                'total_expenditure' => $orderData->total_expenditure,
                'number_orders' => $orderData->number_orders,
                'total_products' => $orderData->total_products,
                'total_return_products' => $orderData->total_return_products,
                'point' => $orderData->point,
                'products' => $orderDetail->map(function ($detail) {
                    return [
                        'SKU' => $detail->product_SKU,
                        'product_name' => $detail->product_name,
                        'quantity' => $detail->quantity,
                        'price' => $detail->price,
                        'discount_percent' => $detail->discount_percent,
                        'discount_value' => $detail->discount_value,
                        'total_amount' => $detail->total_amount,
                        'image' => $detail->image,
                    ];
                })->toArray(),
        ];
    }

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
                $orderDetail = OrderDetail::create([
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
        $orderData = DB::table('orders as od')
            ->leftJoin('customers as c', 'od.customer_id', '=', 'c.id')
            ->leftJoin('addresses as adr', 'adr.customer_id', '=', 'c.id')
            ->leftJoin('wards as w', 'w.id', '=', 'adr.ward_id')
            ->leftJoin('areas as a', 'a.id', '=', 'w.id')
            ->leftJoin('customer_categories as cc', 'cc.id', '=', 'c.customer_category')
            ->leftJoin('price_types as pt', 'pt.type_id', '=', 'cc.price_type_id')
            ->leftJoin('payments as p', 'p.id', '=', 'cc.payment_cat')
            ->select('od.*', 'c.name as cus_name', 'c.phone', 'c.email', 'c.debt as cus_debt',
                'c.total_expenditure', 'c.number_orders', 'c.total_products', 'c.total_return_products', 'c.point',
                'adr.address', 'w.name as ward', 'a.name as area', 'cc.name as cus_cat_name', 'cc.price_type_id', 'cc.payment_cat', 'p.name as payment', 'pt.name as price_name')
            ->where('od.id', $order->id)->first();
//        dd($orderData);
        $orderDetails = DB::table('order_details as odd')
            ->leftJoin('products as p', 'odd.product_SKU', '=', 'p.SKU')
            ->select('odd.*', 'p.image', 'p.name as product_name')
            ->where('odd.order_id', $order->id)
            ->get();

//        if ($orderData) {
//            $formattedOrder = [
//                'id' => $orderData->id,
//                'customer_id' => $orderData->customer_id,
//                'staff_id' => $orderData->staff_id,
//                'discount_id' => $orderData->discount_id,
//                'individual_discount_type' => $orderData->individual_discount_type,
//                'individual_discount_value' => $orderData->individual_discount_value,
//                'sub_total' => $orderData->sub_total,
//                'total_after_discount' => $orderData->total_after_discount,
//                'debt' => $orderData->debt,
//                'customer_paid' => $orderData->customer_paid,
//                'shipping_fee' => $orderData->shipping_fee,
//                'support_fee' => $orderData->support_fee,
//                'note' => $orderData->note,
//                'tag' => $orderData->tag,
//                'created_at' => $orderData->created_at,
//                'updated_at' => $orderData->updated_at,
//                'status' => $orderData->status,
//                'payment_status' => $orderData->payment_status,
//                'cus_name' => $orderData->cus_name,
//                'phone' => $orderData->phone,
//                'email' => $orderData->email,
//                'address' => $orderData->address,
//                'ward' => $orderData->ward,
//                'area' => $orderData->area,
//                'cus_cat_name' => $orderData->cus_cat_name,
//                'price_type_id' => $orderData->price_type_id,
//                'payment_cat' => $orderData->payment_cat,
//                'payment' => $orderData->payment,
//                'price_name' => $orderData->price_name,
//                'cus_debt' => $orderData->cus_debt,
//                'total_expenditure' => $orderData->total_expenditure,
//                'number_orders' => $orderData->number_orders,
//                'total_products' => $orderData->total_products,
//                'total_return_products' => $orderData->total_return_products,
//                'point' => $orderData->point,
//                'products' => $orderDetails->map(function ($detail) {
//                    return [
//                        'SKU' => $detail->product_SKU,
//                        'product_name' => $detail->product_name,
//                        'quantity' => $detail->quantity,
//                        'price' => $detail->price,
//                        'discount_percent' => $detail->discount_percent,
//                        'discount_value' => $detail->discount_value,
//                        'total_amount' => $detail->total_amount,
//                        'image' => $detail->image,
//                    ];
//                })->toArray(),
//            ];
//        } else {
//            $formattedOrder = [];
//        }

        $formattedOrder = $this->formatOrder($orderData, $orderDetails);

//        dd($formattedOrder);
        $payments = Payment::all();

        return view('dream-up.pages.order.detail', compact('formattedOrder','payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {

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

    public function cancel(Order $order)
    {
        $order->update([
            'status' => 'canceled',
            'updated_at' => now()
        ]);

        return redirect()->route('od-show', $order->id)->with('success', 'Hủy đơn hàng thành công');
    }

    public function approval(Order $order)
    {
        $order->update([
            'status' => 'payment',
            'updated_at' => now()
        ]);

        return redirect()->route('od-show', $order->id)->with('success', 'Duyệt đơn hàng thành công');
    }

    public function payment(Order $order, Request $request)
    {
        $paidString = $request->cs_paid;
        $paid = (int) str_replace(',', '', $paidString);
        $date = $request->payment_date;
        $cat = $request->payment_cat;

        $cal = $order->debt - $paid;
        if ($cal == 0) {
            $order->update([
                'payment_status' => 'paid',
                'payment_date' => $date,
                'payment_cat' => $cat,
                'customer_paid' => $paid,
                'debt' => 0,
                'updated_at' => now()
            ]);
            return redirect()->route('od-show', $order->id)->with('success', 'Thanh toán đơn hàng thành công');
        } else {
            $order->update([
                'customer_paid' => $paid,
                'debt' => $order->debt - $paid,
                'updated_at' => now()
            ]);
            return redirect()->route('od-show', $order->id)->with('success', 'Khách hàng còn nợ lại: ' . $cal);
        }
    }
}
