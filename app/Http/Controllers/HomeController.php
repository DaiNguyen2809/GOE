<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = Carbon::today()->toDateString();
        $dailyRevenue = Order::whereDate('created_at', $date)->sum('total_after_discount');

        $dailyOrder = Order::whereDate('created_at', $date)->count();

        $dailyCustomer = Customer::whereDate('created_at', $date)->count();

        $bestSellers = Product::select('products.SKU', 'products.name', 'order_details.price', 'products.image')
           ->join('order_details', 'order_details.product_SKU', '=', 'products.SKU')
           ->groupBy('products.SKU', 'products.name', 'products.image','order_details.price')
           ->orderByDesc(DB::raw('SUM(order_details.quantity)'))->take(3)->get();

        $recentOrders = Order::all()->sortByDesc('created_at')->take(5);


        return view('dream-up.pages.home.index', compact('dailyRevenue', 'dailyOrder', 'dailyCustomer', 'bestSellers', 'recentOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
