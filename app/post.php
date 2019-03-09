<?php

namespace App;
use App\Post;
use App\User;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $guarded=[];

    public function listadoPost() {
        return $this->postText . " " . $this->created_at;
      }
      public function postDe() {
        return $this->belongsTo(User::class, "user_id");
      }
}
