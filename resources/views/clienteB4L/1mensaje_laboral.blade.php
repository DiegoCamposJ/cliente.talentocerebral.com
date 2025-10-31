@extends('layouts.app')
@section('title', 'Evaluación')
@section('content')

<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    CEREBRO 360
                </h2>
            </div>

            <div class="panel-container show">
                <div class="panel-content">

                 <span>
                     <strong>
                        A continuación encontrará una lista de 16 actividades, a cada una de ellas favor asígneles una calificación del 1 al 5, siendo 5 la puntuación más alta por ende la tarea de mayor preferencia y 1 la que menos impacto genere para el cargo .  <br><br>

                        <strong>Nota: Por favor, no use ninguna calificación (1,2,3,4,5) más de cuatro veces al calificar, aunque la selección sea difícil, ya que esta selección proporciona datos importantes.</strong> <br><br>

                     </strong>
                 </span>
                 <br><br>
                 <div class="text-center">                    
                    {{ link_to_action('EvaluacionB4LController@preguntasEvaluacionB4L', $title = 'Aceptar', $parameters = [$slugEvaluacion], $attributes = ['class' => 'btn btn-secondary waves-effect waves-themed']) }}
                </div>


                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
    </div>
</div>

@stop@stop

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

