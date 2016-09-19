<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCinvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinvoices', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('indate');
            $table->float('tamount');
            $table->float('shipamount');
            $table->float('dicount');
            $table->float('subtotal');
            $table->string('address',100);
            $table->string('tel',15);
            $table->integer('locationid');
            $table->integer('cid');
            $table->integer('shmid');
            $table->integer('pmid');
            $table->integer('statuspaid');
            $table->integer('statusship');
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
        Schema::drop('cinvoices');
    }
}
