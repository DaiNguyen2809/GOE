<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\PriceType;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::orderByDesc('created_at')->paginate(20);
        if (request()->ajax()) {
            return response()->json([
                'table' => view('dream-up.pages.product-category.table', compact('categories'))->render(),
                'pagination' => $categories -> links('vendor.pagination.tailwind')->render()
            ]);
        }
        return view('dream-up.pages.product-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dream-up.pages.product-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'id.required' => 'Mã nhóm không được để trống!',
            'id.string' => 'Mã nhóm phải là chuỗi ký tự!',
            'id.max' => 'Mã nhóm không được quá 50 ký tự!',
            'id.unique' => 'Mã nhóm đã tồn tại',
            'name.required' => 'Tên nhóm không được để trống!',
            'name.string' => 'Tên nhóm phải là chuỗi ký tự!',
            'name.max' => 'Tên nhóm không được quá 100 ký tự!',
            'description.max' => 'Mô tả không được quá 255 ký tự!',
        ];

        $request->validate([
            'id' => 'required|string|max:50|unique:product_categories,id',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
        ], $messages);

        ProductCategory::create([
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pd-cat-index')->with('success', 'Thêm nhóm sản phẩm thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('dream-up.pages.product-category.detail', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $messages = [
            'id.required' => 'Mã nhóm không được để trống!',
            'id.string' => 'Mã nhóm phải là chuỗi ký tự!',
            'id.max' => 'Mã nhóm không được quá 50 ký tự!',
            'name.required' => 'Tên nhóm không được để trống!',
            'name.string' => 'Tên nhóm phải là chuỗi ký tự!',
            'name.max' => 'Tên nhóm không được quá 100 ký tự!',
            'description.max' => 'Mô tả không được quá 255 ký tự!',
        ];

        $request->validate([
            'id' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
        ], $messages);

        $productCategory->update([
           'name' => $request->name,
           'description' => $request->description,
        ]);

        return redirect()->route('pd-cat-edit', $productCategory->id)->with('success', 'Cập nhật nhóm sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return redirect()->route('pd-cat-index')->with('success', 'Xóa nhóm sản thành công');
    }

    public function search(Request $request) {
        $query = $request->input('query');
        $categories = ProductCategory::where('id', 'LIKE', "%{$query}%")->orWhere('name', 'LIKE', "%{$query}%")->paginate(20);
        return view('dream-up.pages.product-category.table', compact('categories'))->render();
    }
}
