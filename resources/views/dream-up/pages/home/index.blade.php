<?php
    use App\Helpers\OrderHelper;
?>

@extends('dream-up.admin-dream')
@section('title','Tổng quan')
@section('content')
    <div class="bg-white h-fit w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <p class="ml-2 text-lg font-gilroy_md group-hover:underline">TỔNG QUAN</p>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%] text-sm">
            <button type="button" class="text-base px-4 py-2 ml-4 bg-white">Tài khoản <i class="fa-solid fa-chevron-down"></i></button>
        </div>
    </div>

    <div class="w-[96%] flex flex-col h-screen gap-y-80 mt-6 pb-16">
        <div class="w-full flex gap-6">
            <div class="w-2/3 h-40 rounded-md flex flex-wrap gap-6">
                <div class="w-full flex justify-center gap-6">
                    <div class="bg-white w-1/2 h-40 rounded-md shadow-md flex justify-start items-center gap-4 px-6 py-6">
                        <div class="bg-blue-600 h-fit py-8 w-[35%] rounded-xl flex justify-center items-center">
                            <i class="text-white fa-solid fa-money-bills text-4xl"></i>
                        </div>
                        <div class="w-[64%]">
                            <p class="text-blue-600 text-3xl font-gilroy_bd">{{ number_format($dailyRevenue, 0, '.', ',') }}</p>
                            <p>Doanh thu trong ngày</p>
                        </div>
                    </div>
                    <div class="bg-white w-1/2 h-40 rounded-md shadow-md flex justify-start items-center gap-4 px-6 py-6">
                        <div class="bg-green-600 h-fit py-8 w-[35%] rounded-xl flex justify-center items-center">
                            <i class="text-white fa-solid fa-box text-4xl"></i>
                        </div>
                        <div class="w-[64%]">
                            <p class="text-green-600 text-3xl font-gilroy_bd">{{ $dailyOrder }}</p>
                            <p>Đơn hàng mới trong ngày</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white w-full h-80 rounded-md shadow-md"></div>
            </div>
            <div class="w-1/3 h-40 rounded-md flex flex-wrap gap-6">
                <div class="bg-white w-full h-40 rounded-md shadow-md flex justify-start items-center gap-4 px-6 py-6">
                    <div class="bg-violet-500 h-fit py-8 w-[32%] rounded-xl flex justify-center items-center">
                        <i class="text-white fa-solid fa-user text-4xl"></i>
                    </div>
                    <div class="w-[66%]">
                        <p class="text-violet-500 text-3xl font-gilroy_bd">{{ $dailyCustomer }}</p>
                        <p>Khách hàng mới trong ngày</p>
                    </div>
                </div>
                <div class="w-full h-80 bg-white rounded-md shadow-md">
                    <h1 class="text-lg font-gilroy_md mt-4 ml-6">Sản phẩm bán chạy <span class="float-right mr-6 text-blue-600 font-gilroy text-base">Xem tất cả</span></h1>
                    <div class="bg-gray-300 w-full h-px mt-2"></div>
                    <div class="w-full px-4 py-4 flex flex-col gap-4">
                        @foreach($bestSellers as $bestSeller)
                            <div class=" w-full h-16 flex">
                                <img src="{{ asset('/storage/' . $bestSeller->image) }}" alt="" class="bg-violet-500 h-16 w-16">
                                <div class="w-full my-auto ml-2">
                                    <p class="font-gilroy_md">{{ $bestSeller->name }}</p>
                                    <p class="text-blue-600">{{ $bestSeller->SKU }} <span class="float-right mr-2 text-xl text-black font-gilroy_bd">{{ number_format($bestSeller->price, 0, ',', '.') }}</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white w-[96%] h-screen font-gilroy mt-[19rem] mb-8 rounded-md shadow-lg flex justify-center pb-4">
        <div class="container w-[98%] mt-4">
            <div id="od-container" class="bg-white shadow-md overflow-hidden">
                <div class="overflow-auto max-h-[calc(100vh-300px)] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
                    <table class="table-auto w-full border-collapse text-sm">
                        <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
                        <tr class="text-left text-white h-12">
                            <th class="p-4">Mã đơn hàng</th>
                            <th class="p-4 text-center">Ngày tạo đơn</th>
                            <th class="p-4">Tên khách hàng</th>
                            <th class="p-4 text-center">Trạng thái đơn hàng</th>
                            <th class="p-4 text-center">Trạng thái thanh toán</th>
                            <th class="p-4 text-right">Khách phải trả</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 cursor-pointer">
                        @foreach($recentOrders as $recentOrder)
                            <tr class="hover:bg-sky-50 group" onclick="window.location='{{ route('od-show', $recentOrder->id) }}'">
                                <td class="p-4 text-blue-500 group-hover:underline">{{ $recentOrder->id }}</td>
                                <td class="p-4 text-center">{{ \Illuminate\Support\Carbon::parse($recentOrder->created_at)->format('d/m/Y') }}</td>
                                <td class="p-4 overflow-hidden">{{ $recentOrder->customer_name }}</td>
                                <td class="p-4"><div class="mx-auto w-fit px-3 rounded-full {{ OrderHelper::getStatusClass($recentOrder->status) }}">{{ OrderHelper::getStatusText($recentOrder->status) }}</div></td>
                                <td class="p-4 relative flex justify-center items-center mt-1">
                                    <div class="mx-auto">{!! OrderHelper::getIconPayment($recentOrder->payment_status) !!}</div>
                                    <div class="absolute -top-5 mt-1 px-2 w-28 py-1 bg-neutral-100 text-center text-black text-xs rounded-md shadow-lg z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200">
                                        {{ OrderHelper::getStatusPayment($recentOrder->payment_status) }}
                                        <div class="absolute left-1/2 -translate-x-1/2 -bottom-2 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-t-8 border-t-neutral-100"></div>
                                    </div>
                                </td>
                                <td class="p-4 text-right">{{ number_format($recentOrder->total_after_discount, 0, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
