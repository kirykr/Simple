<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    //
    protected $fillable = [
                            'id',
                            'bcname',
                            'tel'
                        ];
    public function shipmethods(){
        return $this->morphMany('App\Bcinvoicedetail','shm');
    }
}
