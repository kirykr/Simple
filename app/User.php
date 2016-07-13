<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User belongs to Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        // belongsTo(RelatedModel, foreignKey = role_id, keyOnRelatedModel = id)
        return $this->belongsTo('App\Role');
    }

    /**
     * User belongs to Photo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
        // belongsTo(RelatedModel, foreignKey = photo_id, keyOnRelatedModel = id)
        return $this->belongsTo('App\Photo');
    }
}
