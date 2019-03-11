@extends('layouts.app')
@extends('layouts.profile')

@section('titulo')
Mi perfil
@endsection

@section('content')

<div class="panel-heading">Profile</div>
<div class="panel-body">
    {{ $username }}
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tweets</div>

                <div class="panel-body">
                    No tweet for now
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
