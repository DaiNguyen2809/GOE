@extends('dream-up.admin-dream')
@section('title','Chi tiết đơn hàng ' . $formattedOrder['id'])
@section('content')
    @php
        use App\Helpers\OrderHelper;
    @endphp
    <div class="bg-white h-fit w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-base text-gray-500"></i>
            <a href="{{ route('od-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách hóa đơn</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%]">
            {!! OrderHelper::getStatusCancelButton($formattedOrder['status'], $formattedOrder['id']) !!}
            {!! OrderHelper::getStatusUpdateButton($formattedOrder['status'], $formattedOrder['id']) !!}
            {!! OrderHelper::getStatusApprovalButton($formattedOrder['status'], $formattedOrder['id']) !!}
        </div>
    </div>

    <div class="w-[96%] flex flex-wrap gap-6 mb-10">
        @include("dream-up.pages.order.detail-info-customer")
        @include("dream-up.pages.order.detail-info-product")
    </div>

    <div class="h-fit flex items-center justify-end w-full mb-10 pr-6">
        {!! OrderHelper::getStatusCancelButton($formattedOrder['status'], $formattedOrder['id']) !!}
        {!! OrderHelper::getStatusUpdateButton($formattedOrder['status'], $formattedOrder['id']) !!}
        {!! OrderHelper::getStatusApprovalButton($formattedOrder['status'], $formattedOrder['id']) !!}
    </div>
    @include("dream-up.pages.order.cancel-modal")
    @include("dream-up.pages.order.approval-modal")
    @include("dream-up.pages.order.pdf-order")
    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                handleShowSuccessAlert(@json(session('success')));
            });
        </script>
    @endif
@endsection

