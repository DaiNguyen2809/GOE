@extends('dream-up.admin-dream')
@section('title','Tạo đơn hàng')
@section('content')
    <div class="bg-white h-fit w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-base text-gray-500"></i>
            <a href="{{ route('od-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách hóa đơn</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%]">
            <a href="{{ route('od-index') }}" class="w-[12%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-ban mr-2"></i>Hủy</a>
            <button type="submit" form="od-form-create" class="w-[20%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-check mr-2"></i></i>Tạo đơn hàng</button>
        </div>
    </div>

    <form action="" id="od-form-create" method="POST" class="w-[96%] flex flex-wrap gap-6 mb-10"
          x-data='{
                 "searchProduct": "",
                 "selectedProducts": [],
                 "products": @json($products ?? [], JSON_UNESCAPED_UNICODE),
                 "search": "",
                 "selectedCustomer": null,
                 "showCustomerList": false,
                 "showProductList": false,
                 "customers": @json($customers ?? [], JSON_UNESCAPED_UNICODE),
                 "updatePriceSelect": function() {
                     if (this.selectedCustomer) {
                         const priceSelect = this.$refs.priceSelect;
                         const customerPrice = this.selectedCustomer.customer_price;
                         Array.from(priceSelect.options).forEach(option => {
                             option.selected = (option.value == customerPrice);
                         });
                     }
                 }
                 }'>
        @csrf
        <div class="w-full h-fit flex justify-between mt-6 text-sm">
            <div class="bg-white w-[65%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-base font-gilroy_md mt-4 ml-6">Thông tin khách hàng</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 mb-6">
                    <div class="relative w-full px-6 flex items-center text-sm">
                        <div class="relative w-full" >
                            <!-- Ô tìm kiếm khách hàng -->
                            <i x-show="!selectedCustomer" class="fa-solid fa-magnifying-glass absolute left-4 top-2.5 w-6 h-6 text-gray-500 cursor-pointer"></i>
                            <input x-show="!selectedCustomer" type="text" x-model="search" @focus="showCustomerList = true" @click.away="showCustomerList = false" placeholder="Tìm theo tên, SĐT..." class="w-full px-12 py-2 border rounded-md shadow-sm">
                            <!-- Danh sách khách hàng -->
                            <div x-show="showCustomerList"  class="absolute left-0 mt-2 w-full bg-white border rounded-md shadow-md max-h-60 overflow-y-auto">
                                <template x-for="customer in customers.filter(c => c.name.toLowerCase().includes(search.toLowerCase()) || c.phone.includes(search))" :key="customer.id">
                                    <div @click="selectedCustomer = customer; search = customer.name; open = false; updatePriceSelect()" class="px-4 py-2 hover:bg-gray-100 cursor-pointer hover:bg-sky-50 group flex-col">
                                        <p x-text="customer.name" class="group-hover:text-blue-500 w-full"></p>
                                        <p x-text="customer.phone" class="font-gilroy_md group-hover:text-blue-500 w-full"></p>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    {{--show thong tin--}}
                    <div class="w-full h-60 px-4 mt-4 flex flex-col justify-center items-center gap-4" x-show="!selectedCustomer">
                        <i class="fa-solid fa-address-card text-7xl text-gray-300"></i>
                        <p class="text-base text-gray-400">Chưa có thông tin khách hàng</p>
                    </div>
                    <template x-if="selectedCustomer">
                        <div>
                            <div class="relative w-full px-6 flex items-center text-sm">
                                <p class="text-2xl text-blue-600" x-text="selectedCustomer.name + ' - ' + selectedCustomer.phone"></p>
                                <button type="button" @click="selectedCustomer = null; search = ''; open = false" class="ml-8 text-gray-400 text-2xl"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="w-full flex gap-4">
                                <div class="w-[55%] h-60 px-6 mt-4 flex flex-col">
                                    <div class="mt-4">
                                        <p class="font-gilroy_md">ĐỊA CHỈ GIAO HÀNG</p>
                                        <p x-show="selectedCustomer && selectedCustomer.address && selectedCustomer.ward_name && selectedCustomer.area_name" x-text="selectedCustomer.address + ', ' + selectedCustomer.ward_name + ', ' + selectedCustomer.area_name"></p>
                                    </div>
                                    <div class="mt-10">
                                        <p class="font-gilroy_md">LIÊN HỆ</p>
                                        <p x-text="'email: ' + selectedCustomer.email"></p>
                                        <p x-text="'Số điện thoại: ' + selectedCustomer.phone"></p>
                                    </div>
                                </div>
                                <div class="w-[45%] h-fit pr-6 mt-4 text-sm">
                                    <div class="w-full h-fit flex px-4 py-4 rounded border border-dashed border-gray-400">
                                        <div class="w-[65%] leading-loose">
                                            <p>Nợ phải thu</p>
                                            <p>Tổng chi tiêu (0 đơn)</p>
                                            <p>Trả hàng (0 sản phẩm)</p>
                                            <p>Giao hàng thất bại (0 đơn)</p>
                                        </div>
                                        <div class="w-[35%] leading-loose text-right">
                                            <p class="text-red-600" x-text="new Intl.NumberFormat('en-US').format(selectedCustomer.debt)"></p>
                                            <p class="text-blue-600" x-text="selectedCustomer.total_expenditure"></p>
                                            <p class="text-red-600" x-text="selectedCustomer.total_return_products"></p>
                                            <p class="text-red-600">0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            <div class="bg-white w-[33%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-base font-gilroy_md mt-4 ml-6">Thông tin bổ sung</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 mb-6">
                    <div class="w-full px-6">
                        <label for="staff">Bán bởi<p class="text-red-600 inline-block mr-2">*</p> @error('staff')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <select name="staff" class=" mt-2 w-full h-11 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected disabled>Chọn nhân viên</option>
{{--                            @foreach($categories as $categorie)--}}
{{--                                <option value="{{ $categorie->id }}" {{ old('product_category') == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>--}}
{{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class="w-full px-6 mt-4">
                        <label class="mr-2" for="id">Mã đơn @error('id')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <textarea class="resize-none mt-2 w-full h-12 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="id">{{ old('id') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
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
                                    <div @click="selectedProducts.push({...product, count: 1}); searchProduct = ''; open = false" class="px-4 py-4 hover:bg-gray-100 cursor-pointer hover:bg-sky-50 group flex flex-wrap items-center">
                                        <img :src="'{{ asset('/storage/') }}/' + product.image" class="w-14 h-14 object-cover">
                                        <div class="ml-4">
                                            <p class="" x-text="product.name"></p>
                                            <p class="text-gray-500 block" x-text="product.SKU"></p>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <button type="button" class="w-[13%] text-center px-4 py-2 border border-t-gray-300 border-r-gray-300 border-b-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">Chọn nhanh</button>
                        {{--tao the select ao--}}
                        <div class="ml-4 relative w-[17%]">
                            <select x-ref="priceSelect" id="here" name="customer_price" class="block w-full appearance-none bg-white border border-gray-300 px-4 py-2 pr-10 rounded-md focus:outline-none">
                                @foreach($price_types as $price_type)
                                    <option value="{{ $price_type->type_id }}">{{ $price_type->price_name }}</option>
                                @endforeach
                            </select>
                            <!-- Tạo mũi tên bằng CSS -->
                            <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                <div class="w-0 h-0 border-l-4 border-r-4 border-l-transparent border-r-transparent border-t-4 border-t-gray-500"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--table--}}
                <div class="w-full mt-4 flex mb-6">
                    <template x-if="selectedProducts.length === 0">
                        <div class="w-full h-60 px-4 mt-4 flex flex-col justify-center items-center gap-4">
                            <i class="fa-solid fa-box-open text-7xl text-gray-300"></i>
                            <p class="text-base text-gray-400">Chưa có thông tin sản phẩm</p>
                            <button type="button" @click="open = true; $nextTick(() => $refs.searchProduct.focus())" class="w-[14%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm">Thêm sản phẩm</button>
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
                                                <button type="button" @click.prevent="product.count > 1 ? product.count-- : 1" class="h-4 w-4 px-1 py-1 bg-gray-300 text-white rounded-full inline-flex justify-center items-center text-xs"><i class="fa-solid fa-minus"></i></button>
                                                <span x-text="product.count" class="px-6"></span>
                                                <button type="button" @click.prevent="product.count++" class="h-4 w-4 px-1 py-1 bg-gray-300 text-white rounded-full inline-flex justify-center items-center text-xs"><i class="fa-solid fa-plus"></i></button>
                                            </td>
                                            <td class="p-4 text-end w[10%]">200,000</td>
                                            <td class="p-4 w[10%] flex justify-center items-end flex-col">
                                                <span>2,000,000</span>
                                                <span class="text-red-600 text-xs">15%</span>
                                            </td>
                                            <td class="p-4 text-end w[10%]">123,123,908</td>
                                            <td class="p-4  text-center w[10%]"><button @click="selectedProducts = selectedProducts.filter(p => p.SKU !== product.SKU)" class="text-gray-400 text-base"><i class="fa-solid fa-xmark"></i></button></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </template>
                </div>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                {{--tinh tien--}}
                <div class="w-full mt-4 flex h-fit mb-6">
                    <div class="w-[60%]">
                        <div class="w-full px-6 py-6">
                            <label class="text-base mr-2 font-gilroy_md" for="note">Ghi chú đơn hàng @error('note')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                            <textarea placeholder="VD: Hàng tặng gói riêng" class="resize-none mt-2 w-full h-32 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="note">{{ old('note') }}</textarea>
                        </div>
                        <div class="w-full px-6">
                            <label class="text-base mr-2 font-gilroy_md" for="tag">Tags @error('note')<p class="inline-block text-red-600 text-sm">{{ $message }}</p>@enderror</label>
                            <textarea class="resize-none mt-2 w-full h-24 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="tag">{{ old('tag') }}</textarea>
                        </div>
                    </div>
                    <div class="w-[40%] flex px-6 py-6">
                        <div class="w-[70%] leading-10">
                            <p>Tổng tiền (0 sản phẩm)</p>
                            <p class="text-blue-600">Chiết khấu</p>
                            <p>Phí giao hàng</p>
                            <p>Phí hỗ trợ</p>
                            <p class="text-blue-600">Mã giảm giá</p>
                            <p class="font-gilroy_md">Khách phải trả</p>
                            <p class="font-gilroy_md">Khách đã trả</p>
                            <p class="font-gilroy_md">Còn phải trả</p>
                        </div>
                        <div class="w-[30%] text-right leading-10">
                            <p class="pr-2">123,000,000,000</p>
                            <p class="pr-2">0</p>
                            <input class="pr-2 border border-gray-300 rounded-md focus:outline-none w-full text-right" value="0">
                            <p class="pr-2">0</p>
                            <p class="pr-2">0</p>
                            <p class="font-gilroy_md pr-2">0</p>
                            <p class="font-gilroy_md pr-2">0</p>
                            <p class="font-gilroy_md pr-2">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="h-fit flex items-center justify-end w-full mb-10 pr-6">
        <a href="{{ route('od-index') }}" class="w-[9%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-ban mr-2"></i>Hủy</a>
        <button type="submit" form="od-form-create" class="w-[14%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-check mr-2"></i></i>Tạo đơn hàng</button>
    </div>
@endsection
