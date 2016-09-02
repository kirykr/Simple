<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColTypeIdCatIdModelId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('computers', function (Blueprint $table) {
            //
            $table->dropColumn('type_id');
            $table->dropColumn('category_id');
            $table->dropColumn('model_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('computers', function (Blueprint $table) {
            //
        });
    }
}
