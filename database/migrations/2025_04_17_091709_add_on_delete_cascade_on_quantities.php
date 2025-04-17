<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quantities', function (Blueprint $table) {
            // Xóa khóa ngoại cũ
            $table->dropForeign(['SKU']);
        });

        Schema::table('quantities', function (Blueprint $table) {
            // Thêm lại với ON DELETE CASCADE
            $table->foreign('SKU',100)
                ->references('SKU')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('quantities', function (Blueprint $table) {
            $table->dropForeign(['SKU']);
        });

        Schema::table('quantities', function (Blueprint $table) {
            $table->foreign('SKU')
                ->references('SKU')
                ->on('products');
        });
    }
};
