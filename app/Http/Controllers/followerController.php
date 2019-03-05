<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class followerController extends Controller
{
    public function listado() {
    $followers = Follower::all();
    $vac = compact("followers");
    return view("listadofollowers", $vac);
    }
}
