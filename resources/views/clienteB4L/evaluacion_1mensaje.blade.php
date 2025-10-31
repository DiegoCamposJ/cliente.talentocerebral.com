@extends('layouts.app')

@section('title', 'Definición Cargo')

@section('content')

<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    DEFINCIÓN DE CARGO
                </h2>
            </div>

            <div class="panel-container show">
                <div class="panel-content">

                 <span>
                     <strong>
                        A continuación encontrarás algunas preguntas, para lo que se te solicita escojas entre las distintas opciones que se te presentan. Como aspectos importantes para te sea posible completar la herramienta de una manera objetiva, es importante que tengas en cuenta que existe un límite de tiempo para realizar dicha herramienta. Por lo que es importante que leas detenidamente cada una de las preguntas y casos, para que así puedas escoger la que te parezca de mayor impacto según las instrucciones. <br> <br>
                        El levantamiento del cargo tiene una duración de 45 minutos.
                     </strong>
                 </span>
                 <br><br>
                 <div class="text-center">
                    {{ link_to_route('evaluacionB4L.edit', $title = 'Iniciar', $parameters = [$slug], $attributes = ['class' => 'btn btn-secondary waves-effect waves-themed']) }}
                </div>


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



