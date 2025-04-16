@extends('dream-up.admin-dream')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <div class="bg-white h-16 w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-base text-gray-500"></i>
            <a href="{{ route('pd-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách sản phẩm</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%]">
            <button onclick="handleConfirmDelete('{{ $product->SKU }}', 'pd-modal-delete', 'pd-form-delete', '{{ route('pd-destroy', '__id__') }}')" class="text-sm w-[11%] 2xl:w-[7%] h-10 px-4 py-2 ml-4 bg-white border border-red-600 text-red-600 font-gilroy rounded-md cursor-pointer hover:bg-red-600 hover:text-white text-center"><i class="fa-solid fa-xmark mr-2"></i> Xóa</button>
            <a href="{{ route('pd-edit', $product->SKU) }}" class="text-sm w-[24%] 2xl:w-[12%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md h-10 cursor-pointer hover:bg-green-600 hover:text-white text-center"><i class="fa-solid fa-check mr-2"></i> Cập nhật sản phẩm</a>
        </div>
    </div>
    {{--Thông tin cơ bản--}}
    <div class="w-[96%] flex flex-wrap gap-6">
        <div class="w-full flex justify-between mt-6">
            <div class="bg-white w-[30%] h-fit font-gilroy rounded-md shadow-lg text-sm">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6">Chi tiết phiên bản</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4">
                    <div class="flex px-6 cursor-pointer">
                        <img src=" {{ asset('/storage/' . $product->image) }}" alt="ảnh" class="h-12 w-12">
                        <div class="ml-4 mt-1.5">
                            <h1 class="font-gilroy_bd">STRONG & BOLD (XAY) (250g)</h1>
                            <div class="flex gap-4 h-12 text-gray-500">
                                <p class="">Tồn kho: 13</p>
                                <p class="">Có Thể bán: 19</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex px-6 cursor-pointer">
                        <img src=" {{ asset('/storage/' . $product->image) }}" alt="ảnh" class="h-12 w-12">
                        <div class="ml-4 mt-1.5">
                            <h1 class="font-gilroy_bd">STRONG & BOLD (XAY) (250g)</h1>
                            <div class="flex gap-4 h-12 text-gray-500">
                                <p class="">Tồn kho: 13</p>
                                <p class="">Có Thể bán: 19</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex px-6 cursor-pointer">
                        <img src=" {{ asset('/storage/' . $product->image) }}" alt="ảnh" class="h-12 w-12">
                        <div class="ml-4 mt-1.5">
                            <h1 class="font-gilroy_bd">STRONG & BOLD (XAY) (250g)</h1>
                            <div class="flex gap-4 h-12 text-gray-500">
                                <p class="">Tồn kho: 13</p>
                                <p class="">Có Thể bán: 19</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white w-[69%] h-fit font-gilroy rounded-md shadow-lg text-sm">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6">Thông tin sản phẩm</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 flex-col">
                    <div class="w-full flex">
                        <div class="ml-6 text-gray-500 ">
                            <p class="mb-4">Tên sản phẩm:</p>
                            <p class="mb-4">Mã SKU:</p>
                            <p class="mb-4">Mã barcode:</p>
                            <p class="mb-4">Khối lượng:</p>
                            <p class="mb-4">Đơn vị tính:</p>
                            <p class="mb-4">Loại sản phẩm:</p>
                            <p class="mb-4">Ngày tạo:</p>
                            <p class="mb-4">Ngày cập nhật cuối:</p>
                            <p class="mb-4">Tag:</p>
                        </div>
                        <div class="ml-24 2xl:ml-24">
                            <p class="mb-4">{{ $product->name }}</p>
                            <p class="mb-4">{{ $product->SKU }}</p>
                            <p class="mb-4">{{ $product->barcode }}</p>
                            <p class="mb-4">{{ number_format($product->weight, 0, ',', '') }}{{$product->unit_weight_name}}</p>
                            <p class="mb-4">{{ $product->unit_package_name }}</p>
                            <p class="mb-4">{{ $product->pd_cat_name }}</p>
                            <p class="mb-4">{{ $product->created_at }}</p>
                            <p class="mb-4">{{ $product->updated_at }}</p>
                            <p class="mb-4">{{ $product->product_tag }}</p>
                        </div>
                        <div class="ml-24">
                            <img src="{{ asset('/storage/' . $product->image) }}" alt="ảnh" class="w-48 h-48">
                            <div class="flex gap-2 flex-wrap w-48 justify-between mt-2">
                                <img src="{{ asset('/storage/' . $product->image2) }}" alt="" class="w-14 h-14">
                                <img src="{{ asset('/storage/' . $product->image3) }}" alt="" class="w-14 h-14">
                                <img src="{{ asset('/storage/' . $product->image4) }}" alt="" class="w-14 h-14">
                                <img src="{{ asset('/storage/' . $product->image5) }}" alt="" class="w-14 h-14">
                                <img src="{{ asset('/storage/' . $product->image6) }}" alt="" class="w-14 h-14">
                                <img src="{{ asset('/storage/' . $product->image7) }}" alt="" class="w-14 h-14">
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-6">
                        <div class="bg-gray-300 w-full h-px mt-4 mb-4"></div>
                        <p class="mb-4 text-justify">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Chính sách giá--}}
    <div class="w-[96%] flex flex-wrap gap-6 mb-16">
        <div class="w-full flex justify-between mt-6">
            <div class="bg-white w-[30%] h-fit font-gilroy rounded-md shadow-lg text-sm">

            </div>
            <div class="bg-white w-[69%] h-fit font-gilroy rounded-md shadow-lg text-sm">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6">Giá sản phẩm</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="flex px-6">
                    <div class="w-[50%] mt-4 flex">
                        <div class="text-gray-500 leading-8">
                            @foreach($prices->slice(0,5) as $price)
                                <p>{{ $price->price_type_name }}</p>
                            @endforeach
                        </div>
                        <div class="ml-20 leading-8">
                            @foreach($prices->slice(0,5) as $price)
                                <p>{{ number_format($price->price, 0, '.', ',') }}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-[50%] mt-4 flex mb-4">
                        <div class="text-gray-500 leading-8">
                            @foreach($prices->slice(5,5) as $price)
                                <p>{{ $price->price_type_name }}</p>
                            @endforeach
                        </div>
                        <div class="ml-20 leading-8">
                            @foreach($prices->slice(5,5) as $price)
                                <p>{{ number_format($price->price, 0, '.', ',') }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dream-up.pages.product.modal')
@endsection
