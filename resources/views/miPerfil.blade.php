@extends('layouts.app')

@section('titulo')
Mi perfil
@endsection

@section('content')

<div class="titulo">
  <h2>Editar perfil</h2>
</div>

<br>
<div class='caja-perfil'>
<form action="{{ route('miPerfil.editar') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-profile">
            <label class="input">Nombre:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name}}">
            <div class="invalid-feedback"></div>
          </div>
        </div>
      <br>
      <div class="col-md-6">
        <div class="form-profile">
          <label class="input">Nombre de usuario:</label>
          <input type="text" name="user" class="form-control" id="user" value="{{ Auth::user()->user}}">
          <div class="invalid-feedback"></div>
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <div class="form-profile">
          <label class="input">Email:</label>
          <input type="text" name="email" class="form-control" id="email" value="{{ Auth::user()->email}}">
          <div class="invalid-feedback"></div>
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <div class="form-profile">
          <label class="input">Contraseña:</label>
          <input type="password" name="password" class="form-control" id="password">
          <div class="invalid-feedback"></div>
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <div class="form-profile">
          <label class="input">País:</label>
          <select class="form-control" name="country" id="country" value="{{ Auth::user()->country}}">
          </select>
        </div>
      </div>
      <div class="col-md-6 hidden" id="citiesCol">
        <div class="form-profile">
          <label class="input">Provincia:</label>
          <select class="form-control" name="cities" id="cities" value="{{ Auth::user()->city}}">
          </select>
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <div class="form-profile">
          <label class="input">Fecha de nacimiento: </label>
          <input type="date" name="birthday_date" value="{{ Auth::user()->birthday_date}}" class="form-control">
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <div class="form-profile">
          <label class="input">Profesión:</label>
          <input type="text" name="profession" class="form-control" id="profession" value="{{ Auth::user()->profession}}">
          <div class="invalid-feedback"></div>
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <div class="form-profile">
          <label class="input">Foto de perfil:</label>
          <input type="file" name="avatar" class="form-control">
          @if ($errors->has('avatar'))
            <div class="alert alert-danger">
              {{$errors->first('avatar') }}
            </div>
          @endif
        </div>
      </div>

    </div>
    @if (Session::has('avatar'))
    <div class="alert alert-success">
      {{ Session::get('avatar') }}
    </div>
    @endif
    <div>
      <button type="submit" class="boton-form btn-lg btn-block col-md-10" style="margin-left:90px;margin-top:20px;">Guardar</button>
    </div>
  </div>
</form>

<br>
<br>

		<script src="/js/perfil.js"></script>

</div>

@endsection
