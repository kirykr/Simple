<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSellpriceColToTempOthers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tempothers', function (Blueprint $table) {
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
        Schema::table('tempothers', function (Blueprint $table) {
            //
            $table->dropColumn('sellprice');
        });
    }
}
