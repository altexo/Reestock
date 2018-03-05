@extends('layouts.app')

@section('estilos')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{url('css/jquery.nice-number.css')}}" rel="stylesheet" type="text/css">
@section('contenedor_class','margin10')

<style type="text/css">
.checkout
{
    height: 0%;
    padding: 5px;
     cursor: pointer;
}
.total{
    border-radius: 5%;
}
.icon-img{
        margin-bottom: 3px;
    height: 15px;
    width: 15px;
}
.del-product-container{
    height: 0px;
}
.del-product{
    transform: translate(1200%,-105%);
}
.product-basket{
    padding-top: 5px;
    padding-bottom: 5px;
    background-color: white;
        padding-bottom: 0.1rem!important;
}
.modal-products{
    /*background-color: #f7f7f7;*/
    background-color: white;
    /*padding-right: 0px !important;*/
}

.basket-button
{
    border: none;
    cursor: pointer;
}
    .number-button 
    { 
        background-color:#34BC9D; 
        color: black; 
        border:3px solid #34BC9D;
    }
    .basket-p-name{
        margin-bottom: -10px;
    }
                                   
    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575px) { 
           .modal .modal-full-height.modal-lg {
              max-width: 100%;
            width: 100%;
        }
        .del-product{
            transform: translate(780%,-90%);
        }
        .mobile{
            display: block;
        }
          .mobile-logo{
            max-width: 75%;
        }
        .margin10 {
        margin-top: 30% !important;
    }
        .mobile-img{
            max-width: 30%
        }
     }

    /*// Small devices (landscape phones, less than 768px)*/
    @media (min-width: 767px) { 
        .modal .modal-full-height.modal-lg {
            max-width: 530px;
            width: 100%;
        }
        .mobile{
            display: block;
        }
 /*       .margin10 {
    margin-top: 30% !important;
}*/
     }
    /*// Medium devices (tablets, less than 992px)*/
    @media (min-width: 991px) { 
        .modal .modal-full-height.modal-lg {
            max-width: 520px
        }
        .mobile{
            display: none;
        }
        
     }
    /*// Large devices (desktops, less than 1200px)*/
    @media (min-width: 1199px) { 
        .modal .modal-full-height.modal-lg {
            max-width: 520px
        }
        .mobile{
            display: none;
        }
        .mobile-logo{
            max-width: 75%;
        }
        
     }
     @media (min-width: 1200px) { 
        .modal .modal-full-height.modal-lg {
            max-width: 520px
        }
        .mobile{
            display: none;
        }
        
     }


/*.pagination{
    font-size: 20px;
}*/body, body *:not(html):not(style):not(br):not(tr):not(code) {
    font-family: Avenir, Helvetica, sans-serif;
    box-sizing: border-box;
}
	.color-navbar nav
	{
		background-color: #ff5d5b !important;
	}
	.margin10 {
            margin-top: 10%;
    }
    .active-white input[type=text]:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    box-shadow: 0 1px 0 0 #fff;
}
.modal{
	font-size: 12px !important;
}
.remove-button
{
	padding: 10px !important;
    padding-left: 15px !important;
    padding-right: 15px !important;
}
.w-auto {
    width: auto;
}
/*Scroll for side list*/
.scrollbar {
    margin-left: 30px;
    float: left;
    height: 300px;
    width: 65px;
    background: #fff;
    overflow-y: scroll;
    margin-bottom: 25px;
}
.force-overflow {
    min-height: 450px;
}

.scrollbar-primary::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-primary::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #4285F4; }
/*End scroll*/
.equal {  
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex:1 0 auto;
}
.modal-container
{

      height: 100%;
       overflow: auto; 
}
li.hidden {
    display: none;
}
div.hidden {
    display: none;
}
.menu-resp{
    z-index: 0;
}
</style>
    @yield('estilos_unicos')

@endsection

