<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinvoice extends Model
{
   protected $fillable = [
                            'id',
                            'indate',
                            'tamount',
                            'shipamount',
                            'discount',
                            'subtotal',
                            'address',
                            'tel',
                            'location_id',
                            'customer_id',
                            'shm_id',
                            'pm_id',
                            'statuspaid',
                            'statusship'
                        ];
    public function customers(){
    	return $this->belongsTo('App\User');
    }
    public function payments(){
    	return $this->belongsTo('App\PaymentMethod');
    }
    public function locations(){
    	return $this->belongsTo('App\Location');
    }
    public function cinvoicedetails(){
    	return $this->hasMany('App\Cinvoicedetail');
    }
    public function shm()
    {
    	return $this->morphTo();
    }
}
