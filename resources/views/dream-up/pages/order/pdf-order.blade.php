<div id="print-order" class="hidden w-[874px] h-[1240px]">
    <div class="p-6">
        <div class="text-xs text-right">Chi tiết hóa đơn: {{ $formattedOrder['id'] }}</div>
        <div class="w-full flex flex-col justify-between items-center text-xs">
            <img class="w-[30%]" src="{{ asset('images/colorDreamUp.png') }}" alt="ảnh">
            <p class="text-center w-full mx-auto">57/15 TX21, Thạnh Xuân, Quận 12, TP. Hồ Chí Minh</p>
            <p class="mt-2 text-center w-full mx-auto"><span>(+84) 372 140 203</span> <span>|</span> <span>info@goe.coffee</span></p>
        </div>
        <p class="mt-16 font-bold text-center">HÓA ĐƠN BÁN HÀNG</p>
        <div class="border-t border-gray-300 my-4"></div>

        <!-- Thông tin khách hàng -->
        <div class="text-sm mt-4">
            <h3 class="text-base">Thông tin khách hàng:</h3>
            <p class="mt-2">Tên khách hàng: {{ $formattedOrder['cus_name'] }}</p>
            <p class="mt-2">Số điện thoại: {{ $formattedOrder['phone'] }}</p>
            <p class="mt-2">Email: {{ $formattedOrder['email'] }}</p>
            <p class="mt-2">Địa chỉ: {{ $formattedOrder['address'] }}, {{ $formattedOrder['ward'] }}, {{ $formattedOrder['area'] }}</p>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="text-sm mt-16">
            <table class="w-full border-collapse">
                <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">STT</th>
                    <th class="border p-2">Tên sản phẩm</th>
                    <th class="border p-2">Số lượng</th>
                    <th class="border p-2">Đơn giá</th>
                    <th class="border p-2">Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                @foreach($formattedOrder['products'] as $index => $product)
                    <tr>
                        <td class="border p-2 text-center">{{ $index + 1 }}</td>
                        <td class="border p-2 text-center">{{ $product['product_name'] }}</td>
                        <td class="border p-2 text-center">{{ $product['quantity'] }}</td>
                        <td class="border p-2 text-center">{{ number_format(($product['price'] - $product['discount_value']), 0, '.', ',') }}</td>
                        <td class="border p-2 text-center">{{ number_format($product['total_amount'], 0, '.', ',') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tổng kết -->
        <div class="mt-16 text-sm text-right">
            <p class="mt-2">Tổng tiền hàng: {{ number_format($formattedOrder['sub_total'], 0, '.', ',') }}</p>
            <p class="mt-2">Chiết khấu: {{ number_format($formattedOrder['individual_discount_value'], 0, '.', ',') }}</p>
            <p class="mt-2">Phí giao hàng:  {{ number_format($formattedOrder['shipping_fee'], 0, '.', ',') }}</p>
            <p class="mt-2">Phí hỗ trợ: {{ number_format($formattedOrder['support_fee'], 0, '.', ',') }}</p>
            <p class="mt-2">Khuyến mãi: {{ $formattedOrder['discount_id'] }}</p>
            <p class="mt-2 font-bold">Khách phải trả: {{ number_format($formattedOrder['total_after_discount'], 0, '.', ',') }}</p>
        </div>
    </div>
</div>
