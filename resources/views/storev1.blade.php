@extends('layouts.clients')
@section('estilos_unicos')
<style type="text/css">
	.margin10
	{
		margin-top: 0;
		padding: 0px;
	}
	.no-shadow {
    	box-shadow: 0 0px 0px 0 rgba(0,0,0,0), 0 0px 0px 0 rgba(0,0,0,0) !important;
	}
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
    .err label
    {
        color: red;
    }

</style>
@endsection
@section('navbar')

@section('contenido')
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-1z" data-slide-to="1" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2" class=""></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="https://mdbootstrap.com/img/Photos/Others/ecommerce4.jpg" alt="First slide">
                    <div class="mask waves-effect waves-light">
                        <!-- Caption -->
                        <div class="full-bg-img flex-center white-text">
                            <ul class="animated fadeIn col-10">
                                <li>
                                    <p class="h1 red-text mb-4 mt-5">
                                        <strong>Sale off 30% on every saturday!</strong>
                                    </p>
                                </li>
                                <li>
                                    <h5 class="h5-responsive dark-grey-text font-bold mb-5">Tempora incidunt ut labore et dolore veritatis et quasi architecto beatae</h5>
                                </li>
                                <li>
                                    <a target="_blank" href="https://mdbootstrap.com/getting-started/" class="btn btn-danger btn-rounded waves-effect waves-light" rel="nofollow">See more!</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.Caption -->
                    </div>
                </div>
            </div>
            <!--/First slide-->
            <!--Second slide-->
            <div class="carousel-item h-100 active">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="https://mdbootstrap.com/img/Photos/Others/ecommerce2.jpg" alt="Second slide">
                    <div class="mask waves-effect waves-light">
                        <!-- Caption -->
                        <div class="full-bg-img flex-center white-text">
                            <ul class="animated fadeIn col-10">
                                <li>
                                    <p class="h1 dark-grey-text mb-4">
                                        <strong>Nemo enim ipsam voluptatem quia voluptas sit</strong>
                                    </p>
                                </li>
                                <li>
                                    <h5 class="h5-responsive dark-grey-text font-bold mb-5">Tempora incidunt ut labore et dolore veritatis et quasi architecto beatae</h5>
                                </li>
                                <li>
                                    <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/" class="btn btn-primary btn-rounded waves-effect waves-light" rel="nofollow">Read more</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.Caption -->
                    </div>
                </div>
            </div>
            <!--/Second slide-->
            <!--Third slide-->
            <div class="carousel-item">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="https://mdbootstrap.com/img/Photos/Others/ecommerce3.jpg" alt="Third slide">
                    <div class="mask waves-effect waves-light">
                        <!-- Caption -->
                        <div class="full-bg-img flex-center white-text">
                            <ul class="animated fadeIn col-md-10 align-items-right">
                                <li>
                                    <p class="h1 blue-text text-right mr-5 mb-4 mt-5 pr-lg-5">
                                        <strong>Sale off 20% on every headphones!</strong>
                                    </p>
                                </li>
                                <li>
                                    <h5 class="h5-responsive dark-grey-text font-bold text-right mr-5 mb-5  pr-lg-5">Tempora incidunt ut labore et dolore veritatis et quasi</h5>
                                </li>
                            </ul>
                        </div>
                        <!-- /.Caption -->
                    </div>
                </div>
            </div>
            <!--/Third slide-->
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <div class="container-fluid mx-0 px-0">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color mb-5 navbar-toggleable-md " id="search-nav">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <form class="form-inline waves-effect waves-light col-md-6" action="{{route('search')}}" method="get">
                        <input class="form-control mr-sm-2 col-md-12" type="text" name="search" placeholder="Buscar.." aria-label="Search"  value="{{ app('request')->input('search') }}">
                    </form>
                </div>
            </div>
        </nav>
    </div>
	<div class="container mt-5 pt-1">



        <div class="row pt-1">
            <div class="col-lg-3">
                <div class="">
                    <div class="row">
                        <div class="col-md-6 col-lg-12 mb-5">
                           {{--  <h5 class="font-bold dark-grey-text"><strong>Ordenar por</strong></h5>
                                <div class="divider"></div>
                                <p class="blue-text"><a>Ninguno</a></p>
                                <p class="dark-grey-text"><a>Menor precio</a></p>
                                <p class="dark-grey-text"><a>Mayor precio</a></p> --}}
                        </div>

                        <div class="col-md-6 col-lg-12 mb-5">
                            <h5 class="font-bold dark-grey-text"><strong>Departamento</strong></h5>
                                <div class="divider"></div>

                           
                                <div class="form-group">

	                                   <input name="group100" type="radio" id="radio100" onclick="window.location='/tienda/';" 
	                                    @if( app('request')->input('department') == '' )  
              						 	{{'checked'}}
	                                    @endif
	                                 	 >
	                                    <label for="radio100" class="dark-grey-text">Todos</label>
           
                                </div>

                                <div class="form-group">
                           
	                                    <input name="group100" type="radio" id="radio101" onclick="window.location='/tienda/?department=FRUTA+Y+VERDURA';" 
	                                    @if( app('request')->input('department') == 'FRUTA Y VERDURA' )  
              						 	{{'checked'}}
	                                    @endif
	                                 	 >
	                                    <label for="radio101" class="dark-grey-text">Fruta Y Verdura</label>
           
                                </div>

                                <div class="form-group">
                                    <input name="group100" type="radio" id="radio102" onclick="window.location='/tienda/?department=REFRIGERADO';" @if( app('request')->input('department') == 'REFRIGERADO' )  
                                        {{'checked'}}
                                        @endif
                                        >
                                    <label for="radio102" class="dark-grey-text">Refrigerados</label>
                                </div>

                                <div class="form-group">
                                    <input name="group100" type="radio" id="radio103" onclick="window.location='/tienda/?department=ABARROTES';"@if( app('request')->input('department') == 'ABARROTES' )  
                                        {{'checked'}}
                                        @endif>
                                    <label for="radio103" class="dark-grey-text">Abarrotes</label>
                                </div>

                                <div class="form-group">
                                    <input name="group100" type="radio" id="radio104" onclick="window.location='/tienda/?department=CÁRNICOS';"@if( app('request')->input('department') == 'CÁRNICOS' )  
                                        {{'checked'}}
                                        @endif>
                                    <label for="radio104" class="dark-grey-text">Cárnicos</label>
                                </div>
                                 <div class="form-group">
                                    <input name="group100" type="radio" id="radio105" onclick="window.location='/tienda/?department=HIGIENE+PERSONAL';"@if( app('request')->input('department') == 'HIGIENE PERSONAL' )  
                                        {{'checked'}}
                                        @endif>
                                    <label for="radio105" class="dark-grey-text">Higiene Personal</label>
                                </div>
                                 <div class="form-group">
                                    <input name="group100" type="radio" id="radio106" onclick="window.location='/tienda/?department=LIMPIEZA';
                                    "@if( app('request')->input('department') == 'LIMPIEZA' )  
                                        {{'checked'}}
                                        @endif>
                                    <label for="radio106" class="dark-grey-text">Limpieza</label>
                                </div>
                                 <div class="form-group">
                                    <input name="group100" type="radio" id="radio107" onclick="window.location='/tienda/?department=DESECHABLES';"@if( app('request')->input('department') == 'DESECHABLES' )  
                                        {{'checked'}}
                                        @endif>
                                    <label for="radio107" class="dark-grey-text">Desechables</label>
                                </div>
                                 <div class="form-group">
                                    <input name="group100" type="radio" id="radio108" onclick="window.location='/tienda/?department=OTRO';"@if( app('request')->input('department') == 'OTRO' )  
                                        {{'checked'}}
                                        @endif>
                                    <label for="radio108" class="dark-grey-text">Otro</label>
                                </div>
                                <!--Radio group-->
                        </div>
                        <!-- /Filter by category-->
                    </div>
                    <!-- /Grid row -->

                    <!-- Grid row -->
                    <div class="row">

                        <!-- Filter by price  -->
                        <div class="col-md-6 col-lg-12 mb-5">
                        {{--     <h5 class="font-bold dark-grey-text"><strong>Price</strong></h5>
                                <div class="divider"></div>

                                <form class="range-field mt-3">
                                    <input id="calculatorSlider" class="no-border" type="range" value="0" min="0" max="30"><span class="thumb"><span class="value"></span></span>
                                </form>

                                <div class="row justify-content-center">

                                    <div class="col-md-6 text-left">
                                        <p class="" style="dark-grey-text"><strong id="resellerEarnings">0$</strong></p>
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <p class="" style="dark-grey-text"><strong id="clientPrice">319$</strong></p>
                                    </div>

                                </div> --}}
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-9">

                <!-- Filter Area -->
                <div class="row">

                    <div class="col-md-4 mt-3">

                      

                    </div>
                 
                </div>


                <!-- Products Grid -->
                <section class="section pt-4"> 
                    <div class="row">
                        <?php $count = 0; ?>
                    	@forelse($products as $product)
                        <?php $count++; ?>
                         <!--Test Modal Products--
                            <div class="modal fade" id="modalQuickView<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                               {{--  <div class="col-lg-5">

                                                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

                                                        <div class="carousel-inner h-50" role="listbox">
                                                            <div class="carousel-item active">
                                                                <img src="{{url('')}}/{{$product->product_img}}" class="img-fluid"  alt="">
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

                                                </div> --}}
                                                <div class="col-lg-12">
                                                    <h2 class="h2-responsive product-name"><strong>{{$product->product_name}}</strong></h2>
                                                    <h4 class="h4-responsive"><span class="green-text"><strong>$ {{$product->sale_price}}</strong></span>{{--  <span class="grey-text"><small><s>$89</s></small></span> --}}</h4>
                                                  {{--   <div class="col-md-12">
                                                        <img src="{{url('')}}/{{$product->product_img}}" class="img-fluid"  alt="">
                                                    </div> --}}
                                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                        <div class="card mt-1">
                                                            <div class="card-header" role="tab" id="headingOne">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    <h5 class="mb-0">
                                                                        Descripción <i class="fa fa-angle-down rotate-icon"></i>
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
                                                        {{-- <div class="card">
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
                                                        </div> --}}
                                                    </div>
                             
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
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
                                                            <div class="col-md-9">
                                                                <div class="md-form">
                                                                    <select class="mdb-select colorful-select dropdown-primary" >
                                                                                @forelse($lists as $date)
                                                
                                                                                    <option  value="{{$date->fecha}}">A mi lista del {{$date->date}} </option>
                                                                                
                                                                                @empty
                                                                                @endforelse 
                                                                                <option value="7">Cada 7 días</option>
                                                                                <option value="15">Cada 15 días</option>
                                                                                <option value="30">Cada 30 dīas</option>
                                                                                <option value="45">Cada 6 semanas</option>
                                                                                <option value="60">Cada 2 meses</option>
                                                                                <option value="180">Cada 6 meses</option>

                                                                    </select>
                                                                    <label>Select size</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">

                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                           <!--  <button class="btn btn-primary" id="product-<?php /*echo $count;*/?>">añadir a lista<i class="fa fa-shopping-basket ml-2" aria-hidden="true"></i></button> --
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -- Modal: modalQuickView -->
                            <!-- Modal -->
                            <div class="modal fade" id="AddToListModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        {{-- <form method="post" action=""> --}}
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Agregar producto a mi lista del </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mt-1">
                                                    <div class="col-md-4">
                                                        <img src="{{url('')}}/{{$product->product_img}}" class="img-fluid no-shadow"  alt="">
                                                    </div>
                                                    <div class="col-md-8 d-flex verticalcenter">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-12">  
                                                                <strong class="align-middle flex-example ">{{$product->product_name}}</strong ><br>
                                                                <label class="grey-text">{{$product->brand}}</label><br>
                                                                <label>$ {{$product->sale_price }} </label> <label class="grey-text">  {{$product->unity}}</label>
                                                            </div>
                                                           <input type="hidden" id="fecha-ree" class="ReestockDate{{$product->id}}" value="">
                                                                <div class="col-md-6 mt-1"> 
                                                                    <div class="md-form">
                                                                        <input data-toggle="tooltip" title="Debes especificar una cantidad." role="tooltip" style="padding: 7px;" type="number" name="qty" id="addListQty-{{$product->id}}">
                                                                        <label class="addListQty-{{$product->id}}" for="addListQty-{{$product->id}}">Cantidad</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mt-1"> 
                                                                    <div class="md-form">
                                                                            <select class="mdb-select colorful-select dropdown-primary" id="addToListFrec-{{$product->id}}">
                                                                                        <option selected value="0">Unica vez</option>
                                                                                        <option value="7">Cada 7 días</option>
                                                                                        <option value="15">Cada 15 días</option>
                                                                                        <option value="30">Cada 30 dīas</option>
                                                                                        <option value="45">Cada 6 semanas</option>
                                                                                        <option value="60">Cada 2 meses</option>
                                                                                        <option value="180">Cada 6 meses</option>

                                                                            </select>
                                                                            <label>Reestock Cada: </label>
                                                                        </div>
                                                                </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="CancelToListModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">Cancelar</button>
                                                <button type="button" class="btn btn-default btn-sm" id="addNewProduct-{{$product->id}}">Guardar en mi lista
                                                        
                                                </button>
                                            </div>
                                      {{--   </form> --}}
                                    </div>
                                </div>
                            </div>
                            <!--End Modal-->    
                            

					        <div class="col-lg-4 col-md-6 mb-r">
					            <div class="card no-shadow"><a href=""></a>
					                <div class="view overlay hm-white-slight no-shadow">
					                   <a href="" data-toggle="modal" data-target="#modalQuickView<?php echo $count; ?>"> <img src="{{url('')}}/{{$product->product_img}}" class="img-fluid"  alt=""></a>
					                    <a data-toggle="modal" data-target="#modalQuickView<?php echo $count; ?>" >
					                        <div class="mask"></div>
					                    </a>
					                </div>
					                <div class="card-body text-center no-padding">
					                    <a href="" data-toggle="modal" data-target="#modalQuickView<?php echo $count; ?>" class="text-muted"><h6>{{ $product->brand }}</h6></a>
					                      <a href="" data-toggle="modal" data-target="#modalQuickView<?php echo $count; ?>"  class="text-muted"><h6>{{ $product->unity }}</h6></a>
					                    <h4 class="card-title"><strong><a href="" data-toggle="modal" data-target="#modalQuickView<?php echo $count; ?>" >{{$product->product_name}}</a></strong></h4>
					                    <div class="card-footer">
					                        <span class="center price align-middle font-weight-bold blue-text">{{$product->sale_price}} MXN <!-- <span class="discount">299$</span> --></span>
					                    </div>
					                     <div class="md-form">
							            	
							            	<select class="form-control tootltip-arrow addToList-{{$product->id}}" data-toggle="tooltip" title="Debes escoger cada cuanto necesitas este producto." role="tooltip" id="frecuency-{{$product->id}}">
							            		<option selected disabled>Reestock cada: </option>
							            		@forelse($lists as $date)
							            		
							            			<option id="date" value="{{$date->fecha}}">A mi lista del {{$date->date}} </option>
							            		
							            		@empty
							            		@endforelse	
							            		<option value="7">Cada 7 días</option>
							            		<option value="15">Cada 15 días</option>
							            		<option value="30">Cada 30 dīas</option>
							            		<option value="45">Cada 6 semanas</option>
							            		<option value="60">Cada 2 meses</option>
							            		<option value="180">Cada 6 meses</option>

							            	</select>	              
							            </div>
					                    <button class="btn btn-danger btn-sm" id="product-{{$product->id}}">Añadir a lista</button>
					                </div>
					            </div>
					        </div>
                   		@empty
				        @endforelse
                    </div>
                  
                    <div class="row justify-content-center mb-4">
                       {{ $products->links() }}
                    </div>
                </section>
               

            </div>
        </div>

    </div>
