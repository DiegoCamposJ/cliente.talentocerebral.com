@extends('layouts.app')

@section('title', 'Reporte QUAD')

    @section('css')
    {!!Html::style('css/estilos-impresion.css')!!}
    {!!Html::style('css/caratula.css')!!}
    {!!Html::style('css/app-divider.css')!!}
    {!!Html::style('css/saltopagina.css')!!}

@stop
@section('content')


        <div class="container">
            <div data-size="A4">
                <!--PÁGINA 1 -->
                @include('quad.paginascargo.1')
                <br><br><br>
                @include('quad.paginascargo.7')



            </div>
        </div>





@stop

@section('scripts')
    <script src="{{ asset('js/statistics/easypiechart/easypiechart.bundle.js')}}"></script>
    <script src="{{ asset('js/statistics/chartjs/chartjs.bundle.js')}}"></script>
    <script src="{{ asset('js/statistics/chartist/chartist.js')}}"></script>
    <script src="{{ asset('js/statistics/d3/d3.js')}}"></script>
    <script src="{{ asset('js/statistics/c3/c3.js')}}"></script>
    <script src="{{ asset('js/statistics/flot/flot.bundle.js')}}"></script>




<script>
    //var colors = [color.primary._500, color.fusion._500, color.danger._500, color.warning._500];

            var barDescriptoresHemisferios = function()
            {
                var barHorizontalStackedData = {



                    datasets: [
                    {
                        label: "Hemisferio  Derecho",
                        backgroundColor: color.fusion._900,
                        data: [@json($PO_conceptual ?? 0),@json($PO_creativo ?? 0),@json($PO_metaforico ?? 0),@json($PO_imaginativo ?? 0),@json($PO_comunicador ?? 0),@json($PO_apasionado ?? 0),@json($PO_empatico ?? 0),@json($PO_capacitador ?? 0)]
                    },
                    {
                        label: "Hemisferio Izquierdo",
                        backgroundColor: color.warning._600,
                        data: [@json($PO_numerico ?? 0),@json($PO_racional ?? 0),@json($PO_resolutor ?? 0),@json($PO_deductivo ?? 0),@json($PO_directivo ?? 0),@json($PO_procedimental ?? 0),@json($PO_articulado ?? 0),@json($PO_estructurado ?? 0)]
                    }],
                    labels:
                         ["", "", "", "", "", "", "",""],
                    // labels:
                    //     ["Numérico", "Racional", "Resolutor", "Deductivo", "Directivo", "Procedimental", "Articulado","Estructurado"],
                };
                var config = {
                    type: 'horizontalBar',
                    data: barHorizontalStackedData,
                    options:
                    {
                        legend:
                        {
                            display: false,
                            labels:
                            {
                                display: true
                            }
                        },
                        scales:
                        {
                            yAxes: [
                            {

                                stacked: true,
                                gridLines:
                                {
                                    display: false,
                                    color: "#f2f2f2"
                                },
                                ticks:
                                {
                                    beginAtZero: false,
                                    fontSize: 11
                                }
                            }],
                            xAxes: [
                            {
                                display: false,
                                stacked: false,
                                gridLines:
                                {
                                    display: false,
                                    color: "#f2f2f2"
                                },
                                ticks:
                                {
                                    beginAtZero: false,
                                    fontSize: 11
                                }
                            }]
                        }
                    }
                }
                new Chart($("#barDescriptoresHemisferios > canvas").get(0).getContext("2d"), config);
            }


            var barCapaCerebral = function()
            {
                var barChartData = {
                    labels: ["",""],
                    datasets: [
                    {
                        label: "NEOCORTEX " + @json(round(($PO_NUCLEO_AZ + $PO_NUCLEO_AM),2)) + " %",
                        backgroundColor: color.warning._600,
                        borderWidth: 1,
                        data: [@json($PO_NUCLEO_AZ ?? 0),@json($PO_NUCLEO_AM ?? 0)]
                    },
                    {
                        label: "",
                        backgroundColor: color.fusion._900,
                        borderWidth: 1,
                        data: [- @json($PO_NUCLEO_VE ?? 0), - @json($PO_NUCLEO_RO ?? 0)]
                    }]

                };
                var config = {
                    type: 'bar',
                    data: barChartData,
                    options:
                    {
                        legend:
                        {
                            display: false,
                            labels:
                            {
                                display: true
                            }
                        },
                        responsive: true,
                        title:
                        {
                            display: false,
                            text: 'Capas Cerebrales'
                        },
                        scales:
                        {
                            xAxes: [
                            {
                                display: true,
                                scaleLabel:
                                {
                                    display: true,
                                    labelString: ''
                                },
                                gridLines:
                                {
                                    display: true,
                                    color: "#f2f2f2"
                                },
                                ticks:
                                {
                                    beginAtZero: true,
                                    fontSize: 20
                                }
                            }],
                            yAxes: [
                            {
                                display: true,
                                scaleLabel:
                                {
                                    display: false,
                                    labelString: 'Profit margin (approx)'
                                },
                                gridLines:
                                {
                                    display: true,
                                    color: "#f2f2f2"
                                },
                                ticks:
                                {
                                    beginAtZero: true,
                                    fontSize: 11
                                }
                            }]
                        }
                    }
                }
                new Chart($("#barCapaCerebral > canvas").get(0).getContext("2d"), config);
            }

            var donutChart3 = c3.generate(
            {
                bindto: "#donutChart3",
                data:
                {
                    // iris data from R
                    columns: [
                        ['Q', @json($PO_NUCLEO_AZ ?? '')],
                        ['U', @json($PO_NUCLEO_VE ?? '')],
                        ["A", @json($PO_NUCLEO_RO ?? '')],
                        ["D", @json($PO_NUCLEO_AM ?? '')],


                    ],
                    type: 'donut',
                    labels: true

                },
                donut:
                {
                    title: "NÚCLEO"
                },

            });




            $(document).ready(function()
            {

                //barDescriptoresHemisferios();
                //barCapaCerebral();
                //nucleo();
                circustancial();
                leyandaCircustancial();
                leyandaComparativa();
                //leyandaHemisferios();
                //leyandaCapasCerebrales();
                // flujo();
                // leyandaFlujo();
                // inteligencias();
                // leyandaInteligencias();


                if(@json($COD_AZ ?? 0) == "1" )
                    fnCod1Azul();


                if(@json($COD_AZ ?? 0) == "2" )
                   fnCod2Azul();



                if(@json($COD_AZ ?? 0) == "3" )
                    codigoChartQ3();



                if(@json($COD_VE ?? 0) == "1" )
                    fnCod1Verde();

                if(@json($COD_VE ?? 0) == "2" )
                    fnCod2Verde();

                if(@json($COD_VE ?? 0) == "3" )
                    codigoChartU3();


                if(@json($COD_RO ?? 0) == "1" )
                    fnCod1Rojo();


                if(@json($COD_RO ?? 0) == "2" )
                    fnCod2Rojo();

                if(@json($COD_RO ?? 0) == "3" )
                    codigoChartA3();


                if(@json($COD_AM ?? 0) == "1" )
                    fnCod1Amarillo();


                if(@json($COD_AM ?? 0) == "2" )
                    fnCod2Amarillo();

                if(@json($COD_AM ?? 0) == "3" )
                    codigoChartD3();


            });


            function fnCod1Azul()
            {
                    //var ctx = document.getElementById('canvas').getContext('2d');

                    var canvas = document.getElementById("cod1Azul");
                    var ctx = canvas.getContext('2d');

                    ctx.beginPath();

                    ctx.fillStyle = "#1F68AF";
                    ctx.arc(150, 150, 150 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.fillStyle = "#FFFFFF";
                    ctx.arc(150, 150, 100 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.fillStyle = "#C4C9CE";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 70, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 30, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.lineWidth=2;
                    ctx.fillStyle = '#FFFFFF';
                    ctx.beginPath();
                    ctx.arc(4, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(296, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(150, 4, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(45, 50, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(255, 50, 3, 0, Math.PI *2 , true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.strokeStyle = '#000000';
                    ctx.lineWidth=4;

                    ctx.fillStyle = '#000000';
                    ctx.beginPath();
                    ctx.moveTo(247,60);
                    ctx.lineTo(145,150);
                    ctx.lineTo(155,150);
                    ctx.lineTo(247,60);
                    ctx.fill();
                    ctx.stroke();
                    ctx.closePath();


            }

            function fnCod1Verde()
            {
                    // #2198F3
                    // #009540
                    // #f4bc00
                    // #e40439


                    var canvas = document.getElementById("cod1Verde");
                    var ctx = canvas.getContext('2d');

                    ctx.beginPath();

                    ctx.fillStyle = "#0B8F3B";
                    ctx.arc(150, 150, 150 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.fillStyle = "#FFFFFF";
                    ctx.arc(150, 150, 100 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.fillStyle = "#C4C9CE";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 70, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 30, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.lineWidth=2;
                    ctx.fillStyle = '#FFFFFF';
                    ctx.beginPath();
                    ctx.arc(4, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(296, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(150, 4, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(45, 50, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(255, 50, 3, 0, Math.PI *2 , true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.strokeStyle = '#000000';
                    ctx.lineWidth=4;

                    ctx.fillStyle = '#000000';
                    ctx.beginPath();
                    ctx.moveTo(247,60);
                    ctx.lineTo(145,150);
                    ctx.lineTo(155,150);
                    ctx.lineTo(247,60);
                    ctx.fill();
                    ctx.stroke();
                    ctx.closePath();


            }

            function fnCod1Rojo()
            {

                    var canvas = document.getElementById("cod1Rojo");
                    var ctx = canvas.getContext('2d');

                    ctx.beginPath();

                    ctx.fillStyle = "#E12C2B";
                    ctx.arc(150, 150, 150 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.fillStyle = "#FFFFFF";
                    ctx.arc(150, 150, 100 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.fillStyle = "#C4C9CE";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 70, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 30, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.lineWidth=2;
                    ctx.fillStyle = '#FFFFFF';
                    ctx.beginPath();
                    ctx.arc(4, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(296, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(150, 4, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(45, 50, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(255, 50, 3, 0, Math.PI *2 , true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.strokeStyle = '#000000';
                    ctx.lineWidth=4;

                    ctx.fillStyle = '#000000';
                    ctx.beginPath();
                    ctx.moveTo(247,60);
                    ctx.lineTo(145,150);
                    ctx.lineTo(155,150);
                    ctx.lineTo(247,60);
                    ctx.fill();
                    ctx.stroke();
                    ctx.closePath();


            }

            function fnCod1Amarillo()
            {

                    var canvas = document.getElementById("cod1Amarillo");
                    var ctx = canvas.getContext('2d');

                    ctx.beginPath();

                    ctx.fillStyle = "#F5E517";
                    ctx.arc(150, 150, 150 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.fillStyle = "#FFFFFF";
                    ctx.arc(150, 150, 100 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.fillStyle = "#C4C9CE";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 70, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 30, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.lineWidth=2;
                    ctx.fillStyle = '#FFFFFF';
                    ctx.beginPath();
                    ctx.arc(4, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(296, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(150, 4, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(45, 50, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(255, 50, 3, 0, Math.PI *2 , true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.strokeStyle = '#000000';
                    ctx.lineWidth=4;

                    ctx.fillStyle = '#000000';
                    ctx.beginPath();
                    ctx.moveTo(247,60);
                    ctx.lineTo(145,150);
                    ctx.lineTo(155,150);
                    ctx.lineTo(247,60);
                    ctx.fill();
                    ctx.stroke();
                    ctx.closePath();


            }

            function fnCod2Azul()
            {
                    //var ctx = document.getElementById('canvas').getContext('2d');

                    var canvas = document.getElementById("cod2Azul");
                    var ctx = canvas.getContext('2d');

                    ctx.beginPath();

                    ctx.fillStyle = "#1F68AF";
                    ctx.arc(150, 150, 150 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.fillStyle = "#FFFFFF";
                    ctx.arc(150, 150, 100 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.fillStyle = "#C4C9CE";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 70, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 30, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.lineWidth=2;
                    ctx.fillStyle = '#FFFFFF';
                    ctx.beginPath();
                    ctx.arc(4, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(296, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(150, 4, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(45, 50, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(255, 50, 3, 0, Math.PI *2 , true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.strokeStyle = '#000000';
                    ctx.lineWidth=4;

                    ctx.fillStyle = '#000000';
                    ctx.beginPath();
                    ctx.moveTo(150,15);
                    ctx.lineTo(145,150);
                    ctx.lineTo(155,150);
                    ctx.lineTo(150,15);
                    ctx.fill();
                    ctx.stroke();
                    ctx.closePath();


            }

            function fnCod2Verde()
            {
                    //var ctx = document.getElementById('canvas').getContext('2d');

                    var canvas = document.getElementById("cod2Verde");
                    var ctx = canvas.getContext('2d');

                    ctx.beginPath();

                    ctx.fillStyle = "#0B8F3B";
                    ctx.arc(150, 150, 150 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.fillStyle = "#FFFFFF";
                    ctx.arc(150, 150, 100 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.fillStyle = "#C4C9CE";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 70, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 30, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.lineWidth=2;
                    ctx.fillStyle = '#FFFFFF';
                    ctx.beginPath();
                    ctx.arc(4, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(296, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(150, 4, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(45, 50, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(255, 50, 3, 0, Math.PI *2 , true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.strokeStyle = '#000000';
                    ctx.lineWidth=4;

                    ctx.fillStyle = '#000000';
                    ctx.beginPath();
                    ctx.moveTo(150,15);
                    ctx.lineTo(145,150);
                    ctx.lineTo(155,150);
                    ctx.lineTo(150,15);
                    ctx.fill();
                    ctx.stroke();
                    ctx.closePath();


            }

            function fnCod2Rojo ()
            {
                    //var ctx = document.getElementById('canvas').getContext('2d');

                    var canvas = document.getElementById("cod2Rojo");
                    var ctx = canvas.getContext('2d');

                    ctx.beginPath();

                    ctx.fillStyle = "#E12C2B";
                    ctx.arc(150, 150, 150 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.fillStyle = "#FFFFFF";
                    ctx.arc(150, 150, 100 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.fillStyle = "#C4C9CE";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 70, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 30, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.lineWidth=2;
                    ctx.fillStyle = '#FFFFFF';
                    ctx.beginPath();
                    ctx.arc(4, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(296, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(150, 4, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(45, 50, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(255, 50, 3, 0, Math.PI *2 , true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.strokeStyle = '#000000';
                    ctx.lineWidth=4;

                    ctx.fillStyle = '#000000';
                    ctx.beginPath();
                    ctx.moveTo(150,15);
                    ctx.lineTo(145,150);
                    ctx.lineTo(155,150);
                    ctx.lineTo(150,15);
                    ctx.fill();
                    ctx.stroke();
                    ctx.closePath();


            }

            function fnCod2Amarillo ()
            {
                    //var ctx = document.getElementById('canvas').getContext('2d');

                    var canvas = document.getElementById("cod2Amarillo");
                    var ctx = canvas.getContext('2d');

                    ctx.beginPath();

                    ctx.fillStyle = "#F5E517";
                    ctx.arc(150, 150, 150 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.fillStyle = "#FFFFFF";
                    ctx.arc(150, 150, 100 , 0, Math.PI, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.fillStyle = "#C4C9CE";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 70, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(150, 150, 30, 0, Math.PI, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.lineWidth=2;
                    ctx.fillStyle = '#FFFFFF';
                    ctx.beginPath();
                    ctx.arc(4, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(296, 147, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(150, 4, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(45, 50, 3, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.arc(255, 50, 3, 0, Math.PI *2 , true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.strokeStyle = '#000000';
                    ctx.lineWidth=4;

                    ctx.fillStyle = '#000000';
                    ctx.beginPath();
                    ctx.moveTo(150,15);
                    ctx.lineTo(145,150);
                    ctx.lineTo(155,150);
                    ctx.lineTo(150,15);
                    ctx.fill();
                    ctx.stroke();
                    ctx.closePath();

            }

            function nucleo()
            {
                    var ctx = document.getElementById('comportamienton').getContext('2d');

                    roundedRect(ctx, 0, 0, 200, 200, 20,"#1F68AF");
                    roundedRect(ctx, 0, 200, 200, 200, 20,"#0B8F3B");
                    roundedRect(ctx, 200, 0, 200, 200, 20,"#F5E517");
                    roundedRect(ctx, 200, 200, 200, 200, 20,"#E12C2B");

                    ctx.globalAlpha = 1;
                    ctx.fillStyle = "#FFFFFF";
                    ctx.font = "bold 34px sans-serif";
                    ctx.fillText("Q",50,40);
                    ctx.fillText("D",340,40);
                    ctx.fillText("U",50,380);
                    ctx.fillText("A",340,380);

                    ctx.strokeStyle = '#FFFFFF';
                    ctx.lineWidth=1.5;

                    //EJEy
                    ctx.beginPath();
                    ctx.moveTo(200,0);
                    ctx.lineTo(200,400);
                    ctx.stroke();
                    ctx.closePath();
                    //EJE X
                    ctx.beginPath();
                    ctx.moveTo(0,200);
                    ctx.lineTo(400,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.lineWidth=0.5;

                    ctx.beginPath();
                    ctx.moveTo(0,0);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.moveTo(400,0);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.moveTo(0,400);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.moveTo(400,400);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.fillStyle = "#FFFFFF";
                    // set transparency value
                    ctx.globalAlpha = 0.1;
                    // Draw semi transparent circles
                    for (var i = 1; i < 4; i++) {
                    ctx.beginPath();
                    ctx.arc(200, 200, 66 * i, 0, Math.PI * 2, true);
                    ctx.fill();
                    }

                    ctx.globalAlpha = 1;
                    //$PT_NUCLEO_AZ
                    var ptq =  Math.sqrt(Math.pow({{ ($PT_NUCLEO_AZ *2) ?? 0}}, 2)/2);
                    var ptu =  Math.sqrt(Math.pow({{ ($PT_NUCLEO_VE *2) ?? 0}}, 2)/2);
                    var pta =  Math.sqrt(Math.pow({{ ($PT_NUCLEO_RO *2) ?? 0}}, 2)/2);
                    var ptd =  Math.sqrt(Math.pow({{ ($PT_NUCLEO_AM *2) ?? 0}}, 2)/2);
                    //alert (ptu);
                    var ptqX = 200 - ptq;
                    var ptqY = 200 - ptq;
                    var ptuX = 200 - ptu;
                    var ptuY = 200 + ptu;
                    var ptaX = 200 + pta;
                    var ptaY = 200 + pta;
                    var ptdX = 200 + ptd;
                    var ptdY = 200 - ptd;

                    //NUEVA LINEA
                    ctx.strokeStyle = '#FFFFFF';
                    ctx.lineWidth=2;
                    ctx.beginPath();
                    ctx.moveTo(ptqX,ptqY);
                    ctx.lineTo(ptuX,ptuY);
                    ctx.lineTo(ptaX,ptaY);
                    ctx.lineTo(ptdX,ptdY);
                    ctx.lineTo(ptqX,ptqY);

                    ctx.stroke();
                    ctx.closePath();
                    var pointSize = 6;
                    ctx.fillStyle = "#1c74ac";

                    ctx.beginPath(); // Punto Q
                    ctx.arc(ptqX, ptqY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();



                    ctx.fillStyle = "#009540";
                    ctx.beginPath(); // Punto U
                    ctx.arc(ptuX, ptuY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#e40439";
                    ctx.beginPath(); // Punto A
                    ctx.arc(ptaX, ptaY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#f4bc00";
                    ctx.beginPath(); // Punto D
                    ctx.arc(ptdX, ptdY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.font = "16px sans-serif";
                    ctx.fillText({{$PT_NUCLEO_AZ ?? 0}},ptqX -5 ,ptqY -5);
                    ctx.fillText({{$PT_NUCLEO_VE ?? 0}},ptuX -10 ,ptuY +10);
                    ctx.fillText({{$PT_NUCLEO_RO ?? 0}},ptaX +5 ,ptaY +5);
                    ctx.fillText({{$PT_NUCLEO_AM ?? 0}},ptdX +5 ,ptdY -5);
            }

            function roundedRect(ctx,x,y,width,height,radius,color)
            {
                ctx.beginPath();
                ctx.fillStyle = color;
                ctx.moveTo(x,y+radius);
                ctx.lineTo(x,y+height-radius);
                ctx.quadraticCurveTo(x,y+height,x+radius,y+height);
                ctx.lineTo(x+width-radius,y+height);
                ctx.quadraticCurveTo(x+width,y+height,x+width,y+height-radius);
                ctx.lineTo(x+width,y+radius);
                ctx.quadraticCurveTo(x+width,y,x+width-radius,y);
                ctx.lineTo(x+radius,y);
                ctx.quadraticCurveTo(x,y,x,y+radius);
                ctx.fill();
                //ctx.stroke();
            }

            function circustancial()
            {
                    var ctx = document.getElementById('comportamientoc').getContext('2d');

                    roundedRect(ctx, 0, 0, 200, 200, 20,"#1F68AF");
                    roundedRect(ctx, 0, 200, 200, 200, 20,"#0B8F3B");
                    roundedRect(ctx, 200, 0, 200, 200, 20,"#F5E517");
                    roundedRect(ctx, 200, 200, 200, 200, 20,"#E12C2B");



                    ctx.globalAlpha = 1;
                    ctx.fillStyle = "#FFFFFF";
                    ctx.font = "bold 34px sans-serif";
                    ctx.fillText("Q",50,40);
                    ctx.fillText("D",340,40);
                    ctx.fillText("U",50,380);
                    ctx.fillText("A",340,380);

                    ctx.strokeStyle = '#FFFFFF';
                    ctx.lineWidth=1.5;

                    //EJEy
                    ctx.beginPath();
                    ctx.moveTo(200,0);
                    ctx.lineTo(200,400);
                    ctx.stroke();
                    ctx.closePath();
                    //EJE X
                    ctx.beginPath();
                    ctx.moveTo(0,200);
                    ctx.lineTo(400,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.lineWidth=0.5;

                    ctx.beginPath();
                    ctx.moveTo(0,0);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.moveTo(400,0);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.moveTo(0,400);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.moveTo(400,400);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.fillStyle = "#FFFFFF";
                    // set transparency value
                    ctx.globalAlpha = 0.1;
                    // Draw semi transparent circles
                    for (var i = 1; i < 4; i++) {
                    ctx.beginPath();
                    ctx.arc(200, 200, 66 * i, 0, Math.PI * 2, true);
                    ctx.fill();
                    }

                    ctx.globalAlpha = 1;
                    //PT_CIRCUN_AZ

                    var ptq =  Math.sqrt(Math.pow({{ ($PT_NUCLEO_AZ * 2) ?? 0}}, 2)/2);
                    var ptu =  Math.sqrt(Math.pow({{ ($PT_NUCLEO_VE * 2) ?? 0}}, 2)/2);
                    var pta =  Math.sqrt(Math.pow({{ ($PT_NUCLEO_RO * 2) ?? 0}}, 2)/2);
                    var ptd =  Math.sqrt(Math.pow({{ ($PT_NUCLEO_AM * 2) ?? 0}}, 2)/2);

                    var ptqc =  Math.sqrt(Math.pow({{ ($PT_CIRCUN_AZ * 2) ?? 0}}, 2)/2);
                    var ptuc =  Math.sqrt(Math.pow({{ ($PT_CIRCUN_VE * 2) ?? 0}}, 2)/2);
                    var ptac =  Math.sqrt(Math.pow({{ ($PT_CIRCUN_RO * 2) ?? 0}}, 2)/2);
                    var ptdc =  Math.sqrt(Math.pow({{ ($PT_CIRCUN_AM * 2) ?? 0}}, 2)/2);

                    //nucleo
                    var ptqX = 200 - ptq;
                    var ptqY = 200 - ptq;
                    var ptuX = 200 - ptu;
                    var ptuY = 200 + ptu;
                    var ptaX = 200 + pta;
                    var ptaY = 200 + pta;
                    var ptdX = 200 + ptd;
                    var ptdY = 200 - ptd;

                    //circustancial
                    var ptqcX = 200 - ptqc;
                    var ptqcY = 200 - ptqc;
                    var ptucX = 200 - ptuc;
                    var ptucY = 200 + ptuc;
                    var ptacX = 200 + ptac;
                    var ptacY = 200 + ptac;
                    var ptdcX = 200 + ptdc;
                    var ptdcY = 200 - ptdc;

                    //nucleo
                    ctx.strokeStyle = '#FFFFFF';
                    ctx.lineWidth=3;
                    ctx.beginPath();
                    ctx.moveTo(ptqX,ptqY);
                    ctx.lineTo(ptuX,ptuY);
                    ctx.lineTo(ptaX,ptaY);
                    ctx.lineTo(ptdX,ptdY);
                    ctx.lineTo(ptqX,ptqY);

                    ctx.stroke();
                    ctx.closePath();
                    var pointSize = 6;

                    ctx.fillStyle = "#1c74ac";
                    ctx.beginPath(); // Punto Q
                    ctx.arc(ptqX, ptqY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.fillStyle = "#009540";
                    ctx.beginPath(); // Punto U
                    ctx.arc(ptuX, ptuY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#e40439";
                    ctx.beginPath(); // Punto A
                    ctx.arc(ptaX, ptaY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#f4bc00";
                    ctx.beginPath(); // Punto D
                    ctx.arc(ptdX, ptdY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    //circustancial
                    ctx.strokeStyle = '#FFFFFF';
                    ctx.lineWidth=2;
                    ctx.setLineDash([6, 3]);
                    ctx.beginPath();
                    ctx.moveTo(ptqcX,ptqcY);
                    ctx.lineTo(ptucX,ptucY);
                    ctx.lineTo(ptacX,ptacY);
                    ctx.lineTo(ptdcX,ptdcY);
                    ctx.lineTo(ptqcX,ptqcY);

                    ctx.stroke();
                    ctx.closePath();
                    var pointSize = 4;

                    ctx.fillStyle = "#1c74ac";
                    ctx.beginPath(); // Punto Q
                    ctx.arc(ptqcX, ptqcY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();

                    ctx.fillStyle = "#009540";
                    ctx.beginPath(); // Punto U
                    ctx.arc(ptucX, ptucY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#e40439";
                    ctx.beginPath(); // Punto A
                    ctx.arc(ptacX, ptacY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#f4bc00";
                    ctx.beginPath(); // Punto D
                    ctx.arc(ptdcX, ptdcY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.font = "16px sans-serif";
                    ctx.fillText({{$PT_NUCLEO_AZ ?? 0}},ptqX -10 ,ptqY -10);
                    ctx.fillText({{$PT_NUCLEO_VE ?? 0}},ptuX -15 ,ptuY -10);
                    ctx.fillText({{$PT_NUCLEO_RO ?? 0}},ptaX -5 ,ptaY - 5);
                    ctx.fillText({{$PT_NUCLEO_AM ?? 0}},ptdX -15 ,ptdY);

                    ctx.fillStyle = "#000000";
                    ctx.font = "12px sans-serif";
                    ctx.fillText({{$PT_CIRCUN_AZ ?? 0}},ptqcX -5 ,ptqcY  - 5);
                    ctx.fillText({{$PT_CIRCUN_VE ?? 0}},ptucX +15 ,ptucY +10);
                    ctx.fillText({{$PT_CIRCUN_RO ?? 0}},ptacX + 15 ,ptacY +5);
                    ctx.fillText({{$PT_CIRCUN_AM ?? 0}},ptdcX - 5 ,ptdcY + 10);

            }

            function leyandaCircustancial()
            {
                var ctx = document.getElementById('leyendacomportamientoc').getContext('2d');

                    ctx.strokeStyle = '#000000';
                    ctx.lineWidth=4;
                    ctx.beginPath();
                    ctx.moveTo(50,30);
                    ctx.lineTo(150,30);
                    ctx.stroke();
                    ctx.closePath();
                    //circustancial
                    ctx.lineWidth=2;
                    ctx.setLineDash([6, 3]);
                    ctx.beginPath();
                    ctx.moveTo(250,30);
                    ctx.lineTo(350,30);
                    ctx.stroke();
                    ctx.closePath();
                    ctx.font = "bold 12px sans-serif";
                    ctx.fillText("Postulante",80,20);
                    ctx.font = "bold 12px sans-serif";
                    ctx.fillText("    Cargo",260,20);
            }

            function leyandaComparativa()
            {
                var ctx = document.getElementById('leyendacomparativa').getContext('2d');


                    ctx.fillStyle = '#1F68AF';
                    ctx.fillRect(65, 14, 15, 15);
                    ctx.fillStyle = '#F5E517';
                    ctx.fillRect(85, 14, 15, 15);
                    ctx.fillStyle = '#0B8F3B';
                    ctx.fillRect(105, 14, 15, 15);
                    ctx.fillStyle = '#E12C2B';
                    ctx.fillRect(125, 14, 15, 15);


                    ctx.fillStyle = '#6D97CD';
                    ctx.fillRect(265, 14, 15, 15);
                    ctx.fillStyle = '#F4BD0E';
                    ctx.fillRect(285, 14, 15, 15);
                    ctx.fillStyle = '#A9A45C';
                    ctx.fillRect(305, 14, 15, 15);
                    ctx.fillStyle = '#EF7855';
                    ctx.fillRect(325, 14, 15, 15);


            }


            function leyandaHemisferios()
            {
                var ctx = document.getElementById('leyandahemisferios').getContext('2d');

                    ctx.fillStyle = color.warning._600
                    ctx.fillRect(50, 15, 15, 15);

                    ctx.fillStyle = color.fusion._900
                    ctx.fillRect(280, 15, 15, 15);


                    ctx.fillStyle = '#000000';
                    ctx.font = "bold 10px sans-serif";
                    ctx.fillText("H. IZQUIERDO " + @json(round(($HEM_IZQUIERO),2)) + " %",70,25);
                    ctx.fillText("H. DERECHO " + @json(round(($HEM_DERECHO),2)) + " %",300,25);

            }

            function leyandaCapasCerebrales()
            {
                    var ctx = document.getElementById('leyandacapascerebrales').getContext('2d');

                    //ctx.fillStyle = '#0a70bd';
                    ctx.fillStyle = color.warning._600
                    ctx.fillRect(20, 20, 15, 15);

                    //ctx.fillStyle = '#6abaf7';
                    ctx.fillStyle = color.fusion._900
                    ctx.fillRect(200, 20, 15, 15);

                    ctx.fillStyle = '#000000';
                    ctx.font = "bold 10px sans-serif";

                    // ctx.fillText("NEOCORTEX " + @json(round(($PO_NUCLEO_AZ + $PO_NUCLEO_AM),2)) + " %",40,30);
                    // ctx.fillText("LÍMBICA " + @json(round(($PO_NUCLEO_VE + $PO_NUCLEO_RO),2)) + " %",220,30);

                    ctx.fillText("NEOCORTEX " + @json($NEOCORTEX) + " %",40,30);
                    ctx.fillText("LÍMBICA " + @json($LIMBICA) + " %",220,30);
            }

            var inteligencias = function()
            {
                var config = {
                    type: 'polarArea',
                    data:
                    {
                        datasets: [
                        {
                            data: [
                                {{ round($INT_ESTRATEGI,2) }},
                                {{ round($INT_CREATIVO,2) }},
                                {{ round($INT_INTERPERS,2) }},
                                {{ round($INT_INTRAPERS,2) }},
                                {{ round($INT_ORGANIZAD,2) }},
                                {{ round($INT_SECUENCIA,2) }},
                                {{ round($INT_TECNICO,2) }},
                                {{ round($INT_RESOLUTOR,2) }},




                            ],

                            backgroundColor: [
                                '#F4BD0E',
                                '#F5E517',

                                '#E12C2B',
                                '#EF7855',


                                '#A9A45C',
                                '#0B8F3B',

                                '#6D97CD',
                                '#1F68AF',

                            ],
                            label: 'My dataset' // for legend
                        }],
                        labels: [
                            "Estratega",
                            "Creativo",
                            "Interpersonal",
                            "Intrapersonal",
                            "Organizado",
                            "Secuencial",
                            "Técnico",
                            "Resolutor"
                        ]
                    },
                    options:
                    {
                        responsive: true,
                        tooltips: false,
                        plugins: {
                            datalabels: {
                                formatter: function(value, context) {
                                    return context.chart.data.labels[context.value];
                                }
                            }
                        },
                        legend:
                        {
                            labels: {
                                padding: 1,
                                fontSize: 10,
                                lineHeight: 10,
                                },
                            display: false,
                            position: 'left',
                        }
                    }
                };
                new Chart($("#inteligencias > canvas").get(0).getContext("2d"), config);
            }



            function leyandaInteligencias()
            {
                var ctx = document.getElementById('leyendainteligencias').getContext('2d');

                    ctx.fillStyle = '#000000';
                    ctx.font = "bold 12px sans-serif";

                    ctx.fillStyle = '#1F68AF';
                    ctx.fillRect(5, 5, 15, 15);
                    ctx.fillStyle = '#0B8F3B';
                    ctx.fillRect(5, 25, 15, 15);
                    ctx.fillStyle = '#EF7855';
                    ctx.fillRect(5, 45, 15, 15);
                    ctx.fillStyle = '#F5E517';
                    ctx.fillRect(5, 65, 15, 15);

                    ctx.fillStyle = '#6D97CD';
                    ctx.fillRect(200, 5, 15, 15);
                    ctx.fillStyle = '#A9A45C';
                    ctx.fillRect(200, 25, 15, 15);
                    ctx.fillStyle = '#E12C2B';
                    ctx.fillRect(200, 45, 15, 15);
                    ctx.fillStyle = '#F4BD0E';
                    ctx.fillRect(200, 65, 15, 15);



                    ctx.fillStyle = '#000000';
                    ctx.font = "bold 10px sans-serif";

                    //1
                    ctx.fillText("RESOLUTOR",25,15);
                    ctx.fillText({{ round($INT_TECNICO,2) }} ,320,15);
                    ctx.fillText(" %",150,15);

                    ctx.fillText("TECNICO",220,15);
                    ctx.fillText({{ round($INT_RESOLUTOR,2) }} ,125,15);
                    ctx.fillText(" %",345,15);
                    // 2
                    ctx.fillText("SECUENCIAL",25,35);
                    ctx.fillText({{ round($INT_ORGANIZAD,2) }} ,320,35);
                    ctx.fillText(" %",150,35);

                    ctx.fillText("ORGANIZADO",220,35);
                    ctx.fillText({{ round($INT_SECUENCIA,2) }} ,125,35);
                    ctx.fillText(" %",345,35);

                    //3
                    ctx.fillText("INTRAPERSONAL",25,55);
                    ctx.fillText({{ round($INT_INTERPERS,2) }} ,320,55);
                    ctx.fillText(" %",150,55);

                    ctx.fillText("INTERPERSONAL",220,55);
                    ctx.fillText({{ round($INT_INTRAPERS,2) }} ,125,55);
                    ctx.fillText(" %",345,55);

                    //4
                    ctx.fillText("CREATIVO",25,75);
                    ctx.fillText({{ round($INT_ESTRATEGI,2) }} ,320,75);
                    ctx.fillText(" %",150,75);

                    ctx.fillText("ESTRATEGA",220,75);
                    ctx.fillText({{ round($INT_CREATIVO,2) }} ,125,75);
                    ctx.fillText(" %",345,75);

            }

            function leyandaFlujo()
            {
                var ctx = document.getElementById('flujoLeyenda').getContext('2d');

                    ctx.fillStyle = '#000000';

                    ctx.font = "bold 12px sans-serif";
                    ctx.fillText("Inicio",70,20);

                    var pointSize = 5;
                    ctx.fillStyle = "#000000";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(60,15, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = '#000000';
                    ctx.font = "bold 12px sans-serif";
                    ctx.fillText("Fin",230,20);

                    var pointSize = 10;
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc(215, 15, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();




            }

            function flujo()
            {
                    var ctx = document.getElementById('flujoPensamiento').getContext('2d');
                    roundedRect(ctx, 0, 0, 150, 150, 10,"#1F68AF");
                    roundedRect(ctx, 0, 150, 150, 150, 10,"#0B8F3B");
                    roundedRect(ctx, 150, 0, 150, 150, 10,"#F5E517");
                    roundedRect(ctx, 150, 150, 150, 150, 10,"#E12C2B");
                    ctx.strokeStyle = '#000000';
                    ctx.lineWidth=2;

                    //NUEVA LINEA
                    ctx.lineWidth=5;
                    ctx.strokeStyle = '#E9EFF3';
                    ctx.lineWidth=3;
                    ctx.beginPath();
                    ctx.moveTo(@json($P1X ?? 0),@json($P1Y ?? 0));
                    ctx.lineTo(@json($P2X ?? 0),@json($P2Y ?? 0));
                    ctx.lineTo(@json($P3X ?? 0),@json($P3Y ?? 0));
                    ctx.lineTo(@json($P4X ?? 0),@json($P4Y ?? 0));
                    ctx.stroke();
                    ctx.closePath();

                    var pointSize = 10;
                    ctx.fillStyle = "#000000";
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc({{ $P1X ?? 0 }}, {{ $P1Y ?? 0 }}, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    var pointSize = 5;
                    ctx.beginPath(); // Iniciar trazo
                    ctx.arc({{ $P4X ?? 0 }}, {{ $P4Y ?? 0 }}, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    //ctx.fillRect({{ ($P4X - 10) ?? 0 }}, {{ ($P4Y - 10) ?? 0 }}, 20,20);

                    ctx.globalAlpha = 0.3;
                    ctx.fillStyle = "#FFFFFF";
                    ctx.font = "bold 74px sans-serif";
                    ctx.fillText("Q",45,95);
                    ctx.fillText("D",200,95);
                    ctx.fillText("U",45,245);
                    ctx.fillText("A",200,245);


            }

            function drawNeedle(radius, radianAngle)
            {

                //var ctx = document.getElementById('flecha1').getContext('2d');

                var canvas = document.getElementById("flecha1");
                var ctx = canvas.getContext('2d');
                var cw = canvas.offsetWidth;
                var ch = canvas.offsetHeight;
                var cx = cw / 2;
                var cy = ch - (ch / 4);

                ctx.translate(cx, cy);
                ctx.rotate(radianAngle);
                ctx.beginPath();
                ctx.moveTo(0, -5);
                ctx.lineTo(radius, 0);
                ctx.lineTo(0, 5);
                ctx.fillStyle = 'rgba(0, 76, 0, 0.8)';
                ctx.fill();
                ctx.rotate(-radianAngle);
                ctx.translate(-cx, -cy);
                ctx.beginPath();
                ctx.arc(cx, cy, 7, 0, Math.PI * 2);
                ctx.fill();
            }

            var codigoChartQ3 = function()
            {
                new Chartist.Pie('#codigoChartQ3',
                {
                    series: [25,0,0,0,75]
                },
                {
                    donut: true,
                    donutWidth: 50,
                    donutSolid: true,
                    startAngle: 270,
                    total: 200,
                    showLabel: false
                });
            }

            var codigoChartU2 = function()
            {
                new Chartist.Pie('#codigoChartU2',
                {
                    series: [0,50,0,0,50]
                },
                {
                    donut: true,
                    donutWidth: 50,
                    donutSolid: true,
                    startAngle: 270,
                    total: 200,
                    showLabel: false
                });
            }

            var codigoChartU3 = function()
            {
                new Chartist.Pie('#codigoChartU3',
                {
                    series: [0,25,0,0,75]
                },
                {
                    donut: true,
                    donutWidth: 50,
                    donutSolid: true,
                    startAngle: 270,
                    total: 200,
                    showLabel: false
                });
            }

            var codigoChartA3 = function()
            {
                new Chartist.Pie('#codigoChartA3',
                {
                    series: [0,0,25,0,75]
                },
                {
                    donut: true,
                    donutWidth: 50,
                    donutSolid: true,
                    startAngle: 270,
                    total: 200,
                    showLabel: false
                });
            }

            var codigoChartD3 = function()
            {
                new Chartist.Pie('#codigoChartD3',
                {
                    series: [0,0,0,25,75]
                },
                {
                    donut: true,
                    donutWidth: 50,
                    donutSolid: true,
                    startAngle: 270,
                    total: 200,
                    showLabel: false
                });
            }

            $(window).on('beforeunload', function(){
        $('#pageLoader').show();
    });

    $(function () {
        $('#pageLoader').hide();
    })


</script>

@stop

