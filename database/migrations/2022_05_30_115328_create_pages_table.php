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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->index()->default(null);
            $table->string('url')->nullable();
            $table->text('title')->nullable();
            $table->string('icon', 64)->nullable();
            $table->string('image', 64)->nullable();
            $table->boolean('show_image')->default(1);
            $table->boolean('to_top')->default(1);
            $table->boolean('to_menu')->default(1);
            $table->boolean('to_footer')->default(1);
            $table->boolean('about')->default(0);
            $table->boolean('buyers')->default(0);
            $table->text('content')->nullable();
            $table->text('sec_content')->nullable();
            $table->text('title_content')->nullable();
            $table->string('static', 64)->nullable();
            $table->boolean('active')->default(1);
            $table->unsignedInteger('ordering')->default(0);
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
