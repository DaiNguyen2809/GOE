@php
    use App\Helpers\OrderHelper
@endphp
<div class="w-full flex justify-start mt-6 ">
    <div class="flex justify-between w-full">
        <div class="flex flex-col w-[40%]">
            <div class="flex">
                <span class="text-2xl">{{ $formattedOrder['cus_name'] ?: '---'}} </span>
                <div class="ml-6 w-fit h-fit py-1 px-4 rounded-full flex justify-center items-center {{ OrderHelper::getStatusClass($formattedOrder['status']) }}">{{ OrderHelper::getStatusText($formattedOrder['status']) }}</div>
            </div>
            <button onclick="handlePrintOrder()" type="button" class="mt-2 w-fit bg-white border px-6 py-2 rounded-sm hover:bg-sky-50"><i class="fa-solid fa-print mr-4 text-gray-500"></i>In đơn hàng</button>
        </div>

{{--        <div class="w-[58%] flex text-sm">--}}
{{--            <div class="w-full bg-white p-4 rounded-lg shadow-md">--}}
{{--                <div class="flex justify-between items-center">--}}
{{--                    <div class="flex flex-col items-center">--}}
{{--                        <div class="mb-2 w-5 h-5 flex items-center justify-center rounded-full bg-blue-600 text-white font-bold">1</div>--}}
{{--                        <p class="">Đặt hàng</p>--}}
{{--                    </div>--}}

{{--                    <div class="mr-4 w-10 h-0.5 bg-gray-300"></div>--}}

{{--                    <div class="flex flex-col items-center">--}}
{{--                        <div class="mb-2 w-5 h-5 flex items-center justify-center rounded-full border-2 border-gray-300 text-gray-300">2</div>--}}
{{--                        <p class="text-gray-300">Duyệt</p>--}}
{{--                    </div>--}}

{{--                    <div class="mr-4 w-10 h-0.5 bg-gray-300"></div>--}}

{{--                    <div class="flex flex-col items-center">--}}
{{--                        <div class="mb-2 w-5 h-5 flex items-center justify-center rounded-full border-2 border-gray-300 text-gray-300">3</div>--}}
{{--                        <p class="text-gray-300">Đóng gói</p>--}}
{{--                    </div>--}}

{{--                    <div class="mr-4 w-10 h-0.5 bg-gray-300"></div>--}}

{{--                    <div class="flex flex-col items-center">--}}
{{--                        <div class="mb-2 w-5 h-5 flex items-center justify-center rounded-full border-2 border-gray-300 text-gray-300">4</div>--}}
{{--                        <p class="text-gray-300">Xuất kho</p>--}}
{{--                    </div>--}}

{{--                    <div class="mr-4 w-10 h-0.5 bg-gray-300"></div>--}}

