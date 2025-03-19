<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('price_types')->insert([
            ['type_id' => 'retail', 'name' => 'Giá bán lẻ', 'description' => 'Khách lẻ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type_id' => 'wholesale', 'name' => 'Giá bán lẻ', 'description' => 'Khách sỉ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type_id' => 'contributor', 'name' => 'Cộng tác viên', 'description' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type_id' => 'distributor', 'name' => 'Nhà phân phối', 'description' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type_id' => '100kg', 'name' => 'Quán 100kg', 'description' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type_id' => '50kg', 'name' => 'Quán sỉ 50kg', 'description' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type_id' => '10kg', 'name' => 'Quán sỉ 10kg', 'description' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type_id' => '5kg', 'name' => 'Quán sỉ 5kg', 'description' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type_id' => 'import', 'name' => 'Giá nhập', 'description' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type_id' => 'agency', 'name' => 'Đại lý', 'description' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