@section('navbar') <!--Navbar-->
        <nav class=" nav navbar  fixed-top navbar-toggleable-md navbar-dark red scrolling-navbar" >
                <button class="navbar-toggler collapsed red menu-resp" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="container">
                
                <a class="navbar-brand " href="{{url('/')}}">
                    <img src="{{asset('img/rsz_reestock.png')}}" class="img-fluid flex-center mobile-logo">
                </a>

                
                <div class="collapse navbar-collapse" id="navbarNav1">
            		<ul class="navbar-nav ml-auto">
            			<!-- <li class="nav-item">
                    		<a class="nav-link"><span>Ayuda</span></a>
                		</li> -->
                		<li class="nav-item">
                    		<a class="nav-link" href="{{ url('/tienda') }}"><span>Tienda</span></a>
                		</li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}"><span>Mis listas</span></a>
                        </li>
                		<li class="nav-item special-use">
                    		<a class="nav-link" href="#" data-toggle="modal"  data-target="#fluidModalRightSuccessDemo">
                            <span id="badge" class="badge primary-color">{{Cart::content()->count()}}</span>
                            <span><i class="fa fa-shopping-basket" aria-hidden="true"></i></span></a>
                    	<!-- 	<button type="button" data-toggle="modal" data-target="#fluidModalRightSuccessDemo"><i></i></button> -->
                		</li>
                     
                		@if (Auth::guest())
                		<li class="nav-item">
                    		<a class="nav-link" href="{{ url('/registrar') }}"><span>Regístrate</span></a>
                		</li>
                 		<li class="nav-item">
                    		<a class="nav-link" href="{{ url('/iniciar-sesion') }}"><span>Iniciar sesión </span></a>
                		</li>
                		@else
                		 <!-- Dropdown -->
			            <li class="nav-item dropdown">
			                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
                                                    {{ Auth::user()->name }}</a>
			                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
			                    <a class="dropdown-item" href="#">Perfil</a>
			                    <a class="dropdown-item" href="{{ route('logout') }}"
			                     onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Cerrar Sesión
                                </a>
			                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
			            </li>
                           
                        @endif
            		</ul>
           
        		</div>
                <div class="mt-2  float-right mobile">   <a class="nav-link float-right" href="#" data-toggle="modal"  data-target="#fluidModalRightSuccessDemo">{{-- <span id="mobile-badge" class="badge primary-color">{{Cart::content()->count()}}</span> --}}<span><i class="fa fa-shopping-basket fa-2x" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </nav>
        <!--/.Navbar-->
              
@yield('header_unico')
@endsection


@section('contenido')


@endsection
@section('sideCart')
<!--Reestock modal-->
<div class="modal fade" id="reestockModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                <!--Content-->
                <div class="modal-content">

                    <!--Header-->
                    <div class="modal-header">
                        <img src="" class="rounded-circle img-responsive" alt="Avatar photo">
                    </div>
                    <!--Body-->
                    <div class="modal-body text-center mb-1">

                        <h6 class="mt-1 mb-3">-----</h6>
                        <input type="hidden" id="p-rowID" class="form-control ml-0">
                        <div class="md-form ml-0 mr-0">
                            <div class="md-form">
                                <select class="mdb-select colorful-select dropdown-primary" id="newReestock">

                                    <option  value="0">Unica vez</option>
                                    <option  value="7">Cada 7 días</option>
                                    <option value="14">Quincenal</option> 
                                    <option value="28">Mensual</option>
                                    <option value="42">Cada 6 semanas</option>
                                    <option value="56">Cada 2 meses</option>
                                    <option value="182">Cada 6 meses</option>
                                </select>
                                <label>Reestock Cada: </label>
                            </div>
                                                               
                        </div>

                        <div class="text-center">
                            <button class="btn btn-cyan mt-1 waves-effect waves-light" id="SaveNewReestock">Cambiar
                               
                            </button>
                        </div>
                    </div>

                </div>
                <!--/.Content-->
            </div>
        </div>
