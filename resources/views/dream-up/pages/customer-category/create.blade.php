@extends('dream-up.admin-dream')
@section('title','Thêm nhóm khách hàng')
@section('content')
    <div class="bg-white h-16 w-full flex text-sm">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-base text-gray-500"></i>
            <a href="{{ route('pd-cat-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách nhóm sản phẩm</a>
        </div>
        <div class="flex items-center justify-end w-[68%] 2xl:w-[72%]">
            <a href="{{ route('cm-cat-index') }}" class="w-[12%] h-10 px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center"><i class="fa-solid fa-ban mr-2"></i>Hủy</a>
            <button type="submit" form="cm-cat-form-create" class="w-[12%] h-10 px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center"><i class="fa-solid fa-check mr-2"></i>Lưu</button>
        </div>
    </div>

    <form action="{{ route('cm-cat-store') }}" id="cm-cat-form-create" method="POST" class="w-[96%] flex justify-between text-sm">
        @csrf
        <div class="bg-white w-[49%] h-full font-gilroy mt-6 rounded-md shadow-lg">
            <h1 class="text-lg font-gilroy_md mt-4 ml-6">Thông tin chung</h1>
            <div class="bg-gray-300 w-full h-px mt-2"></div>
            <div class="w-full mt-4">
                <div class="w-full px-6">
                    <label for="name">Tên nhóm <p class="text-red-600 inline-block mr-2">*</p> @error('name')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                    <input class="mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập tên nhóm sản phẩm" name="name" value="{{ old('name') }}">
                </div>
                <div class="w-full px-6 mt-4">
                    <label for="id">Mã nhóm <p class="text-red-600 inline-block mr-2">*</p> @error('id')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                    <input class="mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã nhóm sản phẩm" name="id" value="{{ old('id') }}">
                </div>
                <div class="w-full px-6 mt-4">
                    <label class="mr-2" for="description">Mô tả @error('description')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                    <textarea class="resize-none mt-2 w-full h-40 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="description"> {{ old('description') }}</textarea>
                </div>
            </div>
        </div>
        <div class="bg-white w-[49%] h-full font-gilroy mt-6 rounded-md shadow-lg">
            <h1 class="text-lg font-gilroy_md mt-4 ml-6">Cài đặt nâng cao</h1>
            <div class="bg-gray-300 w-full h-px mt-2"></div>
            <div class="w-full mt-4">
                <div class="w-full px-6">
                    <label for="name">Giá mặc định</label>
                    <select name="priceType" class=" mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="name">
                        <option value="" selected disabled>Chọn giá mặc định</option>
                        @foreach($priceTypes as $type)
                            <option value="{{ $type->type_id }}" {{ old('priceType') == $type->type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full px-6 mt-4">
                    <label for="id">Chiết khấu (%)</label>
                    <input class="text-right mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã nhóm sản phẩm" name="discountPercent" value="{{old('discountPercent', 0)}}" >
                </div>
                <div class="w-full px-6 mt-4">
                    <label for="description">Hình thức thanh toán</label>
                    <select name="payment" class=" mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="" selected disabled>Chọn hình thức thanh toán</option>
                        @foreach($payments as $payment)
                            <option value="{{ $payment->id }}" {{ old('payment') == $payment->id ? 'selected' : ''}}>{{ $payment->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
@endsection
