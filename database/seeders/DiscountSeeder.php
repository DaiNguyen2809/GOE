<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discounts')->insert([
            ['id' => 'KSM00001', 'type' => 'amount', 'value' => 150, 'min_order_value' => 100, 'max_discount' => '150', 'start_date' => '2024/11/20/', 'end_date' => '2025/04/03', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 'KSM00002', 'type' => 'percentage', 'value' => 10, 'min_order_value' => 100, 'max_discount' => '70', 'start_date' => '2024/12/31', 'end_date' => '2025/12/31', 'status' => 'expired', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 'KSM00003', 'type' => 'amount', 'value' => 20, 'min_order_value' => 100, 'max_discount' => '2000', 'start_date' => '2023/11/14', 'end_date' => '2024/09/02', 'status' => 'disabled', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
