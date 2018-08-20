@extends('layouts.admins')
@section('estilos_unicos')
<style type="text/css">
	.table-wrapper {
	    display: block;
	    max-height: 300px;
	    overflow-y: auto;
	    -ms-overflow-style: -ms-autohiding-scrollbar;
	}
</style>
@endsection
@section('navbar')
@section('contenido')
	<a href="{{ URL::previous() }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> Volver</a>
	@if($status == 4)
		<a class="btn btn-success btn-sm" id="done"><i class="fa fa-check"></i>Marcar como entregada</a>
		<input type="checkbox" id="billing">
        <label for="billing" class="mr-2 label-table">Facutrar</label>
	@endif
	 <form method="post" action="{{route('inovice.test')}}" id="actions">
	 	{{ csrf_field() }}
		<table class="table table-hover">
		  	<thead>
		    	<tr>
		    		 <th>
                            <input type="checkbox" id="checkbox-all">
                            <label for="checkbox-all" class="mr-2 label-table">Todos</label>
                        </th>
		      		<th>#</th>
		      		<th>Producto</th>
		      		<th>Cantidad</th>
		      		<th>Marca</th>
		    </tr>
		  </thead>
		 
		  <tbody>
		  <?php $n = 0; ?>
			  	@forelse($user_list as $item)
			  		<?php $n++; ?>
				    <tr>

		               
		               
		                
				    	<input type="hidden" name="listID[]" value="{{$item->l_id}}">
				      	<th scope="row"> 
				      		<input type="checkbox" id="checkbox{{$n}}">  
				      		<label for="checkbox{{$n}}" class="label-table">{{$item->products_id}}</label>
				      	</th>
				      	<td>{{$item->product_name}}</td>
				      	<td>{{$item->quantity}}</td>
				      	<td>{{$item->brand}}</td>
				    </tr>
				
				@empty
				@endforelse
			
		  </tbody>
		
		</table>
		

		
		
		
		  <!-- Inovice Modal -->
			<div class="modal fade" id="billingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    <div class="modal-dialog modal-lg modal-info modal-notify text-white" role="document">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h5 class="modal-title" id="exampleModalLabel">Datos de facturación</h5>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body">
			            @if($billing_address)
			            	@forelse($billing_address as $billing)
			            		
			            	@empty
			            	
						   @endforelse
						@else
							<div class="col-md-12 row">
				               	<div class="form-group col-md-6">
							        <label for="rfcInput">RFC</label>
							        <input name="rfc" type="text" class="input-alternate p-1" id="rfcInput" placeholder="EJ: SLDHJ2H923892" required>
							    </div>
							    <div class="form-group col-md-6">
							        <label for="razonSocialInput">Razón Social</label>
							        <input name="razon_social" type="text" class="input-alternate p-1" id="razonSocialInput" placeholder="EJ: REESTOCK MEXICANA SAPI DE CV" required>
							    </div>
							    <div class="form-group col-md-6">
							        <label for="calleInput">Calle</label>
							        <input name="calle" type="text" class="input-alternate p-1" id="calleInput" placeholder="EJ: Blv. Alvaro Obregon" required>
							    </div>
							    <div class="form-group col-md-6">
							        <label for="numeroExtInput">Número Exterior</label>
							        <input name="numero_ext" type="text" class="input-alternate p-1" id="numeroExtInput" placeholder="EJ: 215" required>
							    </div>
							    <div class="form-group col-md-6">
							        <label for="numeroIntInput">Nūmero Interior (Opcional)</label>
							        <input name="numero_int" type="text" class="input-alternate p-1" id="numeroIntInput" placeholder="EJ: 2" >
							    </div>
							    <div class="form-group col-md-6">
							        <label for="cpInput">Código Postal</label>
							        <input name="codigo_postal" type="text" class="input-alternate p-1" id="cpInput" placeholder="EJ: 80010" required>
							    </div>
							    <div class="form-group col-md-6">
							        <label for="coloniaInput">Colonia</label>
							        <input name="colonia" type="text" class="input-alternate p-1" id="coloniaInput" placeholder="EJ: La Primavera" required>
							    </div>
							    <div class="form-group col-md-6">
							        <label for="ciudadInput">Ciudad/Delegación</label>
							        <input name="ciudad" type="text" class="input-alternate p-1" id="ciudadInput" placeholder="EJ: Culiacán" required>
							    </div>
							   
							    <div class="form-group col-md-6">
							        <label for="estadoInput">Estado</label>
							        <input name="estado" type="text" class="input-alternate p-1" id="estadoInput" placeholder="EJ: Sinaloa" required>
							    </div>
							    <div class="col-md-12 row">
							    	 <h5 class="h5 mt-2 ml-2 col-md-12">Datos de contacto</h5>
							    	 <hr>
							    	 <div class="form-group col-md-6">
							    	 	<label for="nombreClienteInput">Nombre de cliente (Opcional)</label>
							    	 	<input type="text" name="nombre_cliente" class="input-alternate p-1" id="nombreClienteInput" placeholder="ALEJANDRO">
							    	 </div>
							    	 <div class="form-group col-md-6">
							    	 	<label for="apellidoClientInput">Apellidos (Opcional)</label>
							    	 	<input type="text" name="nombre_cliente" class="input-alternate p-1" id="apellidoClientInput" placeholder="RIOS CARDOZA">
							    	 </div>
							    	  <div class="form-group col-md-6">
							    	 	<label for="emailClienteInput">E-mail para envío de documentos CFDI </label>
							    	 	<input type="email" name="email_cliente" class="input-alternate p-1" id="emailClienteInput" placeholder="alejandro@reestock.com" required>
							    	 </div>
							    	 <div class="form-group col-md-6">
							    	 	<label for="telefonoClienteInput">Télefono de contacto (Opcional)</label>
							    	 	<input type="text" name="nombre_cliente" class="input-alternate p-1" id="telefonoClienteInput" placeholder="6674 839201">
							    	 </div>
							    	 <div class="form-group col-md-6">
							    	 	<i class="fa fa-dollar prefix"></i>
							    	 	<label for="inoviceTotalInput">Total a facturar: </label>
							    	 	<input type="number" min="1" step="any" name="inoviceTotal" class="input-alternate p-1" id="inoviceTotalInput" placeholder="EJ: 443.43" required />

							    	 </div>
							    </div>
						    </div>   
						@endif  	
							 
			            </div>
			            <div class="modal-footer">
			                <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
			                <button type="submit" class="btn btn-primary"><i class="fa fa-send" aria-hidden="true"></i> Confirmar y facturar</button>
			            </div>
			        </div>
			    </div>
			</div>
			 <!-- Inovice Modal/ -->
		  </form>
		
