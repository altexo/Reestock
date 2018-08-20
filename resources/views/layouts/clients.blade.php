@extends('layouts.app')

@section('estilos')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{url('css/jquery.nice-number.css')}}" rel="stylesheet" type="text/css">
@section('contenedor_class','margin10')

<style type="text/css">
.logo-rs{
    width: 50%;
}
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
    color: grey;
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
                                   

 {{--  @media (max-width: 575px) { 
           .modal .modal-full-height.modal-lg {
              max-width: 100%;
            width: 100%;
        }
        .del-product{
            transform: translate(780%,-90%);
        }

     }


    @media (min-width: 767px) { 
        .modal .modal-full-height.modal-lg {
            max-width: 530px;
            width: 100%;
        }

     }

    @media (min-width: 991px) { 
        .modal .modal-full-height.modal-lg {
            max-width: 520px
        }

     }

    @media (min-width: 1199px) { 
        .modal .modal-full-height.modal-lg {
            max-width: 520px
        }

        
     }
     @media (min-width: 1200px) { 
        .modal .modal-full-height.modal-lg {
            max-width: 520px
        }

     }--}}


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
/*.modal{
	font-size: 12px !important;
}*/
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
.modal .modal-full-height {
   width: 100%;
}
/*.modal-content
{

      height: 100%;
       overflow: auto; 
}*/
li.hidden {
    display: none;
}
div.hidden {
    display: none;
}
.menu-resp{
    z-index: 0;
}
                
.shadow-textarea textarea.form-control::placeholder {
    font-weight: 300;
}
.shadow-textarea textarea.form-control {
    padding-left: 0.8rem;
}
.product-instructions{
    margin-top: 3.1875px; margin-bottom: 16px; height: 141px;
}

</style>
    @yield('estilos_unicos')

@endsection

@section('navbar') 
        <nav class=" nav navbar  navbar-toggleable-md navbar-dark red scrolling-navbar" id="myHeader">
            <a class="navbar-brand " href="{{url('/')}}">
                    <img src="{{asset('img/rsz_reestock.png')}}" class="logo-rs img-fluid flex-center mobile-logo">
            </a>
            <button class="navbar-toggler collapsed red menu-resp" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav1">
            		<ul class="navbar-nav ml-auto">
                		<li class="nav-item">
                    		<a class="nav-link" href="{{ url('/tienda') }}"><span>Tienda</span></a>
                		</li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}"><span>Mis listas</span></a>
                        </li>
                		<li class="nav-item special-use">
                    		<a class="nav-link" href="#" data-toggle="modal"  data-target="#sideCart">
                            <span id="badge" class="badge primary-color">{{Cart::content()->count()}}</span>
                            <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>
                		</li>
                     
                		@if (Auth::guest())
                    		<li class="nav-item">
                        		<a class="nav-link" href="{{ url('/registrar') }}"><span>Regístrate</span></a>
                    		</li>
                     		<li class="nav-item">
                        		<a class="nav-link" href="{{ url('/iniciar-sesion') }}"><span>Iniciar sesión </span></a>
                    		</li>
                		@else
                		
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
                            </div>
			            </li>
                        @endif
            		</ul>
           
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
                                <select class="mdb-select colorful-select dropdown-primary" id="newReestockOption">

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
                           <div class="form-group shadow-textarea">
                                <textarea class="form-control z-depth-1 product-instructions"  id="product-instructions"  rows="5" placeholder="Instrucciones o preferencias"></textarea>
                            </div>
                                          
                        </div>

                        <div class="text-center">
                            <button class="btn btn-cyan mt-1 waves-effect waves-light" id="SaveNewReestock">Guardar
                               
                            </button>
                        </div>
                    </div>

                </div>
                <!--/.Content-->
            </div>
        </div>
