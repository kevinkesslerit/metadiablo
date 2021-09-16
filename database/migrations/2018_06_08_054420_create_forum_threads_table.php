<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_threads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_slug');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->binary('flags')->default(base64_encode('0000000000000000')); //binary word 16 bits
            $table->unsignedBigInteger('last_post_id')->default(0);
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('total_posts')->default(0);
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
        Schema::dropIfExists('threads');
        Schema::dropIfExists('forum_threads');
    }
}
