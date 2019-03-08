@extends('layouts.app')

@section('titulo')
Mi perfil
@endsection

@section('content')

<h2>Perfil de {{ Auth::user()->user }}</h2>
<br>
<div class='card'>
<p>Nombre: {{ Auth::user()->name}}</p>
<form action="">
  {{ csrf_field() }}
  <div class="container">
    <div class="row">

      <div class="col-md-6">
        <div class="form-group">
          <label>Email:</label>
          <input type="text" name="email" class="form-control" id="email" value="{{ Auth::user()->email}}">
          <div class="invalid-feedback"></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Contraseña:</label>
          <input type="password" name="password" class="form-control" id="password">
          <div class="invalid-feedback"></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>País:</label>
          <select class="form-control" name="country" id="country" value="{{ Auth::user()->country}}">
          </select>
        </div>
      </div>
      <div class="col-md-6 hidden" id="citiesCol">
        <div class="form-group">
          <label>Provincia:</label>
          <select class="form-control" name="cities" id="cities">
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Fecha de nacimiento: </label>
          <input type="date" nam  e="birthday_date" value="{{ Auth::user()->birthday_date}}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Profesión:</label>
          <input type="text" name="profession" class="form-control" id="profession" value="{{ Auth::user()->profession}}">
          <div class="invalid-feedback"></div>
        </div>
      </div>
        <button class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>

<br>
<br>





		<script src="/js/perfil.js"></script>

</div>

@endsection
