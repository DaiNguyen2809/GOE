<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grind extends Model
{
    use HasFactory;

    protected $table = 'grinds';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['name'];
}
