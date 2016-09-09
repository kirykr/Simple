<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPpriceProvpriceToOtherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('others', function (Blueprint $table) {
            //
            $table->float('ppprice')->default(0.0);
            $table->float('provprice')->default(0.0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('others', function (Blueprint $table) {
            //
        });
    }
}
