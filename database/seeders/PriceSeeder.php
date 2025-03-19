<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\table;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('prices')->insert([
           ['SKU' => 'T-AHB-1', 'type_id' => '100kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHB-1', 'type_id' => '10kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHB-1', 'type_id' => '50kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHB-1', 'type_id' => '5kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHB-1', 'type_id' => 'agency', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHB-1', 'type_id' => 'contributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHB-1', 'type_id' => 'distributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHB-1', 'type_id' => 'import', 'price' => '53146', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHB-1', 'type_id' => 'retail', 'price' => '95000', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHB-1', 'type_id' => 'wholesale', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],

           ['SKU' => 'T-AHG-1', 'type_id' => '100kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHG-1', 'type_id' => '10kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHG-1', 'type_id' => '50kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHG-1', 'type_id' => '5kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHG-1', 'type_id' => 'agency', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHG-1', 'type_id' => 'contributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHG-1', 'type_id' => 'distributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHG-1', 'type_id' => 'import', 'price' => '53146', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHG-1', 'type_id' => 'retail', 'price' => '95000', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-AHG-1', 'type_id' => 'wholesale', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],

           ['SKU' => 'T-SWB-1', 'type_id' => '100kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWB-1', 'type_id' => '10kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWB-1', 'type_id' => '50kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWB-1', 'type_id' => '5kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWB-1', 'type_id' => 'agency', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWB-1', 'type_id' => 'contributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWB-1', 'type_id' => 'distributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWB-1', 'type_id' => 'import', 'price' => '53294', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWB-1', 'type_id' => 'retail', 'price' => '85000', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWB-1', 'type_id' => 'wholesale', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],

           ['SKU' => 'T-SWG-1', 'type_id' => '100kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWG-1', 'type_id' => '10kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWG-1', 'type_id' => '50kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWG-1', 'type_id' => '5kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWG-1', 'type_id' => 'agency', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWG-1', 'type_id' => 'contributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWG-1', 'type_id' => 'distributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWG-1', 'type_id' => 'import', 'price' => '53294', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWG-1', 'type_id' => 'retail', 'price' => '85000', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SWG-1', 'type_id' => 'wholesale', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],

           ['SKU' => 'T-SBB-1', 'type_id' => '100kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBB-1', 'type_id' => '10kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBB-1', 'type_id' => '50kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBB-1', 'type_id' => '5kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBB-1', 'type_id' => 'agency', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBB-1', 'type_id' => 'contributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBB-1', 'type_id' => 'distributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBB-1', 'type_id' => 'import', 'price' => '54518', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBB-1', 'type_id' => 'retail', 'price' => '70000', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBB-1', 'type_id' => 'wholesale', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],

           ['SKU' => 'T-SBG-1', 'type_id' => '100kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBG-1', 'type_id' => '10kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBG-1', 'type_id' => '50kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBG-1', 'type_id' => '5kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBG-1', 'type_id' => 'agency', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBG-1', 'type_id' => 'contributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBG-1', 'type_id' => 'distributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBG-1', 'type_id' => 'import', 'price' => '54518', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBG-1', 'type_id' => 'retail', 'price' => '70000', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-SBG-1', 'type_id' => 'wholesale', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],

           ['SKU' => 'T-MDG-1', 'type_id' => '100kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDG-1', 'type_id' => '10kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDG-1', 'type_id' => '50kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDG-1', 'type_id' => '5kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDG-1', 'type_id' => 'agency', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDG-1', 'type_id' => 'contributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDG-1', 'type_id' => 'distributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDG-1', 'type_id' => 'import', 'price' => '52774', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDG-1', 'type_id' => 'retail', 'price' => '106000', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDG-1', 'type_id' => 'wholesale', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],

           ['SKU' => 'T-MDB-1', 'type_id' => '100kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDB-1', 'type_id' => '10kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDB-1', 'type_id' => '50kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDB-1', 'type_id' => '5kg', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDB-1', 'type_id' => 'agency', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDB-1', 'type_id' => 'contributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDB-1', 'type_id' => 'distributor', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDB-1', 'type_id' => 'import', 'price' => '52774', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDB-1', 'type_id' => 'retail', 'price' => '106000', 'created_at' => now(), 'updated_at' => now()],
           ['SKU' => 'T-MDB-1', 'type_id' => 'wholesale', 'price' => '0', 'created_at' => now(), 'updated_at' => now()],
       ]);
    }
}
