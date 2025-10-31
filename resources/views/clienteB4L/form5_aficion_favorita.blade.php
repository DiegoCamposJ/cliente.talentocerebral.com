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
                        AFICIÓN FAVORITA
                    </h2>
                </div>
                <div class="col-sm-6 text-right">
                    {{ 45 - $trasncurrido ?? '' }} &nbsp; Minutos Restantes
                </div>
            </div>

            <div class="panel-container show">
                <div class="panel-content">
                    <span class="text-justify">
                        Del total de Aficiones o Hobibies seleccione en el que participa con mayor frecuencia.
                    </span>
                    <br><br>

                    <br>

                    <table class="table table-sm m-0">
                        <thead class="bg-primary-900">
                            <th class="text-center">Adjetivos</th>
                            <th class="text-center">Seleccionar</th>
                        </thead>
                        <tbody>
                            @foreach($preguntas as $pregunta)
                            <tr>
                                <td class="text-justify fs-xl" style="width: 50%"> <strong>{{$pregunta->descripcion}}</strong></td>

                                    <td class="text-center">
                                        {{ link_to_action('EvaluacionController@guardarAficionFavorita', $title = 'OK', $parameters = [3,$pregunta->slug], $attributes = ['class' => 'btn btn-primary btn-lg btn-icon rounded-circle waves-effect waves-themed']) }}
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

<script>
    $(window).on('beforeunload', function(){
        
        $('#pageLoader').show();

    });

    $(function () {

        $('#pageLoader').hide();
    })
</script>

@stop



