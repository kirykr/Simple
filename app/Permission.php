<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\Model;

class Permission extends EntrustPermission
{
    //
    protected $table = 'Permission';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name','display_name','discription'];


     public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
