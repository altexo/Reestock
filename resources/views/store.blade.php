@extends('layouts.clients')
@section('title', 'Tienda')
@section('estilos_unicos')

<style type="text/css">
	.card-title
	{
		font-size: 14px !important;
	}
	.card-body{
		padding-top: 10px !important;
	}
	.price
	{
		font-size: 16px !important;
	}
	.margin-top
	{
		/*margin-top: 20%;*/
		margin-bottom: 5%;
	}
	.error{
		 color:red;
	}
	.normal{
		 color:black;
	}
/*	.active-pink-2 input[type=text]:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    box-shadow: 0 1px 0 0 #fff;
    color: white;
}
.active-pink input[type=text] {
    border-bottom: 1px solid #fff;
    box-shadow: 0 1px 0 0 #fff;
    color: white;
}
input[type=text] {
    border-bottom: 1px solid #fff !important;
    color: white;
}*/
.equal {  
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex:1 0 auto;
}
.no-shadow {
    	box-shadow: 0 0px 0px 0 rgba(0,0,0,0), 0 0px 0px 0 rgba(0,0,0,0) !important;
	}


</style>
@section('contenedor_class', 'd-flex justify-content-center')
@endsection
@section('navbar')


@section('contenido')
<div class="col-md-8">
	
	<section class="section pb-3">
		<div class="col-md-12">
	    <h3 class="section-heading align-left h3 pt-4">Tienda</h3>
	    
	    <div class="col-md-12 white lighten-1 mb-r z-depth-2 margin-top" >
		
	        <form class="form-inline active-pink active-pink-2 " action="{{route('search')}}" method="get">
	        	{{-- <div class="chips chips-placeholder mt-1 col-lg-5"></div> --}}
	            <input class="form-control mr-sm-2 col-md-5" type="text" name="search" placeholder="buscar.." aria-label="Search" value="{{ app('request')->input('search') }}">
	            <i class="fa fa-search text-white" aria-hidden="true"></i>
	        </form>
	        
	          
			

		</div>
	    
	    <div class="row equal">
	        @foreach($products as $product)
	        <!--Test Modal Products-->
	        	
