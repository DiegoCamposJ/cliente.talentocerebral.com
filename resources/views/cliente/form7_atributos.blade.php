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
                        PARES DE ATRIBUTOS
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
                    A continuación encontrará un listado de adjetivos en formato de pares comparativos, es decir uno frente al otro. Usted debe leer detenidamente ambos y seleccionar el que más le represente, habrán instancias en las que ninguno o ambos le representen, más la instrucción específica que le solicita cumplir este cuestionario es que seleccione siempre al menos uno, por mínimo que sea el nivel de importancia o diferencia.
                    </span>
                    <br><br>

                    <table class="table table-sm m-0">
                        <thead class="bg-primary-900">
                            <th class="text-center">Adjetivos</th>
                            <th class="text-center">Adjetivos</th>

                        </thead>
                        <tbody>


                                @for ($i = 0; $i < $nPreguntas; $i++)
                                <tr>
                                    <td class="text-center">
                                        {{ link_to_action('EvaluacionController@guardarAtributo', $title = $preguntas[ ($i*2)]->descripcion, $parameters = [1,$preguntas[($i*2)]->slug,$preguntas[($i*2)]->pareja], $attributes = ['class' => 'btn btn-primary waves-effect waves-themed']) }}
                                    </td>

                                    <td class="text-center">
                                        {{ link_to_action('EvaluacionController@guardarAtributo', $title = $preguntas[($i*2)+1]->descripcion, $parameters = [1,$preguntas[($i*2)+1]->slug,$preguntas[($i*2)+1]->pareja], $attributes = ['class' => 'btn btn-primary waves-effect waves-themed']) }}
                                    </td>
                                </tr>
                                @endfor

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


