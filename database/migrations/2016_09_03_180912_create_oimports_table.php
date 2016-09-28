<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOimportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oimports', function(Blueprint $table) {
            $table->increments('id');
            $table->datetime('impdate');
            $table->datetime('impindate');
            $table->string('invoicenumber');
            $table->integer('user_id');
            $table->integer('supplier_id');
            $table->float('totalamount');
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
		Schema::drop('oimports');
	}

}
