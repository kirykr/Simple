<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOthersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('others', function(Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->integer('qtyinstock')->default(0);
            $table->float('sellprice')->default(0);
            $table->integer('type_id')->default(0);
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('model_id');
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
		Schema::drop('others');
	}

}
