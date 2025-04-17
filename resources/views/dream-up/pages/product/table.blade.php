<div class="overflow-auto max-h-[calc(100vh-250px)] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
    <table class="table-auto w-full border-collapse text-sm">
        <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
        <tr class="text-left text-white h-12">
            <th class="p-4">SKU</th>
            <th class="p-4 text-center">Ảnh</th>
            <th class="p-4">Sản phẩm</th>
            <th class="p-4">Loại</th>
            <th class="p-4 text-center">Có thể bán</th>
            <th class="p-4 text-center">Tồn kho</th>
            <th class="p-4 text-center">Ngày khởi tạo</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 cursor-pointer">
        @foreach($products as $product)
            <tr class="hover:bg-gray-100 h-16 group" onclick="window.location='{{ route('pd-show', $product->SKU) }}'">
                <td class="p-4">{{ $product->SKU }}</td>
                <td class="p-4"><img src="{{ asset('/storage/' . $product->image) }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                <td class="p-4 text-blue-500 group-hover:underline">{{ $product->name }} - <p class="inline-block uppercase">({{ $product->grind_name }})</p> <p class="inline-block">(250{{ $product->unit_weight_name }})</p></td>
                <td class="p-4">{{ $product->pd_cat_name }}</td>
                <td class="p-4 text-center">{{ $product->can_sale }}</td>
                <td class="p-4 text-center">{{ $product->quantity }}</td>
                <td class="p-4 text-center">{{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
