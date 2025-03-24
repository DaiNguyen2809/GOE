<div class="w-full mt-4 flex mb-6">
    <div class="w-full h-fit px-4 mt-4 flex flex-col justify-center items-center gap-4">
        <table class="table-auto w-full border text-sm">
            <thead class="bg-sky-950 sticky top-0 z-10 shadow-md">
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
            @foreach($formattedOrder['products'] as $index => $product)
                <tr class="hover:bg-sky-50 h-20 w-full">
                    <td class="p-4 text-center w-[2%]">{{ $index + 1 }}</td>
                    <td class="p-4 w-[8%]"><img src="{{ asset('/storage/' . $product['image']) }}" alt="Ảnh" class="w-12 h-12 object-cover mx-auto"></td>
                    <td class="p-4 w-[40%]">
                        <p>{{ $product['product_name'] }}</p>
                        <p class="text-blue-500">{{ $product['SKU'] }}</p>
                    </td>
                    <td class="p-4 text-center w[10%] h-20 flex justify-center items-center">{{ $product['quantity'] }}</td>
                    <td class="p-4 text-end w[10%]">{{ number_format($product['price'], 0, '.', ',') }}</td>
                    <td class="p-4 w[10%] flex justify-center items-end flex-col">
                        <span>{{ number_format($product['discount_value'], 0, '.', ',') }}</span>
                        <span class="text-red-600 text-xs">{{ $product['discount_percent'] }}%</span>
                    </td>
                    <td class="p-4 text-end w[10%]">{{ number_format($product['total_amount'], 0, '.', ',') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
