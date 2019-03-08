<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $guarded=[];

    public function postDe() {
      return $this->belongsTo(User::class, "user_id");
    }
}
