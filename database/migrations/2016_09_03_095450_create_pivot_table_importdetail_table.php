<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTableImportdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_cimport', function (Blueprint $table) {
            $table->string('computer_id');
            $table->integer('cimport_id')->unsigned();
            $table->integer('color_id');
            $table->integer('qty')->unsigned();
            $table->float('cost')->unsigned();
            $table->float('amount')->unsigned();
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
        Schema::drop('computer_cimport');
    }
}
