<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTableOnColorComputer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_computer', function (Blueprint $table) {
                $table->increments('id');
               $table->integer('color_id');
               $table->string('other_id');
               $table->string('serialnumber');
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
        Schema::drop('color_computer');
    }
}
