<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoastLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roast_levels')->insert([
            ['id' => 'L', 'name' => 'Nhạt'],
            ['id' => 'LM', 'name' => 'Nhạt vừa'],
            ['id' => 'M', 'name' => 'Vừa'],
            ['id' => 'MD', 'name' => 'Đậm vừa'],
            ['id' => 'D', 'name' => 'Đậm'],
        ]);
    }
}
