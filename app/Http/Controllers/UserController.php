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

      return view("/usuario")->with('user', $user);
  }

  public function actualizarFotoPerfil(actualizarFotoPerfil $request)
    {
        $file = $request->file('avatar');
        $filename = str_random(10) . '.' .$file->getClientOriginalExtension();

        $user = Auth::user();
        $file->move($this->avatarsFolder,$filename);//
        $user->avatar = $filename; //
        $user->save(); //
        return redirect()->route('usuario', ['id' => $user->id]);
    }
    public function editarPerfil()
    {
        return view('miPerfil');
    }
    public function actualizarPerfil(actualizarPerfil $request)
    {
        $user = Auth::user();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = str_random(10) . '.' .$file->getClientOriginalExtension();
            $file->move($this->avatarsFolder, $filename);
            $user->avatar = $filename;
        }
        $user->name = $request->input('name');
        $user->user = $request->input('user');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->birthday_date = $request->input('birthday_date');
        $user->profession = $request->input('profession');
        $user->save();
        $request->session()->flash('perfil_actualizado', 'El perfil se actualizo exitosamente.');
        return view("usuario");
    }


}
