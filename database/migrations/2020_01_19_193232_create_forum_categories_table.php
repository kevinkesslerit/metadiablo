<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->binary('flags')->default(base64_encode('0000000000000000')); //binary word 16 bits
            $table->unsignedInteger('order')->default(0);
            $table->unsignedBigInteger('last_post_id')->default(0);
            $table->unsignedBigInteger('total_posts')->default(0);
            $table->unsignedBigInteger('total_threads')->default(0);
            $table->unsignedBigInteger('views')->default(0);
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
        Schema::dropIfExists('forum_categories');
    }
}
