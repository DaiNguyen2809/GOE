@php
    use App\Helpers\OrderHelper
@endphp
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
            @foreach($orders as $order)
                <tr class="hover:bg-sky-50 group" onclick="window.location='{{ route('od-show', $order->id) }}'">
                    <td class="p-4 text-blue-500 group-hover:underline">{{ $order->id }}</td>
                    <td class="p-4 text-center">{{ \Illuminate\Support\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                    <td class="p-4 overflow-hidden">{{ $order->customer_name }}</td>
                    <td class="p-4"><div class="mx-auto w-fit px-3 rounded-full {{ OrderHelper::getStatusClass($order->status) }}">{{ OrderHelper::getStatusText($order->status) }}</div></td>
                    <td class="p-4 relative flex justify-center items-center mt-1">
                        <div class="mx-auto {{ OrderHelper::getIconPayment($order->payment_status) }}"></div>
                        <div class="absolute -top-5 mt-1 px-2 w-28 py-1 bg-neutral-100 text-center text-black text-xs rounded-md shadow-lg z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200">
                            {{ OrderHelper::getStatusPayment($order->payment_status) }}
                            <div class="absolute left-1/2 -translate-x-1/2 -bottom-2 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-t-8 border-t-neutral-100"></div>
                        </div>
                    </td>
                    <td class="p-4 text-right">{{ number_format($order->total_after_discount, 0, '.', ',') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
