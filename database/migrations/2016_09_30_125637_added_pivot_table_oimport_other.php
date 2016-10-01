<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddedPivotTableOimportOther extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oimport_other', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('oimport_id')->unsigned();
            $table->foreign('oimport_id')->references('id')->on('oimports')->onDelete('cascade');
            $table->string('other_id');
            $table->foreign('other_id')->references('id')->on('others')->onDelete('cascade');
            $table->integer('color_id')->unsigned();
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
        Schema::drop('oimport_other');
    }
}
