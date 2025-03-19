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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->string('id',100)->primary();
            $table->string('name',255);
            $table->string('category_id',100);
            $table->string('email',255)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('status',100);
            $table->decimal('debt');

            $table->foreign('category_id')->references('id')->on('supplier_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
