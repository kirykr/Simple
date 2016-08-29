<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name',
    					   	'contactperson',
    					   	'tel',
    					   	'address'
    						];				
}
