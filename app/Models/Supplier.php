<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}
