<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('module_role', function (Blueprint $table) {
        $table->integer('module_id')->unsigned();
        $table->foreign('module_id')->references('id')->on('modules');
        $table->integer('role_id')->unsigned();
        $table->foreign('role_id')->references('id')->on('roles');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('module_role');
    }
}
