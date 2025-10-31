@extends('layouts.app')

@section('title', 'Evaluación')
@section('content')
@include('alerts.danger')
@include('alerts.errors')


<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <div class="col-sm-6">
                    <h2>
                        PREGUNTAS
                    </h2>
                </div>
                <div class="col-sm-6 text-right">
                    {{ 45 - $trasncurrido ?? '' }} &nbsp; Minutos Restantes <br>
                    {{ link_to_route('evaluacion.show', $title = 'Leer Instrucciones', $parameters = [$evaluacion_slug], $attributes = ['class' => 'btn btn-xs btn-warning waves-effect waves-themed']) }}
                    &nbsp; &nbsp;
                    &nbsp; &nbsp;
                    <a href="{{ asset('ins/glosario.pdf') }}" class="btn btn-xs btn-info waves-effect waves-themed" download> Glosario de Términos</a>
                </div>
            </div>

            <div class="panel-container show">
                <div class="panel-content">
                    <span class="text-justify">
                        Conteste cada una de las siguientes preguntas, seleccionando la opción más adecuada según su preferencia.
                    </span>
                    <br><br>


                    <table class="table table-sm m-0">
                        <thead class="bg-primary-900">
                            <th class="text-center">Pregunta</th>
                        </thead>
                        <tbody>
                            @foreach($preguntas as $pregunta)
                            <tr>
                                <td class="text-justify fs-xl">
                                    <strong>{{$pregunta->descripcion}}</strong>
                                    <br>
                                    <div class="text-justify">
                                        {{ link_to_action('EvaluacionController@guardarPregunta', $title = 'Muy de Acuerdo', $parameters = [1,$pregunta->slug], $attributes = ['class' => 'btn btn-primary waves-effect waves-themed']) }}
                                        {{ link_to_action('EvaluacionController@guardarPregunta', $title = 'De Acuerdo', $parameters = [2,$pregunta->slug], $attributes = ['class' => 'btn btn-primary waves-effect waves-themed']) }}
                                        {{ link_to_action('EvaluacionController@guardarPregunta', $title = 'Neutral', $parameters = [3,$pregunta->slug], $attributes = ['class' => 'btn btn-primary waves-effect waves-themed']) }}
                                        {{ link_to_action('EvaluacionController@guardarPregunta', $title = 'En desacuerdo', $parameters = [4,$pregunta->slug], $attributes = ['class' => 'btn btn-primary waves-effect waves-themed']) }}
                                        {{ link_to_action('EvaluacionController@guardarPregunta', $title = 'Muy en desacuerdo', $parameters = [5,$pregunta->slug], $attributes = ['class' => 'btn btn-primary waves-effect waves-themed']) }}
                                    </div>


                                    <br><br>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
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


