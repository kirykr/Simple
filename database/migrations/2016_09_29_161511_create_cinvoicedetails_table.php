<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCinvoicedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinvoicedetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cinvoice_id');
            $table->string('pro_id');
            $table->integer('qty');
            $table->float('price');
            $table->float('amount');
            $table->string('pro_type',30);
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
        Schema::drop('cinvoicedetails');
    }
}
