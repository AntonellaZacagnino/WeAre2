@extends('layouts.app')


@section('titulo')
Perfil de {{ $user->user}}
@endsection

@section('content')


<div class="cajita">
<div class='caja-profile col-md-7'>

<ul>
  <li><strong>Nombre: </strong>{{ $user->name }}</li>
  <li><strong>País: </strong>{{ $user->country}}</li>
  <li><strong>Provincia: </strong>{{ $user->city  }}</li>
  <li><strong>Fecha de nacimiento: </strong>{{ $user->birthday_date }}</li>
  <li><strong>Profesión: </strong>{{ $user->profession }}</li>
</ul>
@if (Auth::check())
  <div class="follow-button">
    <button type="submit" name="Seguir" class="boton-form">Seguir</button>


  </div>

@endif
</div>

</div>
@if ($user->tieneFotoPerfil())
<div>
 <img src="{{$user->avatar}}" class="foto-perfil col-md-5">
</div>
@else
<div>
 <img src="https://via.placeholder.com/150x150" alt="No profile picture" class="foto-perfil">
</div>
@endif

<div class="posteos col-md-7">
  <h2><b style="color:#ce6b34">P</b><u style="text-decoration-color:#ce6b34">ublicaciones</u></h2>

</div>





@endsection
