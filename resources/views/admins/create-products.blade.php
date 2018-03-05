@extends('layouts.admins')
@section('navbar')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('contenido')
<div class="row">
	<div class="col-md-8"></div>
	<div class="col-md-4">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-outline-success waves-effect" data-toggle="modal" data-target="#exampleModal">
		    Importar desde csv
		</button>
	</div>
</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	        	<form method="post" action="{{route('import.products')}}" enctype="multipart/form-data">
	        		{{csrf_field()}}
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Importar productos desde CSV</h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		            	<div class="col-md-12">
		            		<input type="file" name="file" required>
		            	</div>
		           
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		                <button type="submit" class="btn btn-primary">Importar</button>
		            </div>
	            </form>
	        </div>
	    </div>
	</div>
	                     

<div class="col-xl-12">
	@if(session('success'))
			<div class="alert alert-success" role="alert">
  				{{session('success')}}
			</div>
		@endif
</div>
<h3 class="mt-0">Crear Producto:</h3>

	<div class="col-xl-12">
		<form class="row col-xl-12" action="{{route('product.create')}}" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="col-md-6 mt-1">
				<div class="md-form">
				    <input id="input-char-counter" type="text" length="150" id="product_name" name="product_name">
				    <label for="input-char-counter">Nombre del producto</label>
				</div>
			</div>
			<div class="col-md-6 mt-1">
				<div class="md-form">
				    <input id="input-char-counter" type="text" length="20" id="bar_code" name="bar_code">
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
				    <option value="" disabled selected>Selecciona un departamento</option>
				    <option value="1">ABARROTES</option>
				    <option value="2">CÁRNICOS</option>
				    <option value="3">FRUTA Y VERDURA</option>
				    <option value="4">REFRIGERADO</option>
				    <option value="5">HIGIÉNE PERSONAL</option>
				    <option value="6">LIMPIEZA</option>
				    <option value="7">DESECHABLES</option>
				    <option value="8">OTRO</option>
				    
				    

				</select>
				<label>Departamento</label>
			</div>
			
			<div class="col-md-3 mt-3">
				<select class="mdb-select colorful-select dropdown-primary" id="brand" name="brand">
				    <option value="" disabled selected>Selecciona una marca</option>
				  {{--   <option value="KELLOGS">KELLOGS</option>
				    <option value="KIRKLAND">KIRKLAND</option>
				    <option value="NESTLE">NESTLE</option>
				    <option value="LALA">LALA</option>
				    <option value="NESCAFÉ">NESCAFÉ</option> --}}
				</select>
				<label>Marca</label>
           		
				<div class="md-form form-sm mt-2">
				  
				</div>
			</div>
			<div class="col-md-3 mt-3">
					<select class="mdb-select colorful-select dropdown-primary" id="unity" name="unity">
				    <option value="" disabled selected>Selecciona tipo de unidad</option>
				    <option value="BOTE">BOTE</option>
				    <option value="PAQUETE">PAQUETE</option>
				    <option value="GRAMOS">GRAMOS</option>
				    <option value="PIEZA">PIEZA</option>
				    <option value="KILO">KILO</option>

				</select>
				<label>Unidad</label>
			</div>

			<div class="col-md-7 mt-1 file-field">
		        <div class="btn btn-primary btn-sm">
		            <span>Abrir Imagenes</span>
		            <input type="file" multiple id="imgInp" name="file">

		        </div>
		        <div class="file-path-wrapper mt-2">
		            <input class="file-path validate" type="text" placeholder="Sube una o más imagenes" id="images" name="images">
		        </div>
    		</div>
    
			<div class="col-md-6">
				<img id="blah" src="#" alt="" class="img-fluid" />
			</div>

			<div class="col-xl-12 row" class="supplier-cont" id="supplier-cont">
	    		<div class="col-md-12 row mt-4">
	    			<div class="col-md-3 mt-2">
					<select class="add-caret browser-default colorful-select dropdown-primary" id="supplier" name="supplier[0][supplier_id]">
					    <option value="" disabled selected>Selecciona una Tienda</option>
					   
					</select>
					<!-- <label>Tienda</label> -->
	           		
					<div class="md-form form-sm mt-2">
					  
					</div>

				</div>

	    			<div class="md-form form-sm mt-2 col-md-3">
					    <input type="number" min="0" step="0.01" max="99999.99" id="form1" class="form-control" id="purchase_price" name="supplier[0][purchase_price]">
					    <label for="form1" class="">Precio de compra</label>
					</div>

				<!-- 	<div class="md-form form-sm mt-2 col-md-3">
					    <input type="number" id="form1" class="form-control" id="sell_price" name="supplier[0][sell_price]">
					    <label for="form1" class="">Precio de venta</label>
					</div> -->
					<div class="col-md-3 mt-2"><i class="fa fa-close fa-2x remove-store"></i></div>
	    		</div>
	    		<hr>
			</div>
			<div class="row col-md-12 mt-0">
					<button type="button" class="btn btn-primary" id="add-supplier"><i class="fa fa-plus"></i> Agregar otra tienda</button>
					<button type="submit" class="btn btn-success" id=""><i class="fa fa-save"></i> Guardar</button>
				</div>
		</form>
		<div class="col-md-12 mt-6"></div>
	</div>
