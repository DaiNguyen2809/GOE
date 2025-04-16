<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagingOrder extends Model
{
    use HasFactory;

    public $table = 'packaging_orders';

    public $incrementing = true;

    public $timestamps = true;

    public $fillable = ['order_id', 'order_date', 'confirm_date', 'cancel_date', 'request_staff', 'packaging_staff', 'cacnel_staff', 'status'];

}
