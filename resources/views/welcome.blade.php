@extends('layouts.app')

@section('titulo')
Bienvenido a We Are!
@endsection

@section('content')
          <div class="caja">
            <br>
            <br>
            <h3><strong>Bienvenid@ a We Are!</strong></h3>
            <br>
            <p class="texto-inicio">Es una plataforma de encuentro, un escenario donde te da la oportunidad de mostrar lo mejor de vos. Ayudamos a resaltar tu talento y que desde otro lado, te puedan localizar.
Somos un facilitador de búsqueda, nuestro objetivo es fomentar la autogestión reduciendo los tiempos y costos. Unite y creá la red de contactos con más trayecto de latinoamérica.
<br>
Hacé tu profesión, un arte. Creá tu perfil, demostrá lo que te hace único. Encontrá lo que buscás.
<br>
Somos WeAre. Bienvenido!
            </p>
          </div>
        </div>
        <div class="carrusel">
          <div class="d-flex justify-content-end">
           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
             </ol>
             <div class="carousel-inner">
               <div class="carousel-item active">
                 <img class="img-fluid" src="images/foto.png" alt="First slide">
                 <div class="carousel-caption">
                   <h5>Hola</h5>
                   <p>holaholahola</p>
                 </div>
               </div>
               <div class="carousel-item">
                 <img class="img-fluid" src="images/foto.png" alt="Second slide">
                 <div class="carousel-caption">
                   <h5>como estas</h5>
                   <p>como estascomo estascomo estascomo estas</p>
                 </div>
               </div>
               <div class="carousel-item">
                 <img class="img-fluid" src="images/foto.png" alt="Third slide">
                 <div class="carousel-caption">
                   <h5>todo bien</h5>
                   <p>todo bientodo bientodo bientodo bien</p>
                 </div>
               </div>
             </div>
             <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
             </a>
           </div>
         </div>
        </div>
      </div>

      <script src="{{asset("js/home.js")}}"></script>

@endsection

@extends('layouts.footer')
