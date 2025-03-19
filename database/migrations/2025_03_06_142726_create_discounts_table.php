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
        Schema::create('discounts', function (Blueprint $table) {
            $table->string('id',100)->primary();
            $table->enum('type',['percentage','amount'])->default('amount');
            $table->decimal('value',10,2)->default(0);
            $table->decimal('min_order_value',10,2)->default(0);
            $table->decimal('max_discount',10,2)->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status',['active','expired','disabled'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
