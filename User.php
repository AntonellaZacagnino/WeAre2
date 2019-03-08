<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
        'name', 'user', 'email', 'password', 'profession', 'country', 'birthday_date'
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
      return $this->belongsToMany(follower::class, "user_id");
    }

    public function seguidos() {
      return $this->hasMany(followed::class, "user_id");
    }

    public function posteos() {
      return $this->hasMany(Post::class, "user_id");
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'country' => ['string', 'max:255'],
            'city' => ['string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'birthday_date' => ['date'],
            'profession' => ['string', 'max:255'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'country' => $data['country'],
            'city' => $data['city'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday_date' => $data['birthday_date'],
            'profession' => $data['profession']
        ]);
        }
}
