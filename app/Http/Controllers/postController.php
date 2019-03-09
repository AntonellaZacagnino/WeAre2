<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
}
public function agregarPosteo() {
  $posteo = User::all();
  $vac = compact("posteo");
  return view("/agregarPosteo", $vac);
}
public function almacenarPosteo(Request $formulario) {
  //Pelicula::create($formulario);
  $reglas = [
    "postText" => "required|string|min:1|max:255",
  ];
  $this->validate($formulario, $reglas);
  $post = new Post();
  $post->postText =  $formulario["postText"];
  $post->users_id = Auth::id();
  $post->save();
  return redirect("/miPerfil");
}
public function listadoPost() {
  $posteos = Post::all();
  $vac = compact("posteos");
  return view("miPerfil", $vac);
}
public function eliminarPosteo(Request $formulario) {
  $idPost = $formulario["idPost"];
  $post = Post::find($idPost);
  $post->delete();
  return redirect("/miPerfil");
}
}
