@extends('layouts.app')

@section('titulo')
Perfil de
@endsection

@section('content')
<ul>
  <li>Nombre: {{ Auth::user()->user }}</li>
  <li>Vive en: {{ Auth::user()->country}}</li>
  <li>Profesión: {{ Auth::user()->profession }}</li>
</ul>

@if (Auth::check())
  <div class="">
    <input type="button" class="btn btn-warning" name="Seguir" value="Seguir">

  </div>
@endif

<h1>Posteos</h1>

<div>
  @foreach($posteos as $post)
    <div class="alert alert-warning" role="alert">
      {{$post->listadoPost()}}

      <input type="submit" class="btn btn-secondary rounded float-right" name="Eliminar" value="Eliminar">
      <input type="submit" class="btn btn-info rounded float-right" name="Editar" value="Editar">
    </div><br>
  @endforeach
</div>

@endsection
