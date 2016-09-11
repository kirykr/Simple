<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name','description'];

    /**
     * Color belongs to Computers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function computers()
    {
    	// belongsTo(RelatedModel, foreignKey = computers_id, keyOnRelatedModel = id)
    	return $this->belongsToMany(Computers::class)->withPivot('serialnumber','qty','cost');
    }
}
