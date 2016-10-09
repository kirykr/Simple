<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bcinvoice extends Model
{
    //
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function bcinvoicedetails(){
    	return $this->hasMany('App\Bcinvoicedetail');
    }
}
