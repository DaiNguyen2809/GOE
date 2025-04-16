<div id="confirm-pk-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden text-sm">
    <form action="{{ route('pk-confirm') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg w-[35%] relative h-fit !z-99 flex flex-col">
        @csrf
        <button type="button" onclick="handleCloseContent('confirm-pk-modal')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-2xl"><i class="fa-solid fa-xmark"></i></button>
        <h2 class="text-xl font-gilroy_md text-center">Xác nhận đã đóng gói </h2>
        <div class="bg-gray-300 w-full h-px mt-2"></div>
        <div class="flex justify-between mt-4">
            <div class="w-[49%]">
                <input type="hidden" name="order_id" value="{{ $packagingOrder->order_id }}">
                <label>Đơn hàng đóng gói</label>
                <input name="id" id="order_id" class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-600 bg-gray-100 text-gray-600 cursor-not-allowed rounded-md focus:outline-none h-10" value="{{ $packagingOrder->id }}">
            </div>
            <div class="w-[49%]">
                <label>Nhân viên đóng gói</label>
                <div class="relative w-full">
                    <select name="packaging_staff" class="inline-block mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                        <option value="" disabled>Chọn phương nhân viên đóng gói</option>
                        @foreach($staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                        @endforeach
                    </select>
                    <!-- Tạo mũi tên bằng CSS -->
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <div class="w-0 h-0 border-l-4 border-r-4 border-l-transparent border-r-transparent border-t-4 border-t-gray-500"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full mt-4">
            <label>Ngày xác nhận đóng gói</label>
            <input readonly name="confirm_date" class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-600 bg-gray-100 text-gray-600 cursor-not-allowed rounded-md focus:outline-none h-10" type="text" value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}">
        </div>

        <div class="flex mt-8 justify-end">
            <button type="button" onclick="handleCloseContent('confirm-pk-modal')" class="w-[20%] 2xl:w-[30%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer text-center text-sm">Thoát</button>
            <button type="submit" class="w-[40%] 2xl:w-[30%] px-4 py-2 ml-4 bg-blue-600 border border-blue-600 text-white font-gilroy rounded-md cursor-pointer text-center text-sm">Xác nhận đóng gói</button>
        </div>
    </form>
</div>
