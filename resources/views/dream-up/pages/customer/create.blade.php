@extends('dream-up.admin-dream')
@section('title', 'Thêm khách hàng')
@section('content')
    <div class="bg-white h-fit w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-sm text-gray-500"></i>
            <a href="{{ route('cm-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách khách hàng</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%] text-sm">
            <a href="{{ route('cm-index') }}" class="w-[10%] 2xl:w-[6%] h-10 px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center"><i class="fa-solid fa-ban mr-2"></i> Hủy</a>
            <button type="submit" form="cm-form-create" class="w-[10%] 2xl:w-[6%] h-10 px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center"><i class="fa-solid fa-check mr-2"></i> Lưu</button>
        </div>
    </div>
    <form action="{{ route('cm-store') }}" id="cm-form-create" method="POST" class="w-[96%] flex flex-wrap gap-6 mb-16">
        @csrf
        <div class="w-full flex justify-between mt-6">
            <div class="bg-white w-[65%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-[gilroy-md] mt-4 ml-6">Thông tin chung</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm">
                    <div class="w-full px-6 mb-12 h-10">
                        <label for="name">Tên khách hàng<p class="text-red-600 inline-block mr-2">*</p> @error('name')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <input class=" mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập tên khách hàng" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="w-full px-6 flex justify-between h-10 mb-12">
                        <div class="w-[49%]">
                            <label for="id">Mã khách hàng<p class="text-red-600 inline-block mr-2">*</p> @error('id')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã khách hàng" name="id" value="{{ old('id') }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="customer_category" class="block">Nhóm khách hàng<p class="text-red-600 inline-block mr-2">*</p> @error('customer_category')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <select name="customer_category" class="inline-block mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" selected disabled>Chọn nhóm khách hàng</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-6 flex justify-between h-10 mb-12">
                        <div class="w-[49%]">
                            <label for="phone">Số điện thoại<p class="text-red-600 inline-block mr-2">*</p> @error('phone')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập số điện thoại" name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="email" class="block">Email<p class="text-red-600 inline-block mr-2">*</p> @error('email')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập địa chỉ email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="w-full px-6 h-10 mb-12 flex justify-between">
                        <div class="w-[49%]" x-data="areaSelect({{ $areas }})" @click.outside="open = false">
                            <label for="area" class="block">Khu vực<p class="text-red-600 inline-block mr-2">*</p>@error('area')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>

                            <!-- Select giả lập -->
                            <div class="relative mt-2">
                                <button type="button" @click="open = !open" class="w-full h-full pl-3 pr-10 py-2 border border-gray-300 rounded-md text-left focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <span x-text="selectedName || 'Chọn Tỉnh/Thành phố - Quận/Huyện'"></span>
                                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                        <div class="w-0 h-0 border-l-4 border-r-4 border-l-transparent border-r-transparent border-t-4 border-t-gray-500"></div>
                                    </div>
                                </button>

                                <!-- Dropdown -->
                                <div x-show="open" class="absolute w-full mt-1 bg-white border border-gray-300 rounded-md shadow-lg z-10">
                                    <!-- Ô tìm kiếm -->
                                    <input type="text" x-model="search" @input="filterLocations"
                                           class="w-full px-3 py-2 border-b border-gray-300 focus:outline-none"
                                           placeholder="Tìm kiếm khu vực..." />

                                    <!-- Danh sách khu vực -->
                                    <ul class="max-h-60 overflow-y-auto">
                                        <template x-for="location in filteredLocations" :key="location.id">
                                            <li @click="selectLocation(location)" class="px-3 py-2 cursor-pointer hover:bg-gray-200" x-text="location.name"></li>
                                        </template>
                                    </ul>
                                </div>
                            </div>

                            <!-- Input ẩn để gửi dữ liệu khi submit -->
                            <input type="hidden" name="area" x-model="selected">
                        </div>

                        <div class="w-[49%]" x-data="wardSelect({{ $wards }})" x-init="$watch('getSelectedAreaId', value => updateWardsByArea(value))" @click.outside="open = false">
                            <label for="ward" class="block">Phường/Xã<p class="text-red-600 inline-block mr-2">*</p>@error('ward')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>

                            <!-- Select giả lập -->
                            <div class="relative mt-2">
                                <button type="button" @click="open = !open" :disabled="!getSelectedAreaId" class="w-full h-full pl-3 pr-10 py-2 border border-gray-300 rounded-md text-left focus:outline-none focus:ring-2 focus:ring-blue-500" :class="{'bg-gray-100': !getSelectedAreaId}">
                                    <span x-text="selectedName || 'Chọn Phường/Xã'"></span>
                                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                        <div class="w-0 h-0 border-l-4 border-r-4 border-l-transparent border-r-transparent border-t-4 border-t-gray-500"></div>
                                    </div>
                                </button>

                                <!-- Dropdown -->
                                <div x-show="open" class="absolute w-full mt-1 bg-white border border-gray-300 rounded-md shadow-lg z-10">
                                    <!-- Ô tìm kiếm -->
                                    <input type="text" x-model="search" @input="filterLocations"
                                           class="w-full px-3 py-2 border-b border-gray-300 focus:outline-none"
                                           placeholder="Tìm kiếm phường/xã..." />

                                    <!-- Danh sách khu vực -->
                                    <ul class="max-h-60 overflow-y-auto">
                                        <template x-for="location in filteredLocations" :key="location.id">
                                            <li @click="selectLocation(location)" class="px-3 py-2 cursor-pointer hover:bg-gray-200" x-text="location.name"></li>
                                        </template>
                                    </ul>
                                </div>
                            </div>

                            <!-- Input ẩn để gửi dữ liệu khi submit -->
                            <input type="hidden" name="ward" x-model="selected">
                        </div>
                    </div>
                    <div class="w-full px-6 mb-12 h-10">
                        <label for="address">Địa chỉ cụ thể<p class="text-red-600 inline-block mr-2">*</p> @error('address')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <input class=" mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập tên địa chỉ" name="address" value="{{ old('address') }}">
                    </div>
                </div>
            </div>
            <div class="bg-white w-[33%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6">Thông tin khác</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm">
                    <div class="w-full px-6 h-10 mb-12">
                        <label for="employee">Nhân viên phụ trách<p class="text-red-600 inline-block mr-2">*</p> @error('employee')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <select name="employee" class=" mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected disabled>Chọn nhân viên phụ trách</option>
                        </select>
                    </div>

                    <div class="w-full px-6 mb-12 h-16">
                        <label class="mr-2" for="description">Mô tả @error('description')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <textarea class="resize-none mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="w-full px-6 mb-12 h-16">
                        <label class="mr-2" for="tag">Tags @error('tag')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <textarea class="resize-none mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="tag">{{ old('tag') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="bg-white w-[65%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-[gilroy-md] mt-4 ml-6">Thông tin bổ sung</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm">
                    <div class="w-full px-6 flex justify-between h-10 mb-12">
                        <div class="w-[49%]">
                            <label for="birthday">Ngày sinh<p class="text-red-600 inline-block mr-2">*</p> @error('birthday')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="date" placeholder="Chọn ngày sinh" name="birthday" value="{{ old('birthday') }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="gender" class="block">Giới tính<p class="text-red-600 inline-block mr-2">*</p> @error('gender')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <select name="gender" class="inline-block mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" selected disabled>Chọn giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-6 flex justify-between h-10 mb-12">
                        <div class="w-[49%]">
                            <label for="point">Điểm<p class="text-red-600 inline-block mr-2">*</p> @error('point')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập điểm" name="point" value="{{ old('point', 0) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="debt" class="block">Công nợ<p class="text-red-600 inline-block mr-2">*</p> @error('debt')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="number" placeholder="Nhập công nợ" name="debt" value="{{ old('debt', 0) }}">
                        </div>
                    </div>
                    <div class="w-full px-6 h-10 mb-12 flex justify-between">
                        <div class="w-[49%]">
                            <label for="affiliates" class="block">Mã tiếp thị liên kết<p class="text-red-600 inline-block mr-2">*</p> @error('affiliates')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input readonly class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Mã tiếp thị liên kết" name="affiliates" value="{{ old('affiliates') }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="default_discount" class="block">Chiết khấu mặc định (%)<p class="text-red-600 inline-block mr-2">*</p> @error('discount')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right" type="text" name="default_discount" value="{{ old('default_discount', 0) }}">
                        </div>
                    </div>
                    <div class="w-full px-6 h-10 mb-12 flex justify-between">
                        <div class="w-[49%]">
                            <label for="total_expenditure" class="block">Tổng chi tiêu<p class="text-red-600 inline-block mr-2">*</p> @error('total_expenditure')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="number" placeholder="Nhập tổng chi tiêu" name="total_expenditure" value="{{ old('total_expenditure', 0) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="special_code" class="block">Mã đặc biệt<p class="text-red-600 inline-block mr-2">*</p> @error('special_code')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã khách hàng đặc biệt" name="special_code" value="{{ old('special_code') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function areaSelect(areas) {
            return {
                open: false,
                search: '',
                selected: '',
                selectedName: '',
                locations: areas,
                filteredLocations: areas,

                filterLocations() {
                    this.filteredLocations = this.locations.filter(loc =>
                        loc.name.toLowerCase().includes(this.search.toLowerCase())
                    );
                },

                selectLocation(area) {
                    this.selected = area.id;
                    this.selectedName = area.name;
                    this.open = false;

                    // Gửi sự kiện để thông báo cho component Ward biết
                    window.dispatchEvent(new CustomEvent('area-selected', {
                        detail: { areaId: area.id }
                    }));
                }
            };
        }

        function wardSelect(allWards) {
            return {
                open: false,
                search: '',
                selected: '',
                selectedName: '',
                allWards: allWards, // Lưu toàn bộ danh sách ward ban đầu
                locations: [], // Ban đầu không có location nào
                filteredLocations: [], // Ban đầu không có location nào được lọc
                getSelectedAreaId: null, // Area ID đã chọn

                init() {
                    // Lắng nghe sự kiện khi area được chọn
                    window.addEventListener('area-selected', (event) => {
                        this.getSelectedAreaId = event.detail.areaId;
                        this.updateWardsByArea(this.getSelectedAreaId);
                    });
                },

                updateWardsByArea(areaId) {
                    if (!areaId) {
                        this.locations = [];
                        this.filteredLocations = [];
                        this.selected = '';
                        this.selectedName = '';
                        return;
                    }

                    // Lọc ward theo area_id
                    this.locations = this.allWards.filter(ward => ward.area_id == areaId);
                    this.filteredLocations = this.locations;

                    // Reset các giá trị đã chọn
                    this.selected = '';
                    this.selectedName = '';
                },

                filterLocations() {
                    this.filteredLocations = this.locations.filter(loc =>
                        loc.name.toLowerCase().includes(this.search.toLowerCase())
                    );
                },

                selectLocation(ward) {
                    this.selected = ward.id;
                    this.selectedName = ward.name;
                    this.open = false;
                }
            }
        }
    </script>
@endsection
