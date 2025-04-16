@extends('dream-up.admin-dream')
@section('title', 'Chi tiết khách hàng')
@section('content')
    <div class="bg-white h-fit w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-sm text-gray-500"></i>
            <a href="{{ route('cm-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách khách hàng</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%] text-sm">
            <button onclick="handleConfirmDelete('{{ $customer->id }}', 'cm-modal-delete', 'cm-form-delete', '{{ route('cm-destroy', '__id__') }}')" class="w-[22%] 2xl:w-[11%] h-10 px-4 py-2 ml-4 bg-white border border-red-600 text-red-600 font-gilroy rounded-md cursor-pointer hover:bg-red-600 hover:text-white text-center"><i class="fa-solid fa-xmark mr-2"></i> Xóa khách hàng</button>
            <a href="{{ route('cm-edit', $customer->id) }}" class="w-[26%] 2xl:w-[14%] h-10 px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center"><i class="fa-solid fa-pen-to-square mr-2"></i> Cập nhật khách hàng</a>
            <button type="submit" class="w-[22%] 2xl:w-[11%] h-10 px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center"><i class="ml-2 fa-regular fa-square-caret-down"></i> Tạo phiếu thu/chi</button>
        </div>
    </div>
    <div class="w-[96%] flex flex-wrap mt-6 text-2xl">{{ $customer->name ?: '---'}}</div>
    <div class="w-[96%] flex justify-between">
        <div class="w-[65%]">
            <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-[gilroy-md] mt-4 ml-6 pt-4">Thông tin cá nhân</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm flex justify-between pb-6">
                    <div class="w-full pl-6 overflow-hidden whitespace-nowrap text-ellipsis text-gray-400">
                        <p class="mb-1.5">Ngày sinh</p>
                        <p class="mb-1.5">Giới tính</p>
                        <p class="mb-1.5">Số điện thoại</p>
                        <p class="mb-1.5">Email</p>
                        <p>Nhân viên phụ trách</p>
                    </div>
                    <div class="w-full pl-6">
                        <p class="mb-1.5">{{ \Illuminate\Support\Carbon::parse($customer->birthday)->format('d/m/Y') ?: '---'}}</p>
                        <p class="mb-1.5">{{ $customer->gender ?: '---'}}</p>
                        <p class="mb-1.5">{{ $customer->phone ?: '---'}}</p>
                        <p class="mb-1.5">{{ $customer->email ?: '---'}}</p>
                        <p>---</p>
                    </div>
                    <div class="w-full pl-6 overflow-hidden whitespace-nowrap text-ellipsis text-gray-400">
                        <p class="mb-1.5">Nhóm khách hàng</p>
                        <p class="mb-1.5">Mã khách hàng</p>
                        <p class="mb-1.5">Tags</p>
                        <p class="mb-1.5">Mã affiliates</p>
                        <p>Mã KH đặc biệt</p>
                    </div>
                    <div class="w-full pl-6">
                        <p class="text-blue-600 mb-1.5">{{ $customer->category_name }}</p>
                        <p class="mb-1.5">{{ $customer->id }}</p>
                        <p class="mb-1.5">{{ $customer->customer_tag ?: '---' }}</p>
                        <p class="mb-1.5">{{ $customer->affiliates_code ?: '---' }}</p>
                        <p>{{ $customer->special_code ?: '---' }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-[gilroy-md] mt-4 ml-6 pt-4">Thông tin mua hàng</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm flex justify-between pb-6">
                    <div class="w-full pl-6 overflow-hidden whitespace-nowrap text-ellipsis text-gray-400">
                        <p class="mb-1.5">Tổng chi tiêu</p>
                        <p class="mb-1.5">Tổng SL đơn hàng</p>
                        <p>Ngày cuối cùng mua hàng</p>
                    </div>
                    <div class="w-full pl-6">
                        <p class="mb-1.5">1</p>
                        <p class="mb-1.5">2</p>
                        <p>5</p>
                    </div>
                    <div class="w-full pl-6 overflow-hidden whitespace-nowrap text-ellipsis text-gray-400">
                        <p class="mb-1.5">Tổng SL sản phẩm đã mua</p>
                        <p class="mb-1.5">Tổng SL sản phẩm hoàn trả</p>
                        <p>Công nợ hiện tại</p>
                    </div>
                    <div class="w-full pl-6">
                        <p class="mb-1.5">1</p>
                        <p class="mb-1.5">2</p>
                        <p>5</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-[33.5%]">
            <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg block">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6 pt-4">Thông tin gợi ý khi bán hàng</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm flex justify-between pb-6">
                    <div class="w-full pl-6 overflow-hidden whitespace-nowrap text-ellipsis text-gray-400">
                        <p class="mb-1.5">Chính sách giá mặc định</p>
                        <p class="mb-1.5">Chiết khấu</p>
                        <p>Hình thức thanh toán</p>
                    </div>
                    <div class="w-full pl-6">
                        <p class="mb-1.5">{{ $customer->price ?: '---' }}</p>
                        <p class="mb-1.5">{{ $customer->discount ?: '---'}}%</p>
                        <p>{{ $customer->payment ?: '---'}}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white w-full h-fit font-gilroy rounded-md shadow-lg block">
                <h1 class="text-lg font-gilroy_md mt-4 ml-6 pt-4">Thông tin tích điểm</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm flex justify-between pb-6">
                    <div class="w-full pl-6 overflow-hidden whitespace-nowrap text-ellipsis text-gray-400">
                        <p class="mb-1.5">Điểm hiện tại</p>
                        <p class="mb-1.5">Hạng thẻ hiện tại</p>
                        <p>Giá trị còn lại để lên hạng</p>
                    </div>
                    <div class="w-full pl-6">
                        <p class="mb-1.5">{{ $customer->point ?: '---' }}</p>
                        <p class="mb-1.5">---</p>
                        <p>---</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dream-up.pages.customer.detail-table')
    @include('dream-up.pages.customer.modal')
@endsection
