<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;

class Computer extends Model
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
                            'computer_id',
                            'color_id',
                            'name',
                            'sellprice',
                            'brand_id',
                            'ppprice',
                            'provprice',
                            'status',

                        ];

   /**
    * Computer belongs to Photo.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function photos()
   {
     // belongsTo(RelatedModel, foreignKey = photo_id, keyOnRelatedModel = id)
     return $this->belongsToMany('App\Photo');
   }
    /**
         * Computer belongs to .
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
    public function type()
    {
            // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
      return $this->belongsTo('App\Type');
    }

     /**
     * The roles that belong to the user.
     */
    public function specs()
    {
        return $this->belongsToMany('App\Spec')->withPivot('description');
    }	

    /**
     * Computer belongs to Imports.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cimports()
    {
        // belongsTo(RelatedModel, foreignKey = imports_id, keyOnRelatedModel = id)
        return $this->belongsToMany('App\Cimport')->withPivot('color_id','qty','cost','amount');
    }

    public function cinvoicedetails(){
        return $this->morphMany('App\Cinvoicedetail','pro');
    }

    public function carts(){
        return $this->morphMany('App\Cart','pro');
    }
    /**
     * Computer belongs to Colors.
    **
     * The computer or other belong to invoicedetail.
     */
    public function bcinvoicedetails(){
        return $this->morphMany('App\Bcinvoicedetail','pro');
    }
    
    public function tmpdetails(){
        return $this->morphMany('App\Tmpdetail','pro');
    }
    // public function bcinvoicedetails(){
    //     return $this->hasMany('App\Bcinvoicedetail');
    // }
    /**
     * Computer belongs to Color.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colors()
    {
        return $this->belongsToMany('App\Color','color_computer')->withPivot('serialnumber','quantity', 'cost','sellprice','status');
    }
  }
