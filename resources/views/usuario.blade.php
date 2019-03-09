@extends('layouts.app')
@yield("scripts")

@section('titulo')
Perfil de
@endsection

@section('content')
<ul>
  <li>Nombre: {{ Auth::user()->user }}</li>
  <li>Vive en: {{ Auth::user()->country}}</li>
  <li>Profesión: {{ Auth::user()->profession }}</li>
</ul>

@if (Auth::check())
  <div class="">
    <input type="button" class="btn btn-warning" name="Seguir" value="Seguir">

  </div>
@endif
@extends('layouts.app')

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
</div>



<h1>Posteos</h1>

<div>
  @foreach($posteos as $post)
    <div class="alert alert-warning" role="alert">
      {{$post->listadoPost()}}

      <input type="submit" class="btn btn-secondary rounded float-right" name="Eliminar" value="Eliminar">
      <input type="submit" class="btn btn-info rounded float-right" name="Editar" value="Editar">
    </div><br>
  @endforeach
</div>

@endsection

@section('scripts')
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
@endsection
