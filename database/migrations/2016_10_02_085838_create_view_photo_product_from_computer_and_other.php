<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewPhotoProductFromComputerAndOther extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("CREATE VIEW photo_product AS
                       SELECT computer_id as product_id,
                       photo_id,
                       created_at,
                       updated_at
                       FROM
                       computer_photo
                       UNION
                       SELECT other_id, 
                       photo_id, 
                       created_at, 
                       updated_at
                       FROM
                       other_photo 
                       ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement("DROP VIEW photo_product");
    }
}
