<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinvoicedetail extends Model
{

	protected $fillable = [
    						'cinvoice_id',
    						'pro_id',
    						'qty',
    						'price',
    						'amount',
                            'created_at'
    ];		
    //
    /**
     * Cinvoicedetail belongs to Cinvoice.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cinvoice()
    {
    	// belongsTo(RelatedModel, foreignKey = cinvoice_id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\Cinvoice');
    }
    public function pro()
    {
    	return $this->morphTo();
    }
}
