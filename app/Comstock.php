<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comstock extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
    						'computer_id',
    						'color_id',
    						'serialnumber',
    						'quantity',
    						'cost',
    ];	

    /**
     * Comstock belongs to Importdetail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function importdetail()
    {
        // belongsTo(RelatedModel, foreignKey = importdetail_id, keyOnRelatedModel = id)
        return $this->belongsTo('App\Tempcomputerstock');
    }
}
