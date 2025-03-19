<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // 1. Xóa khóa chính cũ
            $table->dropPrimary();

            // 2. Đổi kiểu dữ liệu của ID từ BIGINT thành STRING
            DB::statement('ALTER TABLE users MODIFY COLUMN id VARCHAR(100) NOT NULL');

            // 3. Đặt lại khóa chính
            $table->primary('id');

            // 4. Thêm cột role
            $table->tinyInteger('role')->default(0);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // 1. Xóa khóa chính mới
            $table->dropPrimary();

            // 2. Đổi lại kiểu ID về BIGINT
            DB::statement('ALTER TABLE users MODIFY COLUMN id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');

            // 3. Đặt lại khóa chính
            $table->primary('id');

            // 4. Xóa cột role
            $table->dropColumn('role');
        });
    }
};
