<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [	
    						'product_id',
    						'qty',
    						'price',
    						'shipprice',
    						'discount',
    						'amount',
    						'customer_id'
    ];

    /**
    				 * Cart has many Computers.
    				 *
    				 * @return \Illuminate\Database\Eloquent\Relations\HasMany
    				 */
    				public function computers()
    				{
    					// hasMany(RelatedModel, foreignKeyOnRelatedModel = cart_id, localKey = id)
    					return $this->hasMany('App\Computer');
    				}				
}