@endsection

@section('scripts_unicos')
	<script type="text/javascript">
		 $('.mdb-select').material_select();

		 $('#done').click(function(e){
		 	 e.preventDefault();
		 	 if ($('#billing').is(":checked"))
		 	 {
		 	 	 $('#billingModal').modal('show')
		 	 }else{
			 	 $.confirm({
	                title: 'Confirmar',
	                content: '¿Seguro deseas marcar esta lista como entregada?',
	                type: 'green',
	                buttons:{
	                    confirmar: {
	                        text: 'Si',
	                        btnClass: 'btn-green',
	                        action: function(){
	                            	$('#actions').attr('action', "{{route('delivered.done')}}").submit();	
	                            //$.alert('Ok :)');
	                        }
	                    },
	                    cancelar: {
	                        btnClass: 'btn-dark',
	                        action: function () {

	                        }

	                    },
	                }
	            });
		 	 }
		 	
   
		 
		 });

		 $('body').on('change', '#checkbox-all', function(){
		 	var allCheckboxes = $('[type=checkbox]');
		 	 if ($(this).is(":checked")) {
      			$(allCheckboxes).attr('checked', true);

    		}else if($(this).attr("checked") == true){
    			$(allCheckboxes).attr('checked', false);
    		}
		 
		 });
	</script>
@endsection