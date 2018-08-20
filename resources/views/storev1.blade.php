@extends('layouts.clients')
@section('titulo', 'tienda')
@section('estilos_unicos')

<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

<style type="text/css">
    .margin10
    {
        margin-top: 0 !important;
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
      /*  padding-top: 10px !important;*/
    }
    .price
    {
        font-size: 16px !important;
    }
    .err label
    {
        color: red;
    }
    .white-i  {
        color: white !important;
    }
    .file-field .btn-floating {
  float: left; }
.file-field.big .file-path-wrapper {
  height: 3.2rem; }
  .file-field.big .file-path-wrapper .file-path {
    height: 3rem; }
                
.center-img{
       margin-left: auto;
    margin-right: auto;
}
.red-reestock{
    background-color: #f4452c;
}
.brands-box{
        height: 300px;
    border: black;
    overflow: scroll;
}
</style>
@endsection
@section('navbar')

@section('contenido')
<div id="carousel-example-1z" class="carousel slide carousel-slide" data-ride="carousel">
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
           {{--  <div class="carousel-item">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="http://www.delimera.com.vn/media/stef/home/offer.jpg" alt="First slide">
                    <div class="mask waves-effect waves-light">
                         Caption 
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
                         /.Caption
                    </div>
                </div>
            </div> --}}
            <!--/First slide-->
            <!--Second slide-->
            <div class="carousel-item h-100 active">
                <div class="view h-100">
                    <picture>
                        <source media="(max-width: 700px)" srcset="{{url('img/Banner_Tienda_Carne_Artesanal_(340x420).jpg')}}">
                        <source media="(max-width: 800px)" srcset="{{url('img/Banner_Tienda_Carne_Artesanal_(340x768).jpg')}}">
                        <img id="first-banner" class="d-block h-100 w-lg-100 img-fluid" src="{{url('img/Banner_Tienda_Carne_Artesanal_340x1600.jpg')}}" alt="Second slide">
                    </picture>
                   
                    <div class="mask waves-effect waves-light">
                      
                    </div>
                </div>
            </div>
            <!--/Second slide-->
            <!--Third slide-->
            <div class="carousel-item">
                <div class="view h-100">
                   <picture>
                        <source media="(max-width: 700px)" srcset="{{url('img/Banner_Tienda_Adios_Hola_(340x420).jpg')}}">
                        <source media="(max-width: 800px)" srcset="{{url('img/Banner_Tienda_Adios_Hola_(340x768).jpg')}}">
                        <img id="first-banner" class="d-block h-100 w-lg-100 img-fluid" src="{{url('img/Banner_Tienda_Ads_Hola_(340x1600).jpg')}}" alt="Second slide">
                    </picture>
               {{--      <div class="mask waves-effect waves-light">
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
                        
                    </div> --}}
                </div>
            </div>
             <div class="carousel-item h-100">
                <div class="view h-100">
                    <picture>
                        <source media="(max-width: 700px)" srcset="{{url('img/Banner_Tienda_Recetas_Favoritas_340x420.jpg')}}">
                        <source media="(max-width: 800px)" srcset="{{url('img/Banner_Tienda_Recetas_Favoritas_(340x768).jpg')}}">
                        <img id="first-banner" class="d-block h-100 w-lg-100 img-fluid" src="{{url('img/Banner_Tienda_Recetas_Favoritas_(340x1600).jpg')}}" alt="Second slide">
                    </picture>
                   
                  <a href="{{route('recipe.view')}}">  <div class="mask waves-effect waves-light">
                      
                    </div></a>
                </div>
            </div>
        </div>
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
    <div class="container-fluid mx-0 px-0 red-reestock">
        <!--Navbar-->
      {{--   <nav class="navbar navbar-expand-lg navbar-dark primary-color mb-5 navbar-toggleable-md " id="search-nav">
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
        </nav> --}}
      {{--   <div class="row">
            <div class="col-xs-4 ml-3"> --}}
                @include('components.search-store')
    {{--         </div>
            <div class="col-xs-8 ">
               <form action="{{route('search2')}}" class="form-inline justify-content-end col-md-12">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input class="form-control form-control-md ml-3 w-75" value="{{request()->search}}" name="search" type="text" placeholder="Buscar" aria-label="Search">
                </form> 
            </div>
        </div> --}}
    </div>
    <div class="container mt-3 pt-1">

