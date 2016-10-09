<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bcinvoicedetail extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
    						'bcinvoice_id',
    						'pro_id',
    						'description',
    						'qty',
    						'price',
    						'amount',
                            'created_at'
    ];		
    public function bcinvoice(){
    	return $this->belongsTo('App\Bcinvoice');
    }
    public function pro(){
    	return $this->morphTo();
    }
    // public function computers(){
    // 	return $this->belongsTo('App\Computer','pro_id');
    // }
    // public function others(){
    // 	return $this->belongsTo('App\Other','pro_id');
    // }
}

// foreach ($bvinvoice->details as detail) {
// 	foreach ($detail->computers as $computer) {
// 		$computer->name
// 	}
// }