<div class="w-full mt-4 flex mb-6">
    <template x-if="selectedProducts.length === 0">
        <div class="w-full h-60 px-4 mt-4 flex flex-col justify-center items-center gap-4">
            <i class="fa-solid fa-box-open text-7xl text-gray-300"></i>
            <p class="text-base text-gray-400">Chưa có thông tin sản phẩm</p>
            <button type="button" @click="$nextTick(() => $refs.searchProduct.focus())" class="w-[14%] 2xl:w-[10%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm">Thêm sản phẩm</button>
        </div>
    </template>

    <template x-if="selectedProducts.length > 0">
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
                    <th class="p-4 text-center"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 w-full">
                <template x-for="(product, index) in selectedProducts" :key="product.SKU">
                    <tr class="hover:bg-sky-50 h-20 w-full">
                        <td class="p-4 text-center w-[2%]"><p x-text="index + 1"></p></td>
                        <td class="p-4 w-[8%]"><img :src="'{{ asset('/storage/') }}/' + product.image" alt="Ảnh" class="w-12 h-12 object-cover mx-auto"></td>
                        <td class="p-4 w[50%]">
                            <p class="" x-text="product.name"></p>
                            <p class="text-blue-500" x-text="product.SKU"></p>
                        </td>
                        <td class="p-4 text-center w[10%] h-20 flex justify-center items-center">
                            <button type="button" @click.prevent="product.count > 1 ? product.count-- : 1; totalMoney(); finalTotalMoney();" class="h-4 w-4 px-1 py-1 bg-gray-300 text-white rounded-full inline-flex justify-center items-center text-xs"><i class="fa-solid fa-minus"></i></button>
                            <span x-text="product.count" class="px-6"></span>
                            <button type="button" @click.prevent="product.count < product.quantity && product.count++; totalMoney(); finalTotalMoney();" class="h-4 w-4 px-1 py-1 bg-gray-300 text-white rounded-full inline-flex justify-center items-center text-xs"><i class="fa-solid fa-plus"></i></button>
                        </td>
                        <td class="p-4 text-end w[10%]"><span x-text="(product.prices[selectedPrice] || 0).toLocaleString('en-US')"></span></td>
                        <td class="p-4 w[10%] flex justify-center items-end flex-col">
                            <span x-text="((selectedDiscountPercent / 100) * (product.prices[selectedPrice] || 0)).toLocaleString('en-US')"></span>
                            <input type="hidden" name="value[]" x-bind:value="((selectedDiscountPercent / 100) * (product.prices[selectedPrice] || 0)).toLocaleString('en-US')">
                            <span class="text-red-600 text-xs" x-text="selectedDiscountPercent + '%'"></span>
                            <input type="hidden" name="percent[]" x-bind:value="selectedDiscountPercent">
                        </td>
                        <td class="p-4 text-end w[10%]">
                            <span x-text="calMoney(product)"></span>
                            <input type="hidden" name="total_amount[]" x-bind:value="calMoney(product)">
                        </td>
                        <td class="p-4  text-center w[10%]"><button @click="selectedProducts = selectedProducts.filter(p => p.SKU !== product.SKU)" class="text-gray-400 text-base"><i class="fa-solid fa-xmark"></i></button></td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>
    </template>
</div>
