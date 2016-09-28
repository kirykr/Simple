<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOstockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ostocks', function (Blueprint $table) {
            $table->string('other_id');
            $table->integer('oimport_id');
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
        Schema::drop('ostocks');
    }
}
