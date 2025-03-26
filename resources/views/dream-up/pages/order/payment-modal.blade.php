<div id="payment-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden text-sm">
    <form action="{{ route('od-payment', $formattedOrder['id']) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg w-[35%] relative h-fit !z-99 flex flex-col">
        @csrf
        @method('PUT')
        <button type="button" onclick="handleCloseContent('payment-modal')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-2xl"><i class="fa-solid fa-xmark"></i></button>
        <h2 class="text-xl font-gilroy_md text-center">Xác nhận thanh toán</h2>
        <div class="bg-gray-300 w-full h-px mt-2"></div>
        <div class="flex justify-between mt-4">
            <div class="w-[49%]">
                <label>Phương thức thanh toán<p class="text-red-600 inline-block mr-2">*</p></label>
                <div class="relative w-full">
                    <select name="payment_cat" class="inline-block mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                        <option value="" disabled>Chọn phương thức thanh toán</option>
                        @foreach($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                        @endforeach
                    </select>
                    <!-- Tạo mũi tên bằng CSS -->
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <div class="w-0 h-0 border-l-4 border-r-4 border-l-transparent border-r-transparent border-t-4 border-t-gray-500"></div>
                    </div>
                </div>
            </div>

            <div class="w-[49%]">
                <label>Số tiền <p class="text-red-600 inline-block mr-2">*</p></label>
                <input name="cs_paid" oninput="handleValidateDecimalInput(this)" id="amount_qr" class="mt-2 w-full h-10 text-right pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" value="{{ number_format($formattedOrder['debt'], 0, '.', ',') }}">
            </div>
        </div>

        <div class="w-full mt-4">
            <label>Ngày thanh toán<p class="text-red-600 inline-block mr-2">*</p></label>
            <input readonly name="payment_date" class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-600 bg-gray-100 text-gray-600 cursor-not-allowed rounded-md focus:outline-none " type="text" value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}">
        </div>

        <div class="flex mt-8 justify-end">
            <button type="button" onclick="handleCloseContent('payment-modal')" class="w-[20%] 2xl:w-[30%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer text-center text-sm">Thoát</button>
            <button type="submit" class="w-[20%] 2xl:w-[30%] px-4 py-2 ml-4 bg-blue-600 border border-blue-600 text-white font-gilroy rounded-md cursor-pointer text-center text-sm">Thanh toán đơn hàng</button>
        </div>
    </form>
</div>
