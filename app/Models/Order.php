<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $table = 'orders';

    public $primaryKey = 'id';

    public $incrementing = false;

    public $keyType = 'string';

    protected $fillable = ['customer_id' ,'staff_id', 'discount_id', 'individual_discount_type', 'individual_discount_value', 'sub_total', 'total_after_discount', 'debt', 'customer_paid', 'shipping_fee', 'support_fee', 'note', 'tag', 'status', 'payment_status', 'payment_date', 'payment_cat'];

    public static function boot() {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->id)) {
                $lastestOrder = Order::where('id', 'like', 'SONO%')->latest('id')->first();

                if ($lastestOrder) {
                    $lastestOrder = (int) substr($lastestOrder->id, 5);
                    $newNumber = str_pad($lastestOrder + 1, 5, "0", STR_PAD_LEFT);
                } else
                    $newNumber = '00000';

                $order->id = 'SONO' . $newNumber;
            }
        });
    }
}
