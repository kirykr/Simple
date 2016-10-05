<?php

namespace App;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;


class Role extends EntrustRole
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
       'name',
       'display_name',
       'description'
   ];
   public function modules()
   {
       return $this->belongsToMany('App\Module');
   }



    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
    /*public function users()
    {
        return $this->belongsToMany('App\user','role_user');
    }*/

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
