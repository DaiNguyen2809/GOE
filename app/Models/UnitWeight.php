<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitWeight extends Model
{
    use HasFactory;

    protected $table = 'unit_weights';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = ['name'];
}
