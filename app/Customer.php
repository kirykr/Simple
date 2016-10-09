<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    // protected $table="Customers";
    public function cinvoices(){
    	return $this->hasMany('App\Cinvoice');
    }
}
