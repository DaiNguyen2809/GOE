<?php

namespace App\Http\Controllers;

use App\Models\ImportOrder;
use Illuminate\Http\Request;

class ImportOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dream-up.pages.import-order.index');
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
    public function show(ImportOrder $importOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImportOrder $importOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImportOrder $importOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImportOrder $importOrder)
    {
        //
    }
}
