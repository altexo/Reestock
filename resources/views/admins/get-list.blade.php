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
	@endif
	 <form method="post" action="" id="actions">
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
		  </form>
@endsection

@section('scripts_unicos')
	<script type="text/javascript">
		 $('.mdb-select').material_select();

		 $('#done').click(function(e){
		 	 e.preventDefault();
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