<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $table = 'order_details';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['order_id', 'product_SKU', 'quantity', 'price' , 'discount_percent', 'discount_value', 'total_amount'];
}
