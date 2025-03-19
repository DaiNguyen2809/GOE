<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
           ['id' => 'SONO00001', 'customer_id' => 'CUZN0011', 'staff_id' => 'KNG', 'discount_id' => 'KSM00002',
               'individual_discount_type' => 'percentage', 'individual_discount_value' => '10.00', 'sub_total' => 480.00,
               'total_after_discount' => 378.59, 'debt' => 123.00, 'customer_paid' => 255.59, 'shipping_fee' => 0,
               'support_fee' => 10.00, 'note' => '', 'tag' => '', 'created_at' => now(), 'updated_at' => now(),
               'status' => 'completed', 'payment_status' => 'unpaid'],
        ]);
    }
}
