@extends('layouts.clients')
@section('estilos_unicos')
<style type="text/css">
.special-use{
    display: none;
}
.margin8{
        margin-top: 8%;
    }
    .margin-list
    {
        margin-right: 15px;
    }.datepickererr::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:    red;
}
.datepickererr:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
   color:    red;
   opacity:  1;
}
.datepickererr::-moz-placeholder { /* Mozilla Firefox 19+ */
   color:    red;
   opacity:  1;
}
.datepickererr:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color:    red;
}
.right{width:x; height:y; text-align:right !important; color: green}
    .align{
        width:x; height:y; text-align:right !important;   
    }
 </style>
 @endsection

@section('contenido')
<div class="container-fluid ">
    <div class="col-xl-12">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif
    </div>
    <div class="row d-flex justify-content-center">
        <?php  $n = 0; ?>
        @forelse($lists as $list)
            <?php $n++; ?>
            <div class="card testimonial-card col-md-3 margin-list mt-2">

                <div class="card-up indigo lighten-1">
                </div>

                <div class="avatar">@if($list->active == 4) <img src="{{asset('img/REESTOCK_confirmed.jpg')}}" class="rounded-circle"> @else

                    <img src="{{asset('img/REESTOCK.jpeg')}}" class="rounded-circle">@endif {{-- <i class="fa-shopping-basket fa-5x"></i> --}}
                </div>

                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-calendar"></i> {{$list->nombre_dia}} {{$list->dia}} De {{$list->mes}}</h4>
                    <hr>
                   <p><a href="" data-toggle="modal" data-target="#show-list<?php echo $n; ?>" class="btn btn-primary btn-md"><i class="fa fa-eye"></i> Ver lista</a></p>
                </div>
            </div>

        @empty
            <p>Aún no tienes listas..  <a href="{{route('store')}}">Crear mi primera lista</a> </p>
        @endforelse
         <?php $n = 0;?>
    </div>
    @if(array_key_exists('listas', $list_prod))
    @forelse($list_prod['listas'] as $item => $i)
  

    <?php $n++ ?>
        <div class="modal fade" id="show-list<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><button class="btn btn-primary btn-sm confirm-list<?php echo $n; ?>">Confirmar esta lista YA!</button></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                    </div>
                    <!--Body-->

                    <div class="modal-body">
                        <p><a  href="" class="" ><button  class="btn btn-warning btn-sm postpone<?php echo $n; ?>">Cambiar entrega</button></a><a  href="{{route('store')}}"><button  class="btn btn-success btn-sm add<?php echo $n; ?>">agregar productos</button></a><a  id="cancel<?php echo $n; ?>" ><button class="btn btn-danger btn-sm cancel<?php echo $n; ?>">Cancelar lista</button></a></p>
                         <form method="post" id="postpone<?php echo $n; ?>" >
                            <div id="datepicker<?php echo $n; ?>" class="mt-3 md-form hidden" data-toggle="tooltip" title="Debes especificar la fecha a la que deseas posponer." role="tooltip">
                                <input placeholder="Escoger fecha" type="text" id="date-picker-example" name="postpone_date" class="form-control datepicker  datepicker<?php echo $n; ?>" readonly="readonly" required>
                                <label for="date-picker-example">Posponer para el día</label>
                                <a id="submit_postpone<?php echo $n; ?>" class="btn btn-primary btn-sm">Posponer</a>
                                <a id="cancel_postpone<?php echo $n; ?>" class="btn btn-outline-danger btn-sm">Cancelar</a>
                            </div>
                        {{ csrf_field() }}

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Producto</th>
                                    <th>Unidad</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                   {{--  <th>Frecuencia</th> --}}
                                   
                                    <th>Eliminar</th>
                      
                                </tr>
                            </thead>

                            <tbody>
                                    <?php $total = 0; ?>
                                    @foreach($i as $value)
                                    <?php $total = $total+ $value->amount; ?>
                                     <tr>
                                        <input type="hidden" name="list_id" value="{{$value->id}}">
                                        <td width="80" class="align-middle"><img src="{{$value->product_img}}" class="img-fluid"></td>
                                        <td class="align-middle">{{$value->product_name}}</td>
                                        <td class="align-middle"><label>{{$value->unity}}</label></td>
                                        <td class="align-middle">
                                            @if($value->active == 4 || $list->active == 5)
                                                <label>{{$value->quantity}}</label>   
                                            @else
                                                 <input type="number" @if($value->unity == 'KG') class="KG" @endif min="1" name="" id="qtyList" value="{{$value->quantity}}"><input type="hidden" name="listID[]" value="{{$value->id}}">
                                            @endif    

                                        </td>
                                        <td class="align-middle"><label>{{$value->amount}}</label>
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
                                      {{--   <td class="align-middle">
                                            <select class="form-control" id="concurrence" >
                                                <option selected disabled value="{{ $value->reestock_concurrence }}">{{ $value->reestock_concurrence }} días</option>
                                                <option value="7">Cada 7 días</option>
                                                <option value="15">Cada 15 días</option>
                                                <option value="30">Cada 30 días</option>
                                                <option value="45">Cada 6 semanas (45 dīas)</option>
                                                <option value="60">Cada 2 meses (60 días)</option>
                                                <option value="180">Cada 6 meses</option>
                                            </select>
                                            
                                        </td> --}}
                                         @if($value->active == 4 || $value->active == 5)
                                         @else
                                        <td class="align-middle"><a><i class="fa fa-remove" id="delete-item"></i><input type="hidden" name="" value="{{$value->id}}"></a></td>
                                        @endif
                                    </tr>
                                     @endforeach
                                 
                              
                            </tbody>
                        </table>
                        </form>

                    </div>
                    
                    <!--Footer-->
                    <div class="modal-footer d-inline-flex p-2" >
                      {{--   <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-dismiss="modal">Close</button> --}}
                      {{--   <button class="btn btn-primary waves-effect waves-light">Checkout</button> --}}
                      <div class="float-left d-inline-flex p-2">{{-- <button class="btn btn-success btn-md">Confirmar esta lista YA!</button> --}}</div>
                      
                      <ul>
                        <li>
                             <label class="h5" id="totalList<?php echo $n; ?>"><b>Sub Total:    </b>$ {{$total}}</label>
                        </li>
                        <li class="right"><a class="h6" ><b>+ Envio:    </b></a><label class="h6 right">$ 60.00</label></li>
                         <li class="align">
                             <label class="h6" id="ShiptotalList<?php echo $n; ?>"><b>Total:    </b>$ {{$total+60}}</label>
                        </li>
                    </ul>
                     
                        
                    </div>
                </div>
            </div>
        </div>
       
        @empty
        @endforelse
        @endif 
