<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name','type_id',];

    /**
     * Category belongs to Type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
    	// belongsTo(RelatedModel, foreignKey = type_id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\Type');
    }

    /**
     * Category has many Modells.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modells()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
        return $this->hasMany(Modell::class);
    }
}
