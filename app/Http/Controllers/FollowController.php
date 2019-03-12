<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{

  public function follow(User $user)
   {
       if (!Auth::user()->isFollowing($user->id)) {
           // Create a new follow instance for the authenticated user
           Auth::user()->follows()->create([
               'target_id' => $user->id,
           ]);

           return back()->with('success', 'Ahora estas siguiendo a '. $user->user);
       } else {
           return back()->with('error', 'Ya estas siguiendo a esta persona');
       }

   }

   public function unfollow(User $user)
   {
       if (Auth::user()->isFollowing($user->id)) {
           $follow = Auth::user()->follows()->where('target_id', $user->id)->first();
           $follow->delete();

           return back()->with('success', 'Ya no sigues a '. $user->user);
       } else {
           return back()->with('error', 'No sigues a este usuario');
       }
   }
}
