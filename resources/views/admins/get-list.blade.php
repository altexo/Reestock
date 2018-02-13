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
	<a class="btn btn-success btn-sm"><i class="fa fa-check"></i>Marcar como entregada</a>
		<table class="table table-hover">
		  	<thead>
		    	<tr>
		      		<th>#</th>
		      		<th>Producto</th>
		      		<th>Cantidad</th>
		      		<th>Marca</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@forelse($user_list as $item)
			    <tr>
			      	<th scope="row">{{$item->products_id}}</th>
			      	<td>{{$item->product_name}}</td>
			      	<td>{{$item->quantity}}</td>
			      	<td>{{$item->brand}}</td>
			    </tr>
			
			@empty
			@endforelse
		  </tbody>
		</table>
@endsection

@section('scripts_unicos')
	<script type="text/javascript">
		 $('.mdb-select').material_select();
	</script>
@endsection