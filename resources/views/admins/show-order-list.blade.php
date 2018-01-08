@extends('layouts.admins')
@section('navbar')
@section('contenido')
	<table>
		@forelse($order as $o)
			@foreach($o as $op)
				<th>ID</th>
				<th></th>
				<tr>
					<td>{{$op->id}}</td>
				</tr>
			@endforeach
		@empty
		@endforelse
	</table>
@endsection