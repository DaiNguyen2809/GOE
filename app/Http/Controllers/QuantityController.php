<?php

namespace App\Http\Controllers;

use App\Models\Quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuantityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products as pd')
            ->leftJoin('quantities as q', 'q.SKU', '=', 'pd.SKU')
            ->leftJoin('prices as pr_import', function ($join) {
                $join->on('pr_import.SKU', '=', 'pd.SKU')
                    ->where('pr_import.type_id', '=', 'import');
            })
            ->leftJoin('prices as pr_retail', function ($join) {
                $join->on('pr_retail.SKU', '=', 'pd.SKU')
                    ->where('pr_retail.type_id', '=', 'retail');
            })
            ->select(
                'pd.SKU',
                'pd.name',
                'pd.created_at',
                'q.quantity',
                'pd.image',
                'pr_import.price as import_price',
                'pr_retail.price as retail_price'
            )->get();
        return view('dream-up.pages.stock.index', compact('products'));
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
    public function show(Quantity $quantity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quantity $quantity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quantity $quantity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quantity $quantity)
    {
        //
    }
}
