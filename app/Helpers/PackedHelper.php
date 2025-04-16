<?php
namespace App\Helpers;
use App\Models\PackagingOrder;
use function PHPUnit\Framework\matches;

class PackedHelper {
    public static function getStatus($status)
    {
        return match($status) {
            'pending' => 'p-4 text-center text-violet-600',
            'confirm' => 'p-4 text-center text-green-600',
            'cancel'=> 'p-4 text-center text-red-600',
        };
    }

    public static function getStatusText($status)
    {
        return match($status) {
            'pending' => 'Chờ đóng gói',
            'confirm' => 'Đã đóng gói',
            'cancel'=> 'Hủy đóng gói',
        };
    }

    public static function getCancelButton($status) {
        return match($status) {
            'pending' => '<button onclick="handleShowContent(\'cancel-pk-modal\')" class="w-[18%] 2xl:w-[11%] h-10 px-4 py-2 ml-4 bg-white border border-red-600 text-red-600 font-gilroy rounded-md cursor-pointer hover:bg-red-600 hover:text-white text-center"><i class="fa-solid fa-xmark mr-2"></i> Hủy đóng gói</button>',
            'confirm' => '',
            'cancel'=> '',
        };
    }

    public static function getConfirmButton($status) {
        return match($status) {
            'pending' => '<button onclick="handleShowContent(\'confirm-pk-modal\')" class="w-[25%] 2xl:w-[14%] h-10 px-4 py-2 ml-4 bg-white border border-green-600 text-green-600 font-gilroy rounded-md cursor-pointer hover:bg-green-600 hover:text-white text-center"><i class="fa-solid fa-check mr-2"></i> Hoàn thành đóng gói</button>',
            'confirm' => '',
            'cancel'=> '',
        };
    }
}
