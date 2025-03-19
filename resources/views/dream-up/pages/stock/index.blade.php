@extends('dream-up.admin-dream')
@section('title','Quản lý kho')
@section('content')
<div class="bg-white w-[96%] h-35 font-[gilroy] mt-6 rounded-md shadow-lg">
    <h1 class="text-2xl font-[gilroy-md] mt-4 mb-2 ml-4">QUẢN LÝ KHO</h1>
    <div class="relative w-full ml-4 flex items-center text-sm">
        <i class="fa-solid fa-magnifying-glass absolute left-3 top-3.5 w-6 h-6 text-gray-500 cursor-pointer"></i>
        <input type="text" placeholder="Tìm kiếm theo SKU, tên sản phẩm, barcode" class="w-[30%] pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        <select class="cursor-pointer ml-4 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option selected>Loại sản phẩm</option>
            <option>Cà phê rang xay</option>
            <option>Cà phê hòa tan</option>
            <option>Cà phê cốt</option>
        </select>
        <select class="cursor-pointer ml-2 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option selected>Nhãn hiệu</option>
            <option>DREAM UP</option>
            <option>SKY UP</option>
        </select>
        <select class="cursor-pointer ml-2 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="0" selected>Trạng thái</option>
            <option value="1">Đang giao dịch</option>
            <option value="2">Ngừng giao dịch</option>
        </select>
        <button class="px-4 py-2 ml-4 bg-white border-1 border-violet-600 text-violet-600 font-[gilroy] rounded-md cursor-pointer hover:bg-violet-600 hover:text-white">In tem</button>
        <button class="px-4 py-2 ml-4 bg-white border-1 border-blue-600 text-blue-600 font-[gilroy] rounded-md cursor-pointer hover:bg-blue-600 hover:text-white">Xem danh sách sản phẩm</button>
    </div>
</div>

<div class="bg-white w-[96%] h-screen font-[gilroy] mt-4 mb-6 rounded-md shadow-lg flex justify-center">
    <div class="container w-[98%] mt-4">
        <div class="bg-white shadow-md overflow-hidden">
            <div class="overflow-auto max-h-[calc(100vh-250px)] px-1 py-1 shadow-md rounded-lg"> <!-- Điều chỉnh max-height cho phù hợp -->
                <table class="table-auto w-full border-collapse text-sm">
                    <thead class="bg-slate-800 sticky top-0 z-10 shadow-md">
                    <tr class="text-left text-white h-12">
                        <th class="p-4 text-center">Ảnh</th>
                        <th class="p-4">Tên phiên bản sản phẩm</th>
                        <th class="p-4 text-center">Có thể bán</th>
                        <th class="p-4 text-center">Tồn kho</th>
                        <th class="p-4 text-center">Ngày khởi tạo</th>
                        <th class="p-4 text-center">Giá bán lẻ</th>
                        <th class="p-4 text-center">Giá nhập</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 cursor-pointer">
                    <tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr>
                    <tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr><tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr><tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr><tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr><tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr><tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr><tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr><tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr><tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr><tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr><tr class="hover:bg-gray-100 group h-16">
                        <td class="p-4"><img src="{{ asset('images/testPD.png') }}" alt="Ảnh" class="w-10 h-10 object-cover mx-auto"></td>
                        <td class="p-4"><div>
                                <h3 class="text-blue-500 group-hover:underline">SUPERBOLD - (XAY)(1000gr)</h3>
                                <p class="text-sm text-gray-400">T-SUPG-4</p>
                            </div></td>
                        <td class="p-4 text-center">2.6</td>
                        <td class="p-2 text-center">19.2</td>
                        <td class="p-4 text-center">25/01/2025</td>
                        <td class="p-4 text-center">1,400,000</td>
                        <td class="p-2 text-center">0</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
