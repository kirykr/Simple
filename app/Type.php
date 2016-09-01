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
    protected $fillable = ['name','description','brand_id'];

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
     * Type belongs to Brand.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        // belongsTo(RelatedModel, foreignKey = brand_id, keyOnRelatedModel = id)
        return $this->belongsTo(Brand::class);
    }
}
