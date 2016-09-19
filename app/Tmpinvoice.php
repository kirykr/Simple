<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tmpinvoice extends Model
{
    //
    protected $fillable = [
                'indate',
                'tamount',
                'discount',
                'subtotal',
    ];
     public function bcinvoicedetails(){
    	return $this->hasMany('App\Tmpdetail');
    }
}
