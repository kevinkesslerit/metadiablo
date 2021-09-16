<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->ipAddress('ipaddress');
            $table->unsignedBigInteger('bnet_id')->nullable();
            $table->unsignedBigInteger('post_count')->default(0);
            $table->string('bnet_name')->nullable();
            $table->unsignedBigInteger('guild_id')->nullable();
            $table->string('guild_rank')->nullable();
            $table->text('notes')->nullable();
            $table->string('avatar')->default('avatars/Bnet-unknown.gif')->nullable();
            $table->binary('access')->default(base64_encode('00000000000000000000000000000000')); //binary dword 32 bits
            $table->unsignedTinyInteger('warn')->default(0);
            $table->string('title')->default('Member');
            $table->rememberToken();
            $table->string('api_token', 80)->unique()->nullable()->default(null);
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
        Schema::dropIfExists('users');
    }
}
