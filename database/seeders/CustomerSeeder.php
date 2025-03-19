<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            ['id' => 'CUZN00001', 'name' => 'Nguyen Quoc Dai', 'customer_category' => 'GOE', 'phone' => '0778786727', 'birthday' => '2003-09-28', 'gender' => 'Nam', 'customer_description' => '', 'debt' => 0, 'total_expenditure' => 0, 'number_orders' => 12, 'total_products' => 13, 'total_return_products' => 0, 'point' => 0, 'default_discount' => 80, 'email' => 'nhochiprow13@gmail.com', 'affiliates_code' => '', 'special_code' => ''],
            ['id' => 'CUZN00002', 'name' => 'Nguyen Quoc Duy', 'customer_category' => 'GOE', 'phone' => '0704479856', 'birthday' => '1998-09-19', 'gender' => 'Nam', 'customer_description' => '', 'debt' => 0, 'total_expenditure' => 0, 'number_orders' => 12, 'total_products' => 13, 'total_return_products' => 0, 'point' => 0, 'default_discount' => 80, 'email' => 'nqd@gmail.com', 'affiliates_code' => '', 'special_code' => ''],
            ['id' => 'CUZN00003', 'name' => 'To Thuy Trang', 'customer_category' => 'GOE', 'phone' => '0778786727', 'birthday' => '1997-09-28', 'gender' => 'Nữ', 'customer_description' => '', 'debt' => 0, 'total_expenditure' => 0, 'number_orders' => 12, 'total_products' => 13, 'total_return_products' => 0, 'point' => 0, 'default_discount' => 80, 'email' => 'trangtoo@gmail.com', 'affiliates_code' => '', 'special_code' => ''],
            ['id' => 'CUZN00004', 'name' => 'To Huyen Thanh', 'customer_category' => 'GOE', 'phone' => '0778786727', 'birthday' => '1999-05-12', 'gender' => 'Nữ', 'customer_description' => '', 'debt' => 0, 'total_expenditure' => 0, 'number_orders' => 12, 'total_products' => 13, 'total_return_products' => 0, 'point' => 0, 'default_discount' => 80, 'email' => 'thanhtoo@gmail.com', 'affiliates_code' => '', 'special_code' => ''],
            ['id' => 'CUZN00005', 'name' => 'Duong Ngoc Nha Thi', 'customer_category' => 'GOE', 'phone' => '0778786727', 'birthday' => '1999-01-07', 'gender' => 'Nữ', 'customer_description' => '', 'debt' => 0, 'total_expenditure' => 0, 'number_orders' => 12, 'total_products' => 13, 'total_return_products' => 0, 'point' => 0, 'default_discount' => 80, 'email' => 'nhathi@gmail.com', 'affiliates_code' => '', 'special_code' => ''],
            ['id' => 'CUZN00006', 'name' => 'Nguyen Dinh Quang', 'customer_category' => 'GOE', 'phone' => '0778786727', 'birthday' => '2001-09-28', 'gender' => 'Nam', 'customer_description' => '', 'debt' => 0, 'total_expenditure' => 0, 'number_orders' => 12, 'total_products' => 13, 'total_return_products' => 0, 'point' => 0, 'default_discount' => 80, 'email' => 'ndq2k1@gmail.com', 'affiliates_code' => '', 'special_code' => ''],
        ]);
    }
}
