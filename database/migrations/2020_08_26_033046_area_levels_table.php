<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AreaLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('level_classic');
            $table->tinyInteger('level_expansion');
            $table->tinyInteger('area_name_id');
            $table->tinyInteger('act_name_id');
            $table->tinyInteger('difficulty_name_id');
            $table->string('patch_name_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_levels');
    }
}
