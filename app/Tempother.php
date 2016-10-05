<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempother extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
    						'other_id',
    						'other_name',
    						'color_id',
    						'color_name',
    						'qty',
    						'cost',
                            'sellprice'
	];
    								
}
