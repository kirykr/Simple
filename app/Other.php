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

	public function bcinvoicedetails(){
        return $this->morphMany('App\Bcinvoicedetail','pro');
    }
    public function tmpdetails(){
        return $this->morphMany('App\Tmpdetail','pro');
    }
    //  public function bcinvoicedetails(){
    //     return $this->hasMany('App\Bcinvoicedetail');
    // }
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
