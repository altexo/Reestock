@extends('layouts.clients')
@section('titulo','Iniciar Sesión')

@section('estilos_unicos')
 <style type="text/css">
 .form-elegant .font-small {
  font-size: 0.8rem; }

.form-elegant .z-depth-1a {
  -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
  box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

.form-elegant .z-depth-1-half,
.form-elegant .btn:hover {
  -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
  box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }
  .margin8{
  	margin-top: 8%;
  }
   .margin5{
  	margin-top: 5%;
  }


</style>
@endsection

@section('navbar')



	@section('contenido')
	<div class="content-fluid  d-flex justify-content-center margin8">
	<div class="col-sm-4">
		<section class="form-elegant">
		    <!--Form without header-->
		    <div class="card">
        		<div class="card-body mx-4">
            			<!--Header-->
            		<div class="text-center margin5">
                		<h3 class="dark-grey-text mb-5"><strong>Iniciar Sesión</strong></h3>
           			 </div>
            		<!--Body-->
                <form method="POST" action="{{ route('login') }}">
                   {{ csrf_field() }}

                
            		<div class="md-form {{ $errors->has('email') ? ' has-error' : '' }}">
                		<input type="text" id="Form-email1" class="form-control" value="{{ old('email') }}" name="email">
                		<label for="Form-email1">Correo</label>
                       @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            		</div>

            		<div class="md-form pb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
		                <input type="password" id="Form-pass1" class="form-control" name="password" required>
		                <label for="Form-pass1">Contraseña</label>
                    
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
		                <p class="font-small blue-text d-flex justify-content-end">Olvidaste tu <a href="#" class="blue-text ml-1"> Contraseña?</a></p>
            		</div>

		            <div class="text-center mb-3">
		                <button type="submit" class="btn red-gradient btn-block btn-rounded z-depth-1a">Iniciar Sesión</button>
		            </div>
            	 </form>

       			 </div>

        		<!--Footer-->
		        <div class="modal-footer mx-5 pt-3 mb-1">
		            <p class="font-small grey-text d-flex justify-content-end">No estas registrado? <a href="#" class="blue-text ml-1"> Registrarme</a></p>
		        </div>

    		</div>
    <!--/Form without header-->

		</section>
	</div>
</div>
@endsection

@section('footer')
            
