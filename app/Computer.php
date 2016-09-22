<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;

class Computer extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */

    public $incrementing = false;
    protected $fillable = [
                            'id',
                            'name',
                            'sellprice',
                            'brand_id',
                            'ppprice',
                            'provprice',
                            'status',

                        ];

   /**
    * Computer belongs to Photo.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function photos()
   {
     // belongsTo(RelatedModel, foreignKey = photo_id, keyOnRelatedModel = id)
     return $this->belongsToMany('App\Photo');
   }
    /**
         * Computer belongs to .
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
    public function type()
    {
            // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
      return $this->belongsTo('App\Type');
    }

     /**
     * The roles that belong to the user.
     */
    public function specs()
    {
        return $this->belongsToMany('App\Spec')->withPivot('description');
    }	

    /**
     * Computer belongs to Imports.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function imports()
    {
        // belongsTo(RelatedModel, foreignKey = imports_id, keyOnRelatedModel = id)
        return $this->belongsToMany('App\Cimport')->withPivot('color_id','qty','cost','amount');
    }

    /**
     * Computer belongs to Colors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colors()
    {
        // belongsTo(RelatedModel, foreignKey = colors_id, keyOnRelatedModel = id)
        return $this->belongsToMany('App\Color')->withPivot('serialnumber','qty','cost');
    }
  }
