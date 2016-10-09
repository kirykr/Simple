<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    //
    /**
     * PaymentMethod has many Cinvoices.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cinvoices()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = paymentMethod_id, localKey = id)
    	return $this->hasMany('App\Cinvoice','pm_id');
    }
}
