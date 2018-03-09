@extends('layouts.clients')
@section('estilos_unicos')
@endsection
@section('')
@section('contenido')

<a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i class="fa fa-bars"></i></a>


<div id="slide-out" class="side-nav  fixed">
<ul class="custom-scrollbar">

    <li>
        <div class="logo-wrapper waves-light">
            <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
        </div>
    </li>

    <li>
        <ul class="social">
            <li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
            <li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
            <li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
            <li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
        </ul>
    </li>

    <li>
        <form class="search-form" role="search">
            <div class="form-group md-form mt-0 pt-1 waves-light">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
    </li>

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

@endsection
@section('scripts_unicos')
<script type="text/javascript">
	// SideNav Button Initialization
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization
var sideNavScrollbar = document.querySelector('.custom-scrollbar');
Ps.initialize(sideNavScrollbar);
</script>
@endsection