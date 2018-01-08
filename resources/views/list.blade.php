@extends('layouts.clients')
@section('estilos_unicos')
<style type="text/css">
    .black-color
    {
        color: #4285F4 !important;
    }
</style>
@endsection
@section('navbar')
@section('contenido')
    @if(session('err'))
            <div class="alert alert-warning col-md-12" role="alert">
                {{session('err')}}
            </div>
    @endif
 <div class="col-md-12 d-flex justify-content-center"> 

        <div class="row col-md-12" >
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
                <a href="{{ url('_auth/user/list/chekout/') }}" class="btn btn-flat btn-md waves-effect waves-effect black-color">Continuar <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                <div class="col-md-10">  {{-- <label class="justify-content-center">Aqui puedes visualizar los productos que haz agregado a tu lista y editarlos. Cuando termines da clic en continuar para terminar el pedido de tu lista.</label> --}}</div>
            
             
   
        </div>
       
        
</div>
<section class="section d-flex justify-content-center">

<div class="card col-md-10">

	<div class="card-body">
                <div class="table-responsive">

                    <table class="table product-table">
                        <thead>
                            <tr>
                                <th class="font-bold">
                                    <strong>Producto</strong>
                                </th>
                                <th class="font-bold">
                                    <strong>Precio</strong>
                                </th>
                                <th>Cantidad</th>
                                <th>Reestock</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($listItems as $listItem)
                            <tr>
                                <td>
                                   
                                     {{ $listItem->name}}
                                 
                                   <p class="text-muted"></p>
                                </td>
                                <td>{{ $listItem->price }}</td>
                                <td class="center-on-small-only">
                                    <div class="md-form">
                                       <input type="number" min="1" max="999" name="qty" id="qty" value="{{$listItem->qty}}">
                                       <input type="hidden" id="rowID" value="{{$listItem->rowId}}" name="">
                                    </div>
                                </td>
                                <td>
                                    <select class="form-control" id="concurrence" >
                                        <option selected disabled value="{{$listItem->options->reestock}}">Cada {{$listItem->options->reestock}} días</option>
                                        <option value="7">Cada 7 días</option>
                                        <option value="15">Cada 15 días</option>
                                        <option value="30">Cada 30 días</option>
                                        <option value="45">Cada 6 semanas (45 dīas)</option>
                                        <option value="60">Cada 2 meses (60 días)</option>
                                        <option value="180">Cada 6 meses</option>
                                    </select>
                                    <input type="hidden" id="rowID" value="{{$listItem->rowId}}" name="">
                                </td>
                                <td>
                                    <input type="hidden" id="rowID" value="{{$listItem->rowId}}" name="">
                                    <button type="button" id="remove-button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove item">X
                                    </button>
                                </td>
                            </tr>
                            @endforeach     
                            <tr>
                                <td colspan="3"></td>
                                <td>
                                    <h4 class="mt-2">
                                        <strong>Total</strong>
                                    </h4>
                                </td>
                                <td class="text-right">
                                    <h4 class="mt-2">  
                                        <strong id="total2">{{Cart::subtotal()}}</strong>
                                    </h4>
                                </td>
                                <td colspan="3" class="text-right">
                            
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
<div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;">
    <a href="#top" class="btn-floating btn-large red">
        <i class="fa fa-arrow-up"></i>
    </a>
</div>
         
</section>
@endsection
@section('scripts_unicos')
<script type="text/javascript">
            $('body').on('keyup mouseup', '#qty', function() {
        var qty = $(this).val();
        var rowID = $(this).next('input').val();   
        var data = { "rowId" : rowID, "qty" : qty };

        $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                });

        $.ajax({
                                            data:  data,
                                            url:   '{{url("/lista/updateCart")}}',
                                            type:  'post',
                                            beforeSend: function () {
                                            },
                                            success:  function (response) {
                                                $( "#total2" ).load(window.location.href + " #total2" );
                                                    $( "#badge" ).load(window.location.href + " #badge" );
                                               

                                                    //$("#resultado").html(response);
                                                    console.log(response);
                                            }
                                    });      
});
        $('body').on('change', '#concurrence', function(){
            var concurrence = $(this).val();
            var rowID = $(this).next('input').val();  
            var data = { "rowId" : rowID, "concurrence" : concurrence }; 
            $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                });

            $.ajax({
                        data:  data,
                        url:   '{{url("/lista/updateConcurrence")}}',
                        type:  'post',
                        beforeSend: function () {
                            console.log(concurrence +' '+ rowID);

                        },
                        success:  function (response) {
                        console.log(response)                
                                                    
                        }
                    });    
        });
</script>
@endsection