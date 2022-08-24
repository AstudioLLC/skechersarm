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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('region')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->string('home')->nullable();
            $table->string('house')->nullable();
            $table->string('registered_phone')->nullable();
            $table->text('image')->nullable();
            $table->integer('orders_count')->nullable();
            $table->text('discount_card')->nullable();
            $table->boolean('gender')->nullable()->default(null);
            $table->timestamp('date_birthday')->nullable();
            $table->boolean('active')->default(1);
            $table->unsignedInteger('ordering')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_phone_verified')->default(0);
            $table->boolean('global_verified')->default(0);
            $table->boolean('data_filled')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_online')->default(0);
            $table->string('last_activity')->nullable();
            $table->boolean('seen')->default(0);
            $table->string('google_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->string('password');
            $table->timestamp('banned_until')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
