<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->bigInteger('discount_percent')->after('price');
            $table->bigInteger('discount_value')->after('discount_percent');
            $table->bigInteger('total_amount')->after('discount_value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn('discount_percent');
            $table->dropColumn('discount_value');
            $table->dropColumn('total_amount');
        });
    }
};
