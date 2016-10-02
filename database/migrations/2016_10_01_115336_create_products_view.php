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
                        computers.id as ID,
                        computers.`name`,
                        computers.qtyinstock,
                        computers.sellprice,
                        computers.ppprice,
                        computers.provprice,                                                
                        computers.created_at,                                               
                        computers.updated_at
                        FROM computers
                        UNION
                        SELECT
                        others.id as ID,
                        others.`name`,
                        others.qtyinstock,
                        others.sellprice,
                        others.ppprice,
                        others.provprice,
                        others.created_at,
                        others.updated_at
                        FROM
                        others   ");
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
