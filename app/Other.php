<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    public $incrementing = false;
    protected $fillable = [
    						'id',
    						'name',
    						'type_id',
    						'category_id',
    						'brand_id',
    						'model_id'
						];
	/**
	 * Other belongs to Photos.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function photos()
	{
		// belongsTo(RelatedModel, foreignKey = photos_id, keyOnRelatedModel = id)
		return $this->belongsToMany(Photo::class);
	}

	
}
