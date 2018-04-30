@extends('layouts.admins')
@section('navbar')
@section('contenido')
<div class="row">
	<div class="col-md-8"></div>
	<div class="col-md-4">
		<!-- Button trigger modal -->

    
	</div>

</div>
	                     
<div class="col-xl-12">
@include('admins.msj-component')
</div>
<a class="btn-floating btn-lg blue" href="{{ route('Ver Productos') }}"><i class="fa fa-arrow-left" aria-hidden="true"> <span class="black-text">Volver</span></i></a>
<h3 class="mt-0">Editar Producto:</h3>

@foreach($product as $p)

	<form class="mt-2" method="post" enctype="multipart/form-data" action="{{ route('product.img', ['id' => $p->id] ) }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<input type="hidden" name="url" value="{{ URL::previous() }}">
		<div class="row card col-md-6">
	<div class="col-md-12">
			<div class="col-md-12 mt-1 file-field">
		        <div class="btn btn-primary btn-sm">
		            <span>Abrir Imagenes</span>
		            <input type="file" multiple id="imgInp" name="file">

		        </div>
		        <div class="file-path-wrapper mt-2 ">
		            <input class="file-path validate" type="text" placeholder="Sube una o más imagenes" id="images" name="images">
		        </div>

    		</div>

	</div>
	<div class="col-md-12">
		
		
    
			<div class="col-md-6">
				<img id="blah" src="{{url('')}}/{{$p->product_img}}" alt="" class="img-fluid" />
				
			</div>
		 <button type="submit" class="btn btn-primary float-right">Actualizar Imagen</button>
	</div>
	</div>
	</form>	

	<div class="col-xl-12 card mt-4 mb-4">
		<form class="row col-xl-12 mt-2 " action="{{ route('product.update', ['id' => $p->id]) }}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="url" value="{{ URL::previous() }}">
				 <!-- Ventana modal de confirmacion de actualizar -->
		    <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		        <div class="modal-dialog modal-notify modal-warning" role="document">
		            <!--Content-->
		            <div class="modal-content">
		                <!--Header-->
		                <div class="modal-header">
		                    <p class="heading lead"></p>
		    
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                        <span aria-hidden="true" class="white-text">&times;</span>
		                    </button>
		                </div>
		    
		                <!--Body-->
		                <div class="modal-body">
		                    <div class="text-center">
		                        <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
		                        <p>Estas a punto de actualizar el producto: @foreach($product as $pr){{$pr->product_name}}@endforeach</p>
		                    </div>
		                </div>
		    
		                <!--Footer-->
		                <div class="modal-footer justify-content-center">
		                    <!-- <a type="submit" class="btn btn-primary-modal">Confiramar</i></a> -->
		                    <button type="submit" class="btn btn-primary-modal waves-effect waves-light">Confirmar</button>
		                    <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Cancelar</a>
		                </div>
		            </div>
		            <!--/.Content-->
		        </div>
		    </div>
		    <!-- Termina vetana modal-->	
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="col-md-6 mt-1">
				<div class="md-form">
				    <input id="input-char-counter" type="text" length="150" id="product_name" name="product_name" value="{{$p->product_name}}">
				    <label for="input-char-counter">Nombre del producto</label>
				</div>
			</div>
			<div class="col-md-6 mt-1">
				<div class="md-form">
				    <input id="input-char-counter" type="text" length="20" id="bar_code" name="bar_code" value="{{$p->barcode}}">
				    <label for="input-char-counter">Codigo de barras</label>
				</div>
			</div>
			<!-- <div class="col-md-6 mt-1">
				<div class="md-form">
				    <input id="input-char-counter" type="text" length="20">
				    <label for="input-char-counter">Nombre del producto</label>
				</div>
			</div> -->
			<!-- <div class="col-md-6 mt-2">
				<img src="{{ asset('img/placeholderimg.png') }}" alt="placeholder" class="img-thumbnail">
			</div> -->
			<div class="col-md-3 mt-3">
				<select class="mdb-select colorful-select dropdown-primary" id="department" name="department">
				   	<option value="{{$p->departments_id}}" selected>{{ $p->department_name }}</option>
				   		@forelse($departments as $department)
				   			 <option value="{{$department->id}}">{{$department->department_name}}</option>
				   		@empty
				   		@endforelse
				</select>
				<label>Departamento</label>
			</div>
			
			<div class="col-md-3 mt-3">
				<select class="mdb-select colorful-select dropdown-primary" id="brand" name="brand">
				    <option value="{{ $p->brand }}" selected>{{ $p->brand }}</option>
				    	@forelse($brands as $brand)
				    		<option value="{{$brand->brand}}">{{$brand->brand}}</option>
				    	@empty
				    	@endforelse
				   
				</select>
				<label>Marca</label>
           		
				<div class="md-form form-sm mt-2">
				  
				</div>
			</div>
			<div class="col-md-3 mt-3">
					<select class="mdb-select colorful-select dropdown-primary" id="unity" name="unity">
				    <option value="{{ $p->unity }}" selected>{{ $p->unity }}</option>
				    <option value="BOTE">BOTE</option>
				    <option value="PAQUETE">PAQUETE</option>
				    <option value="GRAMOS">GRAMOS</option>
				    <option value="PIEZA">PIEZA</option>
				    <option value="KILO">KILO</option>

				</select>
				<label>Unidad</label>
			</div>

		
			@endforeach
			<?php $number = 0; ?>
			
			<div class="col-xl-12 row" class="supplier-cont" id="supplier-cont">
				@foreach($product_suppliers as $ps)
	    		<div class="col-md-12 row mt-4">
	    			<div class="col-md-3 mt-2">
					<select class="add-caret browser-default colorful-select dropdown-primary" id="supplier" name="supplier[<?php echo $number;?>][supplier_id]">
					    <option value="{{ $ps->supplier_id }}" selected>{{ $ps->name }}</option>
					    
					</select>
					<!-- <label>Tienda</label> -->
	           		
					<div class="md-form form-sm mt-2">
					  
					</div>

				</div>
					<div class="col-md-3">
		    			<div class="md-form form-sm mt-2">
						    <input type="number" min="0.00" step="0.01" max="99999.99" id="form1" class="form-control" id="purchase_price" value="{{ $ps->purchase_price }}"" name="supplier[<?php echo $number;?>][purchase_price]">
						    <label for="form1" class="" >Precio de compra</label>
						</div>
					</div>

					<div class="col-md-3 mt-2"><i class="fa fa-close fa-2x remove-store" style="color:red"></i></div>
	    		</div>
	    		<hr>
	    	<?php $number++; ?> 
			@endforeach
			</div>

			<div class="row col-md-12 mt-0">
					<button type="button" class="btn btn-primary" id="add-supplier"><i class="fa fa-plus"></i> Agregar otra tienda</button>
					<button type="button" class="btn btn-success" id="" data-toggle="modal" data-target="#centralModalSuccess"><i class="fa fa-save"></i> Guardar</button>
				</div>
		</form>
		<div class="col-md-12 mt-6"></div>
	</div>
	
