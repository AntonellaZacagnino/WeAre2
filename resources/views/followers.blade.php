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
                <div class="panel-heading">Followers</div>

                <div class="panel-body">
                    <div class="list-group">
                    @forelse ($list as $followers)
                        <a href="{{ url('/' . $followers->user) }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $followers->name }}</h4>
                            <p class="list-group-item-text">{{ $followers->user }}</p>
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
  @foreach($followers as $follower)
    <div class="alert alert-warning" role="alert">
      {{$post->listadoFollowers()}}

    </div><br>
  @endforeach
</div>
@endsection
