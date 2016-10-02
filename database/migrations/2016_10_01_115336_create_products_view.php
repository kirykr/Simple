<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("CREATE VIEW products AS
                        SELECT
                        computers.id,
                        computers.`name`,
                        computers.qtyinstock,
                        computers.sellprice,
                        computers.ppprice,
                        computers.provprice
                        FROM computers
                        UNION
                        SELECT
                        others.id,
                        others.`name`,
                        others.qtyinstock,
                        others.sellprice,
                        others.ppprice,
                        others.provprice
                        FROM
                        others  ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement("DROP VIEW products");
    }
}
