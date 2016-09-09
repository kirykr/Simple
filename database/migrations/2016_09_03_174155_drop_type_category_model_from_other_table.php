<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTypeCategoryModelFromOtherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('others', function (Blueprint $table) {
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
        Schema::table('others', function (Blueprint $table) {
            //
        });
    }
}
