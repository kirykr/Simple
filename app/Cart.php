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
                            'id',
    						'pro_id',
                            'name',
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
    				public function pro()
                        {
                            return $this->morphTo();
                        }	
                    public function users(){
                        $this->belongsTo('App\User');
                    }
                    public function colors(){
                        $this->belongsTo('App\Color');
                    }
}
