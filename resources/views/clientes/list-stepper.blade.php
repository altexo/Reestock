@extends('layouts.app')
@section('contenedor_class', 'container')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('estilos')
<link href="{{url('css/jquery.nice-number.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
.picker__button--today {display: none;}
body{
    background-color: #f6f6f6;
}
.white-background
{
    background-color: white;
}
table{
    background-color: white;
}
                    .prod-img{
                        max-width: 100%;
                    }
                    .w-auto {
    width: auto;
}
.logo{
    width: 75%;
}
.steps-form-2 {
  display: table;
  width: 100%;
  position: relative; }
  .steps-form-2 .steps-row-2 {
    display: table-row; }
    .steps-form-2 .steps-row-2:before {
      top: 14px;
      bottom: 0;
      position: absolute;
      content: " ";
      width: 100%;
      height: 2px;
      background-color: #7283a7; }
    .steps-form-2 .steps-row-2 .steps-step-2 {
      display: table-cell;
      text-align: center;
      position: relative; }
      .steps-form-2 .steps-row-2 .steps-step-2 p {
        margin-top: 0.5rem; }
      .steps-form-2 .steps-row-2 .steps-step-2 button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important; }
      .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2 {
        width: 70px;
        height: 70px;
        border: 2px solid #59698D;
        background-color: white !important;
        color: #59698D !important;
        border-radius: 50%;
        padding: 22px 18px 15px 18px;
        margin-top: -22px; }
        .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2:hover {
          border: 2px solid #4285F4;
          color: #4285F4 !important;
          background-color: white !important; }
        .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2 .fa {
          font-size: 1.7rem; }
</style>
@endsection
@section('navbar')
    <nav class="navbar fixed-top navbar-dark red mb-2">
        <a href="{{url('/tienda')}}"><span class="navbar-brand"> <img src="{{asset('img/rsz_reestock.png')}}" class="img-fluid flex-center logo"></span></a>
    </nav>
