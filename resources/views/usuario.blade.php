// resource/views/layouts/profile.blade.php

@section('head')
<meta name="csrf_token" id="token" content="{{ csrf_token() }}" />
@endsection



@extends('layouts.app')

<!---@yield("scripts")--->

<!-- @section('titulo')
Perfil de {{ $user->user}}
@endsection -->
<!--
@section('content') -->

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
<!--
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
</div> -->


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

<div class="col-md-8">
 <ul class="nav navbar-nav">
  <li class="active">
      <a href="#" class="text-center">
          <div class="text-uppercase">Tweets</div>
          <div>0</div>
      </a>
  </li>
  @if ($is_edit_profile)
  <li>
      <a href="{{ url('/following') }}" class="text-center">
          <div class="text-uppercase">Following</div>
          <div>{{ $following_count }}</div>
      </a>
  </li>
  @endif
  <li>
      <a href="{{ url('/' . $user->user . '/followers') }}" class="text-center">
          <div class="text-uppercase">Followers</div>
          <div>{{ $followers_count }}</div>
      </a>
  </li>
 </ul>
</div>


@if (Auth::check())
    @if ($is_edit_profile)
    <a href="#" class="navbar-btn navbar-right">
        <button type="button" class="btn btn-default">Edit Profile</button>
    </a>
    @else
    <button type="button" v-on:click="follows" class="navbar-btn navbar-right btn btn-default">@{{ followBtnText }}</button>
    @endif
@endif
…
<!-- <script src="/js/app.js"></script> -->
<script src="https://unpkg.com/vue@2.1.10/dist/vue.js"></script>
<script src="https://unpkg.com/vue-resource@1.2.0/dist/vue-resource.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            user: '{{ $user->user }}',
            isFollowing: {{ $is_following ? 1 : 0 }},
            followBtnTextArr: ['Follow', 'Unfollow'],
            followBtnText: ''
        },
        methods: {
            follows: function (event) {
                var csrfToken = Laravel.csrfToken;
                var url = this.isFollowing ? '/unfollows' : '/follows';
                this.$http.post(url, {
                    'user': this.user
                }, {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => {
                    var data = response.body;
                    if (!data.status) {
                        alert(data.message);
                        return;
                    }
                    this.toggleFollowBtnText();
                });
            },
            toggleFollowBtnText: function() {
                this.isFollowing = (this.isFollowing + 1) % this.followBtnTextArr.length;
                this.setFollowBtnText();
            },
            setFollowBtnText: function() {
                this.followBtnText = this.followBtnTextArr[this.isFollowing];
            }
        },
        mounted: function() {
            this.setFollowBtnText();
        }
    });
</script>
@endsection
