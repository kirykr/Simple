<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name','description'];

   /**
    * Brand has many Types.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function types()
   {
       // hasMany(RelatedModel, foreignKeyOnRelatedModel = brand_id, localKey = id)
       return $this->hasMany('App\Type');
   }
}
