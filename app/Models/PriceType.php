<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceType extends Model
{
    use HasFactory;

    protected $table = 'price_types';
    protected $primaryKey = 'type_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['type_id','name','description'];
}
