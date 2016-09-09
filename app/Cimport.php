<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cimport extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    public function getCreatedAtAttribute($date)
    {
        $date = new \Carbon\Carbon($date);
        // Now modify and return the date
    }

    protected $fillable = [
							'importdate',
							'importindate',
							'invoicenum',
							'totalamount',
							'user_id',
							'supplier_id'

						];
    /**
       * Cimport belongs to .
       *
       * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
       */
      public function computers()
      {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsToMany('App\Computer')->withPivot('color_id','qty','cost','amount');
      }                            		
}