<!--Reestock modal-->
<div class="modal fade right modal-md" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="true" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-full-height modal-right modal-lg  modal-notify modal-danger modal-container modal-custom-responsive" role="document">
                <!--Content-->
                <div class="modal-content modal-container">
                    <!--Header-->
                    <div class="modal-header">{{-- <p>Canasta</p> --}}

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class="white-text">×</span>
                                                            </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body modal-products">
                        <div class="text-center">
                            <i class="fa fa-shopping-basket fa-4x mb-3 animated rotateIn"></i>
                           
                        </div>
                         <!-- Shopping Cart table -->
                <div class="row" id="list">
                    @forelse(Cart::content() as $item)
                        <div class="col-md-12 row pr-0 mb-2 product-basket">
                            <div class="col-md-12 del-product-container">
                                <a class="btn-floating btn-sm red del-product" id="n-remove-button"><i style="color: white" class="fa fa-trash"></i></a>
                                 <input type="hidden" id="rowID" value="{{$item->rowId}}" name="">
                            </div>
                            

                            <div class="col-md-2 p-0 py-1">
                                @if($item->model->product_img) <img src="{{url($item->model->product_img)}}" class="img-fluid mobile-img">
                                @else
                                    <img src="{{url('img/no-img.jpg')}}" class="img-fluid no-shadow mobile-img"  alt="">                               
                                @endif    
                            </div>
                            <div class="col-md-6 p-0 row py-0">
                                <div class="col-md-12">
                                    <label class="basket-p-name">  {{ $item->name}}</label><br>
                                    <label class="font-weight-bold pb-0">{{$item->model->brand}}</label> <label class="pb-0">{{$item->model->unity}}</label><br>
                                    <button class="basket-button pl-0"><i class="fa fa-edit fa-lg"></i> Instrucciones</button><br>
                                    <input type="hidden" id="rowID" value="{{$item->rowId}}" name="" >

                                    <a href="#"><button class="basket-button pl-0" 
                                        data-dismiss="modal" 
                                        id="reesotckModal" 
                                        data-rid="{{$item->rowId}}" 
                                        data-name="{{$item->name}}" 
                                        data-img="  @if($item->model->product_img){{url($item->model->product_img)}} 
                                                    @else 
                                                    {{url('img/no-img.jpg')}}
                                                    @endif
                                                "
                                      >
                                      <img src="{{url('icons/ree-bag.png')}}" class="icon-img"> Reestock cada: 
                                        @if($item->options->reestock == 0)
                                            Única vez
                                        @elseif($item->options->reestock <= 30)
                                            {{$item->options->reestock}} días 
                                        @elseif($item->options->reestock == 45)
                                            6 Semanas
                                        @elseif($item->options->reestock == 60)
                                            2 Meses 
                                        @elseif($item->options->reestock == 180)
                                            6 Meses                                     
                                      @endif
                                    </button></a>
                                     
                                </div>
                           </div>
                            <div class="col-md-3 p-0 py-1 pl-1">
                                 @if($item->model->unity == "KG" || $item->model->unity == "KILO" )
                                    <label>KG</label><br>
                                     <input class="col-md-6 input-alternate number-button" type="number" id="qty" value="{{$item->qty}}"  min="0.20" max="99999.99" step="0.20" pattern="^\d+(?:\.\d{1,2})?$">
                                 
                                 @else
                                    <input class="input-alternate number-button b-number" type="number" id="qty" value="{{$item->qty}}" disabled min="1" max="999">
                                @endif
                                 <input type="hidden" id="rowID" value="{{$item->rowId}}" name="">
                            </div>
                            <div class="col-md-1 p-0 py-1">

                                    <label id="amount">${{ $item->price * $item->qty}}</label>

                            </div>
                           
                        </div>
                        @empty
                       @endforelse
           

                </div>
                <!-- Shopping Cart table -->
                    </div>

                    <!--Footer-->
                    <div class="d-flex justify-content-center white py-3 pt-1 " style="  bottom: 0; position: sticky; z-index:100;">
                        <div onclick="location.href='{{ url('/checkout') }}';" class="col-md-11 d-flex justify-content-end bd-highlight  color-block danger-color-dark checkout">
                           
                                <div class="p-2 col-md-6 bd-highlight"><strong class="white-text" style="font-size: 15px;"">Checkout</strong></div>
                          

                            <div class="p-2 bd-highlight  color-block danger-color total"><strong class="float-right white-text" id="total">${{Cart::subtotal()}}</strong></div>
                        </div>                        
                        {{-- <a type="button" class="btn btn-primary-modal waves-effect waves-light col-md-12" href="{{ url('/checkout') }}">Chekout</a> --}}
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
@endsection
@section('footer')
                
