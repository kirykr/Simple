<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemaneColumnDiscount extends Migration
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
            $table->renameColumn('dicount', 'discount');
            $table->renameColumn('locationid', 'location_id');
            $table->renameColumn('cid', 'customer_id');
            $table->renameColumn('shmid', 'shm_id');
            $table->renameColumn('pmid', 'pm_id');
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
        });
    }
}
