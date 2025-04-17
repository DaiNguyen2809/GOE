<div id="qr-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden text-sm">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[70%] 2xl:w-[50%] relative h-fit pb-8 !z-99 flex flex-col overflow-auto">
        <button onclick="handleCloseContent('qr-modal')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-2xl"><i class="fa-solid fa-xmark"></i></button>
        <h2 class="text-xl font-gilroy_md text-center">Mã VietQR thanh toán</h2>
        <div class="bg-gray-300 w-full h-px mt-2"></div>
        <div class="flex justify-between mt-4">
            <div class="w-[49%]">
                <label>Phương thức chuyển khoản<p class="text-red-600 inline-block mr-2">*</p></label>
                <select class="inline-block mt-2 w-full h-10 pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right">
                    <option value="" disabled>Chọn tài khoản thanh toán</option>
                </select>
            </div>

            <div class="w-[49%]">
                <label>Số tiền chuyển khoản<p class="text-red-600 inline-block mr-2">*</p></label>
                <input oninput="handleValidateDecimalInput(this)" id="amount_qr" class="mt-2 w-full h-10 text-right pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" value="{{ number_format($formattedOrder['debt'], 0, '.', ',') }}">
            </div>
        </div>

        <div class="w-full mt-4">
            <label>Nội dung chuyển khoản<p class="text-red-600 inline-block mr-2">*</p></label>
            <input id="content_qr" class="mt-2 w-full pl-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" value="Chuyen tien VietQR">
        </div>

        <div id="vietqr-box" class="w-full h-fit py-3 px-3 bg-sky-100 mt-4 flex justify-between">
            <div class="bg-white w-full p-3 flex ">
                <div id="qrCode" class="w-[48%] bg-white"></div>
                <div class="w-[51%] text-xl bg-white flex flex-col items-start justify-center">
                    <div class="w-full flex">
                        <div class="w-[35%] leading-relaxed">
                            <p class="text-gray-400">Tên chủ TK:</p>
                            <p class="text-gray-400">Số TK:</p>
                            <p class="text-gray-400">Số tiền:</p>
                            <p class="text-gray-400">Nội dung CK:</p>
                        </div>
                        <div class="w-[65%] leading-relaxed">
                            <p id="account_name" class="text-black font-gilroy_md"></p>
                            <p id="account_no" class="text-black font-gilroy_md"></p>
                            <p id="amount_qr_show" class="text-black font-gilroy_md"></p>
                            <p id="content_qr_show" class="text-black font-gilroy_md"></p>
                        </div>
                    </div>
                    <img class="mt-4" src="{{ asset('images/colorDreamUp.png') }}" alt="ảnh">
                </div>
            </div>
        </div>

        <div class="flex mt-4 justify-between">
            <button onclick="handleCaptureDivToImage()" class="w-[20%] 2xl:w-[30%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm">Lưu mã</button>
            <button onclick="handleCopyDivToClipboard()" class="w-[20%] 2xl:w-[30%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm">Sao chép ảnh</button>
            <button onclick="handleGenerateQRCode()" class="w-[20%] 2xl:w-[30%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm">Tạo mã QR</button>
        </div>

    </div>
</div>
