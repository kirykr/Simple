<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerialTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serial_temps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tempcomputerstock_id')->unsigned();
            $table->string('computer_id');
            // $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
            $table->integer('color_id')->unsigned();
            // $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->string('serialnumber');
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
        Schema::drop('serial_temps');
    }
}
