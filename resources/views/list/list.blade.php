@extends('layouts.clients')


@section('navbar')
@section('contenido')


<section class="section d-flex justify-content-center">
<div class="card col-md-10">
	<div class="card-body">
                <!-- Shopping Cart table -->
                <div class="table-responsive">

                    <table class="table product-table">

                        <!-- Table head -->
                        <thead>
                            <tr>
                               <!--  <th>#</th> -->
                                <th class="font-bold">
                                    <strong>Producto</strong>
                                </th>
                                <!-- <th class="font-bold">
                                    <strong>Color</strong>
                                </th> -->
                                <th></th>
                              
                                <th class="font-bold">
                                    <strong>Precio</strong>
                                </th>
                               <!--  <th class="font-bold">
                                    <strong>Amount</strong>
                                </th> -->
                                <th>Cantidad</th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- /.Table head -->

                        <!-- Table body -->
                        <tbody>
                        	@foreach($listItems as $listItem)
                            <!-- First row -->
                            <tr>
                              <!--   <th scope="row">
                                    <img src="" alt="" class="img-fluid z-depth-0">
                                   {{$listItem->id}}
                                </th> -->
                                <td>
                                   
                                     {{ $listItem->name}}
                                 
                                   <p class="text-muted"></p>
                                </td>
                               <!--  <td>White</td> -->
                                <td></td>
                                <td>{{ $listItem->price }}</td>
                                <td class="center-on-small-only">
                                    <span class="qty">{{$listItem->qty}} </span>
                                    <div class="btn-group radio-group ml-2" data-toggle="buttons">
                                        <label class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">
                                            <input type="radio" name="options" id="option1">—
                                        </label>
                                        <label class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">
                                            <input type="radio" name="options" id="option2">+
                                        </label>
                                    </div>
                                </td>
                               <!--  <td class="font-bold">
                                    <strong>$800</strong>
                                </td> -->
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove item">X
                                    </button>
                                </td>
                            </tr>
                            <!-- /.First row -->  
                            @endforeach     
                            <!-- Fourth row -->
                            <tr>
                                <td colspan="3"></td>
                                <td>
                                    <h4 class="mt-2">
                                        <strong>Subtotal</strong>
                                    </h4>
                                </td>
                                <td class="text-right">
                                    <h4 class="mt-2">
                                    
                                        <strong>{{Cart::total()}}</strong>
                                     
                                    </h4>
                                </td>
                                <td colspan="3" class="text-right">
                                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Guardar lista
                                        <i class="fa fa-angle-right right"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Fourth row -->

                        </tbody>
                        <!-- /.Table body -->

                    </table>

                </div>
                <!-- Shopping Cart table -->
                </div>
            </div>

            </section>
@endsection