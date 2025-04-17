<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            // Xóa khóa ngoại cũ (nếu bạn biết tên key là 'addresses_customer_id_foreign')
            $table->dropForeign(['customer_id']);
        });

        Schema::table('addresses', function (Blueprint $table) {
            // Thêm lại với ON DELETE CASCADE
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            // Không có onDelete
        });
    }
};
