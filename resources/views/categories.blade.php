@extends('layouts.clients')
@section('titulo', 'Categorias')
@section('estilos_unicos')
@endsection
@section('contenido')
	@include('components.search-store')
	<!--Section: Products v.4-->
<section class="pb-3 text-center ">

    <!--Section heading-->
    <h1 class="h1 py-5">{{$header->h_name}}</h1>

    <div class="row p-5">

      	@forelse($categories as $c)
	        <div class="col-lg-3 col-md-6 mb-4">

	          
	            <div class="card collection-card z-depth-1-half">
	              
	                <div class="view zoom">
	                    <img src="{{asset('images/categories/')}}/{{$c->category_image}}" class="img-fluid" alt="">
	                    <div class="stripe dark">
	                        <a href="{{route('search.subCat', ['department'=> request()->department, 'categorie' => $c->id])}}">
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
