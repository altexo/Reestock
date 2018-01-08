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
	@if(session('success'))
			<div class="alert alert-success" role="alert">
  				{{session('success')}}
			</div>
		@endif
		@if(session('err'))
			<div class="alert alert-danger" role="alert">
  				{{session('err')}}
			</div>
		@endif
</div>
<a class="btn-floating btn-lg blue" href="{{ route('Ver Productos') }}"><i class="fa fa-arrow-left" aria-hidden="true"> <span class="black-text">Volver</span></i></a>
<h3 class="mt-0">Editar Producto:</h3>

@foreach($product as $p)

	<form class="mt-2" method="post" enctype="multipart/form-data" action="{{ route('product.img', ['id' => $p->id] ) }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
				    <input id="input-char-counter" type="text" length="20" id="bar_code" name="bar_code" value="{{$p->bar_code}}">
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
				    <option value="{{$p->department_id}}" selected>{{ $p->department_name }}</option>
				    <option value="1">ABARROTES</option>
				    <option value="2">LIMPIEZA</option>
				    <option value="3">FUTA Y VERDURA</option>
				    <option value="4">REFRIGERADOS</option>
				    <option value="5">HIGIÉNE PERSONAL</option>
				</select>
				<label>Departamento</label>
			</div>
			
			<div class="col-md-3 mt-3">
				<select class="mdb-select colorful-select dropdown-primary" id="brand" name="brand">
				    <option value="{{ $p->brand }}" selected>{{ $p->brand }}</option>
				    <option value="KELLOGS">KELLOGS</option>
				    <option value="KIRKLAND">KIRKLAND</option>
				    <option value="NESTLE">NESTLE</option>
				    <option value="LALA">LALA</option>
				    <option value="NESCAFÉ">NESCAFÉ</option>
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
				var marcas = ["ABUELA CONCHA", 
"ACE", 
"ACT II", 
"AIRES DEL CAMPO", 
"AJAX", 
"ALADINO", 
"ALMOND BREEZE", 
"ALPURA", 
"ANSERA", 
"AQUANET", 
"ARIEL", 
"ARM & HAMMER", 
"AUNT JEMIMA", 
"AURRERA", 
"AVEENO", 
"AXION", 
"BACHOCO", 
"BAKERS & CHEF", 
"BAR KEEPERS FRIEND", 
"BARBARIA", 
"BARILLA", 
"BENEFUD", 
"BEST FOODS", 
"BETTY CROCKER", 
"BIMBO", 
"BIO BABY", 
"BLANCA NIEVES", 
"BLANCAS", 
"BOVE", 
"CADEROL", 
"CAL C TOSE", 
"CAPERUCITA", 
"CAPRICE", 
"CAPULLO", 
"CARAPELLI", 
"CASA MADERO", 
"CAZARES", 
"CHAM", 
"CHATA", 
"CHEEZ WHIZ", 
"CLORALEX", 
"COLGATE", 
"COSTALITO", 
"CUTEX", 
"DANUP", 
"DEL FUERTE", 
"DEL HOGAR", 
"DEL MONTE", 
"DIAL", 
"DOG CHOW", 
"DOLORES", 
"DOVE", 
"DRYHOOK", 
"DULSWEET", 
"ELITE", 
"ESPUMA DE CHAPALA", 
"FABULOSO", 
"FLY OUT", 
"FOCA", 
"FRENCH CLASSIC", 
"GAMESA", 
"GARNIER FRUCTIS", 
"GHIRARDELLI", 
"GILLETTE", 
"GLORIA", 
"GOODY", 
"GREAT VALUE", 
"GRISSI", 
"GUACAMAYA", 
"HAWAIIAN TROPIC", 
"HEINZ", 
"HELLMAN'S", 
"HERBAL ESSENCES", 
"HERDEZ", 
"HOISIN", 
"HUGGIES", 
"HUICHOL", 
"HUNTS", 
"JELLO", 
"JOHNSON Y JOHNSON", 
"KARO", 
"KELLOGS", 
"KIKKOMAN", 
"KIPAN", 
"KIRKLAND", 
"KLEENEX", 
"KRUSTEAZ", 
"LA COSTEÑA", 
"LA CUARTA", 
"LA HUERTA", 
"LA VAQUITA", 
"LACTACYD", 
"LACTOVIT", 
"LALA", 
"LEROI", 
"LEY", 
"LIRIO", 
"LOG CABIN", 
"MAGGI", 
"MAR DE CORTÉS", 
"MARBÚ", 
"MARCA", 
"MARINELA", 
"MAS COLOR", 
"MAZATÚN", 
"MCCORMICK", 
"MEDIMART", 
"MEMBER'S MARK", 
"METCO", 
"MODELO", 
"MOLINA", 
"MR LUCKY", 
"MR MUSCULO", 
"NATURAL", 
"NATURE VALLEY", 
"NEOLIA", 
"NESTLE", 
"NEUTROGENA", 
"NOROESTE", 
"NUTELLA", 
"NUTRIOLI", 
"OCÉANOS SALVAJES", 
"OGX", 
"OIKOS", 
"ORAL B", 
"OREO", 
"OROWEAT", 
"PALMOLIVE", 
"PALOMA", 
"PÉTALO", 
"PIKOCHAS", 
"PINOL", 
"PLEDGE", 
"PREGO", 
"PROGRESO", 
"PRONTO", 
"PROTEC", 
"QUAKER", 
"REXONA", 
"REYNOLDS", 
"SABA", 
"SAN LORENZO", 
"SAN RAFAEL", 
"SANISSIMO", 
"SANTA CLARA", 
"SANTA CLARITA", 
"SCOTCH BRITE", 
"SIDECLEAN", 
"SILK ALMOND", 
"SKIPPY", 
"SONORA", 
"SORIANA", 
"TAJÍN", 
"TASTY", 
"THERBAL", 
"TOPOCHICO", 
"TOSTADAS", 
"TRADICIONAL", 
"TRAUB", 
"TRIZALET", 
"TWININGS", 
"UMI", 
"VANART", 
"VAPORUB", 
"VERDEVALLE", 
"VILEDA", 
"VOGUE", 
"WONDER", 
"XTREME", 
"YEMINA", 
"YOPLAIT", 
"ZEST", 
"ZIPLOC", 
"ZOTE", 
"ZULKA", 
"ZUUM", 
"ZWAN"
];
var supplier = ['WALMART', 'LEY', 'COSTCO', 'SAMS', 'SORIANA', 'FRUTERIA OLIVAS', 'FRUTERIA LOS COMPADRES','FRUTERIA EL CANARIO', 'LA MERA', 'FARMACIO MODERNA', 'TRAUB', 'CHATA','LA CUARTA','VINOTECA','TODO ORGANIKO'];
$.each(marcas, function(val, text) {
            $('#brand').append( $('<option></option>').val(val).html(text) )
            }); 

