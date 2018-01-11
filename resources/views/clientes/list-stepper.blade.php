@extends('layouts.app')
@section('contenedor_class', 'container')
@section('estilos')
<style type="text/css">
                    .prod-img{
                        max-width: 100%;
                    }
                    .w-auto {
    width: auto;
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

@section('contenido')
                    
    <h2 class="text-center font-bold pt-4 pb-5 mb-5"><strong>Registration form with steps</strong></h2>

    <div class="steps-form-2">
        <div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
            <div class="steps-step-2">
                <a href="#step-4" type="button" class="btn btn-amber btn-circle-2 waves-effect ml-0" data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-list" aria-hidden="true"></i></a>
            </div>
            <div class="steps-step-2">
                <a href="#step-5" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Personal Data"><i class="fa fa-truck" aria-hidden="true"></i></a>
            </div>
            <div class="steps-step-2">
                <a href="#step-6" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Terms and Conditions"><i class="fa fa-check" aria-hidden="true"></i></a> 
            </div>
          
        </div>
    </div>

    <form role="form" action="" method="post">
        <!--First Step-->
        <div class="row setup-content-2" id="step-4">
            <div class="col-md-12">
                <h3 class="font-bold pl-0 my-4"><strong>Basic Information</strong></h3>
                {{-- <div class="form-group md-form">
                    <label for="yourEmail-2" data-error="wrong" data-success="right">Email</label>
                    <input id="yourEmail-2" type="email" required="required" class="form-control validate">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-2" data-error="wrong" data-success="right">Username</label>
                    <input id="yourUsername-2" type="text" required="required" class="form-control validate">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourPassword-2" data-error="wrong" data-success="right">Password</label>
                    <input id="yourPassword-2" type="password" required="required" class="form-control validate">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-2" data-error="wrong" data-success="right">Repeat Password</label>
                    <input id="repeatPassword-2" type="password" required="required" class="form-control validate">
                </div> --}}
                <!--Table-->
                 @forelse($listItems as $i)
                    <table class="table table-responsive w-auto">
                        <thead class="red white-text">
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
                                <td class="align-middle "><img src="{{asset($listItem->model->product_img)}}" class="img-fluid prod-img"></td>
                                <td class="align-middle">
                                   
                                     {{ $listItem->name}}
                                 
                                   <p class="text-muted"> {{ $listItem->model->brand}}</p>
                                </td>
                                <td class="align-middle p-2">$ {{ $listItem->price }}</td>
                                <td class="center-on-small-only align-middle">
                                    <div class="md-form">
                                       <input type="number" min="1" max="999" name="qty" id="qty" value="{{$listItem->qty}}">
                                       <input type="hidden" id="rowID" value="{{$listItem->rowId}}" name="">
                                    </div>
                                </td>
                                <td class="align-middle">
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
                
                   {{--  <table class="table">
                        <thead class="blue-grey lighten-4">
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
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table> --}}

 {{--        <table class="table">

    
            <thead class="mdb-color darken-3">
                <tr class="text-white">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table> --}}


                <button class="btn btn-primary btn-rounded nextBtn-2 float-right" type="button">Next</button>
            </div>
        </div>
        <!--End First Step-->

        <!--Second Step-->
        <div class="row setup-content-2" id="step-5">
            <div class="col-md-12">
                <h3 class="font-bold pl-0 my-4"><strong>Personal Data</strong></h3>
                        @forelse($shipping as $s)
                    
                    <form action="{{ route('save.list') }}" method="POST" class="col-md-12 row d-flex justify-content-center">
                     {{ csrf_field() }}
                    
                        <section class="form-elegant col-md-8">
                    
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
                               <!--  <div class="md-form">
                                    <select class="form-control" name="frecuency">
                                        <option selected disabled>Frecuencía de Reestock</option>
                                        <option value="7">Cada 7 días</option>
                                        <option value="15">Cada 15 días</option>
                                        <option value="30">Cada mes</option>
                                    </select>
                                  
                                    <label for="frec-list"></label>
                                </div> -->

                               
                            </div>

                            <!--Footer-->
                           

                        </div>
                        <!--/Form without header-->

                           {{--  <div class="modal-footer mx-5 pt-3 mb-1">
                               <button class="btn btn-danger">Guardar</button>
                    </div>
                     --}}
                    </section>
                
                </form>  
                @empty
                
                <form action="{{ route('saveNew.list') }}" method="POST" class="col-md-12 row d-flex justify-content-center">
                     {{ csrf_field() }}
                    
                        <section class="form-elegant col-md-6">
                    
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
                                                <option selected disabled>PaÍs</option>
                                                <option value="MEXICO">MÉXICO</option>
                                                
                                            </select>
                                          
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <select class="form-control" name="ship_state" required="">
                                                <option selected disabled>Estado</option>
                                                <option value="SINALOA">SINALOA</option>
                                            </select>
                                          
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-form">
                                             <input type="text" id="ship-cp" class="form-control" name="ship_cp" required>
                                            <label for="ship-cp">Código Postal</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="md-form">
                                             <input type="text" id="ship-phone" class="form-control" name="ship_phone" required>
                                            <label for="ship-phone">Teléfono</label>
                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="md-form">
                                    <select class="form-control" name="frecuency">
                                        <option selected disabled>Frecuencía de Reestock</option>
                                        <option value="7">Cada 7 días</option>
                                        <option value="15">Cada 15 días</option>
                                        <option value="30">Cada mes</option>
                                    </select>
                                  
                                    <label for="frec-list"></label>
                                </div> -->

                               
                            </div>

                            <!--Footer-->
                           

                        </div>
                        <!--/Form without header-->

                           {{--  <div class="modal-footer mx-5 pt-3 mb-1">
                               <button class="btn btn-danger">Guardar</button>
                    </div>
                     --}}
                    </section>
                
                </form>  
                @endforelse 
               <button class="btn btn-primary btn-rounded prevBtn-2 float-left" type="button">Previous</button>
                 <a href="#step-6"><button class="btn btn-primary btn-rounded nextBtn-2 float-right" type="button">Next</button></a>
            </div>
        </div>
        <div class="row setup-content-2" id="step-6">
            <div class="col-md-12">
                <h3 class="font-bold pl-0 my-4"><strong>Terms and conditions</strong></h3>
                <div class="form-group">
                    <input type="checkbox" id="checkbox111">
                    <label for="checkbox111">I agree to the terms and conditions</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="checkbox112">
                    <label for="checkbox112">I want to receive newsletter</label>
                </div>
                <button class="btn btn-primary btn-rounded prevBtn-2 float-left" type="button">Previous</button>
                <button class="btn btn-primary btn-rounded nextBtn-2 float-right" type="button">Next</button>
            </div>
        </div>
       
    </form>
                
@endsection    
@section('footer')
@section('scripts')
<script type="text/javascript">
    // Tooltips Initialization
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Steppers                
$(document).ready(function () {
   

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
      
</script>
@endsection