@endsection
@section('contenido')
                    
    <h2 class="text-center font-bold pt-4 pb-5 mb-5 mt-4"><strong>Checkout</strong></h2>

    <div class="steps-form-2">
        <div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
            <div class="steps-step-2">
                <a href="#step-4" type="button" class="btn btn-amber btn-circle-2 waves-effect ml-0" data-toggle="tooltip" data-placement="top" title="Productos"><i class="fa fa-list" aria-hidden="true"></i></a>
            </div>
            <div class="steps-step-2">
                <a href="#step-5" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Dirección"><i class="fa fa-truck" aria-hidden="true"></i></a>
            </div>
            <div class="steps-step-2">
                <a href="#step-6" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Terms and Conditions"><i class="fa fa-check" aria-hidden="true"></i></a> 
            </div>
          
        </div>
    </div>


        <!--First Step-->
        <div class="row setup-content-2" id="step-4">
            <div class="col-md-12">
                <h3 class="font-bold pl-0 my-4"><strong>Productos</strong></h3>
                
                <!--Table-->
                 @forelse($listItems as $i)
                    <table class="table table-responsive w-auto ">
                        <thead class="">
                            <tr>
                                <th style="width: 15%"></th>
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
                        @foreach($i as $listItem)
                            <tr>
                                <td class="align-middle ">
                                    @if($listItem->model->product_img)
                                        <img src="{{asset($listItem->model->product_img)}}" class="img-fluid prod-img">
                                    @else
                                        <img src="{{url('img/no-img.jpg')}}" class="img-fluid prod-img">
                                    @endif
                                </td>
                                <td class="align-middle">
                                   
                                     {{ $listItem->name}}
                                 
                                   <p class="text-muted"> {{ $listItem->model->brand}}</p>
                                </td>
                                <td class="align-middle p-2">$ {{ $listItem->price }}</td>
                                <td class="center-on-small-only align-middle">
                                    <div class="md-form">
                                        @if($listItem->model->unity == "KG" || $listItem->model->unity == "KILO")
                                            <input style="padding: 7px;" type="number" name="qty" id="qty" value="1.00" min="0.20" max="99999.99" step="0.20" pattern="^\d+(?:\.\d{1,2})?$">
                                        @else
                                            <input class="input-alternate b-number" type="number" min="1" disabled max="999" name="qty" id="qty" value="{{$listItem->qty}}">
                                       @endif
                                       <input type="hidden" id="rowID" value="{{$listItem->rowId}}" name="">
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <select class="form-control" id="concurrence" >
                                        @if($listItem->options->reestock == '0')
                                            <option selected disabled value="{{$listItem->options->reestock}}">Única vez</option>
                                        @else
                                        <option selected disabled value="{{$listItem->options->reestock}}">Cada 
                                            @if($listItem->options->reestock == "45")  
                                            6 semanas 
                                            @elseif($listItem->options->reestock == "60")
                                            2 meses 
                                            @elseif($listItem->options->reestock == "180")
                                            6 meses
                                            @else
                                            {{$listItem->options->reestock}} Días
                                            @endif
                                        </option>
                                        @endif
                                        <option value="0">Única vez</option>
                                        <option value="7">Cada 7 días</option>
                                        <option value="15">Cada 15 días</option>
                                        <option value="30">Cada 30 días</option>
                                        <option value="45">Cada 6 semanas (45 días)</option>
                                        <option value="60">Cada 2 meses (60 días)</option>
                                        <option value="180">Cada 6 meses</option>
                                    </select>
                                    <input type="hidden" id="rowID" value="{{$listItem->rowId}}" name="">
                                </td>
                                <td class="align-middle">
                                    <input type="hidden" id="rowID" value="{{$listItem->rowId}}" name="">
                                    <button type="button" id="remove-button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove item">X
                                    </button>
                                </td>
                            </tr>
                            @endforeach     
                     </table>
                    
                 @empty

                 @endforelse
                 <div class="col-md-12 white-background">
                    <div class="col-md-3 offset-md-9">

                     <table class="mb-3">
                          <tr>
                               
                                <td colspan="3" class="px-2 text-right">
                                    <h4 class="mt-2">
                                        <strong>Subtotal:</strong>
                                    </h4>
                                </td>
                                <td colspan="2">    </td>
                                <td class="text-right">
                                    <h4 class="mt-2">  
                                        <strong id="total2">$ {{Cart::subtotal()}}</strong>
                                    </h4>
                                </td>
                                <td  class="text-right">
                            
                                </td>
                            </tr>
                             <tr>
                               
                                <td colspan="3" class="px-2 text-right">
                                    <h4 class="mt-2">
                                        <strong>+Envio:</strong>
                                    </h4>
                                </td>
                                 <td colspan="2"> </td>
                                <td class="text-right">
                                    <h4 class="mt-2">  
                                        <strong id="">$ 60</strong>
                                    </h4>
                                </td>
                                <td  class="text-right">
                            
                                </td>
                            </tr>
                             <tr>
                               
                                <td colspan="3" class="px-2 text-right">
                                    <h4 class="mt-2">
                                        <strong>Total:</strong>
                                    </h4>
                                </td>
                                 <td colspan="2"> </td>
                                <td class="text-right">
                                    <h4 class="mt-2">  
                                        <strong id="full-total">$ {{$total}}</strong>
                                    </h4>
                                </td>
                                <td  class="text-right">
                            
                                </td>
                            </tr>
                     </table>
                     </div>
                 </div>
                
                <button class="btn btn-primary btn-rounded nextBtn-2 float-right mb-4" type="button"> Siguiente</button>
            </div>
        </div>
        <!--End First Step-->

        <!--Second Step-->
        <div class="row setup-content-2" id="step-5">
            <div class="col-md-12 ">
                <h3 class="font-bold pl-0 my-3"><strong>Datos de envío</strong></h3>
                    @forelse($shipping as $s)
                    <!--Form-->
                    <form action="{{ route('save.list') }}" method="POST" class="col-md-12 row d-flex justify-content-center" id="form-to-sub">
                     {{ csrf_field() }}
                        <div class="col-md-12 d-flex justify-content-center mb-3 row">
                            <section class="form-elegant col-md-8 p-1 d-flex justify-content-center mb-3 row">
                        
                            <!--Form without header-->
                            <div class="card">

                                <div class="card-body mx-4">

                                    <!--Header-->
                                    <div class="text-center mt-2 mb-2">

                                        <h4 class="dark-grey-text mb-1"><strong>Datos de envío</strong></h4>
                                        <html> 

                                         <i id="icon" class="fa fa-truck" style="text-shadow: rgb(0, 84, 17) 0px 0px 0px, rgb(0, 91, 18) 1px 1px 0px, rgb(0, 98, 20) 2px 2px 0px, rgb(0, 106, 21) 3px 3px 0px, rgb(0, 113, 23) 4px 4px 0px; font-size: 35px; color: rgb(255, 255, 255); height: 65px; width: 65px; line-height: 65px; border-radius: 50%; text-align: center; background-color: rgb(0, 120, 24);"></i> 

                                  
                                    </div>

                                    <!--Body-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <input type="text" id="ship_name" class="form-control" name="ship_name" value="{{$s->name}}" required>
                                                <label for="ship_name">Nombre</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <input type="text" id="ship_lastName" class="form-control" name="ship_lastName" value="{{$s->last_name}}" required>
                                                <label for="ship_lastName">Apellido</label>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="md-form">
                                                <input type="text" id="ship-st" class="form-control" name="ship_st" value="{{$s->address}}" required>
                                                <label for="ship-st">Calle, Nº Interior, Nº Interior</label>
                                            </div>
                                        </div>

                                         <div class="col-md-4">
                                            <div class="md-form">
                                                <input type="text" id="ship-col" class="form-control" name="ship_col" value="{{$s->colony}}" required>
                                                <label for="ship-col">Colonia</label>
                                            </div>
                                        </div>

                                         <div class="col-md-12">
                                            <div class="md-form">
                                                <input type="text" id="ship-town" class="form-control" name="ship_town" value="{{$s->city}}" required>
                                                <label for="ship-town">Ciudad, Municipio</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="md-form">
                                                <select class="form-control" name="ship_country" required>
                                                    <option selected value="{{$s->country}}">{{$s->country}}</option>
                                                    <option value="MEXICO">MÉXICO</option>
                                                    
                                                </select>
                                              
                                               
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="md-form">
                                                <select class="form-control" name="ship_state" required>
                                                    <option selected value="{{$s->state}}">{{$s->state}}</option>
                                                    <option value="SINALOA">SINALOA</option>
                                                </select>
                                              
                                               
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="md-form">
                                                 <input type="text" id="ship-cp" class="form-control" name="ship_cp" value="{{$s->zip_code}}" required>
                                                <label for="ship-cp">Código Postal</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="md-form">
                                                 <input type="text" id="ship-phone" class="form-control" name="ship_phone" value="{{$s->phone}}" required>
                                                <label for="ship-phone">Teléfono</label>
                                            </div>
                                        </div>
                                    </div>
                          
                                   
                                </div>

                                <!--Footer-->
                               

                            </div>
          
                        </section>
                         <section class="col-md-8 card mb-2" id="date-section-true">
                            <p class="mt-1">Fecha de su primera entrega</p>
                            <div class="md-form mt-2">
                                <input placeholder="Fecha" type="text" id="date-picker-example" class="form-control datepicker" name="first_date" required>
                                <label for="date-picker-example">Click para escoger fecha</label>
                            </div>
                        </section>
                    </div>
                </form>  
                @empty
                
                <form action="{{ route('saveNew.list') }}" method="POST" class="col-md-12 row d-flex justify-content-center" id="form-to-sub">
                     {{ csrf_field() }}
                    <div class="col-md-12 d-flex justify-content-center mb-3 row">
                        <section class="form-elegant col-md-8 p-1 mb-2">
                    
                        <!--Form without header-->
                        <div class="card">
                            <!--Primero el CP-->
                            <div class="card-body mx-4 cp-div" id="cp-div">
                                <div class="text-center mt-2 mb-2 d-flex justify-content-center">
                                    <img src="{{asset('img/cp.png')}}" class="img-fluid">
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" id="ship-cpVal" pattern="[0-9]{5}" class="form-control ship-cpVal" name="ship_cp" required>
                                            <label for="ship-cpVal">Código Postal</label>
                                        </div>
                                        <div class="row">
                                           <div class="col-md-12" id="zip-msj"><p>Reestock no se encuentra disponible en su domicilio. <a href='#'>Avísenme cuando lo esté!</a></p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Priero el CP-->
                            <div class="card-body mx-4 shipping-div">

                                <!--Header-->
                                <div class="text-center mt-2 mb-2">

                                  {{--   <h4 class="dark-grey-text mb-1"><strong>Datos de envío</strong></h4> --}}
                                    <html> 

                                     <i id="icon" class="fa fa-truck" style="text-shadow: rgb(0, 84, 17) 0px 0px 0px, rgb(0, 91, 18) 1px 1px 0px, rgb(0, 98, 20) 2px 2px 0px, rgb(0, 106, 21) 3px 3px 0px, rgb(0, 113, 23) 4px 4px 0px; font-size: 35px; color: rgb(255, 255, 255); height: 65px; width: 65px; line-height: 65px; border-radius: 50%; text-align: center; background-color: rgb(0, 120, 24);"></i> 

                              
                                </div>

                                <!--Body-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" id="ship_name" class="form-control" name="ship_name" required>
                                            <label for="ship_name">Nombre</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" id="ship_lastName" class="form-control" name="ship_lastName" required>
                                            <label for="ship_lastName">Apellido</label>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="md-form">
                                            <input type="text" id="ship-st" class="form-control" name="ship_st" required>
                                            <label for="ship-st">Calle, Nº Interior, Nº Interior</label>
                                        </div>
                                    </div>

                                     <div class="col-md-4">
                                        <div class="md-form">
                                            <input type="text" id="ship-col" class="form-control" name="ship_col" required>
                                            <label for="ship-col">Colonia</label>
                                        </div>
                                    </div>

                                     <div class="col-md-12">
                                        <div class="md-form">
                                            <input type="text" id="ship-town" class="form-control" name="ship_town" required>
                                            <label for="ship-town">Ciudad, Municipio</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <select class="form-control" name="ship_country" required>
                                                <option  disabled>PaÍs</option>
                                                <option selected value="MEXICO">MÉXICO</option>
                                                
                                            </select>
                                          
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <select class="form-control" name="ship_state" required="">
                                                <option  disabled>Estado</option>
                                                <option selected value="SINALOA">SINALOA</option>
                                            </select>
                                          
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="md-form">
                                            <input type="text" id="ship-cp" class="form-control" {{-- name="ship_cp" --}} required disabled>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="md-form align-middle align-self-center">
                                            <span class="align-middle">
                                           <i class="fa fa-close "></i></span>                                        
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="md-form">
                                             <input type="text" id="ship-phone" class="form-control" name="ship_phone" required>
                                            <label for="ship-phone">Teléfono</label>
                                        </div>
                                    </div>
                                </div>
                              

                               
                            </div>


                        </div>
                    </section>
                    <section class="col-md-8 card mb-2" id="date-section">
                        <p class="mt-1">Fecha de su primera entrega</p>
                        <div class="md-form mt-2">
                            <input placeholder="Fecha" type="text" id="date-picker-example" class="form-control datepicker" name="first_date" required>
                            <label for="date-picker-example">Click para escoger fecha</label>
                        </div>
                    </section>
                </div>
                </form>  
                @endforelse 
                <button class="btn btn-primary btn-rounded prevBtn-2 float-left mb-3" type="button">Atrás</button>
                <button class="btn btn-primary btn-rounded nextBtn-2 float-right" type="button">Siguiente</button>
            </div>
        </div>
        <div class="row setup-content-2 mb-4" id="step-6">
            <div class="col-md-12 ">
                <h3 class="font-bold pl-0 my-4"><strong></strong></h3>
                <div class="col-md-12 d-flex justify-content-center mb-5">
                    <div class="row ">
                        <div class="col-md-12 d-flex justify-content-center">
                            <i class="fa fa-check fa-5x light-green-text"></i>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mt-2">
                            <h3 class="h5">Todo listo. De click en guardar para terminar su lista!</h3>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-rounded prevBtn-2 float-left" type="button">Atrás</button>
                <button class="btn btn-primary btn-rounded nextBtn-2 float-right mb-4" type="button" id="execute">Guardar</button>
            </div>
        </div>
       
   {{--  </form> --}}
                
