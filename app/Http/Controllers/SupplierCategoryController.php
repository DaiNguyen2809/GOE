<?php

namespace App\Http\Controllers;

use App\Models\SupplierCategory;
use Illuminate\Http\Request;

class SupplierCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('supplier_category.index');
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
    public function show(SupplierCategory $supplierCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupplierCategory $supplierCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupplierCategory $supplierCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupplierCategory $supplierCategory)
    {
        //
    }
}
