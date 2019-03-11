<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{


      public function show($username)
    {
      return view('profile', ['username' => $username]);
    }

      public function show($username)
  {
       $user = User::where('username', $username)->firstOrFail();
       return view('profile', ['user' => $user]);
  }


      public function show($username)
        {
        $user = User::where('username', $username)->firstOrFail();
        $me = Auth::user();
        $is_edit_profile = (Auth::id() == $user->id);
        $is_follow_button = !$is_edit_profile && !$me->isFollowing($user);
        return view('profile', ['user' => $user, 'is_edit_profile' => $is_edit_profile, 'is_follow_button' => $is_follow_button]);
        }
}