@endsection    
@section('footer')
@section('scripts')

<script src="{{url('js/jquery.nice-number.js')}}"></script>
<script type="text/javascript">

    // Tooltips Initialization
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


$(document).ready(function() {
    $("[type='number']").keypress(function (evt) {
    evt.preventDefault();
});
     $('.b-number').niceNumber();
        $("#execute").click(function(){
            if ($("#date-picker-example").val() != '') {
                 $("#form-to-sub").submit();
             }else{
                alert('Fecha vacia, Debes especificar la fecha de la primera entrega.');
             }
           
        });

        var dateToPick = new Date();
        var currentDay = dateToPick.getDate();


        var currentMonth = dateToPick.getMonth();
            dateToPick.setMonth(currentMonth, currentDay+ 3);
            console.log(dateToPick);
                $('.datepicker').pickadate({
                    min: dateToPick,
                     formatSubmit: 'yyyy-mm-dd',
                    // Escape any “rule” characters with an exclamation mark (!).
                   // format: 'yyyy-mm-dd',
                    startDate: new Date(),
                      // showMonthsShort: true,
                    selectYears: 2,
                    disable: [
                        true,
                        2,3,4,5,6,7,
    
                    ]
                })

    $("#cp-div").show();
    $( ".shipping-div" ).hide();
    $( "#zip-msj" ).hide();
    $("#date-section").hide();
 

    $( "#ship-cpVal" ).change(function() {
        var cp = 80199;
        var shipCp = $("#ship-cpVal").val();

        if (shipCp != cp) {
            $("#zip-msj").fadeIn("fast");
        
        }else if(shipCp == cp){
            $("#ship-cp").val(shipCp);
            $("#cp-div").fadeOut("fast");
            $( ".shipping-div" ).fadeIn("normal");
            $("#date-section").fadeIn("normal");            
            $( ".shipping-div" ).scroll("slow");
            

        }

    });

        $('body').on('click', '#qty', function() {

        var qty = $(this).parent('div').find('input').val();
        var rowID = $(this).parent('div').next('input').val();
        var KgRowId = $(this).next('input').val();
        if (typeof rowID  === "undefined") {
            rowID = KgRowId;
        }
        
        var data = { "rowId" : rowID, "qty" : qty };
console.log(data)
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
                                                //console.log(response);
                                                if (response.success == 0) {
                                                    //console.log(response)
                                                    $( "#total2" ).load(window.location.href + " #total2" );
                                                    $( "#full-total" ).load(window.location.href + " #full-total" );
                                                }else if (response.empty){
                                                    console.log(response)
                                                }
                                            },
                    error: OnError
                                    });      
});
//Remove prod Function
$('body').on('click', '#remove-button', function () {
    $(this).closest('tr').fadeOut();
     var rowID = $(this).prev('input').val();   
     var data = {"rowId": rowID};
        $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                });

        $.ajax({
                    data:  data,
                    url:   '{{url("/lista/removeFromCart")}}',
                    type:  'post',
                    beforeSend: function () {
                        //console.log(rowID);
                    },
                    success:  function (response) {
                        $( "#total2" ).load(window.location.href + " #total2" );
                        $( "#full-total" ).load(window.location.href + " #full-total" );
                                                              
                    }
                });   
});
    //Concurence function
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

