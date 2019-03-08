@extends('layouts.app')

@section('titulo')
We Are - Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agregar nueva publicación</div>
                <form class="" action="/miPerfil" method="post">
                  {{ csrf_field() }}
                  <input type="textarea" style="width:500px;height:100px" name="postText" placeholder="¿Que estas pensando?">
                  <button type="submit" name="button" class='btn btn-danger'>Compartir</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
