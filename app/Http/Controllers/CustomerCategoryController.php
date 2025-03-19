<?php

namespace App\Http\Controllers;

use App\Models\CustomerCategory;
use App\Models\Payment;
use App\Models\PriceType;
use Illuminate\Http\Request;

class CustomerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CustomerCategory::orderByDesc('created_at')->paginate(15);
        if (request()->ajax()) {
            return response()->json([
                'table' => view('dream-up.pages.customer-category.table', compact('categories'))->render(),
                'pagination' => $categories -> links('vendor.pagination.tailwind')->render()
            ]);
        }
        return view('dream-up.pages.customer-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payments = Payment::all();
        $priceTypes = PriceType::all();
        return view('dream-up.pages.customer-category.create', compact('payments', 'priceTypes'));
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
            'id' => 'required|string|max:50|unique:customer_categories,id',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
        ], $messages);

        CustomerCategory::create([
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'price_type_id' => $request->priceType,
            'discount_percent' => (int) $request->discountPercent,
            'payment_cat' => (int) $request->payment,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('cm-cat-index')->with('success', 'Thêm nhóm khách hàng thành công');;
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerCategory $customerCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerCategory $customerCategory)
    {
        $priceTypes = PriceType::all();
        $payments = Payment::all();
        return view('dream-up.pages.customer-category.detail', compact(['customerCategory', 'priceTypes', 'payments']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerCategory $customerCategory)
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
            'id' => 'required|string|max:50|unique:customer_categories,id,' .$customerCategory->id,
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
        ], $messages);

        $customerCategory->update([
            'id' => $request->id,
           'name' => $request->name,
           'description' => $request->description,
           'price_type_id' => $request->priceType,
           'discount_percent' => $request->discountPercent,
           'payment_cat' => $request->payment
        ]);

        return redirect()->route('cm-cat-edit', $customerCategory->id)->with('success', 'Cập nhật nhóm khách hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerCategory $customerCategory)
    {
        $customerCategory->delete();
        return redirect()->route('cm-cat-index')->with('success', 'Xóa nhóm khách hàng thành công');
    }

    public function search(Request $request) {
        $query = $request->get('query');
        $categories = CustomerCategory::where('name', 'like', '%' . $query . '%')->orWhere('description', 'like', '%' . $query . '%')->orWhere('id', 'like', '%' . $query . '%')->paginate(20);
        return view('dream-up.pages.customer-category.table', compact('categories'))->render();
    }
}
