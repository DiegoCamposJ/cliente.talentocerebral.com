@extends('layouts.app')

@section('title', 'Evaluación')
@section('content')
@include('alerts.danger')
@include('alerts.errors')


<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <div class="col-sm-6">
                    <h2>
                        PROFESIONES FAVORITAS {{$cntProfesiones}} /4
                    </h2>
                </div>
                <div class="col-sm-6 text-right">
                    {{ 55 - $trasncurrido ?? '' }} &nbsp; Minutos Restantes
                </div>
            </div>

            <div class="panel-container show">
                <div class="panel-content">
                    <span class="text-justify">
                        Entre la siguiente lista de profesiones, seleccione las 4 que mas te indentifique.
                    </span>
                    <br><br>
                    <br>
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead class="bg-primary-900">
                            <th class="text-center">Profesión</th>
                            <th class="text-center">Seleccionar</th>
                        </thead>
                        <tbody>
                            @foreach($profesiones as $profesion)
                            <tr>
                                <td class="text-justify fs-xl" style="width: 50%"> <strong>{{$profesion->descripcion}}</strong></td>

                                    <td class="text-center">
                                        {{ link_to_action('EvaluacionController@guardarProfesion', $title = 'Seleccionar', $parameters = [$slugEvaluacion,$profesion->id], $attributes = ['class' => 'btn btn-primary waves-effect waves-themed']) }}
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
    </div>
</div>

@stop

@section('scripts')
<script src="{{ asset('js/datagrid/datatables/datatables.bundle.js')}}"></script>

<script>
    $(window).on('beforeunload', function(){
        $('#pageLoader').show();
    });

    $(function () {
        $('#pageLoader').hide();
    })

    $(document).ready(function()
    {
        $('#dt-basic-example').dataTable(
        {
            responsive: true
        });

        $('.js-thead-colors a').on('click', function()
        {
            var theadColor = $(this).attr("data-bg");
            console.log(theadColor);
            $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
        });

        $('.js-tbody-colors a').on('click', function()
        {
            var theadColor = $(this).attr("data-bg");
            console.log(theadColor);
            $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
        });

    });



</script>

@stop


