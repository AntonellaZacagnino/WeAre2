<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanLike;
use App\Post;
use Auth;

class User extends Authenticatable
{
    use Notifiable, CanLike, CanFollow, CanBeFollowed;

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


    public function posts() {
      return $this->hasMany(Post::class);
    }

    public function tieneFotoPerfil(): bool {
        return !is_null($this->attributes['avatar'])
        && !empty($this->attributes['avatar']);
    }

    public function getProfilePictureAttribute() {
        return url('avatars/' . $this->attributes['avatar']);
     }


    public function follows()
    {
        return $this->hasMany(Follow::class);
    }

    public function isFollowing($target_id)
    {
        return (bool)$this->follows()->where('target_id', $target_id)->first(['id']);
    }



}
