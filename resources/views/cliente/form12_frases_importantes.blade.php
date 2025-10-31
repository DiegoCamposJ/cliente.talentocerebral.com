@extends('layouts.app')

@section('title', 'Evaluación')
@section('content')
    @include('alerts.danger')
    @include('alerts.errors')

    <div class="row">
        <div class="col-sm-12">
            @if($selecionados == 8)
                <div class="form-group text-center">
                    {{ link_to_route('evaluacion.show', $title = 'Continuar', $parameters = [$evaluacion_slug], $attributes = ['class' => 'btn btn-sm btn-primary btn-lg waves-effect waves-themed']) }}
                </div>
            @endif
        </div>
    </div>
<br>
    <div class="row">

        <div class="col-sm-6">
            <div id="panel-2" class="panel">
                <div class="panel-hdr">
                    <div class="col-sm-6">
                        <h1>
                            LAS 32 FRASES
                        </h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        {{ 45 - $trasncurrido ?? '' }} &nbsp; Minutos Restantes <br>

                    </div>
                </div>

                <div class="panel-container show">
                    <div class="panel-content">
                        <span class="text-justify">
                            Entre la siguiente lista de frases, seleccione los 8 que mejor describan su personalidad.
                        </span>
                        <br><br><br>

                        <table class="table table-sm m-0">
                            <thead class="bg-primary-900">
                                <th class="text-center">Frases</th>
                                <th class="text-center">Seleccionar</th>
                            </thead>
                            <tbody>
                                @foreach($preguntas as $pregunta)
                                <tr>
                                    <td class="text-justify fs-xl" style="width: 80%"> <strong>{{$pregunta->descripcion}}</strong></td>

                                    <td class="text-center">
                                        @if($selecionados < 8)
                                            <a href="{{ action('EvaluacionController@guardarFrases', [3, $pregunta->slug]) }}" class="btn btn-primary btn-lg btn-icon rounded-circle waves-effect waves-themed">
                                                <i class="fal fa-arrow-alt-right"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="panel-2" class="panel">
                <div class="panel-hdr">
                    <div class="col-sm-6">
                        <h2>
                            FRASES FAVORITAS &nbsp; <strong>{{ $selecionados }}/8</strong>
                        </h2>

                    </div>
                    <div class="col-sm-6 text-right">
                        {{ link_to_route('evaluacion.show', $title = 'Leer Instrucciones', $parameters = [$evaluacion_slug], $attributes = ['class' => 'btn btn-xs btn-warning waves-effect waves-themed']) }}
                        &nbsp; &nbsp;
                        &nbsp; &nbsp;
                        <a href="{{ asset('ins/glosario.pdf') }}" class="btn btn-xs btn-info waves-effect waves-themed" download> Glosario de Términos</a>
                    </div>
                </div>

                <div class="panel-container show">
                    <div class="panel-content">
                        <span class="text-justify">
                            Entre la siguiente lista de frases, seleccione los 8 que mejor describan su personalidad.
                        </span>
                        <br><br>

                        <br>

                        <table class="table table-sm m-0">
                            <thead class="bg-primary-900">
                                <th class="text-center">Frases Favoritas</th>
                                <th class="text-center">Seleccionar</th>
                            </thead>
                            <tbody>
                                @foreach($preguntasSeleccionadas as $preguntaSelec)
                                <tr>
                                    <td class="text-justify fs-xl" style="width: 80%"> <strong>{{$preguntaSelec->descripcion}}</strong></td>
                                        <td class="text-center">
                                            <a href="{{ action('EvaluacionController@retornarFrase', [3, $preguntaSelec->slug]) }}" class="btn btn-primary btn-lg btn-icon rounded-circle waves-effect waves-themed">
                                                <i class="fal fa-arrow-alt-left"></i>
                                            </a>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
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


