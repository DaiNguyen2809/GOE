@extends('dream-up.admin-dream')
@section('title','Sản phẩm')
@section('content')
    <div class="bg-white w-[96%] h-36 font-gilroy mt-6 rounded-md shadow-lg">
        <h1 class="text-2xl font-gilroy_md mt-4 mb-2 ml-4">QUẢN LÝ SẢN PHẨM</h1>
        <div class="relative w-full ml-4 flex items-center text-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-3.5 w-6 h-6 text-gray-500 cursor-pointer"></i>
            <input oninput="handleSearchData('pd-input', '{{ route('pd-search') }}', 'pd-container')" id="pd-input" type="text" placeholder="Tìm kiếm theo mã sản phẩm, tên sản phẩm, barcode" class="w-[40%] h-10 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <select class="h-10 cursor-pointer ml-4 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option selected>Loại sản phẩm</option>
                <option>Cà phê rang xay</option>
                <option>Cà phê hòa tan</option>
                <option>Cà phê cốt</option>
            </select>
            <select class="h-10 cursor-pointer ml-4 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option selected>Nhãn hiệu</option>
                <option>DREAM UP</option>
                <option>SKY UP</option>
            </select>
            <button class="px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white"><i class="fa-regular fa-file-excel mr-2"></i> Xuất file</button>
            <a href="{{ route('pd-create') }}" class="px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white"><i class="fa-solid fa-plus mr-2"></i> Thêm sản phẩm</a>
        </div>
    </div>

    <div class="bg-white w-[96%] h-screen font-gilroy mt-4 mb-4 rounded-md shadow-lg flex justify-center pt-4">
        <div class="container w-full ">
            <div id="pd-container" class="bg-white shadow-md overflow-hidden w-full">
                @include('dream-up.pages.product.table')
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
@endsection
