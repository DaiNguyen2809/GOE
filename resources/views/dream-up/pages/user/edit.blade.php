@extends('dream-up.admin-dream')
@section('title', 'Cập nhật người dùng')
@section('content')
    <div class="bg-white h-fit w-full flex px-3 py-3">
        <div class="h-full w-[30%] 2xl:w-[25%] flex items-center cursor-pointer group">
            <i class="fa-solid fa-chevron-left ml-8 text-sm text-gray-500"></i>
            <a href="{{ route('ur-index') }}" class="ml-2 text-base text-gray-500 group-hover:underline">Quay lại danh sách người dùng</a>
        </div>
        <div class="h-full flex items-center justify-end w-[68%] 2xl:w-[74%] text-sm">
            <a href="{{ route('ur-index') }}" class="w-[12%] 2xl:w-[8%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center"><i class="fa-solid fa-ban mr-2"></i> Hủy</a>
            <button type="submit" form="ur-form-update" class="w-[24%] 2xl:w-[16%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center"><i class="fa-solid fa-check mr-2"></i> Cập nhật tài khoản</button>
        </div>
    </div>
    <form action="{{ route('ur-update', $user->id) }}" id="ur-form-update" method="POST" class="w-[96%] flex flex-wrap gap-6 mb-16">
        @csrf
        @method("PUT")
        <div class="w-full flex justify-between mt-6">
            <div class="bg-white w-[65%] h-fit font-gilroy rounded-md shadow-lg">
                <h1 class="text-lg font-[gilroy-md] mt-4 ml-6">Thông tin chung</h1>
                <div class="bg-gray-300 w-full h-px mt-2"></div>
                <div class="w-full mt-4 text-sm">
                    <div class="w-full px-6 mb-12 h-10">
                        <label for="id">Mã người dùng</label>
                        <input class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập mã người dùng" name="id" value="{{ old('id', $user->id) }}">
                    </div>

                    <div class="w-full px-6 flex justify-between h-10 mb-12">
                        <div class="w-[49%]">
                            <label for="name">Tên người dùng</label>
                            <input readonly class="cursor-not-allowed mt-2 w-full pl-3 pr-4 py-2 border border-gray-600 bg-gray-100 text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập tên người dùng" name="name" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="phone">Số điện thoại</label>
                            <input readonly class="cursor-not-allowed mt-2 w-full pl-3 pr-4 py-2 border border-gray-600 bg-gray-100 text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" placeholder="Nhập số điện thoại" name="phone" value="{{ old('phone', $user->phone) }}">
                        </div>
                    </div>

                    <div class="w-full px-6 flex justify-between h-10 mb-12">
                        <div class="w-[49%]">
                            <label for="email" class="block">Email</label>
                            <input readonly class="cursor-not-allowed mt-2 w-full pl-3 pr-4 py-2 border border-gray-600 bg-gray-100 text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập địa chỉ email" name="email" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="w-[49%]">
                            <label for="password" class="block">Mật khẩu</label>
                            <input readonly type="password" class="@error('password') is-invalid @enderror cursor-not-allowed mt-2 w-full pl-3 pr-4 py-2 border border-gray-600 bg-gray-100 text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="password" value="***************">
                        </div>
                    </div>

                    <div class="w-full px-6 h-10 mb-12">
                        <label for="role" class="block">Quyền người dùng<p class="text-red-600 inline-block mr-2">*</p> @error('role')<p class="inline-block text-red-600 text-xs mt-1">{{ $message }}</p>@enderror</label>
                        <select name="role" class="inline-block mt-2 w-full h-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="0" {{ (old('role') ?? ($user->role ?? '')) == '0' ? 'selected' : '' }}>Khách hàng</option>
                            <option value="1" {{ (old('role') ?? ($user->role ?? '')) == '1' ? 'selected' : '' }}>Nhân viên</option>
                            <option value="2" {{ (old('role') ?? ($user->role ?? '')) == '2' ? 'selected' : '' }}>Admin</option>
                            <option value="3" {{ (old('role') ?? ($user->role ?? '')) == '3' ? 'selected' : '' }}>Owner</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
