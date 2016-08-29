<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('computers', function(Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->integer('qtyinstock');
            $table->float('sellprice');
            $table->integer('type_id')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('brand_id')->default(0);
            $table->integer('model_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('computers');
	}

}
