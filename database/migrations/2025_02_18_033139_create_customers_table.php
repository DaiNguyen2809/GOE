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
        Schema::create('customers', function (Blueprint $table) {
            $table->string('id',100)->primary();
            $table->string('name',100);
            $table->string('customer_category',50);
            $table->string('phone',20);
            $table->date('birthday')->nullable();
            $table->string('gender','10');
            $table->string('customer_description',255)->nullable();
            $table->double('debt')->nullable();
            $table->double('total_expenditure');
            $table->integer('number_orders');
            $table->integer('total_products');
            $table->integer('total_return_products');
            $table->integer('point');
            $table->integer('default_discount')->nullable();
            $table->string('email',255)->unique();
            $table->string('affiliates_code',255)->nullable();
            $table->string('special_code',255)->nullable();

            $table->foreign('customer_category')->references('id')->on('customer_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
