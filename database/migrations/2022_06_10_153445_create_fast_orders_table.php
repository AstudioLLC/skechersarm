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
        Schema::create('fast_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->text('name');
            $table->text('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('home')->nullable();
            $table->string('apartment')->nullable();
            $table->text('notes')->nullable();
            $table->text('stores')->nullable();
            $table->integer('subtotal')->nullable();
            $table->decimal('discount')->default(0);
            $table->integer('total');
            $table->enum('status',['success','canceled','sent'])->default('sent');
            $table->boolean('seen')->default(0);
            $table->boolean('active')->default(1);
            $table->unsignedInteger('ordering')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fast_orders');
    }
};
