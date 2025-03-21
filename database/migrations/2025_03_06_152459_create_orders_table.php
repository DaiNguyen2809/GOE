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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id',100)->primary();
            $table->string('customer_id',100);
            $table->string('staff_id',100);
            $table->string('discount_id',100)->nullable(); // ma giam gia cua khuyen mai -> link voi bang discount
            $table->enum('individual_discount_type', ['percentage', 'amount'])->default('percentage'); // cach tinh chiet khau rieng cho khach
            $table->decimal('individual_discount_value',10,2)->default(0); // chiet khau rieng cho khach
            $table->decimal('sub_total',10,2)->default(0); // tong tien truoc giam gia
            $table->decimal('total_after_discount',10,2)->default(0); // so tien khach phai tra
            $table->decimal('debt',10,2)->default(0); // so tien khach con no
            $table->decimal('customer_paid',10,2)->default(0); // so tien khach da tra
            $table->decimal('shipping_fee',10,2)->default(0); // tien ship
            $table->decimal('support_fee',10,2)->default(0); // tien ho tro
            $table->string('note',255)->nullable();
            $table->string('tag',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
