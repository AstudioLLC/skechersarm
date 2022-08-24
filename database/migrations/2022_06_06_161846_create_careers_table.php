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
        Schema::create('careers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('content')->nullable();
            $table->text('description')->nullable();
            $table->text('schedule')->nullable();
            $table->text('hours')->nullable();
            $table->string('salary')->nullable();
            $table->string('city')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->text('image')->nullable();
            $table->string('url')->nullable();
            $table->boolean('active')->default(1);
            $table->unsignedInteger('ordering')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('careers');
    }
};
