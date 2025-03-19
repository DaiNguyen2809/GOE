<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuantitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quantities')->insert([
            ['SKU' => 'T-AHG-1', 'quantity' => 12],
            ['SKU' => 'T-AHB-1', 'quantity' => 20],
            ['SKU' => 'T-SWG-1', 'quantity' => 10],
            ['SKU' => 'T-SWB-1', 'quantity' => 29],
            ['SKU' => 'T-SBG-1', 'quantity' => 30],
            ['SKU' => 'T-SBB-1', 'quantity' => 2],
            ['SKU' => 'T-MDG-1', 'quantity' => 40],
            ['SKU' => 'T-MDB-1', 'quantity' => 80],
        ]);
    }
}
