<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['target_id'];

    public function user()
    {
     return $this->belongsTo(User::class);
   }
}
