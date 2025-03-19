<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            ['id' => 'ROASTED', 'name' => 'Cà phê rang xay', 'description' => 'Description for category 1', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'INSTANT', 'name' => 'Cà phê hòa tan ', 'description' => 'Description for category 2', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'ESSENCE', 'name' => 'Cốt cà phê', 'description' => 'Description for category 3', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'GEAR', 'name' => 'Dụng cụ pha', 'description' => 'Description for category 4', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
