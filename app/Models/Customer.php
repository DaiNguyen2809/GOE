<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $table = 'customers';
    protected $keyType = 'string';

    protected $fillable = ['id', 'name', 'customer_category', 'phone', 'birthday', 'gender', 'customer_description', 'customer_tag', 'debt', 'total_expenditure', 'number_orders', 'total_products', 'total_return_products', 'point', 'default_discount', 'email', 'affiliates_code', 'special_code', 'created_at', 'updated_at'];

    public $incrementing = false;

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($customer) {
            if (empty($customer->id)) {
                $lastestCustomer = Customer::where('id', 'like', 'CUZN%')->latest('id')->first();

                if ($lastestCustomer) {
                    $lastestCustomer = (int) substr($lastestCustomer->id, 4);
                    $newNumber = str_pad($lastestCustomer + 1, 4, "0", STR_PAD_LEFT);
                } else
                    $newNumber = '0000';

                $customer->id = 'CUZN' . $newNumber;
            }
        });
    }
}
