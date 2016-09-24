<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempothers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('other_id');
            $table->string('other_name');
            $table->integer('color_id')->unsigned()->nullable();
            $table->string('color_name')->nullable();
            $table->float('qty');
            $table->float('cost');
            $table->float('sellprice');
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
        Schema::drop('tempothers');
    }
}
