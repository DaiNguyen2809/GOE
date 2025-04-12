@extends('dream-up.admin-dream')
@section('title', 'Khách hàng')
@section('content')
    <div class="bg-white w-[96%] h-36 font-gilroy mt-6 rounded-md shadow-lg">
        <h1 class="text-2xl font-gilroy_md mt-4 mb-2 ml-4">QUẢN LÝ KHÁCH HÀNG</h1>
        <div class="relative w-full ml-4 flex items-center text-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-3.5 w-6 h-6 text-gray-500 cursor-pointer"></i>
            <input oninput="handleSearchData('cm-input', '{{ route('cm-search') }}', 'cm-container')" id="cm-input" placeholder="Tìm kiếm theo mã khách hàng, tên, SĐT khách hàng" class="w-[40%] h-10 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <button class="h-10 px-4 py-2 ml-4 bg-white border border-gray-600 text-gray-600 font-gilroy rounded-md cursor-pointer hover:bg-gray-600 hover:text-white">Bộ lọc <i class="fa-solid fa-filter ml-1"></i></button>
            <button class="h-10 px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white"><i class="fa-regular fa-file-excel mr-2"></i> Xuất file</button>
            <a href="{{ route('cm-create') }}" class="h-10 px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white"><i class="fa-solid fa-plus mr-2"></i> Thêm khách hàng</a>
        </div>
    </div>

    <div class="bg-white w-[96%] h-screen font-[gilroy] mt-4 mb-6 rounded-md shadow-lg flex justify-center">
        <div class="container w-[98%] mt-4">
            <div class="bg-white shadow-md overflow-hidden" id="cm-container">
                @include('dream-up.pages.customer.table')
            </div>
        </div>
    </div>
    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                handleShowSuccessAlert(@json(session('success')));
            });
        </script>
    @endif
@endsection
