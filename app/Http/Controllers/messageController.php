<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class messageController extends Controller
{
      public function mandarMensaje() {
      $users = User::all();
      $vac = compact("users");
      return view("mandarMensaje", $vac);
      }

      public function almacenar(Request $formulario) {

      $reglas = [
        "mensaje" => "required|string|min:1|max:2000",
        "poster" => "required|image"
      ];

      $this->validate($formulario, $reglas);

      $poster = $formulario->file("poster");
      $rutaDondeSeGuardaElArchivo = $poster->store("public");
      $nombreDelArchivo = basename($rutaDondeSeGuardaElArchivo);

      $mensaje = new Mensaje();

      $mensaje->mensaje =  $formulario["mensaje"];
      $mensaje->poster = $nombreDelArchivo;

      $mensaje->save();

      return redirect("/message");
      }
}
