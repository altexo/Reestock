{{-- @extends('layouts.clients')
@section('estilos_unicos') --}}
	<style type="text/css">
/*		.navbar .mega-dropdown {
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


          .dropdown-submenu {
    position:relative;
}
.dropdown-submenu .dropdown-menu {
    top:0;
    left:100%;
}*/
.no-shadow {
    	box-shadow: 0 0px 0px 0 rgba(0,0,0,0), 0 0px 0px 0 rgba(0,0,0,0) !important;
	}
	#icons {
    width: 30px;
    height: 30px;
    background: url({{url('icons/menu-sprites.svg')}}) 0 0;
}

	</style>


{{-- @endsection
@section('contenido') --}}

	   <nav class="navbar navbar-toggleable-md navbar-dark red lighten-1">
           
            <button class="navbar-toggler collapsed red lighten-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
      

    <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
    	<div class="btn-group">
    <button class="btn  red lighten-1 dropdown-toggle no-shadow" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departamentos</button>

    <div class="dropdown-menu">
       
       
        <div class="dropdown-submenu">
        
             <a class="dropdown-item" href="{{route('search.categorie',['department' =>1])}}"><img id="icons" src="{{url('icons/002-groceries.png')}}"> <b>ABARROTES</b></a>
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
         <a class="dropdown-item" href="{{route('search.categorie',['department' =>2])}}"><img id="icons" src="{{url('icons/005-steak.png')}}"> <b>CARNES Y PESCADOS</b></a>
          <a class="dropdown-item" href="{{route('search.categorie',['department' =>3])}}"><img id="icons" src="{{url('icons/009-lemon.png')}}"> <b>FRUTA Y VERDURA</b></a>
            <a class="dropdown-item"href="{{route('search.categorie',['department' =>11])}}"><img id="icons" src="{{url('icons/004-squares.png')}}"> <b>CONGELADOS</b></a>
              <a class="dropdown-item" href="{{route('search.categorie',['department' =>5])}}"><img id="icons" src="{{url('icons/002-toothbrush.png')}}"><b> HIGIENE PERSONAL</b></a>
                <a class="dropdown-item" href="{{route('search.categorie',['department' =>6])}}"><img id="icons" src="{{url('icons/003-sponge.png')}}"> <b>LIMPIEZA</b></a>
                  <a class="dropdown-item" href="{{route('search.categorie',['department' =>7])}}"><img id="icons" src="{{url('icons/001-recycle.png')}}"> <b>DESECHABLES</b></a>
                  <a class="dropdown-item" href="{{route('search.categorie',['department' =>4])}}"><img id="icons" src="{{url('icons/004-salami.png')}}"> <b>SALCHICHONERIA</b></a>
                   <a class="dropdown-item" href="{{route('search.categorie',['department' =>8])}}"><img id="icons" src="{{url('icons/001-milk.png')}}"> <b>LACTEOS</b></a>
                    <a class="dropdown-item" href="{{route('search.categorie',['department' =>9])}}"><img id="icons" src="{{url('icons/003-wine.png')}}"> <b>CERVEZAS, VINOS Y LICORES</b></a>
                     <a class="dropdown-item" href="{{route('search.categorie',['department' =>10])}}"><img id="icons" src="{{url('icons/005-dog.png')}}"> <b>MASCOTAS</b></a>
    </div>
            
            </div>

            <form action="{{route('search2')}}" class="form-inline justify-content-end col-md-4">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input class="form-control form-control-md ml-3 w-75" value="{{request()->search}}" name="search" type="text" placeholder="Buscar" aria-label="Search">
            </form> 
        </div>

        </nav>

<!-- SideNav slide-out button -->
{{-- <a href="#" data-activates="slide-out" class="btn p-3 button-collapse no-shadow"><i class="fa fa-bars"></i></a> --}}

<!-- Sidebar navigation -->
{{-- <div id="slide-out" class="side-nav fixed">
<ul class="red darken-4  custom-scrollbar">
    <!-- Logo -->
    <li>
        <div class="logo-wrapper waves-light">
            <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
        </div>
    </li>
    <!--/. Logo -->
    <!--Social-->
    <li>
        <ul class="social">
            <li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
            <li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
            <li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
            <li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
        </ul>
    </li>
    <!--/Social-->
    <!--Search Form-->
    <li>
        <form class="search-form" role="search">
            <div class="form-group md-form mt-0 pt-1 waves-light">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
    </li>
    <!--/.Search Form-->
    <!-- Side navigation links -->
    <li>
        <ul class="collapsible collapsible-accordion">
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Submit blog<i class="fa fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="#" class="waves-effect">Submit listing</a>
                        </li>
                        <li><a href="#" class="waves-effect">Registration form</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Instruction<i class="fa fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="#" class="waves-effect">For bloggers</a>
                        </li>
                        <li><a href="#" class="waves-effect">For authors</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> About<i class="fa fa-angle-down rotate-icon"></i></a>
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
                        <li><a href="#" class="waves-effect">FAQ</a>
                        </li>
                        <li><a href="#" class="waves-effect">Write a message</a>
                        </li>
                        <li><a href="#" class="waves-effect">FAQ</a>
                        </li>
                        <li><a href="#" class="waves-effect">Write a message</a>
                        </li>
                        <li><a href="#" class="waves-effect">FAQ</a>
                        </li>
                        <li><a href="#" class="waves-effect">Write a message</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>

</ul>
</div>



 --}}

	<script type="text/javascript">

	// 	$(document).ready(function(){
 //    	$("#abarrotes").hover(function(){
 //        	$("#abarrotes-cat").css("display", "block");
 //        //, function(){
 //        // 	$("#abarrotes-cat").css("display", "none");
 //        });	

 //        $("#carnicos").hover(function(){
 //        	$("#abarrotes-cat").css("display", "none");
 //        });
	// });

	</script>
	

 