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
        Schema::create('packaging_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',100);
            $table->timestamp('order_date');
            $table->timestamp('cofirm_date')->nullable();
            $table->timestamp('cancel_date')->nullable();
            $table->string('request_staff',100)->nullable();
            $table->string('packaging_staff',100)->nullable();
            $table->string('cancel_staff',100)->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packaging_orders');
    }
};
