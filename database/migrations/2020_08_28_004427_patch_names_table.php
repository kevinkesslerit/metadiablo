<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatchNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patch_names', function (Blueprint $table) {
            $table->increments('id');
            $table->float('version', 3);
            $table->char('sub_version', 2);
            $table->dateTime('date_introduced')->default('1996-12-03 00:00:00');
            //1.14d = 7th of June, 2016
            //2016-06-07 00:00:00
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patch_names');
    }
}
