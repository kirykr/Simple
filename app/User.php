<?php
namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword, EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','photo_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    /**
     * User belongs to Photo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
        // belongsTo(RelatedModel, foreignKey = photo_id, keyOnRelatedModel = id)
        return $this->belongsTo('App\Photo');
    }
    public function bcinvoices(){
        return $this->hasMany('App\Bcinvoice');
    }
    public function cinvoices(){
        return $this->hasMany('App\Cinvoice');
    }
/**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function roles()
    // {
    //     return $this->belongsToMany(Config::get('entrust.role'), Config::get('entrust.role_user_table'), 'user_id', 'role_id');
    // }


    // public function isAdmin(){

    //     if($this->roles->name == 'admin' && $this->is_active === 1){
    //         return true;
    //     }
    // }
}
