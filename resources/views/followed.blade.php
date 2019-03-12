@extends('layouts.app')
@yield("scripts")

@section('titulo')
Perfil de
@endsection

@section("content")
<div>
  @foreach($followeds as $followed)
    <div class="alert alert-warning" role="alert">
      {{$post->listadofollowed()}}

      <input type="submit" class="btn btn-secondary" name="Eliminar" value="Eliminar">
    </div><br>
  @endforeach
</div>
@endsection
