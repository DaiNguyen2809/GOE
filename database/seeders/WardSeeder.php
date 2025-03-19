<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wards')->insert([
            // Hà Nội - Thị xã Sơn Tây 1
            ['area_id' => 1, 'name' => 'Phường Lê Lợi', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Phường Phú Thịnh', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Phường Ngô Quyền', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Phường Quang Trung', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Phường Sơn Lộc', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Phường Xuân Khanh', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Xã Đường Lâm', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Phường Viên Sơn', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Xã Xuân Sơn', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Phường Trung Hưng', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Phường Trung Sơn Trầm', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Xã Kim Sơn', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Xã Sơn Đông', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Xã Cổ Đông', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 1, 'name' => 'Phường Lê Lợi', 'created_at' => now(), 'updated_at' => now()],
            // Hà Nội - Quận Ba Đình 2
            ['area_id' => 2, 'name' => 'Phường Phúc Xá', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Trúc Bạch', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Vĩnh Phúc', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Cống Vị', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Liễu Giai', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Nguyễn Trung Trực', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Quán Thánh', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Điện Biên', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Đội Cấn', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Ngọc Khánh', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Kim Mã', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Giảng Võ', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 2, 'name' => 'Phường Thành Công', 'created_at' => now(), 'updated_at' => now()],
            // Hà Nội - Quận Cầu Giấy 3
            ['area_id' => 3, 'name' => 'Phường Thành Công', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 3, 'name' => 'Phường Nghĩa Đô', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 3, 'name' => 'Phường Nghĩa Tân', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 3, 'name' => 'Phường Mai Dịch', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 3, 'name' => 'Phường Dịch Vọng', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 3, 'name' => 'Phường Dịch Vọng Hậu', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 3, 'name' => 'Phường Yên Hòa', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 3, 'name' => 'Phường Trung Hòa', 'created_at' => now(), 'updated_at' => now()],
            // Hà Nội - Quận Đống Đa 4
            ['area_id' => 4, 'name' => 'Phường Cát Linh', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Văn Miếu', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Quốc Tử Giám', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Láng Thượng', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Ô Chợ Dừa', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Văn Chương', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Hàng Bột', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Láng Hạ', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Khâm Thiên', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Thổ Quan', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Nam Đồng', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Trung Phụng', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Quang Trung', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Trung Liệt', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Phương Liên', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Thịnh Quang', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Trung Tự', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Kim Liên', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Phương Mai', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Ngã Tư Sở', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 4, 'name' => 'Phường Khương Thượng', 'created_at' => now(), 'updated_at' => now()],
            // Hà Nội - Quận Hà Đông 5
            ['area_id' => 5, 'name' => 'Phường Nguyễn Trãi', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Mộ Lao', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Văn Quán', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Vạn Phúc', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Yết Kiêu', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Quang Trung', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường La Khê', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Phú La', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Phúc La', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Hà Cầu', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Yên Nghĩa', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Kiến Hưng', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Phú Lãm', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Phú Lương', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Dương Nội', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Đồng Mai', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 5, 'name' => 'Phường Biên Giang', 'created_at' => now(), 'updated_at' => now()],
            // Hà Nội - Quận Hai Bà Trưng 6
            ['area_id' => 6, 'name' => 'Phường Nguyễn Du', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Bạch Đằng', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Phạm Đình Hổ', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Bùi Thị Xuân', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Ngô Thì Nhậm', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Lê Đại Hành', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Đồng Nhân', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Phố Huế', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Đống Mác', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Thanh Lương', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Thanh Nhàn', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Cầu Dền', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Bách Khoa', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Đồng Tâm', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Vĩnh Tuy', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Bạch Mai', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Quỳnh Mai', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Quỳnh Lôi', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Minh Khai', 'created_at' => now(), 'updated_at' => now()],
            ['area_id' => 6, 'name' => 'Phường Trương Định', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
























