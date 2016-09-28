<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColPppriceProvpriceStatusToComputerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('computers', function (Blueprint $table) {
            //
            $table->float('ppprice')->default(0.0);
            $table->float('provprice')->default(0.0);
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('computers', function (Blueprint $table) {
            //
        });
    }
}
