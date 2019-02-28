@extends('layouts.app')

@section('titulo')
Mi perfil
@endsection

@section('content')

<h2>Perfil de {{ Auth::user()->user }}</h2>
<br>
<div class='card'>
<p>Nombre: {{ Auth::user()->name}}</p>
<p>País: </p> <select class="" name="">

</select>
<p>Fecha de nacimiento: </p> <input type="date" name="birthday_date" value="">
<p>Profesión:</p> <input type="text" name="profession" value="">
</div>
@endsection
