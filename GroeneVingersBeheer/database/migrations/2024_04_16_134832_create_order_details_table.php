<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id');
            $table->decimal('total');
            $table->integer('payment_id')->unsigned()->nullable(); // Make nullable
            $table->unsignedBigInteger('product_id')->nullable(); // Make nullable
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('payment_id')->references('id')->on('payment_details')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

    }

    public function down()
    {
        Schema::drop('order_details');
    }
};
