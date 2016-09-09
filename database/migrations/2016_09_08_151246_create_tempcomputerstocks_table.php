<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempcomputerstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempcomputerstocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('computer_id');
            $table->string('color');
            $table->string('qty');
            $table->string('cost');
            $table->string('sellprice');
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
        Schema::drop('tempcomputerstocks');
    }
}