@endsection
@section('scripts_unicos')
<script type="text/javascript">
	$(document).ready(function() {


		$('.mdb-select').material_select();
var n = <?php echo $number.';';?>
		$('#add-supplier').click(function (e){
			

			e.preventDefault();
			
				var suppliers = [];
				@forelse($suppliers as $s)
					suppliers.push('{{$s->name}}');
				@empty
				@endforelse
				//['WALMART', 'LEY', 'COSTCO', 'SAMS', 'SORIANA', 'FRUTERIA OLIVAS', 'FRUTERIA LOS COMPADRES','FRUTERIA EL CANARIO', 'LA MERA', 'FARMACIO MODERNA', 'TRAUB', 'CHATA','LA CUARTA','VINOTECA','TODO ORGANIKO'];
			//var value = [1, 2, 3, 4, 5];

			var addSupplier = ('<div class="col-md-12 row mt-0"><div class="col-md-3 mt-2"><select class="add-caret browser-default colorful-select dropdown-primary" id="supplier'+n+'" name="supplier['+n+'][supplier_id]"><option value="" disabled selected>Selecciona una Tienda</option></select><div class="md-form form-sm mt-2"></div></div><div class="col-md-3"><div class="md-form form-sm mt-2"><input type="number" id="form1" class="form-control" min="0.00" step="0.01" max="99999.99" id="purchase_price" name="supplier['+n+'][purchase_price]"><label for="form1" class="">Precio de compra</label></div></div><div class="col-md-3 mt-2 "><i class="fa fa-close fa-2x remove-store" style="color:red"></i></div></div><hr>');
				$('div[id="supplier-cont"]').append(addSupplier);

				$.each(suppliers, function(val, text) {
	            	$('#supplier'+n+'').append( $('<option></option>').val(val+1).html(text) )
	            }); 
	            n++;
	            
		});

	
});

	
	$('body').on('click', '.remove-store', function () {
	    $(this).parent('div').parent('div').empty();
	    
	});
	 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

@endsection
@section('footer')