<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\UploadPhoto;
use App\Photo;
use App\Post;
use App\User;
use Auth;

class PostController extends Controller
{

  private $userPhotosFolder = "photos";
  public function uploadPhoto (uploadPhoto $request)
  {
        $file= $request->file("photo");
        $description=$request->get("description");
        $filename= str_random(10) . " . " .$file->getClientOriginalExtension();
        $user= Auth::user();
        $post=new Post;
        $file->move($this->usePhotosFolder, $filename);
        $post->user_id = $user->id; ;
        $post->photo = $filename ;
        $post->description = $description;
        $post->save();
        return redirect()->route("home");
  }

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
  $post->user_id = Auth::id();
  $post->save();
  return redirect("/home");
}
public function listaPost($id) {
  $post = Post::all($id);

  $vac = compact("post");
  return view("/usuario/{id}", $vac);
}
public function eliminarPosteo(Request $formulario) {
  $idPost = $formulario["idPost"];
  $post = Post::find($idPost);
  $post->delete();
  return redirect("/miPerfil");
}
}
