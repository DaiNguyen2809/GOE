<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $keyType = 'string';
    protected $primaryKey = 'SKU';
    public $incrementing = false;

    protected $fillable = ['SKU', 'name', 'product_category', 'description', 'product_tag', 'grind', 'barcode', 'weight', 'unit_weight', 'image', 'image2', 'image3', 'image4', 'image5', 'image6', 'image7', 'image8', 'unit_package', 'roast_level'];

    public $timestamps = true;

}
