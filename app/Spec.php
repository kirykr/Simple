<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * The roles that belong to the user.
     */
    public function computers()
    {
        return $this->belongsToMany('App\Computer')->withPivot('description');
    }
}