<div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5">

                        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(23).jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(24).jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(25).jpg" alt="Third slide">
                                </div>
                            </div>

                            <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                            <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>

                        </div>

                    </div>
                    <div class="col-lg-7">
                        <h2 class="h2-responsive product-name"><strong>{{$product->product_name}}</strong></h2>
                        <h4 class="h4-responsive"><span class="green-text"><strong>$ {{$product->sale_price}}</strong></span>{{--  <span class="grey-text"><small><s>$89</s></small></span> --}}</h4>

                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h5 class="mb-0">
                                            Description <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt
                                        maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia
                                        necessitatibus.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h5 class="mb-0">
                                            Details <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt
                                        maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia
                                        necessitatibus.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <h5 class="mb-0">
                                            Shipping <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nesciunt atque nemo neque ut officiis nostrum incidunt
                                        maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis mollitia
                                        necessitatibus.
                                    </div>
                                </div>
                            </div>
                        </div>
 
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <select class="mdb-select colorful-select dropdown-primary">
                                                    <option value="" disabled selected>Choose your option</option>
                                                    <option value="1">White</option>
                                                    <option value="2">Black</option>
                                                    <option value="3">Pink</option>
                                                </select>
                                        <label>Select color</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <select class="mdb-select colorful-select dropdown-primary">
                                                    <option value="" disabled selected>Choose your option</option>
                                                    <option value="1">XS</option>
                                                    <option value="2">S</option>
                                                    <option value="3">L</option>
                                                </select>
                                        <label>Select size</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary">Add to cart<i class="fa fa-cart-plus ml-2" aria-hidden="true"></i></button>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal: modalQuickView -->
                                
                                
	        <!--End Test Modal Product-->
	        <div class="col-lg-3 col-md-6 mb-r">
	            <div class="card no-shadow">
	                <div class="view overlay hm-white-slight no-shadow">
	                   <a href="" data-toggle="modal" data-target="#modalQuickView"> <img src="{{url('')}}/{{$product->product_img}}" class="img-fluid" alt=""></a>
	                    <a>
	                        <div class="mask"></div>
	                    </a>
	                </div>
	                <div class="card-body text-center no-padding">
	                    <a href="" data-toggle="modal" data-target="#modalQuickView" class="text-muted"><h6>{{ $product->brand }}</h6></a>
	                      <a href="" class="text-muted"><h6>{{ $product->unity }}</h6></a>
	                    <h4 class="card-title"><strong><a href="">{{$product->product_name}}</a></strong></h4>
	                    <div class="card-footer">
	                        <span class="center price align-middle">{{$product->sale_price}} MXN <!-- <span class="discount">299$</span> --></span>
	                    </div>
	                     <div class="md-form">
			            	
			            	<select class="form-control tootltip-arrow" data-toggle="tooltip" title="Debes escoger cada cuanto necesitas este preducto." role="tooltip" id="frecuency-{{$product->id}}">
			            		<option selected disabled>Reestock cada: </option>
			            		@forelse($lists as $date)
			            		
			            			<option value="{{$date->fecha}}">A mi lista del {{$date->date}} </option>
			            		
			            		@empty
			            		@endforelse	
			            		<option value="7">Cada 7 días</option>
			            		<option value="15">Cada 15 días</option>
			            		<option value="30">Cada mes</option>
			            		<option value="45">Cada 6 semanas</option>
			            		<option value="60">Cada 2 meses</option>
			            		<option value="180">Cada 6 meses</option>

			            	</select>
			              
			              
			            </div>
	                    <button class="btn btn-danger btn-sm" id="product-{{$product->id}}">Añadir a lista</button>
	                </div>
	            </div>
	        </div>
	        @endforeach
	    </div>
	</div>
	</section>
	 {{ $products->links() }}
</div>           


@endsection

@section('footer')
@endsection
@section('scripts_unicos')
<script type="text/javascript">
	$('.chips-placeholder').material_chip({
    //placeholder: 'Enter a tag',
    secondaryPlaceholder: 'Buscar..',

});

</script>
@forelse($products as $product)
		<script type="text/javascript">
							$(function () {
							  $('[data-toggle="tooltip"]').tooltip('hide')
							})

				        $("#product-{{$product->id}}").click(function () {

				        	var concurrence = $("#frecuency-{{$product->id}}").val();
				        	var parametros = { "product_id" : {{$product->id}}, "concurrence" : concurrence };
				        	if (concurrence == null) {
				        		$("#frecuency-{{$product->id}}").addClass("error");
				        		$('#frecuency-{{$product->id}}').tooltip('show')
				        		console.log("esta Vacio")
				        	}else {
					        	$.ajaxSetup({
									  headers: {
									    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									  }
								});
				        	
							    $.ajax({
							                data:  parametros,
							                url:   '{{url("/lista/addToCart")}}',
							                type:  'post',
							                beforeSend: function () {
							                        $("#resultado").html("Procesando, espere por favor...");
							                        $("#frecuency-{{$product->id}}").removeClass("error");
							                        console.log(concurrence);
							                },
							                success:  function (response) {
							                	$( "#list" ).load(window.location.href + " #list" );
				                	  			$( "#badge" ).load(window.location.href + " #badge" );

				                	  			$("#product-{{$product->id}}").text("");
				                				$("#product-{{$product->id}}").html("<i class='fa fa-shopping-basket'></i>");
				                				$("#product-{{$product->id}}").removeClass("btn-danger").addClass("green");
							                        //$("#resultado").html(response);
							                        console.log(response);
							                }
							        });
							}

				        });

		</script>
	@empty
	<div class="col-md-12 d-flex justify-content-center"><div class="col-md-8"><p>No se encontro el producto.</p></div></div>
	
@endforelse﻿
@endsection

