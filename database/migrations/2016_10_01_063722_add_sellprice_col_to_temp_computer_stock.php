<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSellpriceColToTempComputerStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tempcomputerstocks', function (Blueprint $table) {
            //
            $table->float('sellprice')->after('cost')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tempcomputerstocks', function (Blueprint $table) {
            //
            $table->dropColumn('sellprice');
        });
    }
}