@endsection

@section('footer')

@section('scripts_unicos')
<?php $n = 0; ?>
@forelse($lists as $list)
<?php $n++ ?>
    <script type="text/javascript">
         $(document).ready(function() {
       //Posponer
        @if($list->active == 4 || $list->active == 5)  
            $(".postpone<?php echo $n; ?>").attr('disabled', true);
            $(".cancel<?php echo $n; ?>").attr('disabled', true);
            $(".add<?php echo $n; ?>").attr('disabled', true);
            $(".confirm-list<?php echo $n; ?>").attr('disabled', true);
        @else
        $(document).on("click", ".postpone<?php echo $n; ?>", function(e){

            e.preventDefault();
               $('#postpone<?php echo $n; ?>').attr('action', "{{route('postpone.list')}}");
               //$('#datepicker<?php echo $n; ?>').removeClass('hidden');
               $("#datepicker<?php echo $n; ?>").fadeIn("slow", function() {
                    $(this).removeClass("hidden");
                });
        });
        $('#datepicker<?php echo $n; ?>').click(function(){
            $(this).removeClass('animated bounce')
        });
        $(document).on("click", '#submit_postpone<?php echo $n; ?>', function(e){
            e.preventDefault();
                //$('').attr('required', true);
                var date = $('.datepicker<?php echo $n; ?>').val();
                var r = confirm("Seguro que deseas posponer la entrega?");
                if (r == true && date != '') {
                      $('#postpone<?php echo $n; ?>').attr('action', "{{route('postpone.list')}}").submit();
                    // console.log("Wut?");

                }
                else{
                   var picker = $('#datepicker<?php echo $n; ?>').addClass('animated bounce ');
                     // $('#datepicker<?php echo $n; ?>').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', );
        
                    console.log("Need a date pal");
                }
        });

        $("#cancel_postpone<?php echo $n; ?>").on("click", function(e){
            e.preventDefault();
            console.log('you press cancel');
            $('.datepicker<?php echo $n; ?>').attr('required', false);
               $("#datepicker<?php echo $n; ?>").fadeOut("normal", function() {
                    $(this).addClass("hidden");
                });
        });
        //Cancelar lista
        $('#cancel<?php echo $n; ?>').on("click", function(e){
            console.log('You press cancel')
            e.preventDefault();
                var r = confirm("Seguro que deseas cancelar esta lista?");
                if (r == true) {
                     $('#postpone<?php echo $n; ?>').attr('action', "{{route('cancel.list')}}").submit();
                     
                }
                else{
                    
                }
        });
        $(".confirm-list<?php echo $n; ?>").click(function(e){
            e.preventDefault();
            $.confirm({
                title: 'Confirmar',
                content: 'Una vez confirmada la lista no podras realizar mas cambios.',
                type: 'blue',
                buttons:{
                    confirmar: {
                        text: '¡Confirmar lista!',
                        btnClass: 'btn-blue',
                        action: function(){
                            $('#postpone<?php echo $n; ?>').attr('action', "{{route('confirm.list')}}").submit();
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
        @endif
    });
        //Agregar productos
    </script>
@empty
   
@endforelse
<script type="text/javascript">
 $(document).ready(function() {
   
 
    $('body').on('click', '#delete-item', function(){
        var itemToDel = $(this).closest('tr');
        var id = $(this).next('input').val();
        var data = {id: id}
        $.confirm({
    title: 'Eliminar',
    content: 'Seguro desas eliminar este producto?',
   type: 'red',

    buttons: {

        confirmar: {

             btnClass: 'btn-red',
            action: function(){
                $.ajaxSetup({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                 });

                $.ajax({
                        data:  data,
                        url:   '{{route("delete.item")}}',
                        type:  'post',
                                beforeSend: function () {
                                
                                },
                                success:  function (response) {
                                    if (response) {
                                            $(itemToDel).closest('tr').fadeOut();
                                    }else{
                                        console.log('err');
                                        
                                    }
                                    // $( "#total" ).load(window.location.href + " #total" );
                                    // $( "#badge" ).load(window.location.href + " #badge" );
                                                    
                                }
                    });     
       
            $.alert('Producto eliminado!');
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


    $('body').on('keyup mouseup', '#qtyList', function(){

        var qty_element = $(this);
        var qty = $(this).val();
          if($(qty_element).attr('class') == 'KG'){
                     
            }else{
                    $(qty_element).val(Math.ceil(qty));
                    qty = Math.ceil(qty);

            }

    
        var id = $(this).next('input').val();

        var data = {id: id, qty: qty}
        //$(this).closest('div#loader').addClass('AddedClaaasss');
        var amount = $(this).closest('td').next('td').find('label').hide();
        var loader = $(this).closest('td').next('td').find('div').show();
        var total = $(this).closest('table').closest('div').next('div').find('label').attr('id');
         var Fulltotal = $(this).closest('table').closest('div').next('div').find('li').next('li').next('li').find('label').attr('id');
         //console.log('Full total id is: '+Fulltotal);
            $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                });

            $.ajax({
                        data:  data,
                        url:   '{{route("update.list")}}',
                        type:  'post',
                                beforeSend: function () {
                                
                                },
                                success:  function (response) {
                                    if (response) {
                                            //console.log(response.success);
                                            $(amount).text(response.success);
                                            $(amount).show();
                                            $(loader).hide();
                                              // console.log(total);
                                            $( "#"+total ).load(window.location.href + " #"+total );
                                             $( "#"+Fulltotal ).load(window.location.href + " #"+Fulltotal );
                                           
                                    }else{
                                        console.log('err');
                                        $(loader).hide();
                                    }
                                    // $( "#total" ).load(window.location.href + " #total" );
                                    // $( "#badge" ).load(window.location.href + " #badge" );
                                                    
                                }
                    });     
        //console.log(id);
    });
    var dateToPick = new Date();
 var currentDay = dateToPick.getDate();


    var currentMonth = dateToPick.getMonth();
    dateToPick.setMonth(currentMonth, currentDay+ 2);
    console.log(dateToPick);
    $('.datepicker').pickadate({
         min: dateToPick,
  // Escape any “rule” characters with an exclamation mark (!).
  format: 'yyyy-mm-dd',
    startDate: new Date(),
  // showMonthsShort: true,
  // selectYears: 1,
     disable: [
     true,
     2,3,4,5,6,7,
    
     ]
})

    $(function(){
        setTimeout(function() {
            $('.alert-success').fadeOut('fast');
        }, 5000); // <-- time in milliseconds

    });

 
   

});
</script>
@endsection

