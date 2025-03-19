<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Area;
use App\Models\Ward;
use App\Models\CustomerCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CustomerCategory::all();
        $customers = DB::table('customers as c')
            -> leftJoin('customer_categories as cc', 'cc.id', '=', 'c.customer_category')
            -> select('c.*', 'cc.name as category',  'cc.id as category_id')->orderByDesc('created_at')->get();
        return view('dream-up.pages.customer.index', compact('customers', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CustomerCategory::select('id', 'name')->get();
        $areas = Area::select('id', 'name')->get();
        $wards = Ward::select('id', 'name', 'area_id')->get();
        return view('dream-up.pages.customer.create', compact('categories', 'areas', 'wards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'id.max' => 'Mã KH không được quá 100 ký tự',
            'id.unique' => 'Mã KH đã tồn tại',
            'name.required' => 'Tên KH không được để trống',
            'name.string' => 'Tên nhóm phải là chuỗi ký tự',
            'name.max' => 'Tên nhóm không được quá 100 ký tự',
            'customer_category.required' => 'Nhóm KH không được bỏ qua',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại phải có 10 số',
            'birthday.date' => 'Ngày sinh phải ở dạng ngày',
            'customer_description.max' => 'Mô tả không được quá 255 ký tự',
            'customer_tag.max' => 'Tags không được quá 100 ký tự',
            'debt.numeric' => 'Giá trị của công nợ phải là 1 số',
            'default_discount.numeric' => 'Giá trị của chiết khấu phải là 1 số',
            'default_discount.min' => 'Chiết khấu phải lớn hơn 0',
            'email.email' => 'Email không đúng định dạng (VD:abc@email.com)',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'email.max' => 'Địa chỉ email không được quá 255 ký tự',
            'affiliates_code.string' => 'Mã tiếp thị liên kết phải là chuỗi ký tự',
            'affiliates_code.max' => 'Mã tiếp thị liên kết không được quá 255 ký tự',
            'sepecial_code.string' => 'Mã khách hàng đặc biệt phải là chuỗi ký tự',
            'special_code.max' => 'Mã KH đặc biệt không được quá 255 ký tự',
        ];

        $request->validate([
            'id' => 'max:100|unique:customers,id',
            'name' => 'required|string|max:100',
            'customer_category' => 'required',
            'phone' => 'required|string|max:10',
            'birthday' => 'nullable|date',
            'gender' => 'nullable',
            'customer_description' => 'nullable|string|max:255',
            'customer_tag' => 'nullable|string|max:100',
            'debt' => 'nullable|numeric',
            'total_expenditure' => 'nullable|numeric|min:0',
            'point' => 'nullable|numeric|min:0',
            'default_discount' => 'nullable|numeric|min:0',
            'email' =>  'nullable|email|unique:customers,email|max:255',
            'affiliates_code' => 'nullable|string|max:255',
            'special_code' => 'nullable|string|max:255',
        ], $messages);

        $data = [
            'name' => $request->name,
            'customer_category' => $request->customer_category,
            'phone' => $request->phone,
            'email' => $request->email,
            'customer_description' => $request->description,
            'customer_tag' => $request->tag,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'point' => $request->point,
            'debt' => $request->debt,
            'affiliates_code' => $request->affiliates,
            'default_discount' => $request->default_discount,
            'total_expenditure' => $request->total_expenditure,
            'special_code' => $request->special_code,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        if (!empty($request->id))
            $data['id'] = $request->id;

        $customer = Customer::create($data);

        $address = [
            'ward_id' => $request->ward,
            'address' => $request->address,
            'customer_id' => $customer->id,
        ];

        $addr = Address::create($address);

        return redirect()->route('cm-index')->with('success', 'Thêm khách hàng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $customer = DB::table('customers as c')
            ->join('customer_categories as ct', 'ct.id', '=', 'c.customer_category')
            ->select('c.*', 'ct.name as category_name', 'ct.price_type_id as price', 'ct.discount_percent as discount', 'ct.payment_cat as payment')->where('c.id', $customer->id)->first();
        return view('dream-up.pages.customer.detail', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $categories = CustomerCategory::all();
        $customer = DB::table('customers as c')
            ->join('customer_categories as ct', 'ct.id', '=', 'c.customer_category')
            ->select('c.*', 'ct.name as category_name', 'ct.price_type_id as price', 'ct.discount_percent as discount', 'ct.payment_cat as payment')->where('c.id', $customer->id)->first();
        return view('dream-up.pages.customer.edit', compact('customer', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $messages = [
            'id.max' => 'Mã KH không được quá 100 ký tự',
            'id.required' => 'Mã KH không được để trống',
            'id.unique' => 'Mã KH đã tồn tại',
            'name.required' => 'Tên KH không được để trống',
            'name.string' => 'Tên nhóm phải là chuỗi ký tự',
            'name.max' => 'Tên nhóm không được quá 100 ký tự',
            'customer_category.required' => 'Nhóm KH không được bỏ qua',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại phải có 10 số',
            'birthday.date' => 'Ngày sinh phải ở dạng ngày',
            'gender.in' => 'Giới tính chỉ được chọn là nam hoặc nữ',
            'customer_description.max' => 'Mô tả không được quá 255 ký tự',
            'customer_tag.max' => 'Tags không được quá 100 ký tự',
            'debt.numeric' => 'Giá trị của công nợ phải là 1 số',
            'default_discount.numeric' => 'Giá trị của chiết khấu phải là 1 số',
            'default_discount.min' => 'Chiết khấu phải lớn hơn 0',
            'email.email' => 'Email không đúng định dạng (VD:abc@email.com)',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'email.max' => 'Địa chỉ email không được quá 255 ký tự',
            'affiliates_code.string' => 'Mã tiếp thị liên kết phải là chuỗi ký tự',
            'affiliates_code.max' => 'Mã tiếp thị liên kết không được quá 255 ký tự',
            'sepecial_code.string' => 'Mã khách hàng đặc biệt phải là chuỗi ký tự',
            'special_code.max' => 'Mã KH đặc biệt không được quá 255 ký tự',
        ];

        $request->validate([
            'id' => [
                'required',
                'max:100',
                Rule::unique('customers', 'id')->ignore($customer->id), // Kiểm tra mã KH nhưng bỏ qua chính nó
            ],
            'name' => 'required|string|max:100',
            'customer_category' => 'required',
            'phone' => 'required|string|max:10',
            'birthday' => 'nullable|date',
            'gender' => 'nullable',
            'customer_description' => 'nullable|string|max:255',
            'customer_tag' => 'nullable|string|max:100',
            'debt' => 'nullable|numeric',
            'total_expenditure' => 'nullable|numeric|min:0',
            'point' => 'nullable|numeric|min:0',
            'default_discount' => 'nullable|numeric|min:0',
            'email' =>  [
                'nullable',
                'email',
                'max:255',
                Rule::unique('customers', 'email')->ignore($customer->id),
            ],
            'affiliates_code' => 'nullable|string|max:255',
            'special_code' => 'nullable|string|max:255',
        ], $messages);

        $data = [
            'name' => $request->name,
            'customer_category' => $request->customer_category,
            'phone' => $request->phone,
            'email' => $request->email,
            'customer_description' => $request->description,
            'customer_tag' => $request->tag,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'point' => $request->point,
            'debt' => $request->debt,
            'affiliates_code' => $request->affiliates,
            'default_discount' => $request->default_discount,
            'total_expenditure' => $request->total_expenditure,
            'special_code' => $request->special_code,
            'updated_at' => now(),
        ];

       Customer::where('id', $request->id)->update($data);

        return redirect()->route('cm-index')->with('success', 'Cập nhật khách hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('cm-index')->with('success', 'Xóa khách hàng thành công');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $customers = Customer::where('id', 'LIKE', "%{$query}%")->orWhere('name', 'LIKE', "%{$query}%")->orWhere('phone', 'LIKE', "%{$query}%")->get();
        return view('dream-up.pages.customer.table', compact('customers'))->render();
    }
}
