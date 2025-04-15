<div class="bg-sky-950 text-white w-[17%] 2xl:w-[15%] h-screen font-gilroy grid grid-flow-row auto-rows-max overflow-auto  scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-300 scrollbar-rounded">
    <div><a href=" {{asset('admin/dreamup/')}}" class="flex items-center justify-start ml-2"><img src="{{ asset('images/dreamup.png') }}" alt="logo dream up" class="w-[80%] mt-4 mb-4"></a></div>
    <div class="bg-gray-400 w-full h-px mb-2"></div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <a href="{{ asset('/admin/dreamup/home') }}" class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
            <i class="fa-solid fa-house text-gray-500 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base">Tổng quan</p>
        </a>
    </div>

    <div x-data="{ open: false }" class="w-full mt-2">
        <div @click="open = !open" class="h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
            <div class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
                <i class="fa-solid fa-file-invoice text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
                <p class="h-4 text-base">Đơn hàng</p>
                <i class="fa-solid fa-chevron-down ml-auto mr-4 transition-transform" :class="{ 'rotate-180': open }"></i>
            </div>
        </div>

        <div class="mt-2 flex flex-col space-y-2 transition-all duration-150 ease-in-out w-full"
             :class="open ? 'h-30 opacity-100 overflow:visible' : 'h-0 opacity-0 overflow-hidden'">
            <a href="{{ asset('/admin/dreamup/order') }} " class="pl-11 flex items-center rounded-md w-full h-12 hover:bg-zinc-400/15 hover:text-white group text-base mb-2">Danh sách đơn hàng</a>
            <a href="{{ asset('/admin/dreamup/order-return') }}" class="pl-11 flex items-center rounded-md w-full h-12 hover:bg-zinc-400/15 hover:text-white group text-base">Khách trả hàng</a>
        </div>
    </div>

    <div x-data="{ open: false }" class="w-full mt-2">
        <div @click="open = !open" class="h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
            <div class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
                <i class="fa-solid fa-mug-saucer text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
                <p class="h-4 text-base">Sản phẩm</p>
                <i class="fa-solid fa-chevron-down ml-auto mr-4 transition-transform" :class="{ 'rotate-180': open }"></i>
            </div>
        </div>

        <div class="mt-2 flex flex-col space-y-2 transition-all duration-150 ease-in-out w-full"
             :class="open ? 'h-30 opacity-100 overflow:visible' : 'h-0 opacity-0 overflow-hidden'">
            <a href="{{ asset('/admin/dreamup/product') }} " class="pl-11 flex items-center rounded-md w-full h-12 hover:bg-zinc-400/15 hover:text-white group text-base mb-2">Danh sách sản phẩm</a>
            <a href="{{ asset('/admin/dreamup/product-category') }}" class="pl-11 flex items-center rounded-md w-full h-12 hover:bg-zinc-400/15 hover:text-white group text-base">Nhóm sản phẩm</a>
        </div>
    </div>

    <div x-data="{ open: false }" class="w-full mt-2">
        <div @click="open = !open" class="h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
            <div class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
                <i class="fa-solid fa-user text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
                <p class="h-4 text-base">Khách hàng</p>
                <i class="fa-solid fa-chevron-down ml-auto mr-4 transition-transform" :class="{ 'rotate-180': open }"></i>
            </div>
        </div>

        <div class="mt-2 flex flex-col space-y-2 transition-all duration-150 ease-in-out w-full"
             :class="open ? 'h-30 opacity-100 overflow:visible' : 'h-0 opacity-0 overflow-hidden'">
            <a href="{{ asset('/admin/dreamup/customer') }} " class="pl-11 flex items-center rounded-md w-full h-12 hover:bg-zinc-400/15 hover:text-white group text-base mb-2">Danh sách khách hàng</a>
            <a href="{{ asset('/admin/dreamup/customer-category') }}" class="pl-11 flex items-center rounded-md w-full h-12 hover:bg-zinc-400/15 hover:text-white group text-base">Nhóm khách hàng</a>
        </div>
    </div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <a href="{{ asset('/admin/dreamup/import-order') }}" class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
            <i class="fa-solid fa-truck-ramp-box text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base">Nhập hàng</p>
        </a>
    </div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <a href="{{ asset('/admin/dreamup/stock') }}" class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
            <i class="fa-solid fa-warehouse text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base">Quản lí kho</p>
        </a>
    </div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <a href="{{ asset('/admin/dreamup/packaging') }}" class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
            <i class="fa-solid fa-box-open text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base">Quản lý đóng gói</p>
        </a>
    </div>

    <div x-data="{ open: false }" class="w-full mt-2">
        <div @click="open = !open" class="h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
            <div class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
                <i class="fa-solid fa-shop text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
                <p class="h-4 text-base">Nhà cung cấp</p>
                <i class="fa-solid fa-chevron-down ml-auto mr-4 transition-transform" :class="{ 'rotate-180': open }"></i>
            </div>
        </div>

        <div class="mt-2 flex flex-col space-y-2 transition-all duration-150 ease-in-out w-full"
             :class="open ? 'h-30 opacity-100 overflow:visible' : 'h-0 opacity-0 overflow-hidden'">
            <a href="{{ asset('/admin/dreamup/supplier') }} " class="pl-11 flex items-center rounded-md w-full h-12 hover:bg-zinc-400/15 hover:text-white group text-base mb-2">Nhà cung cấp</a>
            <a href="{{ asset('/admin/dreamup/supplier-category') }}" class="pl-11 flex items-center rounded-md w-full h-12 hover:bg-zinc-400/15 hover:text-white group text-base">Nhóm nhà cung cấp</a>
        </div>
    </div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <a href="{{ asset('/admin/dreamup/discount') }}" class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
            <i class="fa-solid fa-tags text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base">Khuyến mãi</p>
        </a>
    </div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <button wire:click="setPage('loyalty')" class="flex flex-row flex items-center space-x-4 w-full ml-3 cursor-pointer">
            <i class="fa-solid fa-web-awesome text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base">Loyaly</p>
        </button>
    </div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <button wire:click="setPage('affiliates')" class="flex items-center space-x-4 w-full ml-3">
            <i class="fa-solid fa-comment-dots text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base">Affiliates</p>
        </button>
    </div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <button wire:click="setPage('permission')" class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
            <i class="fa-solid fa-user-pen text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base">Phân quyền</p>
        </button>
    </div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <button wire:click="setPage('statistic')" class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
            <i class="fa-solid fa-chart-simple text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base">Báo cáo</p>
        </button>
    </div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <a href="{{ asset('/admin/dreamup/user') }}" class="flex items-center space-x-4 w-full ml-3 cursor-pointer">
            <i class="fa-solid fa-circle-user text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base">Quản lý người dùng</p>
        </a>
    </div>

    <div class="mb-2 h-14 flex rounded-md hover:bg-zinc-400/15 hover:text-white group">
        <form id="logout-form" action="{{ route('jwt-logout') }}" method="GET" class="hidden">
{{--            @csrf--}}
        </form>
        <button type="submit" form="logout-form" class="flex items-center space-x-4 w-full ml-3">
            <i class="fa-solid fa-right-from-bracket text-gray-400 text-base h-4 w-4 group-hover:text-white"></i>
            <p class="h-4 text-base"><span id="username">Đăng xuất</span></p>
        </button>
    </div>
</div>

