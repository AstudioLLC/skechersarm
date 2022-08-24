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
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->boolean('to_home')->default(1);
            $table->boolean('active')->default(1);
            $table->text('image')->nullable();
            $table->text('other')->nullable();
            $table->unsignedInteger('ordering')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_1396947')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
