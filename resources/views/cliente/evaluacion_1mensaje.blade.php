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
                    Instruciones Evaluación
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">                 
                 <span>
                     
                    <div class="text-justify">
                        1.    El tiempo que toma responder el test es de aproximadamente 25 minutos aun cuando la plataforma admite hasta 45 min para responder con calma. 
                        <br><br>
                        2.    Pasados los 45 minutos,  el sistema tomará como abandonado el test y será necesario reiniciar el proceso. Por lo anterior, recomendamos que disponga del tiempo y concentración necesarias para responder.
                        <br><br>
                        3.    Si se excede el tiempo o se abandona el test es necesario que se comunique con su asesor para que genere el reinicio del llenado, en el que tendrá una nueva clave de acceso para empezar desde cero.  
                        <br><br>
                        4.    Al iniciar usted se encontrará tres tipos de interrogantes que el test plantea: elecciones, prioridades y descartes. Por favor lea bien los enunciados, ya que en algunas secciones las respuestas se irán eliminando según su selección y, en otras solo podrá dar la misma respuesta un número determinado de veces.
                        <br><br>
                        5.    El informe con sus resultados, se le hará llegar de acuerdo a la planificación del Programa en el que participa.  
                        <br><br>
                        6.    A continuación, puede iniciar el test dando click en el botón START o salir en el botón CANCEL si no cuenta con el tiempo sugerido y prefiere regresar después. 
                    </div>
                 </span>
                 <br><br><br>
                 <div class="text-center">
                    {{ link_to_route('evaluacion.edit', $title = 'Iniciar', $parameters = [$slug], $attributes = ['class' => 'btn btn-secondary waves-effect waves-themed']) }}
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



