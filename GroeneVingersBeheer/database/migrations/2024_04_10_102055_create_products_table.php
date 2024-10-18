<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 8, 2);
            $table->decimal('suppliers_price', 8, 2);
            $table->binary('image');
            $table->string('color');
            $table->string('barcode')->nullable();
            $table->string('sku')->nullable();
            $table->integer('height_cm');
            $table->integer('width_cm');
            $table->integer('depth_cm');
            $table->integer('weight_gr');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement('ALTER TABLE products MODIFY image MEDIUMBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('products');
    }
};
