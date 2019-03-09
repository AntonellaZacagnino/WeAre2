<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user', 'email', 'password', 'profession', 'country', 'city', 'birthday_date',"avatar"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function seguidores() {
      return $this->belongsToMany(User::class, "user_id", "idSeguido", "idSeguidor");
    }

    public function seguidos() {
      return $this->hasMany(User::class, "user_id", "idSeguidor", "idSeguido");
    }

    public function posteos() {
      return $this->hasMany(Post::class, "user_id");
    }


}
