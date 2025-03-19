@extends('dream-up.admin-dream')
@section('title','Quản lý đóng gói')
@section('content')
<div class="bg-neutral-200 w-[83%] 2xl:w-[85%] h-screen font-gilroy flex flex-col items-center">
    <div class="bg-white w-[96%] h-35 font-[gilroy] mt-6 rounded-md shadow-lg">
        <h1 class="text-2xl font-[gilroy-md] mt-4 mb-2 ml-4">QUẢN LÝ ĐÓNG GÓI</h1>
        <div class="relative w-full ml-4 flex items-center text-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-3.5 w-6 h-6 text-gray-500 cursor-pointer"></i>
            <input type="text" placeholder="Tìm kiếm theo mã sản phẩm, tên sản phẩm, barcode" class="w-[40%] pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <select class="cursor-pointer ml-4 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option selected>Trạng thái</option>
                <option>Chờ đóng gói</option>
                <option>Đã đóng gói</option>
                <option>Hủy đóng gói</option>
            </select>
        </div>
    </div>

    <div class="bg-white w-[96%] h-screen font-[gilroy] mt-4 mb-6 rounded-md shadow-lg flex justify-center">
        <div class="container w-[98%] mt-4">
            <div class="bg-white shadow-md overflow-hidden">
                <div class="overflow-auto max-h-[calc(100vh-250px)] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
                    <table class="table-auto w-full border-collapse text-sm">
                        <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
                        <tr class="text-left text-white h-12">
                            <th class="p-4">Mã đóng gói</th>
                            <th class="p-4">Mã đơn hàng</th>
                            <th class="p-4 text-center">Ngày yêu cầu đóng gói</th>
                            <th class="p-4 text-center">Ngày xác nhận đóng gói</th>
                            <th class="p-4 text-center">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 cursor-pointer">
                        <tr class="hover:bg-gray-100 h-16">
                            <td class="p-4 text-blue-500"><a href="#" class="hover:underline">FUN01318</a></td>
                            <td class="p-4 text-blue-500"><a href="#" class="hover:underline">SON01436</a></td>
                            <td class="p-4 text-center">27/01/2024</td>
                            <td class="p-4 text-center"></td>
                            <td class="p-4 text-center text-violet-600">Chờ đóng gói</td>
                        </tr>
                        <tr class="hover:bg-gray-100 h-16">
                            <td class="p-4 text-blue-500"><a href="#" class="hover:underline">FUN01318</a></td>
                            <td class="p-4 text-blue-500"><a href="#" class="hover:underline">SON01436</a></td>
                            <td class="p-4 text-center">27/01/2024</td>
                            <td class="p-4 text-center">28/01/2024</td>
                            <td class="p-4 text-center text-green-600">Đã đóng gói</td>
                        </tr>
                        <tr class="hover:bg-gray-100 h-14">
                            <td class="p-4 text-blue-500"><a href="#" class="hover:underline">FUN01318</a></td>
                            <td class="p-4 text-blue-500"><a href="#" class="hover:underline">SON01436</a></td>
                            <td class="p-4 text-center">27/01/2024</td>
                            <td class="p-4 text-center"></td>
                            <td class="p-4 text-center text-red-600">Hủy đóng gói</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
