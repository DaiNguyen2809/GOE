@extends('dream-up.admin-dream')
@section('title','Nhập hàng')
@section('content')
<div class="bg-white w-[96%] h-35 font-[gilroy] mt-6 rounded-md shadow-lg">
    <h1 class="text-2xl font-[gilroy-md] mt-4 mb-2 ml-4">DANH SÁCH ĐƠN NHẬP HÀNG</h1>
    <div class="relative w-full ml-4 flex items-center text-sm">
        <i class="fa-solid fa-magnifying-glass absolute left-3 top-3.5 w-6 h-6 text-gray-500 cursor-pointer"></i>
        <input type="text" placeholder="Tìm kiếm theo mã đơn nhập, tên, SĐT NCC" class="w-[40%] pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        <select class="cursor-pointer ml-4 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option selected>Trạng thái</option>
            <option>Đặt hàng</option>
            <option>Đang giao dịch</option>
            <option>Đã hủy</option>
            <option value="">Hoàn thành</option>
        </select>
        <select class="cursor-pointer ml-4 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option selected>Nhân viên tạo</option>
            <option>Khang-8090909123</option>
            <option>Duy-0909090912</option>
        </select>
        <button class="px-4 py-2 ml-4 bg-white border-1 border-green-600 text-green-600 font-[gilroy] rounded-md cursor-pointer hover:bg-green-600 hover:text-white">Xuất file</button>
        <button class="px-4 py-2 ml-4 bg-white border-1 border-blue-600 text-blue-600 font-[gilroy] rounded-md cursor-pointer hover:bg-blue-600 hover:text-white">Tạo đơn nhập hàng</button>
    </div>
</div>

<div class="bg-white w-[96%] h-screen font-[gilroy] mt-4 mb-6 rounded-md shadow-lg flex justify-center">
    <div class="container w-[98%] mt-4">
        <div class="bg-white shadow-md overflow-hidden">
            <div class="overflow-auto max-h-[calc(100vh-300px)] max-w-[100%] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
                <table class="table-auto w-full border-collapse text-sm">
                    <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
                    <tr class="text-left text-white h-12">
                        <th class="p-2">Mã đơn nhập</th>
                        <th class="p-2">Ngày nhập</th>
                        <th class="p-2">Trạng thái</th>
                        <th class="p-2">Trạng thái nhập</th>
                        <th class="p-2">Nhà cung cấp</th>
                        <th class="p-2">Nhân viên tạo</th>
                        <th class="p-2 text-right">Giá trị đơn</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 cursor-pointer">
                    <tr class="hover:bg-gray-100 h-16 group">
                        <td class="p-2 text-blue-500 group-hover:underline">SONO1491</td>
                        <td class="p-2">11/02/2025 11:29</td>
                        <td class="p-2"><div class="bg-blue-100 text-blue-600 border-1 border-blue-600 w-fit px-3 rounded-full">Đặt hàng</div></td>
                        <td class="p-2"><div class="bg-red-100 text-red-600 border-1 border-red-600 w-fit px-3 rounded-full">Chưa nhập</div></td>
                        <td class="p-2">GOE Roastery</td>
                        <td class="p-2">Võ Thị Quỳnh Như</td>
                        <td class="p-2 text-right">2,325,000</td>
                    </tr>
                    <tr class="hover:bg-gray-100 h-16 group">
                        <td class="p-2 text-blue-500 group-hover:underline">SONO1491</td>
                        <td class="p-2">11/02/2025 11:29</td>
                        <td class="p-2"><div class="bg-yellow-100 text-yellow-600 border-1 border-yellow-600 w-fit px-3 rounded-full">Đang giao dịch</div></td>
                        <td class="p-2"><div class="bg-red-100 text-red-600 border-1 border-red-600 w-fit px-3 rounded-full">Chưa nhập</div></td>
                        <td class="p-2">Highland Coffee</td>
                        <td class="p-2">Võ Thị Quỳnh Như</td>
                        <td class="p-2 text-right">2,325,000</td>
                    </tr>
                    <tr class="hover:bg-gray-100 h-16 group">
                        <td class="p-2 text-blue-500 group-hover:underline">SONO1491</td>
                        <td class="p-2">11/02/2025 11:29</td>
                        <td class="p-2"><div class="bg-green-100 text-green-600 border-1 border-green-600 w-fit px-3 rounded-full">Hoàn thành</div></td>
                        <td class="p-2"><div class="bg-green-100 text-green-600 border-1 border-green-600 w-fit px-3 rounded-full">Đã nhập</div></td>
                        <td class="p-2">Trung Nguyên Legend</td>
                        <td class="p-2">Võ Thị Quỳnh Như</td>
                        <td class="p-2 text-right">2,325,000</td>
                    </tr>
                    <tr class="hover:bg-gray-100 h-16 group">
                        <td class="p-2 text-blue-500 group-hover:underline">SONO1491</td>
                        <td class="p-2">11/02/2025 11:29</td>
                        <td class="p-2"><div class="bg-red-100 text-red-600 border-1 border-red-600 w-fit px-3 rounded-full">Đã hủy</div></td>
                        <td class="p-2"><div class="bg-red-100 text-red-600 border-1 border-red-600 w-fit px-3 rounded-full">Chưa nhập</div></td>
                        <td class="p-2">Ro+</td>
                        <td class="p-2">Võ Thị Quỳnh Như</td>
                        <td class="p-2 text-right">2,325,000</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
