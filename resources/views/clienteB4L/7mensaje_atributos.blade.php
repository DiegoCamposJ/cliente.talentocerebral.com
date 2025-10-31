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
                     A continuación encontrará un listado de adjetivos en formato de pares comparativos, es decir uno frente al otro. Usted debe leer detenidamente ambos y seleccionar el que más le represente, habrán instancias en las que ninguno o ambos le representen, más la instrucción específica que le solicita cumplir este cuestionario es que seleccione siempre al menos uno, por mínimo que sea el nivel de importancia o diferencia.
                     </strong>
                 </span>
                 <br><br>
                 <div class="text-center">                    
                    {{ link_to_action('EvaluacionController@preguntasEvaluacion', $title = 'Aceptar', $parameters = [$slugEvaluacion], $attributes = ['class' => 'btn btn-secondary waves-effect waves-themed']) }}
                </div>


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



