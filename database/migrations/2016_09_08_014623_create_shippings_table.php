<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('shdate');
            $table->integer('sid');
            $table->integer('cid');
            $table->integer('cinid');
            $table->integer('shmid');
            $table->string('location',35);
            $table->string('address',100);
            $table->string('tel',15);
            $table->float('tamount');
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
        Schema::drop('shippings');
    }
}
