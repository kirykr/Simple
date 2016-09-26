<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SerialTemp extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['serialnumber'];

    /**
     * SerialTemp belongs to Tempcomputer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tempcomputer()
    {
      // belongsTo(RelatedModel, foreignKey = tempcomputer_id, keyOnRelatedModel = id)
      return $this->belongsTo('App\Tempcomputerstock');
    }
}