{{--                    <div class="flex flex-col items-center">--}}
{{--                        <div class="mb-2 w-5 h-5 flex items-center justify-center rounded-full border-2 border-gray-300 text-gray-300">5</div>--}}
{{--                        <p class="text-gray-300">Hoàn thành</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>

<div class="w-full flex justify-between">
    <div class="w-[58%] 2xl:w-[62%] h-fit flex flex-col gap-6 text-sm">
        <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg">
            <h1 class="text-base font-gilroy_md mt-4 ml-6">Thông tin khách hàng</h1>
            <div class="bg-gray-300 w-full h-px mt-2"></div>
            <div class="w-full mt-4 h-fit">
                <div class="relative w-full px-6 flex items-center text-sm">
                    <p class="text-2xl text-blue-600">{{ $formattedOrder['cus_name'] }} - {{ $formattedOrder['phone'] }}</p>
                </div>
                <div class="w-full flex gap-4">
                    <div class="w-[55%] h-60 px-6 mt-4 flex flex-col leading-relaxed">
                        <div class="mt-4">
                            <p class="font-gilroy_md">ĐỊA CHỈ GIAO HÀNG</p>
                            <p>{{ $formattedOrder['address'] }}, {{ $formattedOrder['ward'] }}, {{ $formattedOrder['area'] }}</p>
                        </div>
                        <div class="mt-10">
                            <p class="font-gilroy_md">LIÊN HỆ</p>
                            <p>Email: {{ $formattedOrder['email'] }}</p>
                            <p>Số điện thoại: {{ $formattedOrder['phone'] }}</p>
                        </div>
                    </div>
                    <div class="w-[45%] h-fit pr-6 mt-4 text-sm">
                        <div class="w-full h-fit flex px-4 py-4 rounded border border-dashed border-gray-400">
                            <div class="w-[65%] leading-loose">
                                <p>Nợ phải thu</p>
                                <p>Tổng chi tiêu (0 đơn)</p>
                                <p>Trả hàng (0 sản phẩm)</p>
                                <p>Giao hàng thất bại (0 đơn)</p>
                            </div>
                            <div class="w-[35%] leading-loose text-right">
                                <p class="text-red-600">{{ $formattedOrder['cus_debt'] }}</p>
                                <p class="text-blue-600">{{ $formattedOrder['total_expenditure'] }}</p>
                                <p class="text-red-600">{{ $formattedOrder['total_return_products'] }}</p>
                                <p class="text-red-600">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg">
            <h1 class="text-base font-gilroy_md mt-1 py-6 px-6 flex justify-between">
                <span><i class="fa-solid fa-wallet text-gray-500 mr-2"></i>{!! OrderHelper::getStatusPaymentText($formattedOrder['payment_status']) !!}</span>
                <div>
                    {!! OrderHelper::getQrCodeButton($formattedOrder['payment_status']) !!}
                    {!! OrderHelper::getPaymentButton($formattedOrder['payment_status']) !!}
                </div>
            </h1>
            <div class="bg-gray-300 w-full h-px mt-2"></div>
            <div class="w-full h-fit px-4 py-4">
                <div class="relative w-full px-6 py-2 flex items-center justify-between text-sm bg-sky-50">
                    <p>Khách phải trả: <span class="ml-4 font-gilroy_md">{{ number_format($formattedOrder['total_after_discount'], 0, '.', ',') }}</span></p>
                    <p>Đã thanh toán: <span class="ml-4 font-gilroy_md">{{ number_format($formattedOrder['customer_paid'], 0, '.', ',') }}</span></p>
                    <p>Còn phải trả: <span class="ml-4 font-gilroy_md text-red-600">{{ number_format($formattedOrder['debt'], 0, '.', ',') }}</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-[40%] 2xl:w-[36%] h-fit flex flex-col gap-6 text-sm">
        <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg">
            <h1 class="text-base font-gilroy_md mt-4 ml-6">Thông tin đơn hàng</h1>
            <div class="bg-gray-300 w-full h-px mt-2"></div>
            <div class="w-full mt-4 mb-6 flex justify-between px-4">
                <div class="w-[48%] leading-loose">
                    <p>Chính sách giá:</p>
                    <p>Ngày bán:</p>
                    <p>Bán bởi:</p>
                    <p>Thanh toán:</p>
                </div>
                <div class="w-[48%] leading-loose">
                    <p>{{ $formattedOrder['price_name'] ?: "---" }}</p>
                    <p>{{ $formattedOrder['created_at'] }}</p>
                    <p>{{ $formattedOrder['staff_id'] }}</p>
                    <p>{{ $formattedOrder['payment'] ?: "---"}}</p>
                </div>
            </div>
        </div>

        <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg">
            <h1 class="text-base font-gilroy_md mt-2 py-1 px-4 flex justify-between items-center">
                <span><i class="fa-solid fa-truck-fast text-gray-500 mr-2"></i>Đóng gói  giao hàng</span>
                <span class="w-[40%] 2xl:w-[35%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-box mr-2"></i>Yêu cầu đóng gói</span>
            </h1>
            <div class="bg-gray-300 w-full h-px mt-2"></div>
            <div class="w-full mt-4 flex justify-between px-4">
                <div class="w-[48%] leading-loose">
                    <p>Mã đóng gói:</p>
                    <p>Vận chuyển bởi:</p>
                    <p>Người trả phí:</p>
                    <p>Phí trả ĐTVC:</p>
                </div>
                <div class="w-[48%] leading-loose">
                    <p class="text-blue-600">SFU09450</p>
                    <p>B. Lam</p>
                    <p>GOE</p>
                    <p>0</p>
                </div>
            </div>
            <div class="px-4 mt-3">
                <textarea readonly class="leading-relaxed resize-none w-full h-20 mb-4 px-3 py-2 border rounded-sm text-justify"> Cho xem hàng, không cho thử |cộng ship vào đơn [ship hỏa tốc hết 75k] giao trước 16h chiều (19/03/25)</textarea>
            </div>
        </div>
    </div>
</div>
@include('dream-up.pages.order.qr-modal')
@include('dream-up.pages.order.payment-modal')
