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

    protected $fillable = ['staff_id', 'discount_id', 'individual_discount_type', 'individual_discount_value', 'total_price', 'order_status', 'created_at', 'updated_at'];
}
