<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoProduct extends Model
{
    //
  protected $table = 'photo_product';
  protected $guarded = ['photo_id', 'computer_id'];
  protected $primaryKey = 'id';

}
