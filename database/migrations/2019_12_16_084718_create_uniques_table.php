<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('itemType');
            $table->unsignedTinyInteger('reqCLevel');
            $table->unsignedTinyInteger('itemLevel');
            $table->string('itemCategory');
            $table->text('itemStats');
            $table->string('image');
            $table->string('ladderOnly');
            $table->string('patchIntroduced');
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
        Schema::dropIfExists('uniques');
    }
}
