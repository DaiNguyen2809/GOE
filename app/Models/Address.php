<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table = 'addresses';
    public $timestamps = true;
    public $fillable = ['ward_id', 'address', 'customer_id'];
    public function addressable()
    {
        return $this->morphTo();
    }
}
