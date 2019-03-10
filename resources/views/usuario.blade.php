@extends('layouts.app')

<!---@yield("scripts")--->

@section('titulo')
Perfil de {{ $user->user}}
@endsection

@section('content')

<!----@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            ... EL OTRO PANEL FUE OMITIDO PARA LA BREVEDAD DEL CÓDIGO


             <div class="panel panel-default">
                <div class="panel-heading">Tus fotos</div>

                <div class="panel-body">
                    <div class="container">
                        <div class="row text-lg-left">
                            @foreach (Auth::user()->posts as $post)
                                <div class="col-md-2">
                                    <div class="card mb-2 box-shadow">

                                        <img src="{{ $post->photo }}"

                                            v-on:click="openModal"
                                            photo="{{ $post->photo }}"
                                            description="{{ $post->description }}"

                                            alt="{{ $post->description }}"
                                            height="150">

                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="modal fade" id="post_modal" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">{{ Auth::user()->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img v-bind:src="photo" width="400">
                                                </div>
                                                <div class="col-md-3">
                                                    <strong class="label label-default">{{ Auth::user()->name }}</strong>
                                                    @{{ description }}
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                              </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>---->

<div class="cajita">
<div class='caja-profile'>

<ul>
  <li><strong>Nombre: </strong>{{ $user->name }}</li>
  <li><strong>País: </strong>{{ $user->country}}</li>
  <li><strong>Provincia: </strong>{{ $user->city  }}</li>
  <li><strong>Fecha de nacimiento: </strong>{{ $user->birthday_date }}</li>
  <li><strong>Profesión: </strong>{{ $user->profession }}</li>
</ul>
@if (Auth::check())
  <div class="follow-button">
    <input type="button" class="boton-form" name="Seguir" value="Seguir">

  </div>
@endif
</div>

<div>
 <img src="{{$user->avatar}}" class="foto-perfil">
</div>
</div>

<div class="posteos">
  <h2><b style="color:#ce6b34">P</b><u style="text-decoration-color:#ce6b34">ublicaciones</u></h2>
  
</div>

<!---@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                photo: null,
                description: null,
            },
            methods: {
                openModal: function(e) {
                    this.photo = e.target.getAttribute('photo')
                    this.description = e.target.getAttribute('description')
                    $('#post_modal').modal()
                }
            }
        });
    </script>
@endsection--->




@endsection
