<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oimport extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'importdate',
        'importindate',
        'invoicenum',
        'totalamount',
        'user_id',
        'supplier_id'

    ];  

    /**
     * Oimport belongs to Other.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function otherdetails()
    {
      // belongsTo(RelatedModel, foreignKey = other_id, keyOnRelatedModel = id)
      return $this->belongsToMany('App\Other')->withPivot('color_id','qty','cost','amount');
    }
}
