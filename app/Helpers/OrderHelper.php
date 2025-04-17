<?php
namespace App\Helpers;
use App\Models\Order;
class OrderHelper {
    public static function getStatusText($status)
    {
        return match ($status) {
            'pending' => 'Đặt hàng',
            'payment' => 'Đang giao dịch',
            'packaging' => 'Chờ đóng gói',
            'packed' => 'Đã đóng gói',
            'canceled' => 'Đã hủy',
            'completed' => 'Hoàn thành',
        };
    }

    public static function getStatusClass($status)
    {
        return match ($status) {
            'pending' => 'bg-blue-100 text-blue-600 border border-blue-600',
            'payment' => 'bg-yellow-100 text-yellow-600 border border-yellow-600',
            'packaging' => 'bg-pink-100 text-pink-600 border border-pink-600',
            'packed' => 'bg-purple-100 text-purple-600 border border-purple-600 ',
            'canceled' => 'bg-red-100 text-red-600 border border-red-600 ',
            'completed' => 'bg-green-100 text-green-600 border border-green-600',
        };
    }

    public static function getIconPayment($status) {
        return match ($status) {
            'paid' => '<i class="fa-solid fa-square-check text-green-600 text-base"></i>',
            'unpaid' => '<i class="fa-solid fa-square-xmark text-red-600 text-base"></i>',
        };
    }

    public static function getStatusPayment($status)
    {
        return match ($status) {
            'paid' => 'Đã thanh toán',
            'unpaid' => 'Chưa thanh toán'
        };
    }

    public static function getStatusPaymentText($status)
    {
        return match ($status) {
            'paid' => 'Đơn hàng đã thanh toán',
            'unpaid' => 'Đơn hàng chờ thanh toán'
        };
    }

    public static function getStatusCancelButton($status, $id)
    {
        return match ($status) {
            'pending' => '<button onclick="handleConfirmDelete(\'' . $id . '\', \'od-modal-cancel\', \'od-form-cancel\', \'' . route('od-cancel', '__id__') . '\')" type="button" class="w-[20%] 2xl:w-[13%] px-4 py-2 ml-4 bg-white border border-red-600 text-red-600 font-gilroy rounded-md cursor-pointer hover:bg-red-600 hover:text-white text-center text-sm"><i class="fa-solid fa-xmark mr-2"></i>Hủy đơn hàng</button>',
            'payment' => '<button onclick="handleConfirmDelete(\'' . $id . '\', \'od-modal-cancel\', \'od-form-cancel\', \'' . route('od-cancel', '__id__') . '\')" type="button" class="w-[20%] 2xl:w-[13%] px-4 py-2 ml-4 bg-white border border-red-600 text-red-600 font-gilroy rounded-md cursor-pointer hover:bg-red-600 hover:text-white text-center text-sm"><i class="fa-solid fa-xmark mr-2"></i>Hủy đơn hàng</button>',
            'packaging' => '<button onclick="handleConfirmDelete(\'' . $id . '\', \'od-modal-cancel\', \'od-form-cancel\', \'' . route('od-cancel', '__id__') . '\')" type="button" class="w-[20%] 2xl:w-[13%] px-4 py-2 ml-4 bg-white border border-red-600 text-red-600 font-gilroy rounded-md cursor-pointer hover:bg-red-600 hover:text-white text-center text-sm"><i class="fa-solid fa-xmark mr-2"></i>Hủy đơn hàng</button>',
            'packed' => '<button style="cursor: not-allowed !important;" class="w-[20%] 2xl:w-[10%] px-4 py-2 ml-4 bg-gray-100 border border-gray-600 text-gray-600 font-gilroy rounded-md text-center text-sm"><i class="fa-solid fa-xmark mr-2"></i></i>Hủy đơn hàng</button>',
            'canceled' => '<button style="cursor: not-allowed !important;" class="w-[20%] 2xl:w-[10%] px-4 py-2 ml-4 bg-gray-100 border border-gray-600 text-gray-600 font-gilroy rounded-md !cursor-not-allowed text-center text-sm"><i class="fa-solid fa-xmark mr-2"></i></i>Hủy đơn hàng</button>',
            'completed' => '<button style="cursor: not-allowed !important;" class="w-[20%] 2xl:w-[10%] px-4 py-2 ml-4 bg-gray-100 border border-gray-600 text-gray-600 font-gilroy rounded-md !cursor-not-allowed text-center text-sm"><i class="fa-solid fa-xmark mr-2"></i></i>Hủy đơn hàng</button>',
        };
    }

    public static function getStatusApprovalButton($status, $id)
    {
        return match ($status) {
            'pending' => '<button onclick="handleConfirmDelete(\'' . $id . '\', \'od-modal-approval\', \'od-form-approval\', \'' . route('od-approval', '__id__') . '\')" type="button" class="w-[22%] 2xl:w-[15%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-check mr-2"></i>Duyệt đơn hàng</button>',
            'payment' => '<button onclick="handleShowContent(\'packaging-modal\')" class="w-[22%] 2xl:w-[15%] px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center text-sm"><i class="fa-solid fa-box mr-2"></i>Yêu cầu đóng gói</button>',
            'packaging' => '',
            'packed' => '',
            'canceled' => '',
            'completed' => '',
        };
    }

    public static function getStatusUpdateButton($status, $id)
    {
        $order = Order::find($id);
        return match ($status) {
            'pending' => '<a href="'.route('od-edit', $id).'" class="w-[24%] 2xl:w-[16%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-pen-to-square mr-2"></i></i>Cập nhật đơn hàng</a>',
            'payment' => ($order && $order->payment_status === 'unpaid')
                ? '<a href="'.route('od-edit', $id).'" class="w-[24%] 2xl:w-[16%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-pen-to-square mr-2"></i>Cập nhật đơn hàng</a>'
                : '',
            'packaging' => '',
            'packed' => '',
            'canceled' => '',
            'completed' => '',
        };
    }

    public static function getQrCodeButton($status)
    {
        return match ($status) {
            'paid' => '',
            'unpaid' => '<span onclick="handleShowContent(\'qr-modal\')" class="w-[12%] 2xl:w-[16%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-solid fa-qrcode mr-2"></i>Tạo mã chuyển khoản</span>'
        };
    }

    public static function getPaymentButton($status)
    {
        return match ($status) {
            'paid' => '',
            'unpaid' => '<span onclick="handleShowContent(\'payment-modal\')" class="w-[12%] 2xl:w-[16%] px-4 py-2 ml-4 bg-white border border-blue-600 text-blue-600 font-gilroy rounded-md cursor-pointer hover:bg-blue-600 hover:text-white text-center text-sm"><i class="fa-regular fa-credit-card mr-2"></i>Thanh toán</span>'
        };
    }
}
