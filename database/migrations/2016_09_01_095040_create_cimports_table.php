<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCimportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cimports', function(Blueprint $table) {
            $table->increments('id');
            $table->datetime('impdate');
            $table->datetime('impindate');
            $table->string('invoicenum');
            $table->float('totalamount');
            $table->integer('user_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
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
		Schema::drop('cimports');
	}

}
