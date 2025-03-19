@extends('dream-up.admin-dream')
@section('title','Khuyến mãi')
@section('content')
<div class="bg-white w-[96%] h-35 font-[gilroy] mt-6 rounded-md shadow-lg">
    <h1 class="text-2xl font-[gilroy-md] mt-4 mb-2 ml-4">QUẢN LÝ KHUYẾN MÃI</h1>
    <div class="relative w-full ml-4 flex items-center text-sm">
        <i class="fa-solid fa-magnifying-glass absolute left-3 top-3.5 w-6 h-6 text-gray-500 cursor-pointer"></i>
        <input type="text" placeholder="Tìm kiếm theo mã sản phẩm, tên sản phẩm, barcode" class="w-[40%] pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        <select class="cursor-pointer ml-4 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option selected>Trạng thái</option>
            <option>Chờ đóng gói</option>
            <option>Đã đóng gói</option>
            <option>Hủy đóng gói</option>
        </select>
        <button class="px-4 py-2 ml-4 bg-white border-1 border-green-600 text-green-600 font-[gilroy] rounded-md cursor-pointer hover:bg-green-600 hover:text-white">Xuất file</button>
        <button class="px-4 py-2 ml-4 bg-white border-1 border-blue-600 text-blue-600 font-[gilroy] rounded-md cursor-pointer hover:bg-blue-600 hover:text-white">Thêm khuyến mãi</button>
    </div>
</div>

<div class="bg-white w-[96%] h-screen font-[gilroy] mt-4 mb-6 rounded-md shadow-lg flex justify-center">
    <div class="container w-[98%] mt-4">
        <div class="bg-white shadow-md overflow-hidden">
            <div class="overflow-auto max-h-[calc(100vh-250px)] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
                <table class="table-auto w-full border-collapse text-sm">
                    <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
                    <tr class="text-left text-white h-12">
                        <th class="p-4">Mã khuyến mãi</th>
                        <th class="p-4">Mô tả</th>
                        <th class="p-4 text-center">Số tiền giảm</th>
                        <th class="p-4 text-center">Đơn tối thiểu</th>
                        <th class="p-4 text-center">Ngày bắt đầu</th>
                        <th class="p-4 text-center">Ngày kết thúc</th>
                        <th class="p-4 text-center">Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 cursor-pointer">
                    <tr class="hover:bg-gray-100 h-16 group">
                        <td class="p-4 text-blue-500 group-hover:underline"><a href="#">T225SALE120KM</a></td>
                        <td class="p-4 truncate max-w-[200px]">Giảm 120.000đ cho Đơn hàng từ 999.000đ trở lên sấdasjklajdlkjsdkasdjalkjdkajdaksckasldjaksdjaksjdaklsdjlaksjdalskjdlasjdklasjdlkasjdjasdjaslkdjaljdlasjdasjdjasdjalsjdalks</td>
                        <td class="p-4 text-center">120,000</td>
                        <td class="p-4 text-center">999,000</td>
                        <td class="p-4 text-center">27/01/2024</td>
                        <td class="p-4 text-center">28/02/2025</td>
                        <td class="p-4 text-center text-violet-600">Chưa áp dụng</td>
                    </tr>
                    <tr class="hover:bg-gray-100 h-16 group">
                        <td class="p-4 text-blue-500 group-hover:underline"><a href="#">T225SALE120KM</a></td>
                        <td class="p-4 truncate max-w-[200px]">Giảm 120.000đ cho Đơn hàng từ 999.000đ trở lên sấdasjklajdlkjsdkasdjalkjdkajdaksckasldjaksdjaksjdaklsdjlaksjdalskjdlasjdklasjdlkasjdjasdjaslkdjaljdlasjdasjdjasdjalsjdalks</td>
                        <td class="p-4 text-center">120,000</td>
                        <td class="p-4 text-center">999,000</td>
                        <td class="p-4 text-center">27/01/2024</td>
                        <td class="p-4 text-center">28/02/2025</td>
                        <td class="p-4 text-center text-green-600">Đang áp dụng</td>
                    </tr>
                    <tr class="hover:bg-gray-100 h-16 group">
                        <td class="p-4 text-blue-500 group-hover:underline"><a href="#">T225SALE120KM</a></td>
                        <td class="p-4 truncate max-w-[200px]">Giảm 120.000đ cho Đơn hàng từ 999.000đ trở lên sấdasjklajdlkjsdkasdjalkjdkajdaksckasldjaksdjaksjdaklsdjlaksjdalskjdlasjdklasjdlkasjdjasdjaslkdjaljdlasjdasjdjasdjalsjdalks</td>
                        <td class="p-4 text-center">120,000</td>
                        <td class="p-4 text-center">999,000</td>
                        <td class="p-4 text-center">27/01/2024</td>
                        <td class="p-4 text-center">28/02/2025</td>
                        <td class="p-4 text-center text-red-600">Hết hạn</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
