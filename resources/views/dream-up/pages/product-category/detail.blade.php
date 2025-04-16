@extends('dream-up.admin-dream')
@section('title','Chi tiết sản phẩm')
@section('content')
    <div class="bg-white h-16 w-full flex text-sm">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-base text-gray-500"></i>
            <a href="{{ route('pd-cat-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách nhóm sản phẩm</a>
        </div>
        <div class="flex items-center justify-end w-[68%] 2xl:w-[72%]">
            <button onclick="handleConfirmDelete('{{ $productCategory->id }}', 'pd-cat-modal-delete' , 'pd-cat-form-delete', '{{ route('pd-cat-destroy', '__id__') }}')" type="button" class="w-[12%] 2xl:w-[7%] h-10 px-4 py-2 ml-4 bg-white border border-red-600 text-red-600 font-gilroy rounded-md cursor-pointer hover:bg-red-600 hover:text-white text-center"><i class="fa-solid fa-xmark mr-2"></i> Xóa</button>
            <button type="submit" form="pd-cat-form-update" class="w-[12%] 2xl:w-[7%] h-10 px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center"><i class="fa-solid fa-check mr-2"></i> Lưu</button>
        </div>
    </div>

    <div class="w-[96%] flex justify-between text-sm">
        <div class="bg-white w-[49%] h-full font-gilroy mt-6 rounded-md shadow-lg">
            <h1 class="text-lg font-gilroy_md mt-4 ml-6">Thông tin chung</h1>
            <div class="bg-gray-300 w-full h-px mt-2"></div>
            <div class="w-full mt-4">
                <form action="{{ route('pd-cat-update', $productCategory->id) }}" id="pd-cat-form-update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="w-full px-6">
                        <label for="name">Tên nhóm <p class="text-red-600 inline-block mr-2">*</p> @error('name')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class=" mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập tên nhóm sản phẩm" name="name" value="{{ old('name', $productCategory->name) }}">
                    </div>
                    <div class="w-full px-6 mt-4">
                        <label for="id">Mã nhóm <p class="text-red-600 inline-block mr-2">*</p> @error('id')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã nhóm sản phẩm" name="id" value="{{ old('id', $productCategory->id) }}">
                    </div>
                    <div class="w-full px-6 mt-4">
                        <label class="mr-2" for="description">Mô tả @error('description')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <textarea class="resize-none mt-2 w-full h-40 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="description">{{ old('description', $productCategory->description) }}</textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                handleShowSuccessAlert(@json(session('success')));
            });
        </script>
    @endif
    @include('dream-up.pages.product-category.modal')
@endsection
