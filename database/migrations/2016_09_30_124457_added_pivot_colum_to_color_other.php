<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddedPivotColumToColorOther extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('color_other', function (Blueprint $table) {
            //
            $table->integer('oimport_id')->unsigned();
            $table->integer('qty')->unsigned();
            $table->float('cost')->unsigned();
            $table->float('amount')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('color_other', function (Blueprint $table) {
            //
            $table->dropColumn('oimport_id');
            $table->dropColumn('qty');
            $table->dropColumn('cost');
            $table->dropColumn('amount');
        });
    }
}
