<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>
      @yield('titulo')
    </title>

    <!-- Scripts -->



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="/images/logo-1.png" width="180" height="50" alt="logo" class='logo'>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                              <button class="boton"> <a href="{{ route('login') }}">{{ __('Loguearse') }}</a></button>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                <button class="boton"> <a href="{{ route('register') }}">{{ __('Registrarse') }}</a> </button>
                                </li>
                            @endif
                        @else
                        <form class="form-inline my-2 my-lg-0">
                          <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
                          <button class="boton-buscar my-2 my-sm-0" type="submit"> <img src="https://image.flaticon.com/icons/svg/44/44514.svg" style="width:12px;height:12px;" alt=""> </button>
                            </form>
                            <li class="menu-logueado">
                                <a id="navbarDropdown" class="text-black" href="/usuario/{{Auth::user()->id}}" >
                                    {{ Auth::user()->user }}
                                </a>
                            </li>
                            <li class="menu-logueado"> || </li>
                            <li class="menu-logueado">
                                <a id="navbarDropdown" class="text-black" href="/miPerfil" >
                                    Editar perfil
                                </a>
                            </li>
                            <li class="menu-logueado"> || </li>
                            <li class="menu-logueado">
                                <div class="menu-logueado">
                                    <a class="text-black" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main >
            @yield('content')
        </main>
    </div>

     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{{asset("js/app.js")}}">

    </script>
</body>

</html>
