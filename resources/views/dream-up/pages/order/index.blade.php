@extends('dream-up.admin-dream')
@section('title','Đơn hàng')
@section('content')
    <div class="bg-white w-[96%] h-64 font-gilroy mt-6 rounded-md shadow-lg">
        <h1 class="text-2xl font-[gilroy-md] mt-4 mb-2 ml-4">QUẢN LÝ ĐƠN HÀNG</h1>
        <div class="relative w-full ml-4 flex items-center text-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-3.5 w-6 h-6 text-gray-500 cursor-pointer"></i>
            <input type="text" placeholder="Tìm kiếm theo mã đơn hàng, tên, SĐT khách hàng/người nhận hàng" class="w-[40%] pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <select class="cursor-pointer ml-4 border border-gray-300 rounded-lg py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option selected>Trạng thái</option>
                <option>Đặt hàng</option>
                <option>Đang giao dịch</option>
                <option>Hoàn thành</option>
                <option>Đã hủy</option>
            </select>
            <select class="cursor-pointer ml-4 border border-gray-300 rounded-lg py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option selected>Nhân viên phụ trách</option>
                <option>Khang-0909758062</option>
                <option>Duy-0704479856</option>
                <option>Đại-0909012342</option>
            </select>
            <button class="px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-[gilroy] rounded-md cursor-pointer hover:bg-green-600 hover:text-white"><i class="fa-regular fa-file-excel mr-2"></i> Xuất file</button>
            <a href="{{ route('od-create') }}" class="px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-[gilroy] rounded-md cursor-pointer hover:bg-blue-600 hover:text-white"><i class="fa-solid fa-plus mr-2"></i> Tạo đơn hàng</a>
        </div>
        <div class="w-[98%] h-px bg-gray-400 mx-auto mt-3 opacity-50"></div>
        <div class="flex mt-8">
            <div class="relative cursor-pointer flex-1 w-[calc(100%/6)] h-full flex items-center px-4">
                <p class="absolute text-xs text-gray-500 mb-5">Chờ duyệt</p>
                <h3 class="absolute text-base font-[gilroy-md] mt-5">8,332,825</h3>
                <p class="text-blue-500 absolute ml-24 text-base">7</p>
            </div>
            <div class="relative cursor-pointer flex-1 w-[calc(100%/6)] h-full flex items-center px-4">
                <p class="absolute text-xs text-gray-500 mb-5">Chờ thanh toán</p>
                <h3 class="absolute text-base font-[gilroy-md] mt-5">24,088,825</h3>
                <p class="text-blue-500 absolute ml-24 text-base">14</p>
            </div>
            <div class="relative cursor-pointer flex-1 w-[calc(100%/6)] h-full flex items-center px-4">
                <p class="absolute text-xs text-gray-500 mb-5">Chờ đóng gói</p>
                <h3 class="absolute text-base font-[gilroy-md] mt-5">7,785,000</h3>
                <p class="text-blue-500 absolute ml-24 text-base">3</p>
            </div>
            <div class="relative cursor-pointer flex-1 w-[calc(100%/6)] h-full flex items-center px-4">
                <p class="absolute text-xs text-gray-500 mb-5">Đã đóng gói</p>
                <h3 class="absolute text-base font-[gilroy-md] mt-5">0</h3>
                <p class="text-blue-500 absolute ml-24 text-base">0</p>
            </div>
            <div class="relative cursor-pointer flex-1 w-[calc(100%/6)] h-full flex items-center px-4">
                <p class="absolute text-xs text-gray-500 mb-5">Hoàn thành</p>
                <h3 class="absolute text-base font-[gilroy-md] mt-5">11,000,000</h3>
                <p class="text-blue-500 absolute ml-24 text-base">1</p>
            </div>
            <div class="relative cursor-pointer flex-1 w-[calc(100%/6)] h-full flex items-center px-4">
                <p class="absolute text-xs text-gray-500 mb-5">Đã hủy</p>
                <h3 class="absolute text-base font-[gilroy-md] mt-5">380,000</h3>
                <p class="text-blue-500 absolute ml-24 text-base">1</p>
            </div>
        </div>
    </div>

    <div class="bg-white w-[96%] h-screen font-[gilroy] mt-4 mb-6 rounded-md shadow-lg flex justify-center">
        <div class="container w-[98%] mt-4">
            <div class="bg-white shadow-md overflow-hidden">
                @include('dream-up.pages.order.table')
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
