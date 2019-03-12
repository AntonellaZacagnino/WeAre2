@extends('layouts.app')


@section('titulo')
Perfil de {{ $user->user}}
@endsection

@section('content')

<div class="titulo">
  <h2>Perfil de {{ $user->user }}</h2>
</div>

<div class="follow-button">
@if (Auth::User()->id == $user->id)

@elseif (Auth::User()->isFollowing($user->id))
  <form action="{{url('unfollow/' . $user->id)}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <button type="submit" id="delete-follow-{{ $user->target_id }}" class="boton-form">
      <i class="fa fa-btn fa-trash"></i>Unfollow
    </button>
  </form>

@else

  <form action="{{url('follow/' . $user->id)}}" method="POST">
    {{ csrf_field() }}

    <button type="submit" id="follow-user-{{ $user->id }}" class="boton-form">
      <i class="fa fa-btn fa-user"></i>Follow
    </button>
  </form>

@endif
</div>

<div class="cajita">
<div class='caja-profile col-md-7'>

<ul>
  <li><strong>Nombre: </strong>{{ $user->name }}</li>
  <li><strong>País: </strong>{{ $user->country}}</li>
  <li><strong>Provincia: </strong>{{ $user->city  }}</li>
  <li><strong>Fecha de nacimiento: </strong>{{ $user->birthday_date }}</li>
  <li><strong>Profesión: </strong>{{ $user->profession }}</li>
</ul>

</div>

</div>
@if ($user->tieneFotoPerfil())
<div>
 <img src="{{$user->avatar}}" class="foto-perfil col-md-5">
</div>
@else
<div>
 <img src="https://via.placeholder.com/350x500" alt="No profile picture" class="foto-perfil">
</div>
@endif

<div class="posteos col-md-7">
  <h2><b style="color:#ce6b34">P</b><u style="text-decoration-color:#ce6b34">ublicaciones</u></h2>

</div>




@endsection
