@extends('layouts.clients')
@section('title', 'Chekout')
@section('contenedor_class', 'd-flex justify-content-center')
@section('estilos_unicos')
<style type="text/css">
	.icon{
		text-shadow: rgb(0, 84, 17) 0px 0px 0px, rgb(0, 91, 18) 1px 1px 0px, rgb(0, 98, 20) 2px 2px 0px, rgb(0, 106, 21) 3px 3px 0px, rgb(0, 113, 23) 4px 4px 0px; font-size: 35px; color: rgb(255, 255, 255); height: 65px; width: 65px; line-height: 65px; border-radius: 50%; text-align: center; background-color: rgb(0, 120, 24);
	}
</style>
@endsection
@section('navbar')

@section('contenido')

	<div class="row col-md-10 margin10 ">
		@forelse($shipping as $s)
			
			<form action="{{ route('save.list') }}" method="POST" class="col-md-12 row d-flex justify-content-center">
			 {{ csrf_field() }}
			
				<section class="form-elegant col-md-8">
			
			    <!--Form without header-->
			    <div class="card">

			        <div class="card-body mx-4">

			            <!--Header-->
			            <div class="text-center mt-2 mb-2">

			                <h4 class="dark-grey-text mb-1"><strong>Datos de envío</strong></h4>
			                <html> 

							 <i id="icon" class="fa fa-truck" style="text-shadow: rgb(0, 84, 17) 0px 0px 0px, rgb(0, 91, 18) 1px 1px 0px, rgb(0, 98, 20) 2px 2px 0px, rgb(0, 106, 21) 3px 3px 0px, rgb(0, 113, 23) 4px 4px 0px; font-size: 35px; color: rgb(255, 255, 255); height: 65px; width: 65px; line-height: 65px; border-radius: 50%; text-align: center; background-color: rgb(0, 120, 24);"></i> 

			          
			            </div>

			            <!--Body-->
			            <div class="row">
				            <div class="col-md-6">
					            <div class="md-form">
					                <input type="text" id="ship_name" class="form-control" name="ship_name" value="{{$s->name}}" required>
					                <label for="ship_name">Nombre</label>
					            </div>
				            </div>
				            
				            <div class="col-md-6">
					            <div class="md-form">
					                <input type="text" id="ship_lastName" class="form-control" name="ship_lastName" value="{{$s->last_name}}" required>
					                <label for="ship_lastName">Apellido</label>
					            </div>
				            </div>

				            <div class="col-md-8">
					            <div class="md-form">
					                <input type="text" id="ship-st" class="form-control" name="ship_st" value="{{$s->address}}" required>
					                <label for="ship-st">Calle, Nº Interior, Nº Interior</label>
					            </div>
				            </div>

				             <div class="col-md-4">
					            <div class="md-form">
					                <input type="text" id="ship-col" class="form-control" name="ship_col" value="{{$s->colony}}" required>
					                <label for="ship-col">Colonia</label>
					            </div>
				            </div>

				             <div class="col-md-12">
					            <div class="md-form">
					                <input type="text" id="ship-town" class="form-control" name="ship_town" value="{{$s->city}}" required>
					                <label for="ship-town">Ciudad, Municipio</label>
					            </div>
				            </div>
				            <div class="col-md-4">
					            <div class="md-form">
					            	<select class="form-control" name="ship_country" required>
					            		<option selected value="{{$s->country}}">{{$s->country}}</option>
					            		<option value="MEXICO">MÉXICO</option>
					            		
					            	</select>
					              
					               
				            	</div>
			            	</div>

			            	<div class="col-md-4">
					            <div class="md-form">
					            	<select class="form-control" name="ship_state" required>
					            		<option selected value="{{$s->state}}">{{$s->state}}</option>
					            		<option value="SINALOA">SINALOA</option>
					            	</select>
					              
					               
				            	</div>
			            	</div>

			            	<div class="col-md-4">
					            <div class="md-form">
					            	 <input type="text" id="ship-cp" class="form-control" name="ship_cp" value="{{$s->zip_code}}" required>
					                <label for="ship-cp">Código Postal</label>
				            	</div>
			            	</div>

			            	<div class="col-md-12">
					            <div class="md-form">
					            	 <input type="text" id="ship-phone" class="form-control" name="ship_phone" value="{{$s->phone}}" required>
					                <label for="ship-phone">Teléfono</label>
				            	</div>
			            	</div>
			            </div>
			           <!--  <div class="md-form">
			            	<select class="form-control" name="frecuency">
			            		<option selected disabled>Frecuencía de Reestock</option>
			            		<option value="7">Cada 7 días</option>
			            		<option value="15">Cada 15 días</option>
			            		<option value="30">Cada mes</option>
			            	</select>
			              
			                <label for="frec-list"></label>
			            </div> -->

			           
			        </div>

			        <!--Footer-->
			       

			    </div>
			    <!--/Form without header-->

			    	<div class="modal-footer mx-5 pt-3 mb-1">
			           <button class="btn btn-danger">Guardar</button>
			</div>
			
			</section>
		
        </form>  
		@empty
		
		<form action="{{ route('saveNew.list') }}" method="POST" class="col-md-12 row d-flex justify-content-center">
			 {{ csrf_field() }}
			
				<section class="form-elegant col-md-6">
			
			    <!--Form without header-->
			    <div class="card">

			        <div class="card-body mx-4">

			            <!--Header-->
			            <div class="text-center mt-2 mb-2">

			                <h4 class="dark-grey-text mb-1"><strong>Datos de envío</strong></h4>
			                <html> 

							 <i id="icon" class="fa fa-truck" style="text-shadow: rgb(0, 84, 17) 0px 0px 0px, rgb(0, 91, 18) 1px 1px 0px, rgb(0, 98, 20) 2px 2px 0px, rgb(0, 106, 21) 3px 3px 0px, rgb(0, 113, 23) 4px 4px 0px; font-size: 35px; color: rgb(255, 255, 255); height: 65px; width: 65px; line-height: 65px; border-radius: 50%; text-align: center; background-color: rgb(0, 120, 24);"></i> 

			          
			            </div>

			            <!--Body-->
			            <div class="row">
				            <div class="col-md-6">
					            <div class="md-form">
					                <input type="text" id="ship_name" class="form-control" name="ship_name" required>
					                <label for="ship_name">Nombre</label>
					            </div>
				            </div>
				            
				            <div class="col-md-6">
					            <div class="md-form">
					                <input type="text" id="ship_lastName" class="form-control" name="ship_lastName" required>
					                <label for="ship_lastName">Apellido</label>
					            </div>
				            </div>

				            <div class="col-md-8">
					            <div class="md-form">
					                <input type="text" id="ship-st" class="form-control" name="ship_st" required>
					                <label for="ship-st">Calle, Nº Interior, Nº Interior</label>
					            </div>
				            </div>

				             <div class="col-md-4">
					            <div class="md-form">
					                <input type="text" id="ship-col" class="form-control" name="ship_col" required>
					                <label for="ship-col">Colonia</label>
					            </div>
				            </div>

				             <div class="col-md-12">
					            <div class="md-form">
					                <input type="text" id="ship-town" class="form-control" name="ship_town" required>
					                <label for="ship-town">Ciudad, Municipio</label>
					            </div>
				            </div>
				            <div class="col-md-4">
					            <div class="md-form">
					            	<select class="form-control" name="ship_country" required>
					            		<option selected disabled>PaÍs</option>
					            		<option value="MEXICO">MÉXICO</option>
					            		
					            	</select>
					              
					               
				            	</div>
			            	</div>

			            	<div class="col-md-4">
					            <div class="md-form">
					            	<select class="form-control" name="ship_state" required="">
					            		<option selected disabled>Estado</option>
					            		<option value="SINALOA">SINALOA</option>
					            	</select>
					              
					               
				            	</div>
			            	</div>

			            	<div class="col-md-4">
					            <div class="md-form">
					            	 <input type="text" id="ship-cp" class="form-control" name="ship_cp" required>
					                <label for="ship-cp">Código Postal</label>
				            	</div>
			            	</div>

			            	<div class="col-md-12">
					            <div class="md-form">
					            	 <input type="text" id="ship-phone" class="form-control" name="ship_phone" required>
					                <label for="ship-phone">Teléfono</label>
				            	</div>
			            	</div>
			            </div>
			           <!--  <div class="md-form">
			            	<select class="form-control" name="frecuency">
			            		<option selected disabled>Frecuencía de Reestock</option>
			            		<option value="7">Cada 7 días</option>
			            		<option value="15">Cada 15 días</option>
			            		<option value="30">Cada mes</option>
			            	</select>
			              
			                <label for="frec-list"></label>
			            </div> -->

			           
			        </div>

			        <!--Footer-->
			       

			    </div>
			    <!--/Form without header-->

			    	<div class="modal-footer mx-5 pt-3 mb-1">
			           <button class="btn btn-danger">Guardar</button>
			</div>
			
			</section>
		
        </form>  
        @endforelse 


	</div>
@endsection