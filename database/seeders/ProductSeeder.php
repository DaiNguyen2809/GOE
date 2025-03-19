<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['SKU' => 'T-SBB-1', 'name' => 'STRONG & BOLD', 'product_category' => 'ROASTED', 'description' => '', 'product_tag' => '', 'grind' => '2', 'barcode' => 'T-SBB-1', 'weight' => '250', 'unit_weight' => '1', 'image' => 'images/S&B250.png', 'unit_package' => 'package', 'roast_level' => 'MD', 'created_at' => now(), 'updated_at' => now()],
            ['SKU' => 'T-SBG-1', 'name' => 'STRONG & BOLD', 'product_category' => 'ROASTED', 'description' => '', 'product_tag' => '', 'grind' => '1', 'barcode' => 'T-SBG-1', 'weight' => '250', 'unit_weight' => '1', 'image' => 'images/S&B250.png', 'unit_package' => 'package', 'roast_level' => 'MD', 'created_at' => now(), 'updated_at' => now()],
            ['SKU' => 'T-AHB-1', 'name' => 'AROMATIC HARMONY', 'product_category' => 'ROASTED', 'description' => '', 'product_tag' => '', 'grind' => '2', 'barcode' => 'T-AHB-1', 'weight' => '250', 'unit_weight' => '1', 'image' => 'images/AH250.png', 'unit_package' => 'package', 'roast_level' => 'M', 'created_at' => now(), 'updated_at' => now()],
            ['SKU' => 'T-AHG-1', 'name' => 'AROMATIC HARMONY', 'product_category' => 'ROASTED', 'description' => '', 'product_tag' => '', 'grind' => '1', 'barcode' => 'T-AHG-1', 'weight' => '250', 'unit_weight' => '1', 'image' => 'images/AH250.png', 'unit_package' => 'package', 'roast_level' => 'MD', 'created_at' => now(), 'updated_at' => now()],
            ['SKU' => 'T-SWB-1', 'name' => 'SWEET DELICACY', 'product_category' => 'ROASTED', 'description' => '', 'product_tag' => '', 'grind' => '2', 'barcode' => 'T-SWB-1', 'weight' => '250', 'unit_weight' => '1', 'image' => 'images/SW250.png', 'unit_package' => 'package', 'roast_level' => 'MD', 'created_at' => now(), 'updated_at' => now()],
            ['SKU' => 'T-SWG-1', 'name' => 'SWEET DELICACY', 'product_category' => 'ROASTED', 'description' => '', 'product_tag' => '', 'grind' => '1', 'barcode' => 'T-SWB-1', 'weight' => '250', 'unit_weight' => '1', 'image' => 'images/SW250.png', 'unit_package' => 'package', 'roast_level' => 'MD', 'created_at' => now(), 'updated_at' => now()],
            ['SKU' => 'T-MDB-1', 'name' => 'ARABICA LAM DONG', 'product_category' => 'ROASTED', 'description' => '', 'product_tag' => '', 'grind' => '2', 'barcode' => 'T-MDB-1', 'weight' => '250', 'unit_weight' => '1', 'image' => 'images/AL250.png', 'unit_package' => 'package', 'roast_level' => 'MD', 'created_at' => now(), 'updated_at' => now()],
            ['SKU' => 'T-MDG-1', 'name' => 'ARABICA LAM DONG', 'product_category' => 'ROASTED', 'description' => '', 'product_tag' => '', 'grind' => '1', 'barcode' => 'T-SBB-1', 'weight' => '250', 'unit_weight' => '1', 'image' => 'images/AL250.png', 'unit_package' => 'package', 'roast_level' => 'MD', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
