@extends('layouts.app')

@section('title', 'Evaluación')
@section('content')



<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <div class="col-sm-6">
                    <h2>
                        ACTIVIDADES LABORALES PARA EL CARGO
                    </h2>
                </div>
                <div class="col-sm-6 text-right">
                    {{ 45 - $trasncurrido ?? '' }} &nbsp; Minutos Restantes
                </div>
            </div>

            <div class="panel-container show">
                <div class="panel-content">
                    <span class="text-justify">
                        Asigne una calificación del 1 al 5, siendo 5 la puntuación más alta por ende la tarea de mayor preferencia y 1 la que menos interés le genere por realizar en el trabajo.
                    </span>
                    <br><br>
                    <span class="text-justify">
                        <strong>Nota: Por favor, no use ninguna calificación (1,2,3,4,5) más de cuatro veces al calificar, aunque la selección sea difícil, ya que esta selección proporciona datos importantes.</strong>
                    </span>
                    <br>

                    <table class="table table-sm m-0">
                        <thead class="bg-primary-900">
                            <th class="text-center">Actividades</th>
                            <th class="text-center">Puntuación</th>
                        </thead>
                        <tbody>
                            @foreach($preguntas as $pregunta)
                            <tr>
                                <td class="text-justify fs-xl" style="width: 50%">
                                    <strong>{{$pregunta->descripcion}}</strong>
                                </td>
                                <td class="text-center">
                                    {{ link_to_action('EvaluacionB4LController@guardarPreguntaLaboralB4L', $title = '1', $parameters = [1,$pregunta->slug], $attributes = ['class' => 'btn btn-primary btn-lg btn-icon rounded-circle waves-effect waves-themed']) }}
                                    {{ link_to_action('EvaluacionB4LController@guardarPreguntaLaboralB4L', $title = '2', $parameters = [2,$pregunta->slug], $attributes = ['class' => 'btn btn-primary btn-lg btn-icon rounded-circle waves-effect waves-themed']) }}
                                    {{ link_to_action('EvaluacionB4LController@guardarPreguntaLaboralB4L', $title = '3', $parameters = [3,$pregunta->slug], $attributes = ['class' => 'btn btn-primary btn-lg btn-icon rounded-circle waves-effect waves-themed']) }}
                                    {{ link_to_action('EvaluacionB4LController@guardarPreguntaLaboralB4L', $title = '4', $parameters = [4,$pregunta->slug], $attributes = ['class' => 'btn btn-primary btn-lg btn-icon rounded-circle waves-effect waves-themed']) }}
                                    {{ link_to_action('EvaluacionB4LController@guardarPreguntaLaboralB4L', $title = '5', $parameters = [5,$pregunta->slug], $attributes = ['class' => 'btn btn-primary btn-lg btn-icon rounded-circle waves-effect waves-themed']) }}
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


