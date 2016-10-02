<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShmTypeToCinvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cinvoices', function (Blueprint $table) {
            //
            $table->string('shm_type',30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cinvoices', function (Blueprint $table) {
            //
            $table->dropColumn('shm_type');
        });
    }
}
