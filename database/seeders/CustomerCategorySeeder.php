<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer_categories')->insert([
            ['id' => 'EXPORT', 'name' => 'Xuất khẩu', 'description' => '', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'CTY', 'name' => 'Doanh nghiệp', 'description' => '', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'SHOP', 'name' => 'Quán cà phê', 'description' => '', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'P', 'name' => 'Nhà Phân Phối', 'description' => '', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'D', 'name' => 'Đại lý', 'description' => 'Đại lý Tập sự, Đại lý Chính thức', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'C', 'name' => 'Cộng tác viên', 'description' => 'Cộng tác viên (HT Mơ Ước)', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'PASTOR', 'name' => 'Mục sư', 'description' => 'GOE_tên KH_PS', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'CDN', 'name' => 'Cơ Đốc Nhân', 'description' => '', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'GOE', 'name' => 'Nhân sự GOE', 'description' => '	GOE_TÊN_VỊ TRÍ', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'TRADITION', 'name' => 'Khách hàng thân thiết', 'description' => 'Khách hàng thân thiết lv1', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 'RETAIL', 'name' => 'Khách lẻ', 'description' => 'GOE_Tên KH_KL', 'quantity' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
