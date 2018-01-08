@extends('layouts.app')

@section('estilos')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('contenedor_class','margin10')

<style type="text/css">
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
</style>
    @yield('estilos_unicos')

@endsection

@section('navbar') <!--Navbar-->
        <nav class=" nav navbar fixed-top navbar-toggleable-md navbar-dark red scrolling-navbar" >
            <div class="container">
                
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('img/rsz_reestock.png')}}" class="img-fluid flex-center">
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
                		<li class="nav-item">
                    		<a class="nav-link" href="#" data-toggle="modal"  data-target="#fluidModalRightSuccessDemo"><span id="badge" class="badge primary-color">{{Cart::count()}}</span><span><i class="fa fa-shopping-basket" aria-hidden="true"></i></span></a>
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
            </div>
        </nav>
        <!--/.Navbar-->
              
@yield('header_unico')
@endsection


@section('contenido')


@endsection
@section('sideCart')
<div class="modal fade right modal-md" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="true" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-full-height modal-right modal-md  modal-notify modal-success modal-container" role="document">
                <!--Content-->
                <div class="modal-content modal-container">
                    <!--Header-->
                    <div class="modal-header">
                        <p class="heading lead"><input type="text" class="white-text active-white " name="" value=" 'Mi Lista' "></p>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class="white-text">×</span>
                                                            </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="fa fa-shopping-basket fa-4x mb-3 animated rotateIn"></i>
                           
                        </div>
                         <!-- Shopping Cart table -->
                <div class="table-responsive" id="list">

                    <table class="table product-table w-auto">
                        <thead>
                            <tr>
                                <th class="font-bold">
                                    <strong>Producto</strong>
                                </th>
                             
                              
                                <th class="font-bold">
                                    <strong>Precio</strong>
                                <th>Cantidad</th>
                                <th></th>
                            </tr>
                        </thead>
                       @forelse(Cart::content() as $item)
                       	  <tr>
                                <td>
                                   
                                     {{ $item->name}}
                                 
                                   <p class="text-muted"></p>
                                </td>
                              
                          
                                <td>{{ $item->price }}</td>
                                <td class="center-on-small-only">
                                  
                                	<input type="number" min="1" max="999" name="qty" class="qty" id="qty" value="{{$item->qty}}">	
                                      <input type="hidden" id="rowID" value="{{$item->rowId}}" name="">
                                    </div>
                                </td>
                          
                                <td>
                                    <input type="hidden" id="rowID" value="{{$item->rowId}}" name="">
                                    <button type="button" id="remove-button" class="btn btn-sm btn-primary waves-effect waves-light remove-button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove item">X
                                    </button>
                                </td>
                            </tr>
                           
                       @empty
                       @endforelse
           
                       
                            <tr>
                                    <td class="text-right">
                                    <h4 class="mt-2">
                                        <strong>Total: </strong>
                                    </h4>
                                </td>
                                <td colspan="2" class="text-right">
                                    <h4 class="mt-2">
                                        <strong style="font-size: 14px" id="total">{{Cart::subtotal() }} $</strong>
                                        </h4>
                                </td>
                              <!--   <td colspan="3" class="text-right">
                                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Guardar lista
                                        <i class="fa fa-angle-right right"></i>
                                    </button>
                                </td> -->
                            </tr>
                            <!-- Fourth row -->

                        </tbody>
                        <!-- /.Table body -->

                    </table>

                </div>
                <!-- Shopping Cart table -->
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <a type="button" class="btn btn-primary-modal waves-effect waves-light" href="{{ route('show.list') }}">Ir a mi lista</a>
                       <!--  <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">No, thanks</a> -->
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
<script type="text/javascript">
$(document).ready(function() {
    //$(":input[type='number']").bind('keyup mouseup', function () {
        $('body').on('keyup mouseup', '#qty', function() {
        var qty = $(this).val();
        var rowID = $(this).next('input').val();   
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

                                                    console.log(response);
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
                        $( "#badge" ).load(window.location.href + " #badge" );                                            console.log(response);
                    }
                });   
});
});
</script>
	    @yield('scripts_unicos') 

	   @endsection     
