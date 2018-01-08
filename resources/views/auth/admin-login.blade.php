@extends('layouts.app')
@section('estilos')
<style type="text/css">
    .form-style{
        padding: 20px;
        background-color: white;
    }
    .body-color
    {
        background-color: #f5f5f5;
    }
    .margin10
    {
        margin-top: 10%;
    }
</style>
@endsection
@section('body_class', 'body-color')
@section('contenedor_class', 'margin10')
@section('contenido')
<div class="container col-md-4">
    <div class="form-style z-depth-4">
    	<!-- Form login -->
    	<form method="POST" action="{{ route('admin.login.submit') }}">
    		{{ csrf_field() }}
    	   <!-- <p class="h5 text-center mb-4">Sign in</p>-->
            <div class="row justify-content-md-center">
                
                <div class="col-12 col-md-auto">
                    <img class="rounded-circle z-depth-1-half" src="{{ asset('img/favicon.png') }}">
                </div>
               
            </div>
           

                <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
    	        <i class="fa fa-envelope prefix grey-text"></i>
    	        <input type="text" id="defaultForm-email" class="form-control" name="email" value="{{ old('email') }}">
    	        <label for="defaultForm-email">Correo</label>

    	        @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

    	    </div>

    	    <div class="md-form{{ $errors->has('password') ? ' has-error' : '' }}">
    	        <i class="fa fa-lock prefix grey-text"></i>
    	        <input type="password" name="password" required id="defaultForm-pass" class="form-control">
    	        <label for="defaultForm-pass">Contraseña</label>
    	        @if ($errors->has('password'))
                    <span class="help-block">
    	  				<strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
    	    </div>
    		
    		<div class="form-group">
    		    <input type="checkbox" id="checkbox1" class="filled-in" name="remember" {{ old('remember') ? 'checked' : '' }}>
    		    <label for="checkbox1">Recuerdame</label>
    		</div>
    	    <div class="text-center">
    	        <button class="btn btn-default ">INICIAR SEIÓN</button>
    	    </div>
    	</form>
    	<!-- Form login -->
    </div>

@endsection