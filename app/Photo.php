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
    protected $fillPath = "/images/";
    protected $fillable = ['path',];


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
     * Photo has one Computer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function computer()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = photo_id, localKey = id)
        return $this->hasOne('App\Computer');
    }
}
