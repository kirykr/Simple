<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempcomputerstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempcomputerstocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('computer_id');
            $table->string('computer_name');
            $table->integer('color_id')->unsigned();
            $table->string('color_name');
            $table->integer('qty')->unsigned();
            $table->float('cost')->unsigned();
            $table->float('sellprice')->unsigned();
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
        Schema::drop('tempcomputerstocks');
    }
}
