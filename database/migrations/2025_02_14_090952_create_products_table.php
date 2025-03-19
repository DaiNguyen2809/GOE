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
        Schema::create('products', function (Blueprint $table) {
            $table->string('SKU',100)->primary();
            $table->string('name',100);
            $table->string('product_category',50);
            $table->string('description',255)->nullable();
            $table->string('product_tag',15)->nullable();
            $table->unsignedBigInteger('grind');
            $table->string('barcode',15)->nullable();
            $table->decimal('weight',8,2)->default(0.00);
            $table->unsignedBigInteger('unit_weight')->default(0);
            $table->string('image',255);
            $table->string('unit_package',100);
            $table->string('roast_level',5);
            $table->string('size',10);
            $table->timestamps();

            $table->foreign('grind')->references('id')->on('grinds')->onDelete('cascade');
            $table->foreign('unit_weight')->references('id')->on('unit_weights')->onDelete('cascade');
            $table->foreign('product_category')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('unit_package')->references('id')->on('unit_packages')->onDelete('cascade');
            $table->foreign('roast_level')->references('id')->on('roast_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
