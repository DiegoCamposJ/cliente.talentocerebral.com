<div class="row">
    <div class="col-sm-6">
        <div class="text-left fs-xxl color-warning-600 keep-print-font pt-1 l-h-n m-0">
            LA OTRA CARA
        </div>
        <div class="text-left fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            DE TU CEREBRO
        </div>
        <br>
        <div id="pag7text1" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            El cerebro humano tiene dos tipos de pensamientos. Al primero lo llamamos Núcleo, y ya hablamos de él en la sección anterior. El segundo es el Circunstancial, en el que se generan ciertos cambios debido a la aparición de sustancias químicas en la mente del ser humano al percibir presión o amenaza. Estas se denominan neurotransmisores. La zona del cerebro que activa este comportamiento se llama amígdala cerebral y es el disparador emocional de nuestra mente
        </div>



    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                    <br>
                    <img id="cnvpag7_img1" src="{{ asset('img/brain/amigdala.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 60%;">
            </div>
        </div>
    </div>
</div>

<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<div class="row">
    <div class="col-sm-12">
        <div class="text-left fs-xxl color-warning-600 keep-print-font pt-1 l-h-n m-0">
            AHORA ANALIZAREMOS TU PUNTAJE
        </div>
        <div class="text-left fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            CIRCUNSTANCIAL …
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-sm-12">
        <div class="text-center fw-900 fs-xl color-primary-600 keep-print-font pt-1 l-h-n m-0">
            COMPARATIVA PUNTAJE POR CUADRANTE
        </div>
        <div class="row">
            <div class="col-sm-3">
                <br>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        {{ $PT_CIRCUN_AZ }} <br>
                        <div class="js-easy-pie-chart color-primary-50 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{ (($PT_CIRCUN_AZ * 100)/150) }}" data-piesize="180" data-linewidth="20" data-scalelength="10">
                            <div class="js-easy-pie-chart color-primary-500 position-relative position-absolute pos-left pos-right pos-top pos-bottom d-flex align-items-center justify-content-center" data-percent="{{(( $PT_NUCLEO_AZ * 100)/150) }}" data-piesize="140" data-linewidth="25" data-scalelength="10" data-scalecolor="#fff">
                                <span class="d-flex align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xs text-primary">{{ $PT_NUCLEO_AZ }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        {{ $PT_CIRCUN_VE }} <br>
                        <div class="js-easy-pie-chart color-fusion-50 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{ (($PT_CIRCUN_VE * 100) / 150) }}" data-piesize="180" data-linewidth="20" data-scalelength="10">
                            <div class="js-easy-pie-chart color-fusion-500 position-relative position-absolute pos-left pos-right pos-top pos-bottom d-flex align-items-center justify-content-center" data-percent="{{(($PT_NUCLEO_VE * 100) / 150)}}" data-piesize="140" data-linewidth="25" data-scalelength="10" data-scalecolor="#fff">
                                <span class="d-flex align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xs text-primary">{{$PT_NUCLEO_VE}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <br>
                <canvas id="comportamientoc" width="400px" height="400px"></canvas>
                <canvas id="leyendacomportamientoc" width="400px" height="30px"></canvas>
                <canvas id="leyendacomparativa" width="400px" height="30px"></canvas>
            </div>
            <div class="col-sm-3">
                <br>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        {{  $PT_CIRCUN_AM }} <br>
                        <div class="js-easy-pie-chart color-warning-50 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{  (($PT_CIRCUN_AM * 100) / 150) }}"  data-piesize="180" data-linewidth="20" data-scalelength="10">
                            <div class="js-easy-pie-chart color-warning-500 position-relative position-absolute pos-left pos-right pos-top pos-bottom d-flex align-items-center justify-content-center" data-percent="{{ (($PT_NUCLEO_AM * 100) / 150) }}" data-piesize="140" data-linewidth="25" data-scalelength="10" data-scalecolor="#fff">
                                <span class="d-flex align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xs text-primary">{{$PT_NUCLEO_AM}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        {{$PT_CIRCUN_RO }} <br>
                        <div class="js-easy-pie-chart color-danger-50 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{ (($PT_CIRCUN_RO * 100 ) / 150) }}" data-piesize="180" data-linewidth="20" data-scalelength="10">
                            <div class="js-easy-pie-chart color-danger-500 position-relative position-absolute pos-left pos-right pos-top pos-bottom d-flex align-items-center justify-content-center" data-percent="{{ (($PT_NUCLEO_RO * 100) / 150)}}" data-piesize="140" data-linewidth="25" data-scalelength="10" data-scalecolor="#fff">
                                <span class="d-flex align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xs text-primary">{{$PT_NUCLEO_RO}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
<br><br><br><br>
<div class="row">
    <div class="col-sm-6">



        <br>
        <div id="pag7text2" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            {{$evaluacion->nombre}} la tabla que encontrarás a continuación muestra de forma específica los puntajes que obtuviste en cada uno de los cuadrantes en esta movilidad bajo presión. Es bueno destacar que este modelo solo se presenta en el 5% del comportamiento de un ser humano y lo denominamos Cerebro Reptil. Miremos tus datos:
        </div>
    </div>
    <div class="col-sm-6 text-center">
        <br><br>
        <div class="row">
            <div class="col-sm-3">
                <img src="{{ asset('img/brain/cz1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 90%; height: 80%;">
                    <div class="text-center fs-xl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
                        {{ $PT_CIRCUN_AZ }}  pts
                    </div>
            </div>
            <div class="col-sm-3">
                    <img src="{{ asset('img/brain/cv1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 90%; height: 80%;">
                    <div class="text-center fs-xl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
                        {{ $PT_CIRCUN_VE }}  pts
                    </div>
            </div>
            <div class="col-sm-3">
                <img src="{{ asset('img/brain/cr1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 90%; height: 80%;">
                    <div class="text-center fs-xl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
                        {{ $PT_CIRCUN_RO }}  pts
                    </div>
            </div>
            <div class="col-sm-3">
                <img src="{{ asset('img/brain/ca1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 90%; height: 80%;">
                    <div class="text-center fs-xl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
                        &nbsp;&nbsp; {{ $PT_CIRCUN_AM }}  pts
                    </div>

            </div>
        </div>
    </div>
</div>
