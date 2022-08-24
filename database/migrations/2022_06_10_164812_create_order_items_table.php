<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->bigInteger('fast_order_id')->unsigned()->nullable();

            $table->text('name')->nullable();
            $table->string('article_1c')->nullable();
            $table->integer('price');
            $table->integer('quantity');
            $table->text('size')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('fast_order_id')->references('id')->on('fast_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
