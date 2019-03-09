<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $guarded=[];

    public function listadoPost() {
        return $this->created_at . " " . $this->postText;
      }
      public function postDe() {
        return $this->belongsTo(User::class, "user_id");
      }
}
