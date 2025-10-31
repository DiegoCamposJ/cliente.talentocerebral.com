<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                    <br><br><br>
                    <img id="cnvpag4_img1" src="{{ asset('img/brain/logo.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 70%;">
            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="text-center fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            BRAIN QUAD THEORY
        </div>
        <br><br>
        <div id="pag4text1" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            La teoría QUAD divide al cerebro en cuatro cuadrantes específicos.  Esta definición se obtiene de haber separado primero a tu cerebro en dos hemisferio (teoría Sperry), para luego fraccionarlo en capas (teoría Maclean), tomando en cuenta solo las dos primeras (neocortex, límbico). Todas estas definiciones científicas se simplifican en una metáfora que asigna un color y un grupo de capacidades a cada zona. <br/>
            A continuación descubriremos tus calificaciones en cada cuadrancia.
        </div>
    </div>
</div>

<br><br>
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="text-left fs-xxl color-warning-600 keep-print-font pt-1 l-h-n m-0">
            AHORA ANALIZAREMOS TU PUNTAJE
        </div>
        <div class="text-left fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            NÚCLEO …
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-sm-12">
        <div class="text-center fw-900 fs-xl color-primary-600 keep-print-font pt-1 l-h-n m-0">
            TUS PUNTAJES
        </div>
        <div class="row">
            <div class="col-sm-3">
                <br><br>
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="js-easy-pie-chart color-primary-50 position-relative d-inline-flex align-items-center justify-content-center" data-percent="100" data-piesize="180" data-linewidth="20" data-scalelength="10">
                            <div class="js-easy-pie-chart color-primary-500 position-relative position-absolute pos-left pos-right pos-top pos-bottom d-flex align-items-center justify-content-center" data-percent="{{ (($PO_NUCLEO_AZ*100)/150) }}" data-piesize="140" data-linewidth="25" data-scalelength="10" data-scalecolor="#fff">
                                <span class="d-flex fw-900 align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xs">{{ round($PO_NUCLEO_AZ,2) }} % </span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="js-easy-pie-chart color-fusion-50 position-relative d-inline-flex align-items-center justify-content-center" data-percent="100" data-piesize="180" data-linewidth="20" data-scalelength="10">
                            <div class="js-easy-pie-chart color-fusion-500 position-relative position-absolute pos-left pos-right pos-top pos-bottom d-flex align-items-center justify-content-center" data-percent="{{(($PO_NUCLEO_VE * 100)/150)}}" data-piesize="140" data-linewidth="25" data-scalelength="10" data-scalecolor="#fff">
                                <span class="d-flex fw-900 align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xs ">{{round($PO_NUCLEO_VE,2)}} %</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <br>
                <canvas id="comportamienton" width="400px" height="400px"></canvas>
            </div>
            <div class="col-sm-3">
                <br><br>
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="js-easy-pie-chart color-warning-50 position-relative d-inline-flex align-items-center justify-content-center" data-percent="100"  data-piesize="180" data-linewidth="20" data-scalelength="10">
                            <div class="js-easy-pie-chart color-warning-500 position-relative position-absolute pos-left pos-right pos-top pos-bottom d-flex align-items-center justify-content-center" data-percent="{{(($PO_NUCLEO_AM * 100)/150)}}" data-piesize="140" data-linewidth="25" data-scalelength="10" data-scalecolor="#fff">
                                <span class="d-flex fw-900 align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xs text-dark">{{round($PO_NUCLEO_AM,2)}} %</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="js-easy-pie-chart color-danger-50 position-relative d-inline-flex align-items-center justify-content-center" data-percent="100" data-piesize="180" data-linewidth="20" data-scalelength="10">
                            <div class="js-easy-pie-chart color-danger-500 position-relative position-absolute pos-left pos-right pos-top pos-bottom d-flex align-items-center justify-content-center" data-percent="{{(($PO_NUCLEO_RO * 100)/150)}}" data-piesize="140" data-linewidth="25" data-scalelength="10" data-scalecolor="#fff">
                                <span class="d-flex fw-900 align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xs">{{round($PO_NUCLEO_RO,2)}} %</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<div class="row">
    <div class="col-sm-6">
        <br>
        <div id="pag4text2" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            Esta puntuación nos muestra cómo el cerebro de la persona evaluada construye la realidad de forma normal (el 95% del pensamiento de un ser humano). Ello significa que el órgano rector del pensamiento en esta instancia no está sometido a presión o cambios súbitos que generen sensaciones de amenaza o inestabilidad.  {{$evaluacion->nombre}} a continuación veremos los puntajes que obtuviste y por tanto la ecuación que determina el orden de tus dominancias:
        </div>
        <br/>
    </div>
    <div class="col-sm-6 text-center">
            <br><br>
            <div class="row">
                <div class="col-sm-3">
                    <img id="pag4imgnz" src="{{ asset('img/brain/cz1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 90%; height: 80%;">
                    <div class="text-center fs-xl fw-900 color-black keep-print-font pt-1 l-h-n m-0">
                        {{ $PT_NUCLEO_AZ }}  pts
                    </div>
                </div>
                <div class="col-sm-3">

                    <img id="pag4imgnv" src="{{ asset('img/brain/cv1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 90%; height: 80%;">
                    <div class="text-center fs-xl fw-900 color-black keep-print-font pt-1 l-h-n m-0">
                        {{ $PT_NUCLEO_VE }}  pts
                    </div>
                </div>
                <div class="col-sm-3">

                    <img id="pag4imgnr" src="{{ asset('img/brain/cr1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 90%; height: 80%;">
                    <div class="text-center fs-xl fw-900 color-black keep-print-font pt-1 l-h-n m-0">
                         {{ $PT_NUCLEO_RO }}  pts
                    </div>
                </div>
                <div class="col-sm-3">

                    <img id="pag4imgna" src="{{ asset('img/brain/ca1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 90%; height: 80%;">
                    <div class="text-center fs-xl fw-900 color-black keep-print-font pt-1 l-h-n m-0">
                         {{ $PT_NUCLEO_AM }}  pts
                    </div>
                </div>
            </div>

    </div>
</div>
