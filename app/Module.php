<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
  /**
   * Fields that can be mass assigned.
   *
   * @var array
   */
  protected $fillable = ['name','nav','description'];
  
    public function roles()
   {
       return $this->belongsToMany('App\Role');
   }
   
}
