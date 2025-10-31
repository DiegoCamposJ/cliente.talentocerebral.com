<div class="row">
    
    <div class="col-sm-12 text-center">
        <div class="text-center fs-xxl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
        PERFIL CEREBRAL DE PROFESIONES RECOMENDADAS
        </div>
    </div> 

</div>


<div class="row">
    <div class="col-sm-6">
        <br><br>
        <div class="text-left fs-xxl color-primary-600 keep-print-font pt-1 l-h-n m-0">
            ORIENTACIÓN
        </div>
        <div class="text-left fs-xxl color-primary-600 keep-print-font pt-1 l-h-n m-0">
            VOCACIONAL
        </div>
        <div class="text-left fs-xxl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
            CEREBRAL
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                    <br>
                    <img src="{{ asset('img/brain/brainGrade.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 60%;">
            </div>
        </div>
    </div>
</div>

<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">


<div class="row">
    <div class="col-sm-12">
        <div class="text-center fw-900 fs-xl color-primary-600 keep-print-font pt-1 l-h-n m-0">
            NÚCLEO vs CARRERA PREFERIDA
        </div>
        <br><br>
        <div class="row text-center">            
            <div class="col-sm-12">
                <h2><b>{{$carrera6->carrera}}</b></h2>                
                <canvas id="carrera6" width="400px" height="400px"></canvas>                
                <br><br>
                <canvas id="leyendacarrerapre" width="400px" height="30px"></canvas>
            </div>            
        </div>
        



    </div>
</div>
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<br>
<div class="row border-bottom white-bg dashboard-header">
    <div class="col-sm-12">        
        <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            {{$evaluacion->nombre}} a continuación encontrarás el resultado de la carrera que seleccionaste como preferida.
        </div>
    </div>
    <br><br><br>
    <div class="col-sm-12">                        
        
        <ul class="list-group clear-list m-t">
            <li class="list-group-item fist-item">
                <span class="float-right">
                    {{$carrera6->evaluacion}}
                </span>
                <h3><span class="badge badge-primary">Preferencia </span>&nbsp;{{$carrera6->carrera}}</h3> 
            </li>
            
        </ul>
    </div>
    
</div>
