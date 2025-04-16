<?php
    use App\Helpers\OrderHelper;
?>
<div class="bg-white w-[96%] h-screen font-[gilroy] mt-4 mb-6 rounded-md shadow-lg flex justify-center">
    <div class="container w-[98%] mt-4">
        <div class="bg-white shadow-md overflow-hidden" id="cm-container">
            <div class="overflow-auto max-h-[calc(100vh-250px)] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
                <table class="table-auto w-full border-collapse text-sm">
                    <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
                    <tr class="text-left text-white h-12">
                        <th class="p-4 text-center">Mã đơn hàng</th>
                        <th class="p-4 text-center">Trạng thái</th>
                        <th class="p-4 text-center">Thanh toán</th>
                        <th class="p-4 text-center">Giá trị	</th>
                        <th class="p-4 text-center">Nhân viên xử lý đơn</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($orders as $order)
                        <tr class="hover:bg-gray-100 h-16 group">
                            <td class="p-4 text-center text-blue-500 group-hover:underline"><a href="{{ asset(route('od-show', $order->order_id)) }}" class="text-blue-600">{{ $order->order_id }}</a></td>
                            <td class="p-4"><div class="mx-auto w-fit px-3 py-1 rounded-full {{ OrderHelper::getStatusClass($order->order_status) }}">{{ OrderHelper::getStatusText($order->order_status) }}</div></td>
                            <td class="p-4 text-center">{!! OrderHelper::getIconPayment($order->payment_status) !!}</td>
                            <td class="p-4 text-center">{{ number_format($order->total_after_discount, 0, '.', ',')  }}</td>
                            <td class="p-4 text-center">{{ $order->staff_name ?: '---' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
