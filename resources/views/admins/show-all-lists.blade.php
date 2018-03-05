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
@include('admins.msj-component')
<div class="card p-2 mb-5">

 
    <div class="row">

       
        <div class="col-lg-3 col-md-12">

            <select class="mdb-select colorful-select dropdown-primary mx-2" onchange="location = this.value;">
                <option value="" disabled selected>Mostrar..</option>
                <option value="{{route('Listas / Todas', ['status' => 0])}}">Todas</option>
                <option value="{{route('Listas / Confirmadas',['status' => 4])}}">Cofirmadas</option>
                <option value="{{route('Listas / Pospuestas')}}" disabled>Pospuestas</option>
                <option value="{{route('Listas / Confirmadas')}}" disabled>Canceladas</option>
                <option value="{{route('Listas / Confirmadas')}}" disabled>Completadas (Entregadas)</option>
               
            </select>

        </div>

        <div class="col-lg-3 col-md-6">
            <form action="">
  
               {{--  <input type="date" name="bday"> --}}
            </form>
        </div>

        <div class="col-lg-3 col-md-6">


        </div>

        <div class="col-lg-3 col-md-6">

            <form class="form-inline mt-2 ml-2">
                <input class="form-control my-0 py-0" type="text" placeholder="Search" style="max-width: 150px;">
                <button class="btn btn-sm btn-primary ml-2 px-1"><i class="fa fa-search"></i>  </button>
            </form>

        </div>


    </div>


</div>


<div class="card card-cascade narrower col-md-12">


    <div class="view gradient-card-header blue darken-3 narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <div>
           {{--  <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fa fa-th-large mt-0"></i></button>
            <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fa fa-columns mt-0"></i></button> --}}
        </div>

        <a href="" class="white-text mx-3"> {{ Route::currentRouteName() }}</a>

        <div>
          {{--   <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fa fa-pencil mt-0"></i></button>
            <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fa fa-remove mt-0"></i></button>
            <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fa fa-info-circle mt-0"></i></button> --}}
        </div>

    </div>
    <!--/Card image-->

    <div class="px-4">

        <div class="table-wrapper">
            <!--Table-->
            <table class="table table-hover mb-0">

                <!--Table head-->
                <thead>
                    <tr>
                        <th>
                            {{-- <input type="checkbox" id="checkbox"> --}}
                            <label for="checkbox" class="mr-2 label-table">#</label>
                        </th>
                        <th class="th-lg"><a>Nombre <i class="fa fa-sort ml-1"></i></a></th>
                        <th class="th-lg"><a href="">Fecha de Reestock<i class="fa fa-sort ml-1"></i></a></th>
                        <th class="th-lg"></th>
                       
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>

                	@forelse($lists as $list)
                
                    @if(!$list->null)
	                    <tr>
	                        <th scope="row">
	                        
	                            {{$list->users_id}}
	                        </th>
	                        <td>{{$list->name}}</td>
	                        <td>{{$list->nom_dia}} {{ $list->dia }} de {{ $list->mes }}</td>
	                        <td><a href="{{url('admin/order/'.$list->rdate.'/'.$list->users_id.'/'.$list->active) }}"><i class="fa fa-eye"></i></a></td>
	                        
	                        
	                    </tr>
                        @else
                        @endif
	             
                  @empty
                  	 	<tr>
                        <th scope="row">
                            <input type="checkbox" id="checkbox1">
                            <label for="checkbox1" class="label-table"></label>
                        </th>
                        <td>No hay</td>
                        <td>Otto</td>
                        <td></td>
                        
                        
                    </tr>
                  @endforelse
                {{--   @forelse($lists as $list => $item)
                    @forelse($item as $i)
                         <tr>
                            <th scope="row">
                            
                                {{$i->user_id}}
                            </th>
                            <td>{{$i->name}}</td>
                            <td>{{$i->nom_dia}} {{ $i->dia }} de {{ $i->mes }}</td>
                            <td></td>
                            
                            
                        </tr>
                    @empty
                    @endforelse
                  @empty
                  @endforelse --}}
                
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>

        <hr class="my-0">

        <!--Bottom Table UI-->
        <div class="d-flex justify-content-between">

            <!--Name-->
          {{--   <select class="mdb-select colorful-select dropdown-primary mt-2 hidden-md-down">
                <option value="" disabled >Rows number</option>
                <option value="1" selected>10 rows</option>
                <option value="2">25 rows</option>
                <option value="3">50 rows</option>
                <option value="4">100 rows</option>
            </select> --}}

            <!--Pagination -->
            <nav class="my-4">
                <ul class="pagination pagination-circle pg-blue mb-0">

                    <!--First-->
                    <li class="page-item disabled"><a class="page-link">First</a></li>

                    <!--Arrow left-->
                    <li class="page-item disabled">
                        <a class="page-link" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    </li>

                    <!--Numbers-->
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item"><a class="page-link">2</a></li>
                    <li class="page-item"><a class="page-link">3</a></li>
                    <li class="page-item"><a class="page-link">4</a></li>
                    <li class="page-item"><a class="page-link">5</a></li>

                    <!--Arrow right-->
                    <li class="page-item">
                        <a class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                    </li>

                    <!--First-->
                    <li class="page-item"><a class="page-link">Last</a></li>

                </ul>
            </nav>
            <!--/Pagination -->

        </div>
        <!--Bottom Table UI-->

    </div>
</div>
                

@endsection

@section('scripts_unicos')
	<script type="text/javascript">
		 $('.mdb-select').material_select();
	</script>
@endsection