<?php

namespace App;
use App\Post;
use App\User;
use App\Http\Controllers\Auth;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Illuminate\Database\Eloquent\Model;
use \GetStream\StreamLaravel\Eloquent\ActivityTrait;

class Post extends Model
{
     use CanBeLiked;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

          public function postDe() {
        return $this->belongsTo(User::class, "user_id");
      }


      public function getPhotoAttribute(): string{
        return url("photos/". $this->attributes["photo"]);
      }

      public function index ()
      {
        $posts = Post::orderBy("id", "DESC");
        return view("home")->with("posts", $posts);
      }
}
