@extends('layouts.admins')
@section('estilos_unicos')
<style type="text/css">
  
  td {
    font-size: 12px;
  }
  th {
    font-size: 12px;
  }
  .table a {
    margin-left: 0rem !important;
}
.actions{
    padding: 5px !important;
}
.padding-table{
    padding: 15px;
}

/*@media (min-width: 1200px){
.container-fluid {
    padding-right: 0px !important;
    padding-left: 0px !important;
}*/
}
                
.input-group.md-form.form-sm.form-2 input {
    border: 1px solid #bdbdbd;
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}
.input-group.md-form.form-sm.form-2 input.grey-border  {
    border: 1px solid #e9ecef;
}
.input-group input[type=text]:focus:not([readonly]) {
    box-shadow: none;
}
.form-2 .input-group-addon {
    border: 1px solid #e9ecef;
}
                

</style>

@section('navbar')
@section('contenido')
<h3>Productos: </h3>
                
<div class="col-xl-12 mb-5" data-dismiss="modal">
     @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
    <div class="card">
    <div class="card-body padding-table">

        <!-- Grid row -->
        <div class="row">
        
            <!-- Grid column -->
            <div class="col-md-12 mt-4">
        
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input class="form-control my-0 py-1 grey-border" id="search" type="text" placeholder="Search" aria-label="Search">
                    <span class="input-group-addon waves-effect grey lighten-3" id="basic-addon1"><a><i class="fa fa-search text-grey" aria-hidden="true"></i></a></span>
                </div>
        
            </div>
        
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="row">#</th>
                    <th class="th-lg"><a>Nombre de  producto<i class="fa fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a href="">Departamento<i class="fa fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a href="">Marca<i class="fa fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a href="">Unidad<i class="fa fa-sort ml-1"></i></a></th>
                   
                    <th class="th-lg"><a href="">P. Compra<i class="fa fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a href="">P. Venta<i class="fa fa-sort ml-1"></i></a></th>
                    <th class="th-lg"></th>
                </tr>
            </thead>
            <tbody id="txtHint">
                @foreach( $products as $product )
                    <tr>
                    <th class="align-middle" scope="row">{{$product->id}}</th>
                    <td class="align-middle">{{ $product->product_name }}</td>
                    <td class="align-middle">{{ $product->department_name }}</td>
                    <td class="align-middle">{{ $product->brand }}</td>
                    <td class="align-middle">{{ $product->unity }}</td>
                    <td class="align-middle">{{ $product->purchase_price }}</td>
                    <td class="align-middle">{{ $product->sale_price }}</td>
                    <td class="align-middle"> 
                        <form method="post" action="{{ route('product.delete', ['id' => $product->id]) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <a href="">
                                <button type="button" class="btn btn-primary actions"><i class="fa fa-eye"></i></button>
                            </a> 
                            <a href="{{ route('Editar Producto', ['id' => $product->id]) }}">
                                <button type="button" class="btn btn-success actions"><i class="fa fa-edit"></i></button>
                            </a>
                            <a>
                            <button type="submit" class="btn btn-danger actions"><i class="fa fa-trash" style="color:white"></i></button>
                            </a>
                    </form>
                    </td>

                    </tr>

                @endforeach
                
            </tbody>
       
        </table>
   

    </div>
</div>
  <hr class="my-0">

        <!--Bottom Table UI-->
    <div class="d-flex justify-content-between">
        <nav class="my-3">
            {{ $products->links() }}
        </nav>
    </div>
</div>

                
@endsection
@section('scripts_unicos')
<script type="text/javascript">
    $(document).ready(function(){
        $('.pagination').addClass('pagination-circle pg-blue mb-0');
            $("#search").keyup(function(){
                var str=  $("#search").val();
                if(str == "") {
                       $( "#txtHint" ).html("@foreach( $products as $product )<tr><th scope='row'>{{$product->id}}</th><td>{{ $product->product_name }}</td><td>{{ $product->department_name }}</td><td>{{ $product->brand }}</td><td>{{ $product->unity }}</td><td>{{ $product->purchase_price }}</td><td>{{ $product->sale_price }}</td><td>  <form method='post' action='{{ route('product.delete', ['id' => $product->id]) }}''><input type='hidden' name='_token' value='{{ csrf_token() }}' /><a href=''><button type='button' class='btn btn-primary actions'><i class='fa fa-eye'></i></button></a><a href='{{ route('Editar Producto', ['id' => $product->id]) }}'><button type='button' class='btn btn-success actions'><i class='fa fa-edit'></i></button></a><a><button type='submit' class='btn btn-danger actions'><i class='fa fa-trash'></i></button></a></form></td></tr>@endforeach"); 
                }else {
                       $.get( "{{ url('admin/livesearch?id=') }}"+str, function( data ) {
                           $( "#txtHint" ).html( data );  
                    });
                }
            });  

            $(function(){
                setTimeout(function() {
                    $('.alert-success').fadeOut('fast');
                }, 5000); // <-- time in milliseconds

    });

}); 
</script>
@endsection
@section('footer')
