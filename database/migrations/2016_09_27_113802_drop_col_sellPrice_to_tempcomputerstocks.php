<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColSellPriceToTempcomputerstocks extends Migration
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
            $table->float('amount')->after('cost');
            $table->dropColumn('sellprice');
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
            $table->float('sellprice');
            $table->dropColumn('amount');
        });
    }
}
