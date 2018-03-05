@extends('layouts.clients')
@section('estilos_unicos')
	<style type="text/css">
		.navbar .mega-dropdown {
  position: static !important; }

.navbar .dropdown-menu.mega-menu {
  width: 100%;
  border: none;
  border-radius: 0; }
  .navbar .dropdown-menu.mega-menu a {
    padding: 0 0 0 0; }
    .navbar .dropdown-menu.mega-menu a.news-title {
      font-weight: 500;
      font-size: 1.1rem;
      line-height: 1.5;
      -webkit-transition: .2s;
      transition: .2s;
      color: #4f4f4f !important; }
      .navbar .dropdown-menu.mega-menu a.news-title:hover {
        color: #2196f3 !important; }
      .navbar .dropdown-menu.mega-menu a.news-title.smaller {
        font-weight: 400;
        font-size: 1rem;
        line-height: 1.4; }
  .navbar .dropdown-menu.mega-menu .sub-menu a.menu-item {
    color: #4f4f4f !important; }
    .navbar .dropdown-menu.mega-menu .sub-menu a.menu-item:hover {
      color: #4f4f4f !important; }
  .navbar .dropdown-menu.mega-menu .news-single {
    margin-bottom: 1.2rem;
    border-bottom: 1px solid #e0e0e0; }
  .navbar .dropdown-menu.mega-menu .sub-title {
    padding-bottom: 0.5rem;
    margin-bottom: 1rem;
    border-bottom: 1px solid #e0e0e0; }
  .navbar .dropdown-menu.mega-menu .p-sm {
    padding-bottom: 17px; }
  .navbar .dropdown-menu.mega-menu .m-sm {
    margin-bottom: -5px;
    font-size: 0.85rem;
    color: #2196f3 !important; }
    .navbar .dropdown-menu.mega-menu .m-sm:hover {
      color: #2196f3 !important; }
  .navbar .dropdown-menu.mega-menu .mt-sm {
    margin-top: -3px; }
  .navbar .dropdown-menu.mega-menu .font-small {
    font-size: 0.85rem; }       
	/*#abarrotes-cat{
		display: none;
	}*/

          .dropdown-submenu {
    position:relative;
}
.dropdown-submenu .dropdown-menu {
    top:0;
    left:100%;
}
.no-shadow {
    	box-shadow: 0 0px 0px 0 rgba(0,0,0,0), 0 0px 0px 0 rgba(0,0,0,0) !important;
	}
	#icons {
    width: 30px;
    height: 30px;
    background: url({{url('icons/menu-sprites.svg')}}) 0 0;
}
	</style>
@endsection
@section('contenido')

	   <nav class="navbar navbar-toggleable-md navbar-dark red lighten-1">
           
            <button class="navbar-toggler collapsed red lighten-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          {{--   <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
            	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> --}}


    <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
    	<div class="btn-group">
    <button class="btn  red lighten-1 dropdown-toggle no-shadow" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departamentos</button>

    <div class="dropdown-menu">
       
       
        <div class="dropdown-submenu">
         {{--    <a class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown" href="#">Something else here</a> --}}
             <a class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown" href="#"><img id="icons" src="{{url('icons/008-milk.png')}}"> <b>ABARROTES</b></a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown" href="#">Something else here</a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown" href="#">Something else here</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <a class="dropdown-item" href="#"><img id="icons" src="{{url('icons/005-steak.png')}}"> <b>CÁRNICOS</b></a>
          <a class="dropdown-item" href="#"><img id="icons" src="{{url('icons/009-lemon.png')}}"> <b>FRUTA Y VERDURA</b></a>
            <a class="dropdown-item" href="#"><img id="icons" src="{{url('icons/004-squares.png')}}"> <b>REFRIGERADO</b></a>
              <a class="dropdown-item" href="#"><img id="icons" src="{{url('icons/002-toothbrush.png')}}"><b> HIGIENE PERSONAL</b></a>
                <a class="dropdown-item" href="#"><img id="icons" src="{{url('icons/003-sponge.png')}}"> <b>LIMPIEZA</b></a>
                  <a class="dropdown-item" href="#"><img id="icons" src="{{url('icons/001-recycle.png')}}"> <b>DESECHABLES</b></a>
    </div>
{{-- </div> --}}

              {{--   <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link waves-effect waves-light" href="#">Departamentos <i class="fa fa-chevron-right" aria-hidden="true"></i><span class="sr-only">(current)</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="#">Opinions</a>
                    </li> 
                </ul> --}}
            
            </div>

            <form class="form-inline justify-content-end col-md-4">
    <i class="fa fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-md ml-3 w-75" type="text" placeholder="Buscar" aria-label="Search">
</form> </div>

        </nav>



<!--<nav class="navbar navbar-toggleable-md navbar-dark red lighten-1">

 
          <!-- Links -->
 {{--        <ul class="navbar-nav mr-auto">
            <!-- Dropdown -->
            <li class="nav-item dropdown mega-dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departamentos </a>
                <div class="dropdown-menu mega-menu row z-depth-1" aria-labelledby="navbarDropdownMenuLink">
                    <div class="row">
                        <div class="col-md-5 col-xl-3 sub-menu mt-5 mb-5 pl-4">
                            <ol class="list-unstyled mx-4 dark-grey-text">
                                <li id="abarrotes" class="sub-title text-uppercase mt-sm"><a class="menu-item" href="">Abarrotes</a></li>
                                <li id="carnicos" class="sub-title text-uppercase"><a class="menu-item" href="">Cárnicos</a></li>
                                <li id="fyv" class="sub-title text-uppercase"><a class="menu-item" href="">Fruta y Verdura</a></li>
                                <li id="refrigerados" class="sub-title text-uppercase"><a class="menu-item" href="">Refrigerados</a></li>
                                <li id="higiene" class="sub-title text-uppercase"><a class="menu-item" href="">Higiene Personal</a></li>
                                <li id="desechables" class="sub-title text-uppercase"><a class="menu-item" href="">Desechables</a></li>
                                <li id="otros" class="sub-title text-uppercase"><a class="menu-item" href="">Otros</a></li>
                            </ol>
                        </div>
                        <div class="col-md-7 col-xl-9 aba-cat" id="abarrotes-cat">
                        	<div class="row">
                                <div class="col-xl-4 mt-5 mb-4 pr-5 clearfix d-none d-md-block">
                        			<ul>
                        				<li> <a href="#"><span class="font-weight-bold red-text">Café y Te</span></a>
                        					<ul>
                        						<li>Café de Grano</li>
                        						<li>Café Molido</li>
                        						<li>Café Soluble</li>
                        						<li>Cápsulas de Café</li>
                        						<li>Capuchino Instantáneo</li>
                        						<li>Té de Frutas</li>
                        						<li>Té de Hierbas  y Especias</li>
                        						<li>Té Verde</li>
                        						<li>Tés Medicinales</li>
                        						
                        					</ul>
                        				</li>

                        			</ul>
                        		</div>
                        		<div class="col-xl-4 mt-5 mb-4 pr-5 clearfix d-none d-md-block">
                        			<ul>
                        				<li> <a href="#"><span class="font-weight-bold red-text">Pan Tortillas y derivados</span></a>
                        					<ul>
                        						<li>Croutones</li>
                        						<li>Empanizadores</li>
                        						<li>Pan Arabe</li>
                        						<li>Pan Dulce y Pastelitos</li>
                        						<li>Pan en Barrao</li>
                        						<li>Pan para Hamburguesa y Hotdog</li>
                        						<li>Pan Tostado</li>
                        						<li>Tortillas de Harina</li>
                        						<li>TTortillas de Maíz</li>
                        						<li>Tostadas</li>
                        						<li>Totopos</li>
                        						
                        					</ul>
                        				</li>

                        			</ul>
                        		</div>
                        		<div class="col-xl-4 mt-5 mb-4 pr-5 clearfix d-none d-md-block">
                        			<ul>
                        				<li> <a href="#"><span class="font-weight-bold red-text">Cereales</span></a>
                        					<ul>
                        						<li>Avena</li>
                        						<li>Barras de Cereal</li>
                        						<li>Cereal de Fibra y Light</li>
                        						<li>Cereal Dulce</li>
                        						<li>Granola</li>
                        						<li>Soya</li>
                        					</ul>
                        				</li>

                        			</ul>
                        		</div>
                        	</div>
                        </div>
                        <div class="col-md-7 col-xl-9">
                            <div class="row">
                                <div class="col-xl-6 mt-5 mb-4 pr-5 clearfix d-none d-md-block">
                                    <h6 class="sub-title p-sm mb-4 text-uppercase font-weight-bold dark-grey-text">Featured</h6>
                                    <!--Featured image-->
                                    <div class="view overlay hm-white-slight pb-3">
                                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Work/6-col/img%20(42).jpg" class="img-fluid z-depth-1" alt="First sample image">
                                        <div class="mask flex-center">
                                            <p></p>
                                        </div>
                                    </div>
                                    <h4 class="mb-2"><a class="news-title" href="">Lorem ipsum dolor sit amet, consectetur isum adipisicing elit.</a></h4>
                                    <p class="font-small text-uppercase text-muted">By <a class="m-sm" href="#!">Anna Doe</a> - July 15, 2017</p>
                                </div>
                                <div class="col-xl-6 mt-5 mb-4 pr-5 clearfix d-none d-xl-block">
                                    <h6 class="sub-title p-sm mb-4 text-uppercase font-weight-bold dark-grey-text">Categorias</h6>
                                    <div class="news-single">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!--Image-->
                                                <div class="view overlay hm-white-slight z-depth-1">
                                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Work/6-col/img%20(43).jpg" class="img-fluid" alt="Minor sample post image">
                                                    <div class="mask flex-center">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <a class="news-title smaller mb-1" href="">Duis aute irure dolor reprehenderit in voluptate.</a>
                                                <p class="font-small text-uppercase text-muted">July 14, 2017</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="news-single">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!--Image-->
                                                <div class="view overlay hm-white-slight z-depth-1">
                                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Work/6-col/img%20(44).jpg" class="img-fluid" alt="Minor sample post image">
                                                    <div class="mask flex-center">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <a class="news-title smaller mb-1" href="">Tempore autem reiciendis iste nam dicta.</a>
                                                <p class="font-small text-uppercase text-muted">July 14, 2017</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="news-single">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!--Image-->
                                                <div class="view overlay hm-white-slight z-depth-1">
                                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Work/6-col/img%20(41).jpg" class="img-fluid" alt="Minor sample post image">
                                                    <div class="mask flex-center">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <a class="news-title smaller mb-1" href="">Eligendi dicta sunt amet, totam ea recusandae.</a>
                                                <p class="font-small text-uppercase text-muted">July 14, 2017</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
     
       <ul class="navbar-nav nav-flex-icons ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
        </ul>
      

    </div> --}} 
{{--       <form class="form-inline">
    <i class="fa fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-md ml-3 w-75" type="text" placeholder="Buscar" aria-label="Search">
</form>

</nav> --}}
<!--/.Navbar-->                
                    
@endsection
	
@section('scripts_unicos')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
    	$("#abarrotes").hover(function(){
        	$("#abarrotes-cat").css("display", "block");
        //, function(){
        // 	$("#abarrotes-cat").css("display", "none");
        });	

        $("#carnicos").hover(function(){
        	$("#abarrotes-cat").css("display", "none");
        });
	});
$('.dropdown-submenu .dropdown-toggle').on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).next('.dropdown-menu').toggle();
});
	</script>
	

    <!-- Bootstrap Dropdown Hover JS -->
   
@endsection