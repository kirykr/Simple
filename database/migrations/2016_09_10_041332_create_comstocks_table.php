<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comstocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('computer_id');
            $table->integer('cimport_id');
            $table->string('serialnumber');
            $table->integer('color_id');
            $table->integer('quantity')->unsigned();
            $table->float('cost')->unsigned();
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
        Schema::drop('comstocks');
    }
}
