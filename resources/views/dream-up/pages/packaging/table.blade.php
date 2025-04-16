<div class="overflow-auto max-h-[calc(100vh-250px)] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
    <table class="table-auto w-full border-collapse text-sm">
        <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
        <tr class="text-left text-white h-12">
            <th class="p-4 text-center">Mã đóng gói</th>
            <th class="p-4 text-center">Mã đơn hàng</th>
            <th class="p-4 text-center">Ngày yêu cầu đóng gói</th>
            <th class="p-4 text-center">Ngày xác nhận đóng gói</th>
            <th class="p-4 text-center">Trạng thái</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($packagingOrders as $packagingOrder)
                <tr class="hover:bg-gray-100 h-14">
                    <td class="p-4 text-blue-500 text-center"><a href="{{ asset(route('pk-show', $packagingOrder->id)) }}" class="hover:underline">{{ $packagingOrder->id }}</a></td>
                    <td class="p-4 text-blue-500 text-center"><a href="{{ asset(route('od-show', $packagingOrder->order_id)) }}" class="hover:underline">{{ $packagingOrder->order_id }}</a></td>
                    <td class="p-4 text-center">{{ $packagingOrder->order_date }}</td>
                    <td class="p-4 text-center">{{ $packagingOrder->confirm_date }}</td>
                    <td class="{!! \App\Helpers\PackedHelper::getStatus($packagingOrder->status) !!}">{!! \App\Helpers\PackedHelper::getStatusText($packagingOrder->status) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
