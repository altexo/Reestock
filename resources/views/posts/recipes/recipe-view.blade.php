@extends('layouts.clients')

@section('contenido')
<div class="col-xl-12">
	@if(session('success'))

		<div class="modal fade" id="msj-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">¡Todo listo!</h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">Quedarme aqui &times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		                {{session('success')}}
		                <br><br>
		                Puedes ir a finalizar tu pedido y modificar los productos que se añadieron ahí ó puedes ir a tienda y seguir agregando productos a tu entrega. 
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='{{ route('store.show') }}';" >Ir a tienda</button>
		                <button type="button" class="btn btn-primary" onclick="location.href='{{ url('/checkout') }}';">Finalizar pedido</button>
		            </div>
		        </div>
		    </div>
		</div>
	@endif
</div>
	<div class="row">

		<div class="col-md-12 mb-2">
			<h1 class="h3">Pastel de Nieve de Chocolate Mexicano con Canela y Merengue de Naranja</h1>
		</div>
		<div class="col-md-12">
			<img src="{{url('images/recipes/plated-3-1.jpg')}}" class="img-fluid" alt="Responsive image">
		</div>
		<div class="col-md-12 p-4">
			<!-- Modal -->
			<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body">
			                <table class="table-responsive table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Producto</th>
                                    <th>Unidad</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Quitar</th>
                      
                                </tr>
                            </thead>

                            <tbody>
                            	<form method="POST" id="ingredients-list" action="{{route('add.ingredients')}}">
                            		  {{ csrf_field() }}
                            	@forelse($ingredients as $in)
                                     <tr>
                                        <input type="hidden" name="rowID[]" value="{{$in->id}}">
                                        <td width="80" class="align-middle"><img src="{{url($in->product_img)}}" class="img-fluid"></td>
                                        <td class="align-middle"><label>{{$in->product_name}}</label></td>
                                        <td class="align-middle"><label>{{$in->brand}}</label></td>
                                        <td class="align-middle">
                                                <label>1</label>   
                                                {{--  <input type="number" @if($in->unity == 'KILO') class="KG" @endif min="1" name="" id="qtyList" value="1"><input type="hidden" name="listID[]" value="{{$in->id}}"> --}}
                                               

                                        </td>
                                        <td class="align-middle"><label>{{$in->sale_price}}</label>
                                               <div class="preloader-wrapper active hidden">
                                                    <div class="spinner-layer spinner-red-only">
                                                      <div class="circle-clipper left">
                                                        <div class="circle"></div>
                                                      </div><div class="gap-patch">
                                                        <div class="circle"></div>
                                                      </div><div class="circle-clipper right">
                                                        <div class="circle"></div>
                                                      </div>
                                                    </div>
                                                  </div>
                                        </td>
                                        <td class="align-middle"><input type="hidden" name="rowIDs" value="{{$in->id}}"><a><i class="fa fa-remove" id="remove-button"></i></a></td>
                                    </tr>
                                 @empty
                                 @endforelse  
                                 
                              </form>
                            </tbody>
                        </table>
			            </div>
			            <div class="modal-footer">
			                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			                <button type="button" class="btn btn-primary" id="add-ingredients">Añadir</button>
			            </div>
			        </div>
			    </div>
			</div>
			<!--/Modal/-->
			<button class="btn btn-danger mt-2 " data-toggle="modal" data-target="#exampleModal">Añadir ingredientes a mi carrito</button>
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="col-md-12">
			
			<h2 class="h4 mt-2">Ingredientes</h2>
			<h3 class="h5">Capa de brownie:</h3>
			<ol>
				<li>Aceite vegetal antiadherente en spray</li> 
				<li>1/3 taza harina multiusos</li>
				<li>1/2  cucharadita de canela molida</li> 
				<li>1/4 cucharadita de polvo para hornear</li>
				<li>Pizca de sal </li>
				<li>6 cucharadas (3/4 de barra) de mantequilla sin sal, cortada en 4 piezas </li>
				<li>1/3 taza de cocoa en polvo natural sin endulzantes </li>
				<li>3/4 taza de azúcar</li>
				<li>1 huevo grande </li>
				<li>1/2 cucharada de extracto de vainilla</li>
			</ol>
			<h3 class="h5">Nieve de Chocolate-canela:</h3>
			<ol>
				<li>12 onzas de chocolate amargo (que no exceda 61% de cacao), cortado</li>
				<li>2 tazas y 3/4  de crema Half and Half, divididas</li>
				<li>6 yemas de huevo, grandes</li>
				<li>2/3 de taza de azucar</li>
				<li>1/2 cucharadita de canela molida </li>
				<li>Pizca de sal</li>
			</ol>	
			<h3 class="h5">Orange Meringue: </h3>
			<ol>
				<li>4 yemas de huevo grandes, a temperatura ambiente</li>
				<li>1/2 cucharada de crema de tartar</li>
				<li>Pizca de Sal</li>
				<li>1/2 taza de azucar</li>
				<li>2 cucharitas de cascara de naranja finamente rayada</li>
			</ol>
			<h3 class="h5">Equipo especial </h3>
			<ol>
				<li>Molde de 9 pulgadas de diámetro con 3 pulgadas de alto en los lados. </li>
				<li>Termómetro para dulce </li>
				<li>Máquina para nieve</li>
				<li>Antorcha de cocina (Kitchen torch)</li>
			</ol>
			<h4 class="h6">Para mayor facilidad:</h4>
			<ul>
				Descongela 6 tazas de nieve de chocolate comprada. Mezcla 1/2 cucharadita de canela. Pon la nieve sobre la base de brownie horneada anteriormente y continúa con la receta. 
			</ul>
			<h3 class="h5 mt-4">Preparación:</h3>
			<p><b>Para la capa de brownie:</b></p>
			<p>Pre calentar el horno a 325°F . . Forre el interior de una bandeja de resorte de 9 pulgadas de diámetro con lados de 3 pulgadas de altura con papel de aluminio. Cubra ligeramente con spray antiadherente. Bata la harina y los siguientes 3 ingredientes en un tazón pequeño. Derrita la mantequilla en una cacerola mediana a fuego medio-bajo. Retírelo del calor; batir el polvo de cacao, luego azúcar. Si la masa todavía está caliente, deje enfriar. Agregue el huevo y la vainilla, luego la mezcla de harina. Extienda la mezcla sobre el fondo de la sartén.<br>
			Hornee la capa de brownie hasta que el probador insertado en el centro salga con unas migas húmedas, de 15 a 17 minutos. Enfriar en el molde sobre una rejilla. Cubra y congele. </p>
			<p><b>Para la nieve de Chocolate - canela:</b></p>
			<p>Mezcle el chocolate y 1 1/2 tazas de Half and Half en una cacerola mediana a fuego medio hasta que el chocolate se derrita, revolviendo con frecuencia. Retírelo del calor. Batir las yemas de huevo y los próximos 3 ingredientes en un tazón mediano. Poco a poco bata la mezcla de chocolate caliente; regresar a la cacerola Cocine a fuego medio-bajo hasta que la mezcla se separe al pasar la cuchara por el medio de la cacerola  y la natilla registre 170 ° F a 175 ° F en el termómetro de caramelos, revolviendo constantemente, de 6 a 8 minutos.</p>
			<p>Cuela la crema pastelera en otro tazón mediano. Agregue 1 1/4 tazas restantes de Half and Halg. Refrigere hasta que esté frío, aproximadamente 3 horas.
			Procesa la crema pastelera en la máquina para hacer helados. Transferir a la sartén; extender uniformemente sobre la capa de brownie. Cubrir; congelar toda la noche. </p>

			<p><b>Para el merengue de naranja:</b></p>
			<p>Con una batidora eléctrica, bata las claras de huevo en un tazón grande hasta que estén espumosas. Agregue crema de tartar y una pizca de sal. Batir a punto de nieve. Con el mezclador funcionando, agregue gradualmente azúcar. Continúa latiendo hasta que el merengue forme picos brillantes y rígidos. Añadir la cáscara de naranja. Extender sobre la capa de helado. Con la espátula o el dorso de la cuchara, agite decorativamente, formando picos. Congele hasta que esté firme, al menos 3 horas. </p>

		</div>
	</div>
@endsection
@section('scripts_unicos')
<script type="text/javascript">
	  $('body').on('keyup mouseup', '#qtyList', function(){

        var qty_element = $(this);
        var qty = $(this).val();
          if($(qty_element).attr('class') == 'KG'){
                     
            }else{
                    $(qty_element).val(Math.ceil(qty));
                    qty = Math.ceil(qty);

            }
        });
	  $('#add-ingredients').click(function(){
		$('#ingredients-list').submit();
	  });

</script>
@if(session('success'))
<script type="text/javascript">
			$(document).ready(function(){
				$('#msj-modal').modal('show')
			});
		</script>
	@endif
@endsection