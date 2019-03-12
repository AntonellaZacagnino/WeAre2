<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\UploadPhoto;
use App\post;
use App\User;
use Auth;

class PostController extends Controller
{


  public function __construct()
{
    $this->middleware('auth');
}

public function listarPost()
    {
    $posts = post::orderBy('created_at', 'desc')->get();
    return view('home', ['posts' => $posts]);
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
  $post->user_id = Auth::id();
  $post->save();
  return redirect("/home");
}

public function eliminarPosteo(Request $formulario) {
  $idPost = $formulario["idPost"];
  $post = Post::find($idPost);
  $post->delete();
  return redirect("/miPerfil");
}
}