{{-- {{dd(Cart::content())}} --}}

        <div class="row pt-1">
            <div class="col-lg-3">
                <div class="">
                    <div class="row">

                      
                        
                        <div class="col-md-6 col-lg-12 mb-2">    
                              <!--Sub Categories-->
                            <div class="divider"></div>
                            @if(request()->has('sub_cat'))
                            <h5 class="font-bold dark-grey-text"><strong>Categorias</strong></h5>
                                <div id="category-remove" class="chip chip-xs teal lighten-2 white-text">
                                    {{request()->sub_cat}}
                                    <i class="close fa fa-times"></i>
                                </div>
                            @else
                                @isset($sub_cats)
                                    <?php $n=0 ?>
                                    <div class="accordion" id="accordionExt" role="tablist" aria-multiselectable="false">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <a data-toggle="collapse" href="#collapseCategories" aria-expanded="false" aria-controls="collapseOne">
                                                    <h5 class="mb-0">
                                                        Categorias <i class="fa fa-angle-up rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>
                                            <div id="collapseCategories" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionExt" >
                                            @forelse($sub_cats as $cat)
                                                <?php $n++ ?>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <input name="group100" type="checkbox" id="cat{{$n}}" name="cat" value="{{$cat}}" onclick="window.location='{{Request::fullUrl().'&sub_cat='.$cat}}'">
                                                        <label for="cat{{$n}}" class="dark-grey-text">{{$cat}}</label>
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse
                                            </div>
                                        </div>
                                    </div>
                                @endisset
                            @endif
            
                        </div>
             
                    </div>
                            <div class="divider"></div>
                            @if(request()->has('brand'))
                            <h5 class="font-bold dark-grey-text"><strong>Marcas</strong></h5>
                                <div id="brand-remove" class="chip chip-xs teal lighten-2 white-text">
                                    {{request()->brand}}
                                    <i class="close fa fa-times"></i>
                                </div>
                            @else
                                @isset($brands)
                                    <?php $n=0 ?>
                                    <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="false">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <h5 class="mb-0">
                                                        Marcas <i class="fa fa-angle-up rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>
                                            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx" >
                                            @forelse($brands as $brand)
                                                <?php $n++ ?>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <input name="group100" type="checkbox" id="brand{{$n}}" name="brand" value="{{$brand}}" onclick="window.location='{{Request::fullUrl().'&brand='.$brand}}'">
                                                        <label for="brand{{$n}}" class="dark-grey-text">{{$brand}}</label>
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse
                                            </div>
                                        </div>
                                    </div>
                                @endisset
                            @endif
                          

                </div>

            </div>

            <div class="col-lg-9">
                <!-- Products Grid -->
                <section class="section pt-4"> 
                    <div class="row">
                        <div class="col-xl-12">
                            @if(session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{session('success')}}
                                    </div>
                            @elseif(session('err'))   
                                <div class="alert alert-danger" role="alert">
                                        {{session('err')}}
                                </div>     
                            @endif
                        </div>
                        <?php $count = 0; ?>
                        @forelse($products as $product)
                        <?php $count++; ?>
                        
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
                                                        @if($product->product_img)
                                                            <img src="{{url($product->product_img)}}" class="img-fluid no-shadow"  alt="">
                                                        @else
                                                            <img src="{{url('img/no-img.jpg')}}" class="img-fluid no-shadow"  alt="">
                                                        @endif
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
                                                                         @if($product->unity == "KG" || $product->unity == "KILO")
                                                                            <input style="padding: 7px;" class="KG" type="number" name="qty" id="addListQty-{{$product->id}}" value="1.00" min="0.20" max="99999.99" step="0.20" pattern="^\d+(?:\.\d{1,2})?$">
                                                                            @else
                                                                        <input data-toggle="tooltip" title="Debes especificar una cantidad." role="tooltip" style="padding: 7px;" type="number" name="qty" id="addListQty-{{$product->id}}">
                                                                        @endif
                                                                        <label class="addListQty-{{$product->id}}" for="addListQty-{{$product->id}}">Cantidad</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mt-1"> 
                                                                    <div class="md-form">
                                                                            <select class="mdb-select colorful-select dropdown-primary" id="addToListFrec-{{$product->id}}">
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

                            <!--AddProductToBAsket-->  
                              <div class="modal fade" id="AddToBasketModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notify modal-danger" role="document">
                                    <div class="modal-content">
                                        {{-- <form method="post" action=""> --}}
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><p class="heading lead"><i class="fa fa-shopping-cart white-i"></i>Añadir este producto</p></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mt-1">
                                                    <div class="col-md-4">
                                                        @if($product->product_img)
                                                            <img src="{{url($product->product_img)}}" class="img-fluid no-shadow"  alt="">
                                                        @else
                                                            <img src="{{url('img/no-img.jpg')}}" class="img-fluid no-shadow"  alt="">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8 d-flex verticalcenter">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-12">  
                                                                <strong class="align-middle flex-example ">{{$product->product_name}}</strong ><br>
                                                                <label class="grey-text">{{$product->brand}}</label><br>
                                                                <label>$ {{$product->sale_price }} </label> <label class="grey-text">  {{$product->unity}}</label>
                                                            </div>
                                                            
                                                           
                                                                     
    
                                                            
                                                                <div class="col-md-6 mt-1"> 
                                                                    <div class="md-form">
                                                                        @if($product->unity == "KG" || $product->unity == "KILO")
                                                                            <input style="padding: 7px;" type="number" class="KG" name="qty" id="addBasketQty-{{$product->id}}" value="1.00" min="0.20" max="99999.99" step="0.20" pattern="^\d+(?:\.\d{1,2})?$">
                                                                        <label class="addBasketQty-{{$product->id}}" for="addBasketQty-{{$product->id}}">KG</label>
                                                                        @else
                                                                         <input data-toggle="tooltip" title="Debes especificar una cantidad." role="tooltip" style="padding: 7px;" type="number" name="qty" id="addBasketQty-{{$product->id}}" value="1" min="1" max="999">
                                                                        <label class="addBasketQty-{{$product->id}}" for="addBasketQty-{{$product->id}}">Cantidad</label>
                                                                        @endif
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mt-1"> 
                                                                    <div class="md-form">
                                                                            <select class="mdb-select colorful-select dropdown-primary" id="frecuency-{{$product->id}}">
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
                                                          
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal" id="CancelToBasketModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">Cancelar</button>
                                                <button type="button" class="btn btn-default btn-md" id="addToBasketProduct-{{$product->id}}">Añadir a mi carrito
                                                        
                                                </button>
                                            </div>
                                      {{--   </form> --}}
                                    </div>
                                </div>
                            </div>
                            <!--End Modal-->    
                            <!-- Full Height Modal Right -->


                            <div class="col-lg-4 col-md-6 mb-r">
                                <div class="card no-shadow"><a href=""></a>
                                    <div class="view overlay hm-white-slight no-shadow">
                                       <a href="" data-toggle="modal" data-target="#modalQuickView<?php echo $count; ?>"> @if($product->product_img)
                                                            <img src="{{url($product->product_img)}}" class="img-fluid no-shadow center-img"  alt="">
                                                        @else
                                                            <img src="{{url('img/no-img.jpg')}}" class="img-fluid no-shadow"  alt="">
                                                        @endif</a>
                                        <a data-toggle="modal" data-target="#modalQuickView<?php echo $count; ?>" >
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <div class="card-body text-center no-padding">
                                        <a href="" data-toggle="modal" data-target="#modalQuickView<?php echo $count; ?>" class="text-muted">{{-- <h6>{{ $product->brand }}</h6> --}}</a>
                                          <a href="" data-toggle="modal" data-target="#modalQuickView<?php echo $count; ?>"  class="text-muted">{{-- <h6>{{ $product->unity }}</h6> --}}</a>
                                        <h4 class="card-title"><strong><a href="" data-toggle="modal" data-target="#modalQuickView<?php echo $count; ?>" >{{$product->product_name}}</a></strong></h4>
                                        <div class="card-footer">
                                            <span class="center price align-middle font-weight-bold blue-text">{{$product->sale_price}} MXN <!-- <span class="discount">299$</span> --></span>
                                        </div>
                                        @if(count($lists))
                                            <div class="md-form">
                                            
                                            <select class="form-control tootltip-arrow addToList-{{$product->id}}" data-toggle="tooltip" title="Debes escoger cada cuanto necesitas este producto." role="tooltip" id="">
                                                <option selected disabled>Lo quiero en mi lista del: </option>
                                                @forelse($lists as $date)
                                                
                                                    <option id="date" value="{{$date->fecha}}">A mi lista del {{$date->date}} </option>
                                                
                                                @empty
                                                @endforelse 
                                            </select>                 
                                        </div>
                                        @else
                                         
                                        @endif
                                        <button class="btn btn-danger btn-sm" id="Modal-product-{{$product->id}}">Añadir a carrito</button>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="col-md-12 alert alert-warning" role="alert">
                            No se encontraron resultados.
                        </div>
                        <div class="col-md-12">
                            <p>¿No encuentras los productos que buscas? <a href="#" data-toggle="modal" data-target="#modalContactForm">Solicita que el producto este disponible aqui.</a></p>
                        </div>
                        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{route('product.request')}}"  method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-bold"><img class="float-left no-shadow" src="{{url('icons/groceries.png')}}" >Ingresa los datos del producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        
                                        <div class="md-form">
                                          
                                            <input type="text" id="form3" class="form-control validate" required name="name">
                                            <label data-error="No es valido" data-success="bien" for="form3">Nombre del producto</label>
                                        </div>
                                         <div class="md-form form-sm">
                                          
                                            <textarea type="text" id="description" class="md-textarea mb-0" name="description"></textarea>
                                            <label for="description">Descripción</label>
                                        </div>

                                        <div class="md-form">
                                        
                                            {{-- <input type="text" id="form2" class="form-control validate" required name="department">
                                            <label data-error="No es valido" data-success="bien" for="form2">Departamento</label> --}}
                                            <select class="mdb-select colorful-select dropdown-danger" name="department" required>
                                                <option value="1">Abarrotes</option>
                                                <option value="3">Frutas y verduras</option>
                                                <option value="4">Refrigerados</option>
                                                <option value="2">Cárnicos</option>
                                                <option value="5">Higiene Personal</option>
                                                <option value="6">Limpieza</option>
                                                <option value="7">Desechables</option>
                                                 <option value="8">Otro..</option>
                                            </select>
                                            <label>Departamento</label>
                                        </div>

                                        <div class="md-form">
                                        
                                            <input type="text" id="form32" class="form-control validate" required name="brand">
                                            <label data-error="No es valido" data-success="bien" for="form34">Marca</label>
                                        </div>

                                        <div class="md-form">
                                          <select class="mdb-select colorful-select dropdown-danger" name="unity" required>
                                                <option value="PIEZA">Pieza</option>
                                                <option value="BOTE">Bote</option>
                                                <option value="PAQUETE">Paquete</option>
                                                <option value="GRAMOS">Gramos</option>
                                                <option value="KILO">Kilo</option>
                                                 <option value="OTRO">Otro..</option>
                                            </select>
                                            <label>Unidad</label>
                                        </div>

                                        <div class="md-form">
                                        
                                            <input type="text" id="name-store" class="form-control validate" required name="store">
                                            <label data-error="No es valido" data-success="bien" for="name-store">Tienda</label>
                                        </div>

                                        <div class="file-field big">
                                            <a class="btn-floating btn-lg pink lighten-1 mt-0">
                                                <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                <input type="file" name="p_image" id="p_upload" accept="image/x-png,image/gif,image/jpeg" >
                                            </a>
                                            <div class="file-path-wrapper">
                                               <input class="file-path validate" type="text" placeholder="¿Quiers añadir una imagen? (opcional)">
                                            </div>
                                        </div>
                                        <div class="md-form mt-2">   
                                        @auth    
                                             <input type="email" id="email" class="form-control validate" required name="email" value="{{Auth::user()->email}}">
                                        @endauth

                                            @guest
                                                <input type="email" id="name-store" class="form-control validate" required name="email" >
                                            @endguest
                                        <label data-error="No es valido" data-success="bien" for="email" >email</label>
                                        </div>

                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button class="btn btn-unique">Enviar <i class="fa fa-paper-plane-o ml-1"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                
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

 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
