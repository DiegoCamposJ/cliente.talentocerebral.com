<br><br><br>
<div class="row">
    <div class="col-sm-12">
        <div class="text-left fs-xxl color-warning-600 keep-print-font pt-1 l-h-n m-0">
            AHORA ANALIZAREMOS EL CARGO
        </div>
        <div class="text-left fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            {{ $cargo }}
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-sm-12">
        <div class="text-center fw-900 fs-xl color-primary-600 keep-print-font pt-1 l-h-n m-0">
            POSTULANTE vs CARGO
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
<br><br>
<div class="row">
    <div class="col-sm-6">
        <br>
        <div class="text-left fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            MOVILIDADES DEL PERFIL <br> RESPECTO  <br> EL CARGO EVALUADO
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-12">
                <table>
                    <tr>
                        <td></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <div class="text-center">
                                <strong class="fs-xxl fw-900 color-fusion-900 keep-print-font pt-0 l-h-n m-0">Q</strong><br>
                                <img src="{{ asset('img/brain/cz1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;"><br/><br/>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <strong class="fs-xxl fw-900 color-fusion-900 keep-print-font pt-0 l-h-n m-0">U</strong>
                                <img src="{{ asset('img/brain/cv1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;"><br/><br/>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <strong class="fs-xxl fw-900 color-fusion-900 keep-print-font pt-0 l-h-n m-0">A</strong>
                                <img src="{{ asset('img/brain/cr1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;"><br/><br/>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <strong class="fs-xxl fw-900 color-fusion-900 keep-print-font pt-0 l-h-n m-0">D</strong>
                                <img src="{{ asset('img/brain/ca1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;"><br/><br/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <strong>POSTULANTE</strong>
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <div class="text-center fw-900 fs-md color-fusion-900 keep-print-font pt-0 l-h-n m-0">
                                {{ $PT_NUCLEO_AZ }}  pts
                            </div>
                        </td>
                        <td>
                            <div class="text-center fw-900 fs-md color-fusion-900 keep-print-font pt-0 l-h-n m-0">
                                {{ $PT_NUCLEO_VE }}  pts
                            </div>
                        </td>
                        <td>
                            <div class="text-center fw-900 fs-md color-fusion-900 keep-print-font pt-0 l-h-n m-0">
                                {{ $PT_NUCLEO_RO }}  pts
                            </div>
                        </td>
                        <td>
                            <div class="text-center fw-900 fs-md color-fusion-900 keep-print-font pt-0 l-h-n m-0">
                                {{ $PT_NUCLEO_AM }}  pts
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <strong>CARGO</strong>
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <div class="text-center fw-900 fs-md color-fusion-900 keep-print-font pt-0 l-h-n m-0">
                                {{ $PT_CIRCUN_AZ }}  pts
                            </div>
                        </td>
                        <td>
                            <div class="text-center fw-900 fs-md color-fusion-900 keep-print-font pt-0 l-h-n m-0">
                                {{ $PT_CIRCUN_VE }}  pts
                            </div>
                        </td>
                        <td>
                            <div class="text-center fw-900 fs-md color-fusion-900 keep-print-font pt-0 l-h-n m-0">
                                {{ $PT_CIRCUN_RO }}  pts
                            </div>
                        </td>
                        <td>
                            <div class="text-center fw-900 fs-md color-fusion-900 keep-print-font pt-0 l-h-n m-0">
                                {{ $PT_CIRCUN_AM }}  pts
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        </td>
                        <td>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        </td>
                        <td>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        </td>
                        <td>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="text-left fw-900 fs-lg color-primary-600 keep-print-font pt-1 l-h-n m-0">
                                DIFERENCIA
                            </div>
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            @if(($PT_CIRCUN_AZ - $PT_NUCLEO_AZ) < 0 )
                                <div class="text-center fw-900 fs-xl color-danger-600 keep-print-font pt-1 l-h-n m-0">
                                    {{ $PT_CIRCUN_AZ - $PT_NUCLEO_AZ }} pts
                                </div>
                            @else
                                <div class="text-center fw-900 fs-xl color-primary-600 keep-print-font pt-1 l-h-n m-0">
                                    {{ $PT_CIRCUN_AZ - $PT_NUCLEO_AZ }} pts
                                </div>
                            @endif



                        </td>
                        <td>
                            @if(($PT_CIRCUN_VE - $PT_NUCLEO_VE) < 0 )
                                <div class="text-center fw-900 fs-xl color-danger-600 keep-print-font pt-1 l-h-n m-0">
                                    {{ $PT_CIRCUN_VE - $PT_NUCLEO_VE }} pts
                                </div>
                            @else
                                <div class="text-center fw-900 fs-xl color-primary-600 keep-print-font pt-1 l-h-n m-0">
                                    {{ $PT_CIRCUN_VE - $PT_NUCLEO_VE }} pts
                                </div>
                            @endif
                        </td>
                        <td>
                            @if(($PT_CIRCUN_RO - $PT_NUCLEO_RO) < 0 )
                                <div class="text-center fw-900 fs-xl color-danger-600 keep-print-font pt-1 l-h-n m-0">
                                    {{ $PT_CIRCUN_RO - $PT_NUCLEO_RO }} pts
                                </div>
                            @else
                                <div class="text-center fw-900 fs-xl color-primary-600 keep-print-font pt-1 l-h-n m-0">
                                    {{ $PT_CIRCUN_RO - $PT_NUCLEO_RO }} pts
                                </div>
                            @endif
                        </td>
                        <td>
                            @if(($PT_CIRCUN_AM - $PT_NUCLEO_AM) < 0 )
                            <div class="text-center fw-900 fs-xl color-danger-600 keep-print-font pt-1 l-h-n m-0">
                                {{ $PT_CIRCUN_AM - $PT_NUCLEO_AM }}  pts
                            </div>
                            @else
                                <div class="text-center fw-900 fs-xl color-primary-600 keep-print-font pt-1 l-h-n m-0">
                                    {{ $PT_CIRCUN_AM - $PT_NUCLEO_AM }}  pts
                                </div>
                            @endif



                        </td>
                    </tr>

                </table>
                <br><br>
                <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                    La tabla de movilidad muestra de forma específica la comparativa entre los cuadrantes del evaluado y los definidos para el cargo.
                    </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 text-center">
        <br>        
        <div class="text-left fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            PORCENTAJE DE COMPATIBILIDAD
        </div>
        <br><br><br><br><br>
        <div class="text-center text-primary" style="font-size: 800%; line-height: 155px;">                                            
            <span class="fw-800">
               &nbsp; {{ $evaluacion->porcentaje_cargo}} %
            </span>
        </div>
    </div>
</div>
