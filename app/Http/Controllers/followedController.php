<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Followed;
use App\User;

class followedController extends Controller
{
public function listado() {
  $followed = Followed::all();
  $vac = compact("followed");
  return view("listadofollowed", $vac);
}


public function eliminar(Request $followed) {
    $idFollowed = $followed["$idFollowed"];
    $followed = Followed::find($idFollowed);
    $followed->delete();
  }
}
