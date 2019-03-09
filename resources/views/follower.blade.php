@extends('layouts.app')
@yield("scripts")

@section('titulo')
Perfil de
@endsection

@section("content")
<div>
  @foreach($followers as $follower)
    <div class="alert alert-warning" role="alert">
      {{$post->listadofollower()}}

    </div><br>
  @endforeach
</div>
@endsection
