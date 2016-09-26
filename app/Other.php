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
    						'sellprice',
    						'ppprice',
    						'provprice',
    						'brand_id'
						];
	/**
	 * Other belongs to Photos.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function photos()
	{
		// belongsTo(RelatedModel, foreignKey = photos_id, keyOnRelatedModel = id)
		return $this->belongsToMany('App\Photo');
	}

    /**
     * Other belongs to Colors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colors()
    {
        // belongsTo(RelatedModel, foreignKey = colors_id, keyOnRelatedModel = id)
        return $this->belongsToMany('App\Color');
    }
	
}
