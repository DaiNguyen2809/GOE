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
        Schema::table('products', function (Blueprint $table) {
            $table->string('image2', 255)->nullable()->after('image');
            $table->string('image3', 255)->nullable()->after('image2');
            $table->string('image4', 255)->nullable()->after('image3');
            $table->string('image5', 255)->nullable()->after('image4');
            $table->string('image6', 255)->nullable()->after('image5');
            $table->string('image7', 255)->nullable()->after('image6');
            $table->string('image8', 255)->nullable()->after('image7');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'image2', 'image3', 'image4', 'image5',
                'image6', 'image7', 'image8'
            ]);
        });
    }
};