@endsection
@section('footer')
@section('scripts_unicos')
<script type="text/javascript">
    $(document).ready(function() {
    $('.mdb-select').material_select();

    // $('body').on('change', '.addToList', function(){
    //     var date = $(this).val();//.colsest('option').val();
    //     var attr = $('option:selected', this).attr('id'); 
    //   //  console.log(attr);
    //     if (attr == 'date') {
    //          console.log(date);

    //     } else {
    //         //console.log('not is');
    //     }
       
    // });


});
    
</script>
    @forelse($products as $product)
        <script type="text/javascript">

                            $('#AddToListModal-{{$product->id}}').on('hidden.bs.modal', function (e) {
                                $("#frecuency-{{$product->id}}").val($("#frecuency-{{$product->id}} option:first").val());
                            });
                            
                            $(function () {
                              $('[data-toggle="tooltip"]').tooltip('hide')
                            })
                        
                        $(".addToList-{{$product->id}}").change(function() {
                             var date = $(this).val();//.colsest('option').val();
                             var dname = date.split('-');
                             var splite_date = dname[2] +' del '+ dname[1];
                            var attr = $('option:selected', this).attr('id'); 
                            $('#AddToListModal-{{$product->id}}').on('show.bs.modal', function(event) {
                                            var modal = $(this)
                                            modal.find('.modal-title').text('Agregar producto a mi lista del día ' + splite_date)
                                            modal.find('#fecha-ree').val(date);
                                        });

                                if (attr == 'date') {
                                      $('#AddToListModal-{{$product->id}}').modal();

                                } else {
                                    //console.log('not is');
                                }
                        });   

                        $('#addNewProduct-{{$product->id}}').click(function(){
                            var concurrence = $('#addToListFrec-{{$product->id}}').val();
                            var qty = $('#addListQty-{{$product->id}}').val();
                            var r_d = $('.ReestockDate{{$product->id}}').val();
                            if (qty == '') {
                                $('.addListQty-{{$product->id}}').css( "color", "red" );

                            }
                            if (concurrence != '' && qty != '' && r_d != '') {
                            var parametros = { "product_id" : {{$product->id}}, "concurrence" : concurrence, "qty" : qty, "reestockDate" : r_d };
                             $.ajaxSetup({
                                      headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                      }
                                });
                            
                                $.ajax({
                                            data:  parametros,
                                            url:   '{{route("add.product")}}',
                                            type:  'post',
                                            beforeSend: function () {
                                                $("#addNewProduct-{{$product->id}}").text("");
                                                var loading = ("<div class='preloader-wrapper small active addNewProduct-{{$product->id}}'><div class='spinner-layer spinner-red-only'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div>")
                                                $('#addNewProduct-{{$product->id}}').append(loading);
                                            },
                                            success:  function (response) {

                                                    if(response == 'success'){
                                                        $("#addNewProduct-{{$product->id}}").html("Producto agregado <i class='fa fa-check'></i>");
                                                        $("#addNewProduct-{{$product->id}}").attr("disabled", true);
                                                        $("#addNewProduct-{{$product->id}}").addClass("btn-success");


                                                    }else{
                                                         $("#addNewProduct-{{$product->id}}").html("Guardar en mi lista");
                                                    }
                                            }
                                    });
                                }

                        });

                        $("#product-{{$product->id}}").click(function () {

                            var concurrence = $("#frecuency-{{$product->id}}").val();
                            var parametros = { "product_id" : {{$product->id}}, "concurrence" : concurrence };
                            var attr = $('#frecuency-{{$product->id}}', this).children(":selected").attr('id'); 
                            console.log(attr);
                            if (concurrence == null) {
                                $("#frecuency-{{$product->id}}").addClass("error");
                                $('#frecuency-{{$product->id}}').tooltip('show');
                                console.log("Empty concurrence");
                                  console.log(attr);
                            }else {
                                console.log('No exceptions apply. Go on normally.');
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