//             $(window).resize(function(e){
//    if($(window).width() < 568) {
  
//         $("#first-banner").each(function() {
//             $(this).attr("src", "{{url('img/Untitled-3.jpg')}}");
//         });
//         } else if ($(window).width() >= 568) 
//         {
//                 $("#first-banner").each(function() {
//                 $(this).attr("src","{{url('img/Untitled-1.jpg')}}");
//                 });                        
//     }         
// });
        $('.dropdown-submenu .dropdown-toggle').on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).next('.dropdown-menu').toggle();
});
    $('.mdb-select').material_select();



});


    $("#brand-remove").click(function(){
        var str = "{{Request::fullUrl()}}";
        var res = str.replace(/brand=/g, "");
        var decoded = res.replace(/&amp;/g, '&');
        window.location.href = decoded;
        //console.log(decoded);
    });
        $("#category-remove").click(function(){
        var str = "{{Request::fullUrl()}}";
        var res = str.replace(/sub_cat=/g, "");
        var decoded = res.replace(/&amp;/g, '&');
        window.location.href = decoded;
        //console.log(decoded);
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
                         $("body").on('keyup mouseup', '#addListQty-{{$product->id}}', function(){
                            var qty_element = $("#addListQty-{{$product->id}}");
                            
                            var qty = $("#addListQty-{{$product->id}}").val();
                            if($(qty_element).attr('class') == 'KG'){
                               
                            }else{
                                    $(qty_element).val(Math.ceil(qty));
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
                                            success:  function (response) 
                                            {
                                                console.log(response)
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
                        $("#Modal-product-{{$product->id}}").click(function(){
                            $("#AddToBasketModal-{{$product->id}}").modal();
                        });

                        $("body").on('keyup mouseup', '#addBasketQty-{{$product->id}}', function(){
                            var qty_element = $("#addBasketQty-{{$product->id}}");
                            
                            var qty = $("#addBasketQty-{{$product->id}}").val();
                            if($(qty_element).attr('class') == 'KG'){
                               
                            }else{
                                    $(qty_element).val(Math.ceil(qty));
                                }
                            
                            
                        });
                        $("#addToBasketProduct-{{$product->id}}").click(function () {
                            var qty_element = $("#addBasketQty-{{$product->id}}");
                            if($(qty_element).attr('class') == 'KG'){
                                var val = parseFloat($(qty_element).val()).toFixed(2);
                                $(qty_element).val(val);
                            }
                           
                            var concurrence = $("#frecuency-{{$product->id}}").val();
                            var qty = $("#addBasketQty-{{$product->id}}").val();
                            
                            var parametros = { "product_id" : {{$product->id}}, "concurrence" : concurrence, "qty": qty };
                           
                          
                            if (concurrence == null) {
                             
                            }else if (qty == ''){
                                $('.addBasketQty-{{$product->id}}').css( "color", "red" );
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
                                                $( "#side-cart" ).load(window.location.href + " #side-cart", redo );
                                               
                                               

                                                 $( "#total" ).load(window.location.href + " #total" );
                                                $( "#badge" ).load(window.location.href + " #badge" );

                                                function redo(){
                                                    $('.b-number').niceNumber();
                                                }
                                                $("#CancelToBasketModal-{{$product->id}}").text("Seguir comprando");
                                                 $("#addToBasketProduct-{{$product->id}}").html("Se añadio al carrito <i class='fa fa-check'></i>")    
                                                        $("#addToBasketProduct-{{$product->id}}").addClass("btn-success");
                                                         var modal = $("#AddToBasketModal-{{$product->id}}").find('div'); 
                                                        $(modal).removeClass("modal-danger");
                                                        $(modal).addClass("modal-success");
                                                        
                                             
                                                    console.log(response);
                                            }
                                    });
                            }

                        });
                    

        </script>
    @empty
    
    </div></div>
    
    @endforelse﻿
@endsection