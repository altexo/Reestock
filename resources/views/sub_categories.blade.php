@extends('layouts.clients')
@section('titulo', 'Categorias')
@section('estilos_unicos')
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
    .white-i  {
        color: white !important;
    }
    .file-field .btn-floating {
  float: left; }
.file-field.big .file-path-wrapper {
  height: 3.2rem; }
  .file-field.big .file-path-wrapper .file-path {
    height: 3rem; }
                

</style>
@endsection
@section('contenido')
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-1z" data-slide-to="1" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2" class=""></li>
        </ol>

        <div class="carousel-inner" role="listbox">
 
            <div class="carousel-item h-100 active">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="{{url('img/storebanner.jpg')}}" alt="Second slide">
                    <div class="mask waves-effect waves-light">
                      
                    </div>
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
      
    </div>
    <div class="container-fluid mx-0 px-0">

          @include('components.search-store')
    </div>
	
<section class="pb-3 text-center ">

    <!--Section heading-->
    <h1 class="h1 py-5">{{$header->h_name}}</h1>

    <div class="row p-5">

      	@forelse($sub_categories as $c)
	        <div class="col-lg-3 col-md-6 mb-4">

	          
	            <div class="card collection-card z-depth-1-half">
	              
	                <div class="view zoom">
	                    <img src="{{asset('images/categories/')}}/{{$c->sub_category_image}}" class="img-fluid" alt="">
	                    <div class="stripe dark">
	                        <a href="{{route('search.results', [
	                        			'department'=> request()->department, 
	                        			'categorie' => $c->categories_id, 
	                        			'sub_categorie' => $c->id,
	                        		]
	                        	)}}">
	                            <p>{{$c->name}}
	                                <i class="fa fa-angle-right"></i>
	                            
	                            
	                            </p>
	                        </a>
	                    </div>
	                </div>
	            </div>

	        </div>
        @empty
				Oooops no se encontro pagina
			@endforelse
 

    </div>
 
</section>
<!--Section: Products v.4-->
	<div class="col-md-12">
		<div class="row">
			

		</div>
	</div>
@endsection
@section('footer')
