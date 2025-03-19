<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerCategory;
use App\Models\Order;
use App\Models\PriceType;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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
