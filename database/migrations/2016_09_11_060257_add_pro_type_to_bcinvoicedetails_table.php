<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProTypeToBcinvoicedetailsTable extends Migration
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
            $table->string('pro_type','50');
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
            $table->dropColumn('pro_type');
        });
    }
}