@endsection
@section('footer')
@section('scripts_unicos')
<script type="text/javascript">
	// Material Select Initialization
	var n = 0;
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
            $('#brand').append( $('<option></option>').val(text).html(text) )
            }); 

$.each(supplier, function(val, text) {
            $('#supplier').append( $('<option></option>').val(val+1).html(text) )
            }); 




	$(function(){
		setTimeout(function() {
		    $('.alert-success').fadeOut('fast');
		}, 5000); // <-- time in milliseconds

	});
    $('.mdb-select').material_select();



    $('#add-supplier').click(function (e){
	e.preventDefault();
	n++;
	var numbers = ['WALMART', 'LEY', 'COSTCO', 'SAMS', 'SORIANA', 'FRUTERIA OLIVAS', 'FRUTERIA LOS COMPADRES','FRUTERIA EL CANARIO', 'LA MERA', 'FARMACIO MODERNA', 'TRAUB', 'CHATA','LA CUARTA','VINOTECA','TODO ORGANIKO'];
	
	//var value = [1, 2, 3, 4, 5];

	var addSupplier = ('<div class="col-md-12 row mt-0"><div class="col-md-3 mt-2"><select class="add-caret browser-default colorful-select dropdown-primary" id="supplier'+n+'" name="supplier['+n+'][supplier_id]"><option value="" disabled selected>Selecciona una Tienda</option></select><div class="md-form form-sm mt-2"></div></div><div class="md-form form-sm mt-2 col-md-3"><input type="number" id="form1" class="form-control" min="0.00" step="0.01" max="99999.99" id="purchase_price" name="supplier['+n+'][purchase_price]"><label for="form1" class="">Precio de compra</label></div><div class="col-md-3 mt-2 "><i class="fa fa-close fa-2x remove-store"></i></div></div><hr>');
		$('div[id="supplier-cont"]').append(addSupplier);

		$.each(numbers, function(val, text) {
            $('#supplier'+n+'').append( $('<option></option>').val(val+1).html(text) )
            }); 
	});

	
});

	$('body').on('click', '.remove-store', function () {
	    $(this).parent('div').parent('div').empty();
	    
	});
    
</script>

	<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
    	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
        });
    });


	$('#save_submit').click(function(e){
		//console.log($(this).serialize());
        e.preventDefault();
        var product_name = $('#product_name').val();
        var department = $('#department').val();
        var unity = $('#unity').val();
        var brand = $('#brand').val();
        var images = $('#images').val();
        var supplier = $('#supplier').val();
        var purchase_price = $('#purchase_price').val();
        var sell_price = $('#sell_price').val();
        var url = $(this).attr('action');
        var post = $(this).attr('method');
        var dara = $(this).serialize();

         $.ajax({
         type: post,
         url: url,
         data: {'product_name': product_name,
                     'department': department, 
                     'unity' : unity,
                     'brand': brand,
                     'images': images,
                     'supplier' : supplier,
                     'purchase_price' : purchase_price,
                     'sell_price' : sell_price 
                    },
         	cache: false
     	}).done(function(result) {
         	console.log(result);  
         	self.submit();
      
      	}).fail(function() {
         alert('error');
      });

  });
	//Image Function
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
<script type="text/javascript">
	  $(document).ready(function(){

	  });


</script>
@endsection