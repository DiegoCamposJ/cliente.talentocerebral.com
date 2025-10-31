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
             NÚCLEO vs RECOMENDACIONES
        </div>
        <br><br>
        <div class="row text-center">
            <div class="col-sm-4">
                <b><span class="text-info">{{$carrera1->carrera}}</span></b><br><br>
                <canvas id="carrera1" width="200px" height="200px"></canvas>                
            </div>
            <div class="col-sm-4">
                <b><span class="text-info">{{$carrera2->carrera}}</span></b><br><br>
                <canvas id="carrera2" width="200px" height="200px"></canvas>
            </div>
            <div class="col-sm-4">
                <b><span class="text-info">{{$carrera3->carrera}}</span></b><br><br>
                <canvas id="carrera3" width="200px" height="200px"></canvas>
            </div>            
        </div>
        <div class="row text-center">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-5">
                <br>
                <b><span class="text-info">{{$carrera4->carrera}}</span></b><br><br>
                <canvas id="carrera4" width="200px" height="200px"></canvas>
            </div>
            <div class="col-sm-5">
                <br>
                <b><span class="text-info">{{$carrera5->carrera}}</span></b><br><br>
                <canvas id="carrera5" width="200px" height="200px"></canvas>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
        <br>
        <div class="row text-center">
            <div class="col-sm-12">
                <canvas id="leyendacarreras" width="400px" height="30px"></canvas>
            </div>
        </div>




    </div>
</div>
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<br>
<div class="row border-bottom white-bg dashboard-header">
    <div class="col-sm-12">        
        <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            {{$evaluacion->nombre}} la tabla que encontrarás a continuación muestra las profesiones recomendadas en base a tu análisis cerebral.
        </div>
    </div>
    <br><br>
    <div class="col-sm-12">                                
        <ul class="list-group clear-list m-t">
            <li class="list-group-item fist-item">
                <span class="float-right">
                    {{$carrera1->evaluacion}}
                </span>
                <h3><span class="badge badge-primary">1 </span>&nbsp;{{$carrera1->carrera}}</h3> 
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    {{$carrera2->evaluacion}}
                </span>
                <h3><span class="badge badge-secondary">2 </span>&nbsp;{{$carrera2->carrera}}</h3> 
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    {{$carrera3->evaluacion}}
                </span>
                <h3><span class="badge badge-warning">3 </span>&nbsp;{{$carrera3->carrera}}</h3> 
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    {{$carrera4->evaluacion}}
                </span>
                <h3><span class="badge badge-danger">4 </span>&nbsp;{{$carrera4->carrera}}</h3> 
            </li>
            <li class="list-group-item">
                <span class="float-right">
                {{$carrera5->evaluacion}}
                </span>
                <h3><span class="badge badge-dark">5 </span>&nbsp;{{$carrera5->carrera}}</h3> 
            </li>
        </ul>
    </div>
    
</div>
