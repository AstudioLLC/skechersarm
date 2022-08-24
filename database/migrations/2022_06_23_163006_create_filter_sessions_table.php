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
        Schema::create('filter_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('filter_id')->nullable();
            $table->text('criteria_id')->nullable();
            $table->text('session')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filter_sessions');
    }
};
