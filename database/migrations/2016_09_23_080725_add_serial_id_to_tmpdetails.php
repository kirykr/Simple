<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSerialIdToTmpdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tmpdetails', function (Blueprint $table) {
            //
            $table->integer('serial_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tmpdetails', function (Blueprint $table) {
            //
            $table->dropColumn('serial_id');
        });
    }
}
