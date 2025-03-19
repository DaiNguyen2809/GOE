@extends('dream-up.admin-dream')
@section('title','Nhà cung cấp')
@section('content')
    <div class="bg-white w-[96%] h-35 font-[gilroy] mt-6 rounded-md shadow-lg">
        <h1 class="text-2xl font-[gilroy-md] mt-4 mb-2 ml-4">QUẢN LÝ NHÀ CUNG CẤP</h1>
        <div class="relative w-full ml-4 flex items-center text-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 w-6 h-6 text-gray-500 cursor-pointer"></i>
            <input type="text" placeholder="Tìm kiếm theo mã khách hàng, tên, SĐT khách hàng" class="w-[40%] pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <select class="cursor-pointer ml-4 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option selected>Nhóm nhà cung cấp</option>
                <option>Thực phẩm thương mại</option>
                <option>Khác</option>
            </select>
            <select class="cursor-pointer ml-4 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option selected>Trạng thái</option>
                <option>Đang giao dịch</option>
                <option>Ngừng giao dịch</option>
            </select>
            <button class="px-4 py-2 ml-4 bg-white border-1 border-green-600 text-green-600 font-[gilroy] rounded-md cursor-pointer hover:bg-green-600 hover:text-white">Xuất file</button>
            <button class="px-4 py-2 ml-4 bg-white border-1 border-blue-600 text-blue-600 font-[gilroy] rounded-md cursor-pointer hover:bg-blue-600 hover:text-white">Thêm nhóm nhà cung cấp</button>
        </div>
    </div>

    <div class="bg-white w-[96%] h-screen font-[gilroy] mt-4 mb-6 rounded-md shadow-lg flex justify-center">
        <div class="container w-[98%] mt-4">
            <div class="bg-white shadow-md overflow-hidden">
                <div class="overflow-auto max-h-[calc(100vh-250px)] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
                    <table class="table-auto w-full border-collapse text-sm">
                        <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
                        <tr class="text-left text-white h-12">
                            <th class="p-2">Mã nhà cung cấp</th>
                            <th class="p-2">Tên nhà cung cấp</th>
                            <th class="p-2">Nhóm nhà cung cấp</th>
                            <th class="p-2 text-center">Email</th>
                            <th class="p-2 text-center">Số điện thoại</th>
                            <th class="p-2 text-center">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 cursor-pointer">
                        <tr class="hover:bg-gray-100 h-14 group">
                            <td class="p-2 text-blue-500"><a href="#" class="group-hover:underline">SUPN00005</a></td>
                            <td class="p-2">MORIA</td>
                            <td class="p-2">Thực phẩm thương mại</td>
                            <td class="p-2 text-center"></td>
                            <td class="p-2 text-center"></td>
                            <td class="p-2 text-center text-green-600">Đang giao dịch</td>
                        </tr>
                        <tr class="hover:bg-gray-100 h-14 group">
                            <td class="p-2 text-blue-500"><a href="#" class="group-hover:underline">SUPN00004</a></td>
                            <td class="p-2">GOE Roastery</td>
                            <td class="p-2">Khác</td>
                            <td class="p-2 text-center"></td>
                            <td class="p-2 text-center"></td>
                            <td class="p-2 text-center text-green-600">Đang giao dịch</td>
                        </tr>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
