<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function detalle() {

    // $usuario = Auth::user()->user;


    return view("/miPerfil");
  }

  public function verPerfil($id)
  {
    $usuario = User::find($id);

      $vac = compact("usuario");

      return view("usuario", $vac);
  }
}
