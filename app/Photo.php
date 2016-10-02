<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Photo extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillPath = "/images/computers/";
    protected $fillable = ['path'];


    public function getPathAttribute($photo){

    	return $this->fillPath . $photo;
    }

   /**
    * Photo has one User.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function user()
   {
       // hasOne(RelatedModel, foreignKeyOnRelatedModel = photo_id, localKey = id)
     return $this->hasOne('App\User');
   }
    /**
     * Photo has one Post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = photo_id, localKey = id)
      return $this->hasOne('App\Post');
    }

    /**
     * Photo belongs to Computer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function computers()
    {
        // belongsTo(RelatedModel, foreignKey = computer_id, keyOnRelatedModel = id)
      return $this->belongsToMany('App\Computer');
    }

    /**
     * Photo belongs to Others.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function others()
    {
        // belongsTo(RelatedModel, foreignKey = others_id, keyOnRelatedModel = id)
      return $this->belongsToMany('App\Other');
    }

    /**
     * Photo belongs to Others.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        // belongsTo(RelatedModel, foreignKey = others_id, keyOnRelatedModel = id)
      return $this->belongsToMany('App\Product', 'photo_product', 'photo_id', 'computer_id');
    }
  }
