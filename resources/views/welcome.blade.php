@extends('layouts.clients')
@section('estilos_unicos')
<style type="text/css">
  
.section1{
    padding: 40px;
}
body, html {
    height: 100%;
    margin: 0;
}
.full-height{
    min-height:100vh;
}
.section2{
  background-color: #f9f9f9;
}
/*.container-fluid{
    min-height:100vh;
    background-image: url("{{asset('img/Banner-ReeStock.jpg')}}");
    background-repeat: no-repeat;
}*/
.bg {

    background-image: url("{{asset('img/Banner-ReeStock.jpg')}}");
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
   .container-fluid {
      padding:0;
      margin:0;

    }
    .margin10 {
            margin-top: 0;
    }
    .red-reestock{
        color: #d32f2f;
    }
    .contact{
       /* background-color: #d32f2f;*/
        padding: 40px;
    }

</style>
@endsection

@section('navbar')

@section('contenido')
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="view">
                <img class="d-block w-100" src="{{url('img/lumiares-wine-offers-2.png')}}" alt="First slide">
                <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption">
                <h1 class="h1-responsive">Los productos mas frescos hasta la puerta de tu casa</h1>
               {{--  <p>First text</p> --}}
            </div>
        </div>
        <div class="carousel-item">
           

            <div class="view">

                <img class="d-block w-100" src="{{url('img/Banner_Principal_Mesa_con_cosas_(432x1440).jpg')}}" alt="Second slide">
                <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption">
                <h1 class="h1-responsive">Sin filas y en tu casa</h1>
               
            </div>
        </div>
        {{--<div class="carousel-item">
          
            <div class="view">
                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg" alt="Third slide">
                <div class="mask rgba-black-slight"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Slight mask</h3>
                <p>Third text</p>
            </div>
        </div> --}}
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>

 <section class="section1">
        
    
    <h1 class="py-3 font-bold text-center red-reestock">¿Cómo hacerlo?</h1>
    
    <p class="px-5 mb-3 mt-0 pb-2 lead red-text text-center">En ReeStock sabemos la importancia de aprovechar el tiempo en su totalidad, tu puedes decidir en que utilizarlo, ¿Cómo? Solo tienes que realizar tu lista de supermercado, especificar con que frecuencia consumes los productos y esperar la entrega. ¿Asi de simple! </p>


    <div class="row">

        <div class="col-md-4 mt-4 ml-2">

            <div class="row mb-2">
                <div class="col-2">
                    <img class="img-fluid" src="{{asset('img/icono_iphone.jpg')}}">
                </div>
                <div class="col-10 text-left">
                    <h4 class="font-bold red-reestock h3">Paso 1</h4>
                    <p class="grey-text h5-responsive">Crea una cuenta desde tu smartphone tablet o computadora.</p>
                </div>
            </div>
       
          {{--   <div class="row mb-2">
                <div class="col-2">
                    <img class="img-fluid" src="{{asset('img/lista.jpg')}}">
                </div>
                <div class="col-10 text-left">
                    <h5 class="font-bold red-reestock">Una Sola Lista</h5>
                    <p class="grey-text">Crea una lista base con diferentes frecuencias, ¡No tendras que preocuparte nunca más!</p>
                </div>
            </div> --}}

            <div class="row mb-2 mt-5">
                <div class="col-2">
                    <img class="img-fluid" src="{{asset('img/lista_estrella.jpg')}}">
                </div>
                <div class="col-10 text-left">
                    <h5 class="font-bold red-reestock h3">Paso 2</h5>
                    <p class="grey-text h5-responsive">Crea tu lista de compra con tus productos favoritos.</p>
                </div>
            </div>

        </div>

        <div class="col-md-3 mb-2 center-on-small-only flex-center ml-3">
            <img src="{{asset('img/rsz_sniora.png')}}" alt="" class="z-depth-0">
        </div>

        <div class="col-md-4 mt-4 ml-1">

            <div class="row mb-2 ">
                <div class="col-2">
                    <img class="img-fluid" src="{{asset('img/relojcorazon.jpg')}}">
                </div>
                <div class="col-10 text-left">
                    <h5 class="font-bold red-reestock h3">Paso 3</h5>
                    <p class="grey-text h5-responsive">Recibe tu pedido en la comodidad de tu casa.</p>
                </div>
            </div>

            <div class="row mb-2">
             {{--    <div class="col-2">
                    <img class="img-fluid" src="{{asset('img/productoss.jpg')}}">
                </div>
                <div class="col-10 text-left">
                    <h5 class="font-bold red-reestock">Productos Locales</h5>
                    <p class="grey-text">Encuentra los productos que tanto te gustan, y tenlos siempre en tu hogar con un solo click.</p>
                </div> --}}
            </div>

            <div class="row mb-2 mt-5">
                <div class="col-2">
                    <img class="img-fluid" src="{{asset('img/camion.jpg')}}">
                </div>
                <div class="col-10 text-left">
                    <h5 class="font-bold red-reestock h3">Paso 4</h5>
                    <p class="grey-text h5-responsive font-weight-normal">Dinos cada cuanto quieres recibir cada uno de tus productos.</p>
                </div>
            </div>
        </div>

    </div>
</section>
<!--Section: Features v.1-->
 <section class="text-center p-5 section2">
    <div class="row">

    <div class="col-md-4 mb-r">
      <div class="col-md-12 ">
         <img class="img-fluid mx-auto d-block" src="{{asset('img/listalapiz.jpg')}}">
      </div>
       
        <h5 class="font-bold mt-3">Edita las veces que quieres</h5>
        <p class="grey-text">Puedes modificar tus listas las veces que quieras, quitar o añadir productos y cambiar cada cuanto las quieres recibir.
        </p>
    </div>
  
    <div class="col-md-4 mb-r">
       <div class="col-md-12 ">
          <img class="img-fluid mx-auto d-block" src="{{asset('img/productos.jpg')}}">
        </div>
        
        <h5 class="font-bold mt-3">Productos locales</h5>
        <p class="grey-text">Encuentra los productos que tanto te gustan, y tenlos siempre en tu hogar con un solo click.
        </p>
    </div>

    <div class="col-md-4 mb-r">
        <div class="col-md-12 ">
          <img class="img-fluid mx-auto d-block" src="{{asset('img/relojazul.jpg')}}">
        </div>
        <h5 class="font-bold mt-3">Disfruta tu tiempo</h5>
        <p class="grey-text">Despreocupate de ir al super. ¿sabias qué en promedio, una persona, tarda de 2 a 3 horas en realizar las compras del hogar?
        </p>
    </div>


    </div>


</section>


<section class="contact">
    <div class="row">
        <div class="col-md-6">
            <h2 class="font-bold black-text">¡Contactanos!</h2>
             <p class="px-5 mb-3 mt-0 pb-2 grey-text text-left">Nos encantaría recibir tus comentarios, para sugerencias o aclaraciones escribenos a reestock.mx@gmail.com</p>
        </div>
        <div class="col-md-6">
            {{-- <h2 class="font-bold white-text">Dirección</h2>
             <p class="px-5 mb-3 mt-0 pb-2 white-text text-left">Nos enctaría ecibir tus comentarios, ara sugerencias o aclaraciones escribenos a reestock.mx@gmail.com</p> --}}

          <!--Google map-->
          <div id="map-container" class="rounded z-depth-1-half map-container" style="height: 400px"></div>

          <br>
          <!--Buttons-->
          <div class="row text-center">
            <div class="col-md-4">
              <a class="btn-floating blue accent-1">
                <i class="fa fa-map-marker"></i>
              </a>
              <p>Av. Kiki Murillo, Edificio Comercial</p>
              <p>Local 102-27</p>
            </div>

            <div class="col-md-4">
             {{--  <a class="btn-floating blue accent-1"> --}}
               {{--  <i class="fa fa-phone"></i> --}}
               <img src="{{url('img/whatsapp.png')}}">
              {{-- </a> --}}
              <p>(667) 189 3640</p>
              <p>Atención a Clientes, 9:00 am - 7:00 pm</p>
            </div>

            <div class="col-md-4">
              <a class="btn-floating blue accent-1">
                <i class="fa fa-envelope"></i>
              </a>
              <p>info@reestock.com.mx</p>
              <p>soporte@reestock.com.mx</p>
            </div>
          </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
@section('scripts_unicos')
<script type="text/javascript">

      function initMap() {
        var uluru = {lat: 24.7388256, lng: -107.393085};
        var map = new google.maps.Map(document.getElementById('map-container'), {
          zoom: 17,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd1qzOFMZQ5qNxXhUR8jYRPNqblQtHg9g&callback=initMap">
  
        

        </script>
@endsection