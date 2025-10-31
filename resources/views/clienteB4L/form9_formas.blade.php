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
                        FORMA DE ESCRITURA
                    </h2>
                </div>
                <div class="col-sm-6 text-right">
                    {{ 45 - $trasncurrido ?? '' }} &nbsp; Minutos Restantes
                </div>
            </div>

            <div class="panel-container show">
                <div class="panel-content">
                    <span class="text-justify">
                        Elija la forma como usted escribe tomando en cuenta la mano y la forma de inclinar el lapicero.
                    </span>
                    <br><br>


                    <table class="table table-sm m-0">
                        <thead class="bg-primary-900">
                            <th class="text-center">Forma</th>
                            <th class="text-center">Opción</th>
                        </thead>
                        <tbody>
                            @foreach($preguntas as $pregunta)
                            <tr>
                                <td class="text-justify">
                                        <img src="{{ asset('img/quad/'.$pregunta->descripcion) }}" style=" display: block;margin-left: auto;margin-right: auto;width: 40%;">
                                </td>
                                <td class="text-center">
                                    <br>
                                    {{ link_to_action('EvaluacionController@guardarForma', $title = 'Seleccionar', $parameters = [1,$pregunta->slug,$pregunta->pareja], $attributes = ['class' => 'btn btn-primary waves-effect waves-themed']) }}
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



