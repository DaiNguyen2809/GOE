@extends('dream-up.admin-dream')
@section('title', 'Cập nhật khách hàng')
@section('content')
    <div class="bg-white h-fit w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-sm text-gray-500"></i>
            <a href="{{ route('cm-show', $customer->id) }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại chi tiết khách hàng</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%] text-sm">
            <a href="{{ route('cm-show', $customer->id) }}" class="w-[10%] 2xl:w-[6%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center"><i class="fa-solid fa-ban mr-2"></i> Hủy</a>
            <button type="submit" form="cm-form-update" class="w-[10%] 2xl:w-[6%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center"><i class="fa-solid fa-check mr-2"></i> Lưu</button>
        </div>
    </div>
    <form action="{{ route('cm-update', $customer->id) }}" id="cm-form-update" method="POST" class="w-[96%] flex flex-wrap gap-6 mb-16">
        @csrf
        @method('PUT')
        <div class="w-full flex justify-between mt-6">
            <div class="bg-white w-[65%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-[gilroy-md] mt-4 ml-6">Thông tin chung</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm">
                    <div class="w-full px-6 mb-12 h-10">
                        <label for="name">Tên khách hàng<p class="text-red-600 inline-block mr-2">*</p> @error('name')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <input class=" mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập tên khách hàng" name="name" value="{{ old('name', $customer->name) }}">
                    </div>
                    <div class="w-full px-6 flex justify-between h-10 mb-12">
                        <div class="w-[49%]">
                            <label for="id">Mã khách hàng<p class="text-red-600 inline-block mr-2">*</p> @error('id')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã khách hàng" name="id" value="{{ old('id', $customer->id) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="customer_category" class="block">Nhóm khách hàng<p class="text-red-600 inline-block mr-2">*</p> @error('customer_category')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <select name="customer_category" class="inline-block mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" selected disabled>Chọn nhóm khách hàng</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('customer_category', $customer->customer_category ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-6 flex justify-between h-10 mb-12">
                        <div class="w-[49%]">
                            <label for="phone">Số điện thoại<p class="text-red-600 inline-block mr-2">*</p> @error('phone')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập số điện thoại" name="phone" value="{{ old('phone', $customer->phone) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="email" class="block">Email<p class="text-red-600 inline-block mr-2">*</p> @error('email')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập địa chỉ email" name="email" value="{{ old('email', $customer->email) }}">
                        </div>
                    </div>
                    <div class="w-full px-6 h-10 mb-12 flex justify-between">
                        <div class="w-[49%]">
                            <label for="area" class="block">Khu vực<p class="text-red-600 inline-block mr-2">*</p> @error('area')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <select name="area" class="inline-block mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" selected disabled>Chọn Tỉnh/Thành phố - Quận/Huyện</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-[49%]">
                            <label for="ward" class="block">Phường/Xã<p class="text-red-600 inline-block mr-2">*</p> @error('ward')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <select name="ward" class="inline-block mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" selected disabled>Chọn Phường/Xã</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-6 mb-12 h-10">
                        <label for="address">Địa chỉ cụ thể<p class="text-red-600 inline-block mr-2">*</p> @error('address')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <input class=" mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập tên địa chỉ" name="address" value="{{ old('address') }}">
                    </div>
                </div>
            </div>
            <div class="bg-white w-[33%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6">Thông tin khác</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm">
                    <div class="w-full px-6 h-10 mb-12">
                        <label for="employee">Nhân viên phụ trách<p class="text-red-600 inline-block mr-2">*</p> @error('employee')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <select name="employee" class=" mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected disabled>Chọn nhân viên phụ trách</option>
                        </select>
                    </div>

                    <div class="w-full px-6 mb-12 h-16">
                        <label class="mr-2" for="description">Mô tả @error('description')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <textarea class="resize-none mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="description">{{ old('description', $customer->customer_description) }}</textarea>
                    </div>
                    <div class="w-full px-6 mb-12 h-16">
                        <label class="mr-2" for="tag">Tags @error('tag')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <textarea class="resize-none mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="tag">{{ old('tag', $customer->customer_tag) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="bg-white w-[65%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-[gilroy-md] mt-4 ml-6">Thông tin bổ sung</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm">
                    <div class="w-full px-6 flex justify-between h-10 mb-12">
                        <div class="w-[49%]">
                            <label for="birthday">Ngày sinh<p class="text-red-600 inline-block mr-2">*</p> @error('birthday')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="date" placeholder="Chọn ngày sinh" name="birthday" value="{{ old('birthday' , $customer->birthday) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="gender" class="block">Giới tính<p class="text-red-600 inline-block mr-2">*</p> @error('gender')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <select name="gender" class="inline-block mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled {{ $customer->gender ? '' : 'selected' }}>Chọn giới tính</option>
                                <option value="Nam" {{ $customer->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                                <option value="Nữ" {{ $customer->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-6 flex justify-between h-10 mb-12">
                        <div class="w-[49%]">
                            <label for="point">Điểm<p class="text-red-600 inline-block mr-2">*</p> @error('point')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập điểm" name="point" value="{{ old('point', $customer->point) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="debt" class="block">Công nợ<p class="text-red-600 inline-block mr-2">*</p> @error('debt')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="number" placeholder="Nhập công nợ" name="debt" value="{{ old('debt', $customer->debt) }}">
                        </div>
                    </div>
                    <div class="w-full px-6 h-10 mb-12 flex justify-between">
                        <div class="w-[49%]">
                            <label for="affiliates" class="block">Mã tiếp thị liên kết<p class="text-red-600 inline-block mr-2">*</p> @error('affiliates')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input readonly class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Mã tiếp thị liên kết" name="affiliates" value="{{ old('affiliates', $customer->affiliates_code) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="special_code" class="block">Mã đặc biệt<p class="text-red-600 inline-block mr-2">*</p> @error('special_code')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã khách hàng đặc biệt" name="special_code" value="{{ old('special_code') }}">
                        </div>
                    </div>
                    <div class="w-full px-6 h-10 mb-12 flex justify-between">
                        <div class="w-[49%]">
                            <label for="total_expenditure" class="block">Tổng chi tiêu<p class="text-red-600 inline-block mr-2">*</p> @error('total_expenditure')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right" type="number" placeholder="Nhập tổng chi tiêu" name="total_expenditure" value="{{ old('total_expenditure', $customer->total_expenditure) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="default_discount" class="block">Chiết khấu mặc định (%)<p class="text-red-600 inline-block mr-2">*</p> @error('discount')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right" type="text" name=default_discount" value="{{ old('default_discount', $customer->default_discount) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
