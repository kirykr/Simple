<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modell extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'category_id'];

    /**
     * Modell belongs to Categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        // belongsTo(RelatedModel, foreignKey = categories_id, keyOnRelatedModel = id)
        return $this->belongsTo(Category::class);
    }
}
