@extends('layouts.app')
@yield("scripts")

@section('titulo')
Perfil de
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Following</div>

                <div class="panel-body">
                    <div class="list-group">
                    @forelse ($list as $following)
                        <a href="{{ url('/' . $following->user) }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $following->name }}</h4>
                            <p class="list-group-item-text">{{ $following->user }}</p>
                        </a>
                    @empty
                        <p>No users</p>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("content")
<div>
  @foreach($followeds as $followe)
    <div class="alert alert-warning" role="alert">
      {{$post->listadoFollowed()}}

      <input type="submit" class="btn btn-secondary" name="unfollows" value="Dejar de Seguir">

    </div><br>
  @endforeach
</div>
@endsection
