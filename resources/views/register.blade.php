@extends('layouts.clients')

@section('navbar')



@section('contenido')
             <!--    <div class="panel-body margin8">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
 -->
 <div class="content-fluid  d-flex justify-content-center">
 <section class="form-light col-md-5">

    <!--Form without header-->
    <div class="card">

        <div class="card-body mx-4">

            <!--Header-->
            <div class="text-center">
                <h3 class="pink-text mb-5"><strong>Registrate</strong></h3>
            </div>

            <!--Body-->
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
            <div class="md-form{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" id="Form-name2" name="name" class="form-control" value="{{ old('name') }}">
            <label for="Form-email2">Nombre</label>
            </div>
            <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" id="Form-email2" name="email" class="form-control" value="{{ old('email') }}">
                <label for="Form-email2">Correo</label>
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
            </div>

            <div class="md-form pb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" id="Form-pass2" class="form-control" name="password">
                <label for="Form-pass2">Contraseña</label>
                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                <div class="md-form">
                    <input type="password" id="Form-conpass2" name="password_confirmation" class="form-control" value="">
                    <label for="Form-email2">Repite tu contraseña</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="checkbox">
                    <label for="checkbox" class="grey-text">He leído y acepto los<a href="#" class="blue-text"> términos y condiciones de uso.</a></label>
                </div>
            </div>

            <!--Grid row-->
            <div class="row d-flex align-items-center mb-4">

                <!--Grid column-->
                <div class="col-md-3 col-md-6 text-center">
                    <button type="submit" class="btn btn-pink btn-block btn-rounded z-depth-1">Registrarme</button>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6">
                    <p class="font-small grey-text d-flex justify-content-end">Ya tienes cuenta? <a href="#" class="blue-text ml-1"> Inicia sesión</a></p>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>

    
        
    </div>
    <!--/Form without header-->

</section>
</div>
            
                @endsection
@section('footer')



