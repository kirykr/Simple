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
    protected $fillable = ['id','name','description'];

    /**
     * Color belongs to Computers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function computers()
    {
    	// belongsTo(RelatedModel, foreignKey = computers_id, keyOnRelatedModel = id)
    	return $this->belongsToMany('App\Computer','color_computer')->withPivot('serialnumber','quantity', 'cost','status');
    }

    /**
     * Color belongs to Others.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function others()
    {
    	return $this->belongsToMany('App\Other');
    }
}
