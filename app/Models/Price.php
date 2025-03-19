<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $table = 'prices';

    public $timestamps = true;

    public $incrementing = true;

    protected $fillable = ['SKU', 'type_id', 'price'];
}
