@extends('layouts.admins')
@section('navbar')
@section('contenido')
<div class="container col-lg-12">
    <div class="row col-lg-8">
        <div class="jumbotron col-lg-12">
            <h1 class="h1-responsive">{{ Auth::user()->job_title }} Dashboard</h1>
            <h3 class="h3-responsive">Hello, {{ Auth::user()->name }}</h3>
            <p class="text-left">Hay administradores pendientes  por aceptar.</p>
            <hr class="my-2">
            
            <a class="btn btn-primary btn-lg" role="button">GO</a>
        </div>
    </div>
    <div class="row col-xl-12">
            <div class="text-center">
                <span class="min-chart" id="chart-sales" data-percent="56"><span class="percent"></span></span>
                <h5><span class="badge green">Sales <i class="fa fa-arrow-circle-up"></i></span></h5>
            </div>
            <div class="text-center">
                <span class="min-chart" id="chart-sales" data-percent="56"><span class="percent"></span></span>
                <h5><span class="badge red">Otro <i class="fa fa-arrow-circle-up"></i></span></h5>
            </div>
            <div class="text-center">
                <span class="min-chart" id="chart-sales" data-percent="56"><span class="percent"></span></span>
                <h5><span class="badge yellow">Otro <i class="fa fa-arrow-circle-up"></i></span></h5>
            </div>
</div>

   <canvas id="lineChart"></canvas>
</div>
@endsection
@section('scripts_unicos')
    <script>
        $(function () {
    $('.min-chart#chart-sales').easyPieChart({
        barColor: "#4caf50",
        onStep: function (from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
        }
    });
});


     //line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    },
    options: {
        responsive: true
    }    
});
            
    </script>    
   
 @endsection