//Stepper Functions 
  var navListItems = $('div.setup-panel-2 div a'),
          allWells = $('.setup-content-2'),
          allNextBtn = $('.nextBtn-2'),
          allPrevBtn = $('.prevBtn-2');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-amber').addClass('btn-blue-grey');
          $item.addClass('btn-amber');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });
  
  allPrevBtn.click(function(){
      var curStep = $(this).closest(".setup-content-2"),
          curStepBtn = curStep.attr("id"),
          prevStepSteps = $('div.setup-panel-2 div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

          prevStepSteps.removeAttr('disabled').trigger('click');
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content-2"),
          curStepBtn = curStep.attr("id"),

          nextStepSteps = $('div.setup-panel-2 div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true; 


      $(".form-group").removeClass("has-error");
      for(var i=0; i< curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepSteps.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel-2 div a.btn-amber').trigger('click');
});
   function OnError(xhr, errorType, exception) {
                var responseText;
                $("#dialog").html("");
                try {
                    responseText = jQuery.parseJSON(xhr.responseText);
                    $("#dialog").append("<div><b>" + errorType + " " + exception + "</b></div>");
                    $("#dialog").append("<div><u>Exception</u>:<br /><br />" + responseText.ExceptionType + "</div>");
                    $("#dialog").append("<div><u>StackTrace</u>:<br /><br />" + responseText.StackTrace + "</div>");
                    $("#dialog").append("<div><u>Message</u>:<br /><br />" + responseText.Message + "</div>");
                } catch (e) {
                    responseText = xhr.responseText;
                   console.log(responseText);
                }
           
            }

            $.extend($.fn.pickadate.defaults, {
                  monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                  monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                  weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                  weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
                  today: 'aujourd\'hui',
                  clear: 'Limpiar',
                  close: 'Cerrar',
                  formatSubmit: 'yyyy-mm-dd'
            })

      
</script>
@endsection