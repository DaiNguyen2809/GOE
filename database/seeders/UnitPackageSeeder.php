<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unit_packages')->insert([
            ['id' => 'sachet', 'name' => 'Túi nhỏ'],
            ['id' => 'package', 'name' => 'Túi'],
            ['id' => 'bag', 'name' => 'Gói'],
            ['id' => 'box', 'name' => 'Hộp'],
            ['id' => 'carton', 'name' => 'Thùng'],
            ['id' => 'bottle', 'name' => 'chai'],
            ['id' => 'giftset', 'name' => 'Hộp quà'],
        ]);
    }
}
