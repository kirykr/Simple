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
    protected $fillable = [
    					   'name',
    					   'qtyinstock',
    					   'sellprice',
    					   'photo_id',
    					   'type_id',
    					   'category_id',
    					   'brand_id',
    					   'model_id',

    ];

    /**
     * Computer belongs to Photo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
        // belongsTo(RelatedModel, foreignKey = photo_id, keyOnRelatedModel = id)
        return $this->belongsTo('App\Photo');
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
}
