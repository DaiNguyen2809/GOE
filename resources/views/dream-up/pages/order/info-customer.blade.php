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
                            <div @click="selectedCustomer = customer; search = customer.name; updatePriceSelect()" class="px-4 py-2 hover:bg-gray-100 cursor-pointer hover:bg-sky-50 group flex-col">
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
                        <button type="button" @click="selectedCustomer = null; search = '';" class="ml-8 text-gray-400 text-2xl"><i class="fa-solid fa-xmark"></i></button>
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
                <textarea class="resize-none mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="id">{{ old('id') }}</textarea>
            </div>
        </div>
    </div>
</div>
