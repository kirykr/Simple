<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tmpdetail extends Model
{
    //
    protected $fillable = [
    						'tmpinvoice_id',
    						'pro_id',
    						'description',
    						'qty',
    						'price',
    						'amount'
    ];		
    public function bcinvoice(){
    	return $this->belongsTo('App\Tmpinvoice','bcinvoice_id');
    }
    public function pro(){
    	return $this->morphTo();
    }
}
