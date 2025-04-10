<div class="w-full flex h-fit text-sm">
    <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg">
        <h1 class="text-base font-gilroy_md mt-4 ml-6">Thông tin sản phẩm</h1>
        <div class="bg-gray-300 w-full h-px mt-2"></div>
        @include("dream-up.pages.order.detail-table")

        <div class="w-full mt-4 flex h-fit mb-6">
            <div class="w-[60%]">
                <div class="w-full px-6 py-6">
                    <label class="text-base mr-2 font-gilroy_md" for="note">Ghi chú đơn hàng @error('note')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                    <textarea readonly class="resize-none mt-2 w-full h-32 pl-3 pr-4 py-2 border border-gray-300 rounded-sm" name="note">{{ old('note', $formattedOrder['note'] ?? 'Chưa có ghi chú') }}</textarea>
                </div>
                <div class="w-full px-6">
                    <label class="text-base mr-2 font-gilroy_md" for="tag">Tags @error('tag')<p class="inline-block text-red-600 text-sm">{{ $message }}</p>@enderror</label>
                    <textarea class="resize-none mt-2 w-full h-24 pl-3 pr-4 py-2 border border-gray-300 rounded-sm" name="tag">{{ old('tag', $formattedOrder['tag'] ?? 'Chưa có tag') }}</textarea>
                </div>
            </div>

            <div class="w-[40%] flex px-6 py-6">
                <div class="w-[70%] leading-10">
                    <p>Tổng tiền (<span>()</span> sản phẩm)</p>
                    <p class="w-full h-fit text-blue-600">Chiết khấu</p>
                    <p>Phí giao hàng</p>
                    <p>Phí hỗ trợ</p>
                    <p class="cursor-pointer w-full h-fit text-blue-600" id="od-discount">Mã giảm giá</p>
                    <p class="font-gilroy_md">Khách phải trả</p>
                    <p class="font-gilroy_md">Khách đã trả</p>
                    <p class="font-gilroy_md">Còn phải trả</p>
                </div>
                <div class="w-[30%] text-right leading-10">
                    <p class="pr-2">{{ number_format($formattedOrder['sub_total'], 0, '.', ',') }}</p>
                    <p class="pr-2">0</p>
                    <p class="pr-2">{{ number_format($formattedOrder['shipping_fee'], 0, '.', ',') }}</p>
                    <p class="pr-2">{{ number_format($formattedOrder['support_fee'], 0, '.', ',') }}</p>
                    <p class="pr-2">{{ $formattedOrder['discount_id'] ?: 0 }}</p>
                    <p class="font-gilroy_md pr-2">{{ number_format($formattedOrder['total_after_discount'], 0, '.', ',') }}</p>
                    <p class="font-gilroy_md pr-2">{{ number_format($formattedOrder['customer_paid'], 0, '.', ',') }}</p>
                    <p class="font-gilroy_md pr-2">{{ number_format($formattedOrder['debt'], 0, '.', ',') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