<!--Footer-->
	<footer class="page-footer center-on-small-only red lighten-2 sticky-bottom">


    <!--Footer Links-->
    <div class="container">

        <!--First row-->
        <div class="row">

            <!--First column-->
            <div class="col-md-12">

                <div class="footer-socials mb-5 flex-center">

                    <!--Facebook-->
                    <a class="icons-sm fb-ic"><i class="fa fa-facebook fa-lg white-text mr-md-4"> </i></a>
                    <!--Twitter-->
                    <a class="icons-sm tw-ic"><i class="fa fa-twitter fa-lg white-text mr-md-4"> </i></a>
                    <!--Google +-->
                    <a class="icons-sm gplus-ic"><i class="fa fa-google-plus fa-lg white-text mr-md-4"> </i></a>
                    <!--Linkedin-->
                    <a class="icons-sm li-ic"><i class="fa fa-linkedin fa-lg white-text mr-md-4"> </i></a>
                    <!--Instagram-->
                    <a class="icons-sm ins-ic"><i class="fa fa-instagram fa-lg white-text mr-md-4"> </i></a>
                    <!--Pinterest-->
                    <a class="icons-sm pin-ic"><i class="fa fa-pinterest fa-lg white-text"> </i></a>
                </div>
            </div>
            <!--/First column-->
        </div>
        <!--/First row-->
    </div>
    <!--/Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2017 Copyright: <a href="#"> ReeStock.com.mx </a>
        </div>
    </div>
    <!--/Copyright-->

</footer>
<!--/Footer-->
                
            
	           
@endsection


@section('scripts')   

<script src="{{url('js/jquery.nice-number.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  
    $('.b-number').niceNumber();

    //$(":input[type='number']").bind('keyup mouseup', function () {
  
        $('body').on('click', '#qty', function() {

        var qty = $(this).parent('div').find('input').val();
        var rowID = $(this).parent('div').next('input').val();
        var KgRowId = $(this).next('input').val();
        if (typeof rowID  === "undefined") {
            rowID = KgRowId;
        }
        var data = { "rowId" : rowID, "qty" : qty };
        console.log(data);

        $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                });

        $.ajax({
                                            data:  data,
                                            url:   '{{url("/lista/updateCart")}}',
                                            type:  'post',
                                            beforeSend: function () {
                                            },
                                            success:  function (response) {
                                                $( "#total" ).load(window.location.href + " #total" );
                                                    $( "#badge" ).load(window.location.href + " #badge" );

                                                    // $( "#amount" ).load(window.location.href + " #amount" ); 

                                                    console.log(response);
                                            }
                                    });      
});

$('body').on('click', '#n-remove-button', function () {
    var rowID = $(this).next('input').val();   
    var divDel = $(this).parent('div').parent('div');
    var data = {"rowId": rowID};
  
      $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                });

        $.ajax({
                    data:  data,
                    url:   '{{url("/lista/removeFromCart")}}',
                    type:  'post',
                    beforeSend: function () {
                        console.log(rowID);
                    },
                    success:  function (response) {
                          $(divDel).fadeOut('normal');
                        $( "#total2" ).load(window.location.href + " #total2" );
                        $( "#total" ).load(window.location.href + " #total" );
                        $( "#badge" ).load(window.location.href + " #badge" );          
                    }
                });   
});
$('body').on('click', '#remove-button', function () {
    $(this).closest('tr').fadeOut();
     var rowID = $(this).prev('input').val();   
     var data = {"rowId": rowID};
        $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                });

        $.ajax({
                    data:  data,
                    url:   '{{url("/lista/removeFromCart")}}',
                    type:  'post',
                    beforeSend: function () {
                        console.log(rowID);
                    },
                    success:  function (response) {
                        $( "#total2" ).load(window.location.href + " #total2" );
                        $( "#total" ).load(window.location.href + " #total" );
                        $( "#badge" ).load(window.location.href + " #badge" ); 

                    }
                });   
});
});

    var rid = '';

$("body").on('click', '#reesotckModal', function(){
   
    var name = $(this).data('name') 
    var img = $(this).data('img') 
    var rid = $(this).data('rid')

    var m = $('#reestockModalView').modal();
    m.find('.modal-body h6').text(name)
    m.find('.modal-header img').attr('src', img)
    m.find('.modal-body #p-rowID').val(rid)
    
});
$("#SaveNewReestock").click(function(){
            var rowID = $("#p-rowID").val();
            var concurrence = $("#newReestock").val();  
            var data = { "rowId" : rowID, "concurrence" : concurrence }; 
            $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                });

            $.ajax({
                        data:  data,
                        url:   '{{url("/lista/updateConcurrence")}}',
                        type:  'post',
                        beforeSend: function () {
                           
                        },
                        success:  function (response) {   

                        $( "#list" ).load(window.location.href + " #list", redo );     
                            function redo(){
                                $('.b-number').niceNumber();
                            }
                             $('#reestockModalView').modal('hide')
                        }
});
        });
</script>
	    @yield('scripts_unicos') 

	   @endsection     
