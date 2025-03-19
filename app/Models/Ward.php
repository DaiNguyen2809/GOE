<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public $table = 'wards';
    public $incrementing = true;
    public $timestamps = true;
    public $fillable = ['area_id', 'name'];
}
