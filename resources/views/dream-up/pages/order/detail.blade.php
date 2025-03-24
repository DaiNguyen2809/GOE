@extends('dream-up.admin-dream')
@section('title','Chi tiết đơn hàng ' . $formattedOrder['id'])
@section('content')
    <div class="bg-white h-fit w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-base text-gray-500"></i>
            <a href="{{ route('od-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách hóa đơn</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%]">
            <button onclick="handleShowContent('od-modal-cancel')" type="button" class="w-[20%] 2xl:w-[13%] px-4 py-2 ml-4 bg-white border border-red-600 text-red-600 font-gilroy rounded-md cursor-pointer hover:bg-red-600 hover:text-white text-center text-sm"><i class="fa-solid fa-xmark mr-2"></i></i>Hủy đơn hàng</button>
            <button type="button" class="w-[24%] 2xl:w-[16%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-pen-to-square mr-2"></i></i>Cập nhật đơn hàng</button>
            <button type="submit" class="w-[20%] 2xl:w-[14%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-check mr-2"></i></i>Duyệt đơn hàng</button>
        </div>
    </div>

    <div class="w-[96%] flex flex-wrap gap-6 mb-10">
        @include("dream-up.pages.order.detail-info-customer")
        @include("dream-up.pages.order.detail-info-product")
    </div>

    <div class="h-fit flex items-center justify-end w-full mb-10 pr-6">
        <button type="button" class="w-[14%] 2xl:w-[10%] px-4 py-2 ml-4 bg-white border border-red-600 text-red-600 font-gilroy rounded-md cursor-pointer hover:bg-red-600 hover:text-white text-center text-sm"><i class="fa-solid fa-xmark mr-2"></i></i>Hủy đơn hàng</button>
        <button type="button" class="w-[16%] 2xl:w-[12%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-pen-to-square mr-2"></i></i>Cập nhật đơn hàng</button>
        <button type="submit" form="od-form-create" class="w-[14%] 2xl:w-[10%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-check mr-2"></i></i>Duyệt đơn hàng</button>
    </div>
@endsection

