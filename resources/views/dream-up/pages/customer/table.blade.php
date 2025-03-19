<div class="overflow-auto max-h-[calc(100vh-250px)] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
    <table class="table-auto w-full border-collapse text-sm">
        <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
        <tr class="text-left text-white h-12">
            <th class="p-4">Mã khách hàng</th>
            <th class="p-4">Tên khách hàng</th>
            <th class="p-4 text-center">Số điện thoại</th>
            <th class="p-4 text-center">Nhóm khách hàng</th>
            <th class="p-4 text-center">Công nợ hiện tại</th>
            <th class="p-4 text-center">Tổng chi tiêu</th>
            <th class="p-4 text-center">Tổng SL đơn hàng</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 cursor-pointer">
        @foreach($customers as $customer)
            <tr class="hover:bg-gray-100 h-16 group" onclick="window.location='{{ route('cm-show', $customer->id) }}'">
                <td class="p-4 text-blue-500 group-hover:underline">{{ $customer->id }}</td>
                <td class="p-4">{{ $customer->name }}</td>
                <td class="p-4 text-center">{{ $customer->phone }}</td>
                <td class="p-4 text-center">{{ $customer->category }}</td>
                <td class="p-4 text-center">{{ $customer->debt }}</td>
                <td class="p-4 text-center">{{ $customer->total_expenditure }}</td>
                <td class="p-4 text-center">{{ $customer->number_orders }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
