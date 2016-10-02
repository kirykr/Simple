<?php

namespace App;

use App\Photo;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{

    //
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = [
                          'name',
                          'qtyinstock',
                          'sellprice',
                          'brand_id',
                          'ppprice',
                          'provprice',
                      ];  

   protected $table = 'products';
   protected $primaryKey = 'id';
  // protected $guarded = ['photo_id', 'product_id'];

  /**
   * Computer belongs to Photo.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function photos()
  {
    // belongsTo(RelatedModel, foreignKey = photo_id, keyOnRelatedModel = id)
    return $this->belongsToMany('App\Photo','photo_product','photo_id','computer_id');
  }          
  


}
