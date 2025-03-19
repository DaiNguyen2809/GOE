<?php
namespace App\Helpers;
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
            'paid' => 'w-3 h-3 rounded-full bg-black',
            'unpaid' => 'w-3 h-3 rounded-full border-2 border-black'
        };
    }

    public static function getStatusPayment($status)
    {
        return match ($status) {
            'paid' => 'Đã thanh toán',
            'unpaid' => 'Chưa thanh toán'
        };
    }
}
