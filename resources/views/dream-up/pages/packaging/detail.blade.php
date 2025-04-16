<?php
    use App\Helpers\PackedHelper;
?>
@extends('dream-up.admin-dream')
@section('title', 'Chi tiết phiếu đóng gói')
@section('content')
    <div class="bg-white h-fit w-full flex px-3 py-3 text-sm">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-sm text-gray-500"></i>
            <a href="{{ route('pk-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách phiếu đóng gói</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%] text-sm">
            {!! PackedHelper::getCancelButton($packagingOrder->status) !!}
            {!! PackedHelper::getConfirmButton($packagingOrder->status) !!}
        </div>
    </div>
    <div class="w-[96%] flex flex-wrap mt-6 text-2xl">{{ $packagingOrder->id ?: '---'}}</div>
    <div class="w-[96%] flex justify-between mb-4">
        <div class="w-[65%]">
            <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-[gilroy-md] mt-4 ml-6 pt-4">Thông tin phiếu đóng gói</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm flex flex-col justify-between pb-6">
                    <p class="pl-6 mb-2 text-base">Đơn hàng: <a href="{{ asset(route('od-show', $packagingOrder->order_id)) }}" class="hover:underline text-blue-600">{{ $packagingOrder->order_id }}</a></p>
                    <div class="flex justify-between">
                        <div class="w-full pl-6 overflow-hidden whitespace-nowrap text-ellipsis text-gray-400 leading-loose">

                            <p class="mb-1.5">Ngày yêu cầu đóng gói</p>
                            <p class="mb-1.5">Ngày xác nhận đã đóng gói</p>
                            <p class="mb-1.5">Ngày huỷ đóng gói</p>
                        </div>

                        <div class="w-full pl-6 leading-loose">
                            <p class="mb-1.5 text-blue-600"></p>
                            <p class="mb-1.5">{{ \Illuminate\Support\Carbon::parse($packagingOrder->order_date)->format('d/m/Y') ?: '---'}}</p>
                            <p class="mb-1.5">{{ \Illuminate\Support\Carbon::parse($packagingOrder->confirm_date)->format('d/m/Y') ?: '---'}}</p>
                            <p class="mb-1.5">{{ \Illuminate\Support\Carbon::parse($packagingOrder->cancel_date)->format('d/m/Y') ?: '---'}}</p>
                        </div>

                        <div class="w-full pl-6 overflow-hidden whitespace-nowrap text-ellipsis text-gray-400 leading-loose">
                            <p class="mb-1.5">NV yêu cầu đóng gói</p>
                            <p class="mb-1.5">NV xác nhận đã đóng gói</p>
                            <p class="mb-1.5">NV huỷ đóng gói</p>
                        </div>

                        <div class="w-full pl-6 leading-loose">
                            <p class="mb-1.5">{{ $request_staff->name ?: '---'}}</p>
                            <p class="mb-1.5">{{ $confirm_staff->name ?: '---' }}</p>
                            <p class="mb-1.5">{{ '' ?: '---' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[33.5%]">
            <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg block leading-loose">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6 pt-4">Thông tin bổ sung</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full px-6 mt-4 text-sm flex flex-col pb-6">
                    <label>Mô tả</label>
                    <textarea class="px-3 py-3 resize-none rounded-sm mt-2 h-28 border border-gray-300"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="w-[96%] flex justify-between mb-16 bg-white rounded-md h-fit">
        <div class="w-full flex flex-col mb-6">
            <p class="text-lg font-[gilroy-md] mt-2 ml-6 pt-4">Thông tin sản phẩm</p>
            <div class="w-full h-fit px-4 mt-4 flex flex-col justify-center items-center gap-4">
                <table class="table-auto w-full border text-sm">
                    <thead class="bg-sky-950  top-0 z-10 shadow-md">
                    <tr class="text-left text-white h-12">
                        <th class="p-4 text-center w-[2%]">STT</th>
                        <th class="p-4 text-center w-[8%]">Ảnh</th>
                        <th class="p-4">Tên sản phẩm</th>
                        <th class="p-4 text-center">Số lượng</th>
                        <th class="p-4 text-end">Đơn giá</th>
                        <th class="p-4 text-end">Chiết khấu</th>
                        <th class="p-4 text-end">Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 w-full">
                        @foreach($orderDetails as $index => $orderDetail)
                            <tr class="hover:bg-sky-50 h-20 w-full">
                                <td class="p-4 text-center w-[2%]">{{ $index + 1 }}</td>
                                <td class="p-4 w-[8%]"><img src="{{ asset('/storage/' . $orderDetail->image) }}" alt="Ảnh" class="w-12 h-12 object-cover mx-auto"></td>
                                <td class="p-4 w-[40%]">
                                    <p>{{ $orderDetail->name }}</p>
                                    <p class="text-blue-500">{{ $orderDetail->product_SKU }}</p>
                                </td>
                                <td class="p-4 text-center w[10%] h-20 flex justify-center items-center">{{ $orderDetail->quantity }}</td>
                                <td class="p-4 text-end w[10%]">{{ number_format($orderDetail->price, 0, '.', ',') }}</td>
                                <td class="p-4 w[10%] flex justify-center items-end flex-col">
                                    <span>{{ number_format($orderDetail->discount_value, 0, '.', ',') }}</span>
                                    <span class="text-red-600 text-xs">{{ $orderDetail->discount_percent }}%</span>
                                </td>
                                <td class="p-4 text-end w[10%]">{{ number_format($orderDetail->total_amount, 0, '.', ',') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('dream-up.pages.packaging.cancel-packed')
    @include('dream-up.pages.packaging.confirm-packed')
@endsection
