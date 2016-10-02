<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoProduct extends BaseModel
{
    //
  protected $table = 'photo_product';
  protected $guarded = ['photo_id', 'computer_id'];

}
