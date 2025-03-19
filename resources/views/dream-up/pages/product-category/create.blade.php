@extends('dream-up.admin-dream')
@section('title','Thêm nhóm sản phẩm')
@section('content')
    <div class="bg-white h-16 w-full flex">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-base text-gray-500"></i>
            <a href="{{ route('pd-cat-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách nhóm sản phẩm</a>
        </div>
        <div class="flex items-center justify-end w-[68%] 2xl:w-[72%]">
            <a href="{{ route('pd-cat-index') }}" class="w-[10%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-[gilroy] rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center">Hủy</a>
            <button type="submit" form="pd-cat-form-create" class="w-[10%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-[gilroy] rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center">Lưu</button>
        </div>
    </div>

    <div class="w-[96%] flex justify-between">
        <div class="bg-white w-[49%] h-full font-gilroy mt-6 rounded-md shadow-lg">
            <h1 class="text-lg font-gilroy_md mt-4 ml-6">Thông tin chung</h1>
            <div class="bg-gray-300 w-full h-px mt-2"></div>
            <div class="w-full mt-4">
                <form action="{{ route('pd-cat-store') }}" id="pd-cat-form-create" method="POST">
                    @csrf
                    <div class="w-full px-6">
                        <label for="name">Tên nhóm <p class="text-red-600 inline-block mr-2">*</p> @error('name')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class=" mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập tên nhóm sản phẩm" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="w-full px-6 mt-4">
                        <label for="id">Mã nhóm <p class="text-red-600 inline-block mr-2">*</p> @error('id')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã nhóm sản phẩm" name="id" value="{{ old('id') }}">
                    </div>
                    <div class="w-full px-6 mt-4">
                        <label class="mr-2" for="description">Mô tả @error('description')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <textarea class="resize-none mt-2 w-full h-40 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="description">{{ old('description') }}</textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
