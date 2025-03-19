@extends('dream-up.admin-dream')
@section('title','Cập nhật sản phẩm')
@section('content')
    <div class="bg-white h-full w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-sm text-gray-500"></i>
            <a href="{{ route('pd-show', $product->SKU) }}" class="ml-2 text-sm text-gray-500 group-hover:underline">Quay lại chi tiết sản phẩm</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%]">
            <a href="{{ route('pd-show', $product->SKU) }}" class="text-sm w-[10%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center">Hủy</a>
            <a href="{{ route('pd-index') }}" class="text-sm w-[22%] 2xl:w-[15%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center">Lưu và in mã vạch</a>
            <button type="submit" form="pd-form-update" class="!text-xs w-[10%] 2xl:w-[7%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center">Lưu</button>
        </div>
    </div>
    <form action="{{ route('pd-update', $product->SKU) }}" id="pd-form-update" method="POST" class="w-[96%] flex flex-wrap gap-6 mb-16" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full flex justify-between mt-6">
            <div class="bg-white w-[65%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-[gilroy-md] mt-4 ml-6">Thông tin chung</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4">
                    <div class="w-full px-6">
                        <label for="name">Tên sản phẩm <p class="text-red-600 inline-block mr-2">*</p> @error('name')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class=" mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập tên sản phẩm" name="name" value="{{ old('name', $product->name) }}">
                    </div>
                    <div class="w-full px-6 mt-4 flex justify-between">
                        <div class="w-[49%]">
                            <label for="SKU">Mã sản phẩm/SKU <p class="text-red-600 inline-block mr-2">*</p> @error('SKU')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã sản phẩm/SKU" name="SKU" value="{{ old('SKU', $product->SKU) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="weight" class="block">Khối lượng<p class="text-red-600 inline-block mr-2">*</p> @error('weight')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                            <input class="text-right mt-2 w-[79%] pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="number" name="weight" value="{{ number_format(old('weight', $product->weight ?? 0), 0, ',', '') }}">
                            <select name="unit_weight" class="inline-block mt-2 w-[19%] h-11 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right">
                                @foreach($unitWeights as $unitWeight)
                                    <option value="{{ $unitWeight->id }}" {{ old('unit_weight', $product->unit_weight ?? '') == $unitWeight->id ? 'selected' : '' }}>{{ $unitWeight->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-6 mt-4 flex justify-between">
                        <div class="w-[49%]">
                            <label for="barcode">Mã vạch/barcode <p class="text-red-600 inline-block mr-2">*</p> @error('barcode')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                            <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã vạch/barcode" name="barcode" value="{{ old('barcode', $product->barcode) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="unit_package" class="block">Đơn vị tính<p class="text-red-600 inline-block mr-2">*</p> @error('unit_package')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                            <select name="unit_package" class="inline-block mt-2 w-full h-11 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @foreach($unitPackages as $unitPackage)
                                    <option value="{{ $unitPackage->id }}" {{ old('unit_package', $product->unit_package ?? '') == $unitPackage->id ? 'selected' : '' }}>{{ $unitPackage->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-6 mt-4 mb-4">
                        <label class="mr-2" for="description">Mô tả @error('description')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <textarea class="resize-none mt-2 w-full h-40 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="description">{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>
            </div>
            <div class="bg-white w-[33%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6">Thông tin bổ sung</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4">
                    <div class="w-full px-6">
                        <label for="product_category">Loại sản phẩm <p class="text-red-600 inline-block mr-2">*</p> @error('product_category')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <select name="product_category" class=" mt-2 w-full h-11 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected disabled>Chọn loại sản phẩm</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('product_category', $product->product_category ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full px-6 mt-4">
                        <label for="roast_level">Mức rang <p class="text-red-600 inline-block mr-2">*</p> @error('roast_level')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <select name="roast_level" class=" mt-2 w-full h-11 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected disabled>Chọn mức rang</option>
                            @foreach($roastLevels as $roastLevel)
                                <option value="{{ $roastLevel->id }}" {{ old('roast_level', $product->roast_level ?? '') == $roastLevel->id ? 'selected' : ''}}>{{ $roastLevel->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full px-6 mt-4">
                        <label for="grind">Cỡ xay <p class="text-red-600 inline-block mr-2">*</p> @error('grind')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <select name="grind" class=" mt-2 w-full h-11 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected disabled>Chọn cỡ xay</option>
                            @foreach($grinds as $grind)
                                <option value="{{ $grind->id }}" {{ old('grind', $product->grind ?? '') == $grind->id ? 'selected' : ''}}>{{ $grind->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full px-6 mt-4 mb-4">
                        <label class="mr-2" for="tag">Tag @error('tag')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <textarea class="resize-none mt-2 w-full h-40 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="tag">{{ old('tag', $product->product_tag) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex h-[27%]">
            <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6">Giá sản phẩm</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 flex h-fit">
                    <div class="w-1/3 px-6">
                        <label for="retail">Giá bán lẻ <p class="text-red-600 inline-block mr-2">*</p> @error('retail')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="retail" value="{{ old('retail', 0) }}">
                    </div>
                    <div class="w-1/3 px-6">
                        <label for="wholesale">Giá bán sỉ<p class="text-red-600 inline-block mr-2">*</p> @error('wholesale')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="wholesale" value="{{ old('wholesale', 0) }}">
                    </div>
                    <div class="w-1/3 px-6">
                        <label for="contributor">Cộng tác viên <p class="text-red-600 inline-block mr-2">*</p> @error('contributor')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="contributor" value="{{ old('contributor', 0) }}">
                    </div>
                </div>
                <div class="w-full mt-4 flex">
                    <div class="w-1/3 px-6">
                        <label for="distributor">Nhà phân phối <p class="text-red-600 inline-block mr-2">*</p> @error('distributor')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="distributor" value="{{ old('distributor', 0) }}">
                    </div>
                    <div class="w-1/3 px-6">
                        <label for="100kg">Quán 100kg <p class="text-red-600 inline-block mr-2">*</p> @error('100kg')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="100kg" value="{{ old('100kg', 0) }}">
                    </div>
                    <div class="w-1/3 px-6">
                        <label for="50kg">Quán Sỉ 50kg<p class="text-red-600 inline-block mr-2">*</p> @error('50kg')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="50kg" value="{{ old('50kg', 0) }}">
                    </div>
                </div>
                <div class="w-full mt-4 flex mb-6">
                    <div class="w-1/3 px-6">
                        <label for="10kg">Quán sỉ 10kg<p class="text-red-600 inline-block mr-2">*</p> @error('10kg')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="10kg" value="{{ old('10kg', 0) }}">
                    </div>
                    <div class="w-1/3 px-6">
                        <label for="5kg">Quán Sỉ 5kg<p class="text-red-600 inline-block mr-2">*</p> @error('5kg')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="5kg" value="{{ old('5kg', 0) }}">
                    </div>
                    <div class="w-1/3 px-6">
                        <label for="agency">Đại lý<p class="text-red-600 inline-block mr-2">*</p> @error('agency')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                        <input class="text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="agency" value="{{ old('agency', 0) }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-between h-[30%]">
            <div class="bg-white w-[52%] 2xl:w-[39%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6">Ảnh sản phẩm <button type="submit" class="mr-6 float-right text-sm w-[26%] 2xl:w-[30%] px-1 py-1 ml-4 bg-white border border-red-600 text-red-600 font-gilroy rounded-md cursor-pointer hover:bg-red-600 hover:text-white text-center">Xóa tất cả ảnh</button></h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full px-6 py-6 flex-wrap gap-2 h-fit">
                    <div class="w-full flex mb-4 gap-4">
                        <div id="pd-upl-container1" class="w-32 h-32 border-2 border-dashed border-gray-400 flex items-center justify-center cursor-pointer bg-center bg-cover"
                             style="background-image: url('{{ asset('/storage/' . $product->image) }}')">
                            <span id="pd-upl-txt1" class="text-xl font-bold">+</span>
                            <input id="pd-upl-input1" type="file" class="hidden" accept="image/*" name="image">
                        </div>
                        <div id="pd-upl-container2" class="w-32 h-32 border-2 border-dashed border-gray-400 flex items-center justify-center cursor-pointer bg-center bg-cover"
                             style="background-image: url('{{ asset('/storage/' . $product->image2) }}')">
                            <span id="pd-upl-txt2" class="text-xl font-bold">+</span>
                            <input id="pd-upl-input2" type="file" class="hidden" accept="image/*" name="image2">
                        </div>
                        <div id="pd-upl-container3" class="w-32 h-32 border-2 border-dashed border-gray-400 flex items-center justify-center cursor-pointer bg-center bg-cover"
                             style="background-image: url('{{ asset('/storage/' . $product->image3) }}')">
                            <span id="pd-upl-txt3" class="text-xl font-bold">+</span>
                            <input id="pd-upl-input3" type="file" class="hidden" accept="image/*" name="image3">
                        </div>
                        <div id="pd-upl-container4" class="w-32 h-32 border-2 border-dashed border-gray-400 flex items-center justify-center cursor-pointer bg-center bg-cover"
                             style="background-image: url('{{ asset('/storage/' . $product->image4) }}')">
                            <span id="pd-upl-txt4" class="text-xl font-bold">+</span>
                            <input id="pd-upl-input4" type="file" class="hidden" accept="image/*" name="image4">
                        </div>
                    </div>
                    <div class="w-full flex gap-4">
                        <div id="pd-upl-container5" class="w-32 h-32 border-2 border-dashed border-gray-400 flex items-center justify-center cursor-pointer bg-center bg-cover"
                             style="background-image: url('{{ asset('/storage/' . $product->image5) }}')">
                            <span id="pd-upl-txt5" class="text-xl font-bold">+</span>
                            <input id="pd-upl-input5" type="file" class="hidden" accept="image/*" name="image5">
                        </div>
                        <div id="pd-upl-container6" class="w-32 h-32 border-2 border-dashed border-gray-400 flex items-center justify-center cursor-pointer bg-center bg-cover"
                             style="background-image: url('{{ asset('/storage/' . $product->image6) }}')">
                            <span id="pd-upl-txt6" class="text-xl font-bold">+</span>
                            <input id="pd-upl-input6" type="file" class="hidden" accept="image/*" name="image6">
                        </div>
                        <div id="pd-upl-container7" class="w-32 h-32 border-2 border-dashed border-gray-400 flex items-center justify-center cursor-pointer bg-center bg-cover"
                             style="background-image: url('{{ asset('/storage/' . $product->image7) }}')">
                            <span id="pd-upl-txt7" class="text-xl font-bold">+</span>
                            <input id="pd-upl-input7" type="file" class="hidden" accept="image/*" name="image7">
                        </div>
                        <div id="pd-upl-container8" class="w-32 h-32 border-2 border-dashed border-gray-400 flex items-center justify-center cursor-pointer bg-center bg-cover"
                             style="background-image: url('{{ asset('/storage/' . $product->image8) }}')">
                            <span id="pd-upl-txt8" class="text-xl font-bold">+</span>
                            <input id="pd-upl-input8" type="file" class="hidden" accept="image/*" name="image8">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white w-[46%] 2xl:w-[59%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6">Khởi tạo kho hàng</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 flex flex-wrap px-6">
                    <label for="name">Tồn kho ban đầu <p class="text-red-600 inline-block mr-2">*</p> @error('name')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                    <input class="block text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="stock" value="{{ old('stock', 0) }}">
                </div>
                <div class="w-full mt-4 flex flex-wrap px-6">
                    <label for="name">Giá vốn <p class="text-red-600 inline-block mr-2">*</p> @error('name')<p class="inline-block text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</label>
                    <input class="text-right mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="cost" value="{{ old('cost', 0) }}">
                </div>
                <div class="flex items-center justify-end w-full px-6 mt-20">
                    <a href="{{ route('pd-show', $product->SKU) }}" class="w-[10%] 2xl:w-[10%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center">Hủy</a>
                    <a href="{{ route('pd-index') }}" class="w-[30%] 2xl:w-[18%] px-2 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center">Lưu và in mã vạch</a>
                    <button type="submit" form="pd-form-update" class="w-[10%] 2xl:w-[10%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center">Lưu</button>
                </div>
            </div>
        </div>
    </form>
    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                handleShowSuccessAlert(@json(session('success')));
            });
        </script>
    @endif
@endsection
