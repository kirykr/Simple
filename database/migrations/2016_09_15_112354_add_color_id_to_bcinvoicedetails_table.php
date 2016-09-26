<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorIdToBcinvoicedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bcinvoicedetails', function (Blueprint $table) {
            //
            $table->integer('color_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bcinvoicedetails', function (Blueprint $table) {
            //
            $table->dropColumn('color_id');
        });
    }
}
