<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bcinvoice extends Model
{
    //
      //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
                'indate',
                'tamount',
                'discount',
                'subtotal',
    ];
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function bcinvoicedetails(){
    	return $this->hasMany('App\Bcinvoicedetail');
    }
    //     public function details(){
    // 	return $this->hasMany('App\Bcinvoicedetail');
    // }
}
