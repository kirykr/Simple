<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Computer;

class Type extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name',];

    /**
     * Type has many Computers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function computers()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = type_id, localKey = id)
    	return $this->hasMany('App\Computer');
    }
    /**
     * Type has many Categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = type_id, localKey = id)
        return $this->hasMany('App\Category');
    }
}