$.each(supplier, function(val, text) {
            $('#supplier').append( $('<option></option>').val(val).html(text) )
            }); 

	// 	$(function(){
	// 	setTimeout(function() {
	// 	    $('.alert').fadeOut('fast');
	// 	}, 5000); // <-- time in milliseconds

	// });

		$('.mdb-select').material_select();
var n = <?php echo $number.';';?>
		$('#add-supplier').click(function (e){
			

			e.preventDefault();
			
				var numbers = ['WALMART', 'LEY', 'COSTCO', 'SAMS', 'SORIANA', 'FRUTERIA OLIVAS', 'FRUTERIA LOS COMPADRES','FRUTERIA EL CANARIO', 'LA MERA', 'FARMACIO MODERNA', 'TRAUB', 'CHATA','LA CUARTA','VINOTECA','TODO ORGANIKO'];
			//var value = [1, 2, 3, 4, 5];

			var addSupplier = ('<div class="col-md-12 row mt-0"><div class="col-md-3 mt-2"><select class="add-caret browser-default colorful-select dropdown-primary" id="supplier'+n+'" name="supplier['+n+'][supplier_id]"><option value="" disabled selected>Selecciona una Tienda</option></select><div class="md-form form-sm mt-2"></div></div><div class="col-md-3"><div class="md-form form-sm mt-2"><input type="number" id="form1" class="form-control" min="0.00" step="0.01" max="99999.99" id="purchase_price" name="supplier['+n+'][purchase_price]"><label for="form1" class="">Precio de compra</label></div></div><div class="col-md-3 mt-2 "><i class="fa fa-close fa-2x remove-store" style="color:red"></i></div></div><hr>');
				$('div[id="supplier-cont"]').append(addSupplier);

				$.each(numbers, function(val, text) {
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