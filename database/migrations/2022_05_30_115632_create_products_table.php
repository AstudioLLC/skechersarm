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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('regular_price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->decimal('sale_percent')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->text('image')->nullable();
            $table->text('thumbnail')->nullable();
            $table->text('images')->nullable();
            $table->enum('stock_status',['instock','outofstock'])->default('instock');
            $table->text('colors')->nullable();
            $table->integer('sold')->default(0);
            $table->unsignedInteger('quantity')->default(10);
            $table->boolean('is_new')->default(null)->nullable();
            $table->boolean('is_collection')->default(null)->nullable();
            $table->boolean('top_seller')->default(null)->nullable();
            $table->text('rating')->nullable();
            $table->string('article_1c')->nullable();
            $table->string('barcode')->nullable();
            $table->text('label')->nullable();
            $table->text('percent_label')->nullable();
            $table->integer('brand_id')->nullable();
            $table->text('other')->nullable();
            $table->boolean('active')->default(1);
            $table->unsignedInteger('ordering')->default(0);
            $table->timestamps();
            $table->softDeletes();
;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
