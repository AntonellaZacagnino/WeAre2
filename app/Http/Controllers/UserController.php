<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function agregarInfo() {
  $generos = User::all();
  $vac = compact("generos");
  return view("miPerfil", $vac);
}

  public function detalle() {

    // $usuario = Auth::user()->user;

    return view("/miPerfil");
  }

  public function verPerfil($id)
  {
    $user = User::find($id);
      
      return view("usuario")->with('user', $user);
  }

  public function listaPost() {
    $posteos = Post::all();
    $vac = compact("posteos");
    return view("/usuario/{id}", $vac);
  }

  public function editar()
  {
    $usuario = Auth::user()->user;

    return view('miPerfil');
  }

  public function almacenarDatos(Request $formulario) {

    $usuario = Auth::user()->user;

    $reglas = [
      "name" => "required|string|min:3|max:200",
      "user" => "required|string|min:3|max:200|unique:users",
      "email" => "required|string|email|min:0|max:255|unique:users",
      "birthday_date" => "date",
      "profession" => "string",
      "avatar" => "image"
    ];

    $this->validate($formulario, $reglas);

    $avatar = $formulario->file("avatar");
    $rutaDondeSeGuardaElArchivo = $avatar->store("public");
    $nombreDelArchivo = basename($rutaDondeSeGuardaElArchivo);

    $usuario->name =  $formulario["name"];
    $usuario->user = $formulario["user"];
    $usuario->email = $formulario["email"];
    $usuario->birthday_date = $formulario["birthday_date"];
    $usuario->profession = $formulario["profession"];
    $usuario->avatar = $nombreDelArchivo;

    $usuario->save();

    return redirect("/miPerfil");
  }

  public function listadoPost() {
    $posteos = Post::all();
    $vac = compact("posteos");
    return view("usuario", $vac);
  }
}
