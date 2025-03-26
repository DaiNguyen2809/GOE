<div class="w-full flex h-fit text-sm">
    <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg">
        <h1 class="text-base font-gilroy_md mt-4 ml-6">Thông tin sản phẩm</h1>
        <div class="bg-gray-300 w-full h-px mt-2"></div>
        <div class="w-full mt-4 flex h-fit">
            <div class="relative w-full px-6 flex items-center">
                <div class="relative w-[70%]">
                    <!-- Ô tìm kiếm sản phẩm -->
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-2.5 w-6 h-6 text-gray-500 cursor-pointer"></i>
                    <input type="text" x-ref="searchProduct" x-model="searchProduct" @focus="showProductList = true" @click.away="showProductList = false" placeholder="Tìm theo tên, mã SKU, barcode" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <!-- Danh sách sản phẩm -->
                    <div x-show="showProductList" class="absolute left-0 mt-2 w-full bg-white border rounded-md shadow-md max-h-72 overflow-y-auto z-20">
                        <template x-for="product in products.filter(p => p.name.toLowerCase().includes(searchProduct.toLowerCase()) || p.barcode.includes(searchProduct))" :key="product.SKU">
                            <div @click="addOrUpdateProduct(product); searchProduct = '';" class="px-4 py-4 hover:bg-gray-100 cursor-pointer hover:bg-sky-50 group flex flex-wrap items-center justify-between">
                                <div class="ml-4 flex items-center">
                                    <img :src="'{{ asset('/storage/') }}/' + product.image" class="w-14 h-14 object-cover">
                                    <div class="ml-4">
                                        <p class="" x-text="product.name"></p>
                                        <p class="text-gray-500 block" x-text="product.SKU"></p>
                                    </div>
                                </div>
                                <div class="mr-4 flex flex-col">
                                    <p class="font-gilroy_md text-base text-right" x-text="(product.prices[selectedPrice] || 0).toLocaleString('en-US')"></p>
                                    <p class="">Tồn kho: <span class="text-blue-600" x-text="product.quantity"></span> | Có thế bán: <span class="text-blue-600" x-text="product.quantity"></span></p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <button type="button" class="w-[13%] text-center px-4 py-2 border border-t-gray-300 border-r-gray-300 border-b-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">Chọn nhanh</button>
                {{--tao the select ao--}}
                <div class="ml-4 relative w-[17%]">
                    <select x-ref="priceSelect" @change="selectedPrice = $event.target.value" id="here" name="customer_price" class="block w-full appearance-none bg-white border border-gray-300 px-4 py-2 pr-10 rounded-md focus:outline-none">
                        @foreach($price_types as $price_type)
                            <option value="{{ (string) $price_type->type_id }}">{{ $price_type->price_name }}</option>
                        @endforeach
                    </select>
                    <!-- Tạo mũi tên bằng CSS -->
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <div class="w-0 h-0 border-l-4 border-r-4 border-l-transparent border-r-transparent border-t-4 border-t-gray-500"></div>
                    </div>
                </div>
            </div>
        </div>

        @include("dream-up.pages.order.create-table")
        <div class="bg-gray-300 w-full h-px mt-2"></div>

        <div class="w-full mt-4 flex h-fit mb-6">
            <div class="w-[60%]">
                <div class="w-full px-6 py-6">
                    <label class="text-base mr-2 font-gilroy_md" for="note">Ghi chú đơn hàng @error('note')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                    <textarea placeholder="VD: Hàng tặng gói riêng" class="resize-none mt-2 w-full h-32 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="note">{{ old('note') }}</textarea>
                </div>
                <div class="w-full px-6">
                    <label class="text-base mr-2 font-gilroy_md" for="tag">Tags @error('tag')<p class="inline-block text-red-600 text-sm">{{ $message }}</p>@enderror</label>
                    <textarea class="resize-none mt-2 w-full h-24 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="tag">{{ old('tag') }}</textarea>
                </div>
            </div>
            <div class="w-[40%] flex px-6 py-6">
                <div class="w-[70%] leading-10">
                    <p>Tổng tiền (<span x-text="totalProduct()"></span> sản phẩm)</p>
                    <div class="group relative w-full">
                        <p onclick="handleShowContent('od-discount-tb')" class="cursor-pointer w-full h-fit text-blue-600" id="od-discount">Chiết khấu</p>
                        <div id="od-discount-tb" class="absolute top-8 mt-1 px-4 w-28 py-4 bg-white w-full text-center text-black text-xs rounded-md drop-shadow-lg z-10 hidden">
                            <div class="rotate-180 absolute left-10 -translate-x-1/2 -top-2 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-t-8 border-t-white filter drop-shadow-lg"></div>
                            <div class="flex justify-between w-full">
                                <p class="text-left 2xl:w-[35%] py-2">Chiết khấu thường</p>
                                <div class="w-[30%] border border-blue-600 rounded-sm flex justify-between">
                                    <button type="button" class="h-full w-1/2" :class="{ 'bg-blue-600 text-white': selectedButton === 'amount', 'bg-transparent text-black': selectedButton !== 'amount' }" @click="selectedButton = 'amount'">Giá trị</button>
                                    <button type="button" class="h-full w-1/2 ml-1" :class="{ 'bg-blue-600 text-white': selectedButton === 'percentage', 'bg-transparent text-black': selectedButton !== 'percentage' }" @click="selectedButton = 'percentage'">%</button>
                                    <input type="hidden" name="individual_discount_type" x-bind:value="selectedButton">
                                </div>
                                <input name="individual_discount_value" class="w-[25%] py-2 pr-2 border-b border-b-gray-300 focus:outline-none text-right" type="number" value="0" @click="$el.select()">
                            </div>
                        </div>
                    </div>
                    <p>Phí giao hàng</p>
                    <p>Phí hỗ trợ</p>
                    <div class="group relative w-full">
                        <p onclick="handleShowContent('od-discount-apply')" class="cursor-pointer w-full h-fit text-blue-600" id="od-discount">Mã giảm giá</p>
                        <div id="od-discount-apply" class="absolute top-8 mt-1 px-4 w-28 py-4 bg-white w-full text-center text-black text-xs rounded-md drop-shadow-lg z-10 hidden">
                            <div class="rotate-180 absolute left-10 -translate-x-1/2 -top-2 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-t-8 border-t-white filter drop-shadow-lg"></div>
                            <div class="flex flex-col w-full ">
                                <div class="flex justify-between">
                                    <input name="discount_id" type="text" placeholder="Nhập mã khuyến mãi" class="w-[62%] pl-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <button type="button" class="h-full w-[35%] bg-blue-600 text-white py-2 rounded-sm">Áp dụng</button>
                                </div>
                                <p class="text-left text-red-600 ml-4 mt-2">*Không tìm thấy mã giảm giá</p>
                            </div>
                        </div>
                    </div>
                    <p class="font-gilroy_md">Khách phải trả</p>
                    <p class="font-gilroy_md">Khách đã trả</p>
                    <p class="font-gilroy_md">Còn phải trả</p>
                </div>
                <div class="w-[30%] text-right leading-10">
                    <p class="pr-2" x-ref="money" x-text="total"></p>
                    <input type="hidden" name="sub_total" x-bind:value="total">
                    {{--                    chiet khau--}}
                    <p class="pr-2">0</p>
                    <input x-ref="ship" name="shipping_fee" class="pr-2 border-b border-gray-300 focus:outline-none w-full text-right" value="0" @click="$el.select()" @input="handleValidateDecimalInput($el); $dispatch('update-total')">
                    <input x-ref="support" name="support_fee" class="pr-2 border-b border-b-gray-300 focus:outline-none w-full text-right" value="0" @click="$el.select()" @input="handleValidateDecimalInput($el); $dispatch('update-total')">
                    {{--                    ma giam gia--}}
                    <p class="pr-2">0</p>

                    <p class="font-gilroy_md pr-2" x-text="finalTotal"></p>
                    <input type="hidden" name="total_after_discount" x-bind:value="finalTotal">
                    <input x-ref="paid" name="customer_paid" class="pr-2 border-b border-b-gray-300 focus:outline-none w-full text-right" value="0" @click="$el.select()" @input="handleValidateDecimalInput($el); $dispatch('update-paid')">
                    <p class="font-gilroy_md pr-2" x-text="debt"></p>
                    <input type="hidden" name="debt" x-bind:value="debt">
                </div>
            </div>
        </div>
    </div>
</div>
