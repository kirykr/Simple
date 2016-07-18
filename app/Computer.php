<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['comcode',
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
    	 * Computer has one Photo.
    	 *
    	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
    	 */
    	public function photo()
    	{
    		// hasOne(RelatedModel, foreignKeyOnRelatedModel = computer_id, localKey = id)
    		return $this->hasOne('App\Photo');
    	}	
}
