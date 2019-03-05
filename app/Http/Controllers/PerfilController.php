<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PerfilController extends Controller
{
    public function datos($auth) {
        $usuario = User::find($user);

        return view("miPerfil", compact('usuario'));
      }

      public function detalle($id) {

        $usuario = User::find($id);

        return view("detalleUsuario", compact('usuario'));
      }   
    }
