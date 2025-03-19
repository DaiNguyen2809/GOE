<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;

    protected $table = 'quantities';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['SKU', 'quantity'];
}
