<?php

namespace App\Http\Controllers;

use App\Models\PackagingOrder;
use Illuminate\Http\Request;

class PackagingOrderController extends Controller
{
    public function index()
    {
        $packagingOrders = PackagingOrder::all();
        return view('dream-up.pages.packaging.index', compact('packagingOrders'));
    }

    public function create()
    {

    }

    public function store(Request $request) {

    }

    public function show() {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function cancel()
    {

    }

    public function confirm()
    {

    }

}
