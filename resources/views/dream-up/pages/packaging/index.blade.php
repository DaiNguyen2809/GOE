<?php
    use App\Helpers\PackedHelper;
?>
@extends('dream-up.admin-dream')
@section('title','Quản lý đóng gói')
@section('content')
    <div class="bg-white w-[96%] h-fit pb-4 font-gilroy mt-6 rounded-md shadow-lg">
        <h1 class="text-2xl font-gilroy_md mt-4 mb-2 ml-4">QUẢN LÝ ĐÓNG GÓI</h1>
        <div class="relative w-full ml-4 flex items-center text-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-3.5 w-6 h-6 text-gray-500 cursor-pointer"></i>
            <input oninput="handleSearchData('pk-input', '{{ route('pk-search') }}', 'pk-container')" id="pk-input" type="text" placeholder="Tìm kiếm theo mã phiếu đóng gói, mã hóa đơn" class="w-[40%] h-10 pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <select class="h-10 cursor-pointer ml-4 border border-gray-300 rounded-md py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option selected>Trạng thái</option>
                <option>Chờ đóng gói</option>
                <option>Đã đóng gói</option>
                <option>Hủy đóng gói</option>
            </select>
        </div>
    </div>

    <div class="bg-white w-[96%] h-screen font-gilroy mt-4 mb-6 rounded-md shadow-lg flex justify-center">
        <div class="container w-[98%] mt-4">
            <div id="pk-container" class="bg-white shadow-md overflow-hidden">
                @include("dream-up.pages.packaging.table")
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

