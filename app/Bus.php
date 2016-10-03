<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    //
    protected $fillable = [
                            'id',
                            'taxiname',
                            'tel'

                        ];
    public function shipmethods(){
        return $this->morphMany('App\Bcinvoicedetail','shm');
    }
}