<!--Reestock modal-->
<div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="display: none;" aria-hidden="true">
            <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
             
                <div class="modal-content">

                    <div class="modal-header">
                        <img src="" class="rounded-circle img-responsive" alt="Avatar photo">
                    </div>

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

            </div>
        </div>
{{-- 
<div class="modal fade right show" id="fluidModalRightDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block;">
                <div class="modal-dialog modal-full-height modal-right modal-notify modal-danger" role="document">
            
                    <div class="modal-content">
            
                        <div class="modal-header">
                            <p class="heading lead">Modal Danger</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">×</span>
                            </button>
                        </div>

             
                        <div class="modal-body">
                            <div class="text-center">
                                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam blanditiis
                                    ad consequatur in dolores culpa, dignissimos, eius non possimus fugiat. Esse ratione
                                    fuga, enim, ab officiis totam.</p>
                            </div>
                            <ul class="list-group z-depth-0">
                                <li class="list-group-item justify-content-between">
                                    Cras justo odio
                                    <span class="badge badge-danger badge-pill">14</span>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    Dapibus ac facilisis in
                                    <span class="badge badge-danger badge-pill">2</span>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    Morbi leo risus
                                    <span class="badge badge-danger badge-pill">1</span>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    Cras justo odio
                                    <span class="badge badge-danger badge-pill">14</span>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    Dapibus ac facilisis in
                                    <span class="badge badge-danger badge-pill">2</span>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    Morbi leo risus
                                    <span class="badge badge-danger badge-pill">1</span>
                                </li>
                            </ul>
                        </div>

             
                        <div class="modal-footer justify-content-center">
                            <a type="button" class="btn btn-danger waves-effect waves-light">Get it now
                                <i class="fa fa-diamond ml-1"></i>
                            </a>
                            <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No, thanks</a>
                        </div>
                    </div>
                
                </div>
            </div> --}}
{{-- <div class="modal fade right modal-md" id="sideCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="true" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-full-height modal-right modal-lg  modal-notify modal-danger modal-container modal-custom-responsive" role="document">

                <div class="modal-content modal-container">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class="white-text">×</span>
                                                            </button>
                    </div>
                    <div class="modal-body modal-products">
                        <div class="text-center">
                            <i class="fa fa-shopping-cart fa-4x mb-3 animated rotateIn"></i>
                           
                        </div>
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
                                        @elseif($item->options->reestock == 7)
                                           Semanal 
                                        @elseif($item->options->reestock == 14)
                                           Quincenal 
                                        @elseif($item->options->reestock == 28)
                                           Mensual 
                                        @elseif($item->options->reestock == 42)
                                            6 Semanas
                                        @elseif($item->options->reestock == 56)
                                            2 Meses 
                                        @elseif($item->options->reestock == 182)
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

                    </div>
                    <div class="d-flex justify-content-center white py-3 pt-1 " style="  bottom: 0; position: sticky; z-index:100;">
                        <div onclick="location.href='{{ url('/checkout') }}';" class="col-md-11 d-flex justify-content-end bd-highlight  color-block danger-color-dark checkout">
                           
                                <div class="p-2 col-md-6 bd-highlight"><strong class="white-text" style="font-size: 15px;"">CONTINUAR</strong></div>
                          

                            <div class="p-2 bd-highlight  color-block danger-color total"><strong class="float-right white-text" id="total">${{Cart::subtotal()}}</strong></div>
                        </div>                        
                    </div>
                </div>

            </div>
        </div> --}}
            <div class="modal fade right" id="sideCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-full-height modal-right" role="document">
                    <div class="modal-content side-cart-modal">
                        <div class="modal-header">
                            <h4 class="modal-title w-100" id="myModalLabel">Carrito</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="side-cart" id="side-cart">

                                @forelse(Cart::content() as $item)

                                    <div class="item-row">
                                        <div class="item-details">
                                            <div class="product-name">
                                                {{ $item->name}}
                                            </div>
                                            <div class="product-details">
                                                {{$item->model->brand}} {{$item->model->unity}}
                                            </div>

                                            <div class="item-actions">
                                                @if($item->options->instructions == '')
                                                @else
                                                    <div class="pb-0 mb-0 item-instructions">
                                                        <label class="red-text mb-0">Instrucciones: </label> {{$item->options->instructions}}
                                                    </div>
                                                @endif
                                                <button class="basket-button pl-0" id="sideCart-remove-button"><i class="fa fa-trash fa-lg" style="color: #ff4427;"></i> Remover </button>
                                                <input type="hidden" id="rowID" value="{{$item->rowId}}" name="" >
                                                <button class="basket-button pl-0" 
                                            data-dismiss="modal" 
                                            id="reesotckModal" 
                                            data-rid="{{$item->rowId}}" 
                                            data-rc="{{$item->options->reestock}}"
                                            data-name="{{$item->name}}" 
                                            @if($item->options->instructions == '')
                                                data-inst=""
                                            @else 
                                                data-inst="{{$item->options->instructions}}"
                                            @endif
                                            data-img="  @if($item->model->product_img){{url($item->model->product_img)}} 
                                                        @else 
                                                        {{url('img/no-img.jpg')}}
                                                        @endif
                                                    "
                                          >
                                          <img src="{{url('icons/ree-bag.png')}}" class="icon-img"> Reestock e instrucciones 
                                           {{--  @if($item->options->reestock == 0)
                                                Única vez
                                            @elseif($item->options->reestock == 7)
                                               Semanal 
                                            @elseif($item->options->reestock == 14)
                                               Quincenal 
                                            @elseif($item->options->reestock == 28)
                                               Mensual 
                                            @elseif($item->options->reestock == 42)
                                                6 Semanas
                                            @elseif($item->options->reestock == 56)
                                                2 Meses 
                                            @elseif($item->options->reestock == 182)
                                                6 Meses                                     
                                            @endif --}}
                                        </button>
                                     
                                            </div>
                                        </div>
                                        <div class="item-qty">
                                            <input class="input-alternate number-button b-number" type="number" id="qty" value="{{$item->qty}}" disabled min="1" max="999">
                                            <input type="hidden" id="rowID" value="{{$item->rowId}}" name="" >
                                        </div>
                                        <div class="item-total-price ml-2">
                                             <label id="amount">${{ $item->price * $item->qty}}</label>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center side-cart-checkout"  style="padding:  30px;  bottom: 0; position: sticky; z-index:100;">

                            <button type="button" class="btn btn-danger waves-effect waves-light" onclick="location.href='{{ url('/checkout') }}';" style="width: 100%; background-color: #f4452c;">Continuar <label style="float: right;" id="total">${{Cart::subtotal()}}</label></button>
                        </div>
                    </div>
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
<!--Start of Zendesk Chat Script-->
{{-- <script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5ebqR4Eslh9R5kuvwseznyo8WxngAjTI";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script> --}}
<!--End of Zendesk Chat Script-->
<script type="text/javascript">
   
$(document).ready(function() {
         // Define the menu we are working with
    var menu = $('#myHeader');

    var origOffsetY = menu.offset().top;

        function scroll() {

            // Check the menus offset. 
            if ($(window).scrollTop() >= 10) {

                //If it is indeed beyond the offset, affix it to the top.
                $(menu).addClass('fixed-top');

            } else {

                // Otherwise, un affix it.
                $(menu).removeClass('fixed-top');

            }
        }

        // Anytime the document is scrolled act on it
        document.onscroll = scroll;
       // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        // var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        // Ps.initialize(sideNavScrollbar);
  
    $('.b-number').niceNumber();

    //$(":input[type='number']").bind('keyup mouseup', function () {
  
        $('body').on('click', '#qty', function() {
        // var amount = $(this).parent('div').parent('div').next('div').find('label');
       
        var qty = $(this).parent('div').find('input').val();
        var rowID = $(this).parent('div').next('input').val();
        var KgRowId = $(this).next('input').val();
        if (typeof rowID  === "undefined") {
            rowID = KgRowId;
        }
        var data = { "rowId" : rowID, "qty" : qty };

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

                                                     // $( amount ).load(window.location.href + amount); 

                                                    console.log(response);
                                            }
                                    });      
});

$('body').on('click', '#sideCart-remove-button', function () {
    var rowID = $(this).next('input').val();   
    var divDel = $(this).parent('div').parent('div').parent('div');
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
    var instructions = $(this).data('inst')
    var reestockCon = $(this).data('rc')
    

    var m = $('#reestockModalView').modal();
    m.find('.modal-body h6').text(name)
    m.find('.modal-header img').attr('src', img)
    m.find('.modal-body #p-rowID').val(rid)
    m.find('#product-instructions').text(instructions)
    m.find("#newReestockOption").val(reestockCon)
    
});
$("#SaveNewReestock").click(function(){
            var rowID = $("#p-rowID").val();
            var concurrence = $("#newReestock").val();  
            var instructions = $('#product-instructions').val();
            var data = { "rowId" : rowID, "concurrence" : concurrence, "instructions": instructions }; 
            console.log(data);
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


                        $( "#side-cart" ).load(window.location.href + " #side-cart", redo );     
                            function redo(){
                                $('.b-number').niceNumber();
                            }
                             $('#reestockModalView').modal('hide')
                        }
});
        });
</script>
{{-- <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116577026-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116577026-1');
</script> --}}

	    @yield('scripts_unicos') 

	   @endsection     
