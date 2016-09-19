<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmpdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmpdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bcinvoice_id');
            $table->string('pro_id',20);
            $table->string('description',100);
            $table->integer('qty');
            $table->float('price');
            $table->float('amount');
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
        Schema::drop('tmpdetails');
    }
}
