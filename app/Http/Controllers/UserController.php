<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function detalle($auth) {

    $usuario = User::find($auth);


    return view("/miPerfil", compact("usuario"));
  }
}
