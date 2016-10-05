<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    /**
     * Location has many Cinvoices.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cinvoices()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = location_id, localKey = id)
    	return $this->hasMany('App\Cinvoice');
    }
}
