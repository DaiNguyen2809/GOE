<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_details')->insert([
            ['id' => 1, 'order_id' => 'SONO00001', 'product_SKU' => 'T-AHB-1', 'quantity' => 2, 'price_id' => 'retail',
               'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'order_id' => 'SONO00001', 'product_SKU' => 'T-SWG-1', 'quantity' => 1, 'price_id' => 'retail',
                'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
