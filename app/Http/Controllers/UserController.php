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

  public function follows($username)
{
    // Find the User. Redirect if the User doesn't exist
    $user = User::where('username', $username)->firstOrFail();
// Find logged in User
    $id = Auth::id();
    $me = User::find($id);
    $me->following()->attach($user->id);
    return redirect('/' . $username);
}
public function unfollows($username)
{
    // Find the User. Redirect if the User doesn't exist
    $user = User::where('username', $username)->firstOrFail();
// Find logged in User
    $id = Auth::id();
    $me = User::find($id);
    $me->following()->detach($user->id);
    return redirect('/' . $username);
}

  // app/User.php
/**
 * The following that belong to the user.
 */
  public function following()
  {
      return $this->belongsToMany('App\User', 'followers', 'follower_user_id', 'user_id')->withTimestamps();
  }
  public function isFollowing(User $user)
  {
      return !is_null($this->following()->where('user_id', $user->id)->first());
  }
  // app/Http/Controllers/ProfileController.php
  public function show($user)
  {
      $user = User::where('user', $user)->firstOrFail();
      $me = Auth::user();
      $is_edit_profile = (Auth::id() == $user->id);
      $is_follow_button = !$is_edit_profile && !$me->isFollowing($user);
      return view('profile', ['user' => $user, 'is_edit_profile' => $is_edit_profile, 'is_follow_button' => $is_follow_button]);
  }
    // app/Http/Controllers/ProfileController.php
  public function show($user)
  {
       $user = User::where('user', $user)->firstOrFail();
       $is_edit_profile = false;
       $is_following = false;
       if (Auth::check()) {
             $is_edit_profile = (Auth::id() == $user->id);
             $me = Auth::user();
             $is_following = !$is_edit_profile && $me->isFollowing($user);
       }
      return view('profile', ['user' => $user, 'is_edit_profile' => $is_edit_profile, 'is_following' => $is_following]);
  }

  public function follows(Request $request)
{
     $username =  $request->input('user');
     try {
          $user = User::where('user', $username)->firstOrFail();
     } catch (ModelNotFoundException $exp) {
          return $this->responseFail('User doesn\'t exists');
     }
     // Find logged in User
     $id = Auth::id();
     $me = User::find($id);
     $me->following()->attach($user->id);
     return $this->responseSuccess();
}
  public function unfollows(Request $request)
  {
       $username =  $request->input('user');
       try {
            $user = User::where('user', $username)->firstOrFail();
       } catch (ModelNotFoundException $exp) {
            return $this->responseFail('User doesn\'t exists');
       }
       // Find logged in User
       $id = Auth::id();
       $me = User::find($id);
       $me->following()->detach($user->id);
       return $this->responseSuccess();
  }
  private function responseSuccess($message = '')
  {
       return $this->response(true, $message);
  }
  private function responseFail($message = '')
  {
       return $this->response(false, $message);
  }
  private function response($status = false, $message = '')
  {
       return response()->json([
            'status' => $status,
            'message' => $message,
            ]);
  }

  public function show($username)
{
    $user = User::where('username', $username)->firstOrFail();
    $followers_count =  $user->followers()->count();
    $is_edit_profile = false;
    $is_following = false;
    if (Auth::check()) {
        $is_edit_profile = (Auth::id() == $user->id);
        $me = Auth::user();
        $following_count = $is_edit_profile ? $me->following()->count() : 0;
        $is_following = !$is_edit_profile && $me->isFollowing($user);
    }
    return view('profile', [
        'user' => $user,
        'followers_count' => $followers_count,
        'is_edit_profile' => $is_edit_profile,
        'following_count' => $following_count,
        'is_following' => $is_following
        ]);
}
  public function following()
  {
      $me = Auth::user();
      $followers_count = $me->followers()->count();
      $following_count = $me->following()->count();
      $list = $me->following()->orderBy('username')->get();
      $is_edit_profile = true;
      $is_following = false;
      return view('following', [
          'user' => $me,
          'followers_count' => $followers_count,
          'is_edit_profile' => $is_edit_profile,
          'following_count' => $following_count,
          'is_following' => $is_following,
          'list' => $list,
          ]);
  }
  public function followers($username)
  {
      $user = User::where('username', $username)->firstOrFail();
      $followers_count =  $user->followers()->count();
      $list = $user->followers()->orderBy('username')->get();
      $is_edit_profile = false;
      $is_following = false;
      if (Auth::check()) {
          $is_edit_profile = (Auth::id() == $user->id);
          $me = Auth::user();
          $following_count = $is_edit_profile ? $me->following()->count() : 0;
          $is_following = !$is_edit_profile && $me->isFollowing($user);
      }
      return view('followers', [
          'user' => $user,
          'followers_count' => $followers_count,
          'is_edit_profile' => $is_edit_profile,
          'following_count' => $following_count,
          'is_following' => $is_following,
          'list' => $list,
          ]);
  }

}
