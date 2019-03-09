@extends('layouts.app')

@section('titulo')
We Are - Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Haz una publicación</div>
                <form class="card-body" action="/miPerfil" method="post">
                  {{ csrf_field() }}
                  <input type="textarea" class="estado" name="postText" placeholder="Dile al mundo lo que tienes para contar...">
                  <button type="submit" name="button" class='boton-form'>Compartir</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
