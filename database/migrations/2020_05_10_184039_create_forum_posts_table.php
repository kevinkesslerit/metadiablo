<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('thread_slug');
            $table->unsignedBigInteger('user_id');
            $table->string('category_slug');
            $table->binary('flags')->default(base64_encode('0000000000000000')); //binary word 16 bits
            $table->integer('post_order')->default(0);
            $table->integer('rating')->default(0);
            $table->text('body');
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
        Schema::dropIfExists('forum_posts');
    }
}
