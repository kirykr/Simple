<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBcinvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bcinvoices', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('indate');
            $table->float('tamount');
            $table->float('discount');
            $table->float('subtotal');
            $table->integer('user_id');   
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
        Schema::drop('bcinvoices');
    }
}
