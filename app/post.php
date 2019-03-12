<?php

namespace App;
use App\Post;
use App\User;
use App\Http\Controllers\Auth;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listadoPost() {
        return $this->postText;
      }

      public function listaPost() {
        return $this->postText;
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
