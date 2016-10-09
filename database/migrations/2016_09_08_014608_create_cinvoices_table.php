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
            $table->float('discount');
            $table->float('subtotal');
            $table->string('address');
            $table->string('tel',15);
            $table->integer('location_id');
            $table->integer('customer_id');
            $table->integer('shm_id');
            $table->integer('pm_id');
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
