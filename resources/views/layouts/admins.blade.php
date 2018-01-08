@extends('layouts.app')
@section('titulo', 'Admin')
@section('body_class', 'fixed-sn')
@section('navbar')
 <!-- Sidebar navigation -->
    <ul id="slide-out" class="side-nav indigo darken-1 custom-scrollbar">
        <!-- Logo -->
        <li>
            <div class="logo-wrapper waves-light">

                <!-- <a href="#"><img src="{{ asset('img/favicon.png') }}" class="img-fluid rounded-circle flex-center"></a> -->
            </div>
        </li>
        <!--/. Logo -->
        <!--Search Form-->
        <li>
            <form class="search-form" role="search">
                <div class="form-group waves-light">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
        </li>
        <!--/.Search Form-->
        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-shopping-bag"></i> Productos<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('Crear Producto') }}" class="waves-effect">Crear producto</a>
                            </li>
                            <li><a href="{{ route('Ver Productos')}}" class="waves-effect">Productos</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-user"></i> Usuarios<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('Empleados') }}" class="waves-effect">Empleados</a>
                            </li>
                            <li><a href="{{ route('Clientes') }}" class="waves-effect">Clientes</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-list"></i> Listas<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('Listas / Todas') }}" class="waves-effect">Todas las listas</a>
                            </li>
                            <li><a href="{{ route('Lista de compra') }}" class="waves-effect">Lista de compra</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> About<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">Introduction</a>
                            </li>
                            <li><a href="#" class="waves-effect">Monthly meetings</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-o"></i> Contact me<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">FAQ</a>
                            </li>
                            <li><a href="#" class="waves-effect">Write a message</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
            </ul>
        </li>
        <!--/. Side navigation links -->
        <div class="sidenav-bg mask-strong"></div>
    </ul>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-md navbar-dark indigo darken-3 scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto">
            <p >Panel De Administración / {{ Route::currentRouteName() }}</p>
        </div>
        <ul class="nav navbar-nav nav-flex-icons ml-auto indigo-text">
          
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Perfil</a>
                     <a class="dropdown-item" href="{{ route('logout') }}"
			                     onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Cerrar Sesión
                                </a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.Navbar -->
@endsection

@section('contenido')
@endsection

@section('footer')
@endsection
@section('scripts')
	<script type="text/javascript">
				// SideNav init
		$(".button-collapse").sideNav();

		// Custom scrollbar init
		var el = document.querySelector('.custom-scrollbar');
		Ps.initialize(el);
	</script>
    @yield('scripts_unicos')
@endsection
