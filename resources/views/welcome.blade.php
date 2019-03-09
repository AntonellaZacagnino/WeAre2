@extends('layouts.app')

@section('titulo')
Bienvenido a We Are!
@endsection

@section('content')
          <div class="caja">
            <br>
            <br>
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
                 <img class="img-fluid" src="images/modelo.png" alt="First slide">
                 <div class="carousel-caption">
                   <h5  class="text-light bg-warning">Rosalía - Modelo</h5>
                   <p class="text-black">"No solo encontré campañas, encontré amigos y cientos de experiencias"</p>
                 </div>
               </div>
               <div class="carousel-item">
                 <img class="img-fluid" src="images/photographer.png" alt="Second slide">
                 <div class="carousel-caption">
                   <h5 class="text-light bg-warning">Melanie - Fotógrafa</h5>
                   <p class="text-black">"Gracias a WeAre pude armar mi portafolio y comenzar como fotógrafa. Esto me llena el alma"</p>
                 </div>
               </div>
               <div class="carousel-item">
                 <img class="img-fluid" src="images/productor.png" alt="Third slide">
                 <div class="carousel-caption">
                   <h5 class="text-light bg-warning">DeFernandez - Productor</h5>
                  <p class="text-black">"Siempre quise viajar para trabajar de lo que amo, desde WeAre pude cumplir mi sueño"</p>
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
