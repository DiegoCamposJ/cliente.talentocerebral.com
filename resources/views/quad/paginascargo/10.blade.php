<div class="row">
    <div class="col-sm-6">
        <h3 class="display-4 fw-900 color-warning-600 keep-print-font pt-4 l-h-n m-0">
            TU CÓDIGO DE PERFIL
        </h3>

        <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            Finalmente nuestra metodología nos permite clasificar los tipos de pensamiento mediante un código de cuatro números. En él encontrarás el número de dominancias primarias que tiene tu cerebro. Si este se caracteriza por haber obtenido una calificación de más de 66 en tu puntaje núcleo, obtiene un número 1. En caso de haber obtenido desde 34 hasta 66 encontrarás un número 2; mientras que puntajes menores a 34 puntos se codifican con el número 3.
        </div>
    </div>

    <div class="col-sm-6 text-center">
        <br><br>
        <div class="row">
            <div class="col-sm-3">

                <div class="text-center">
                    <img src="{{ asset('img/brain/cz1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;"><br/>
                    <div class="text-center fw-900 fs-xl text-dark keep-print-font pt-1 l-h-n m-0">
                        {{ $PT_NUCLEO_AZ }}  pts
                    </div>
                    <br>
                    <div class="text-center fw-900 fs-xxl text-dark keep-print-font pt-1 l-h-n m-0">
                        {{ $COD_AZ }}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="text-center">

                    <img src="{{ asset('img/brain/cv1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;"><br/>
                    <div class="text-center fw-900 fs-xl text-dark keep-print-font pt-1 l-h-n m-0">
                        {{ $PT_NUCLEO_VE }}  pts
                    </div>
                    <br>
                    <div class="text-center fw-900 fs-xxl text-dark keep-print-font pt-1 l-h-n m-0">
                        {{ $COD_VE }}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="text-center">
                    <img src="{{ asset('img/brain/cr1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;"><br/>
                    <div class="text-center fw-900 fs-xl text-dark keep-print-font pt-1 l-h-n m-0">
                    {{ $PT_NUCLEO_RO }}  pts
                    </div>
                    <br>
                    <div class="text-center fw-900 fs-xxl text-dark keep-print-font pt-1 l-h-n m-0">
                        {{ $COD_RO }}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="text-center">
                    <img src="{{ asset('img/brain/ca1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;"><br/>
                    <div class="text-center fw-900 fs-xl text-dark keep-print-font pt-1 l-h-n m-0">
                        {{ $PT_NUCLEO_AM }}  pts
                    </div>
                    <br>
                    <div class="text-center fw-900 fs-xxl text-dark keep-print-font pt-1 l-h-n m-0">
                        {{ $COD_AM }}
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- CODIGO Q-->

<br><br>
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<br>
<div class="row">
    <div class="col-sm-6 text-center">
        @if($COD_AZ == '1')
            <canvas id="cod1Azul" width="300px" height="150px"></canvas>
        @endif
        @if($COD_AZ == '2')
            <canvas id="cod2Azul" width="300px" height="150px"></canvas>
        @endif

        @if($COD_AZ == '3')
            <div id="codigoChartQ3" class="ct-chart" style="width:100%; height:250px;"></div>
        @endif



    </div>
    <div class="col-sm-6 text-center">
        @if($COD_AZ == '1')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    @if($PT_NUCLEO_AZ >100)
                        CÓDIGO 1*, CUADRANCIA DE PREFERENCIA
                        @else
                        CÓDIGO 1, CUADRANCIA DE PREFERENCIA
                    @endif
                </h3>
            </div>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento cuantificador, obtuvo el código 1. Ello lo define como una dominancia primaria o preferente y tu cerebro podría utilizarla recurrentemente en su modelo de construcción de la realidad.
            </div>
        @endif
        @if($COD_AZ == '2')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    CÓDIGO 2, CUADRANCIA DE USO NO PREFERENTE
                </h3>
            </div>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento cuantificador, obtuvo el código 2. Ello lo define como una dominancia de uso no preferente, por lo que tu cerebro podría recurrir a ella cuando la necesite como complemento para la construcción de la realidad.
            </div>
        @endif
        @if($COD_AZ == '3')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    CÓDIGO 3, CUADRANCIA DE MAYOR ESFUERZO
                </h3>
            </div>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento cuantificador, obtuvo el código 3. Ello lo define como una dominancia de mayor esfuerzo, por lo que tu cerebro al utilizarla podría requerir mayor cantidad de tiempo y concentración en la construcción de la realidad.
            </div>
        @endif
    </div>
</div>
<!-- CODIGO U-->
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<br>
<div class="row">
    <div class="col-sm-6 text-center">
        @if($COD_VE == '1')
            <canvas id="cod1Verde" width="300px" height="150px"></canvas>
        @endif
        @if($COD_VE == '2')
            <canvas id="cod2Verde" width="300px" height="150px"></canvas>
        @endif
        @if($COD_VE == '3')
            <div id="codigoChartU3" class="ct-chart" style="width:100%; height:250px;"></div>
        @endif
    </div>
    <div class="col-sm-6 text-center">
        @if($COD_VE == '1')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    @if($PT_NUCLEO_VE >100)
                        CÓDIGO 1*, CUADRANCIA DE PREFERENCIA
                        @else
                        CÓDIGO 1, CUADRANCIA DE PREFERENCIA
                    @endif
                </h3>
            </div><br>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento utilitario, obtuvo el código 1. Ello lo define como una dominancia primaria o preferente y tu cerebro podría utilizarla recurrentemente en su modelo de construcción de la realidad.
            </div>
        @endif
        @if($COD_VE == '2')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    CÓDIGO 2, CUADRANCIA DE USO NO PREFERENTE
                </h3>
            </div><br>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento utilitario, obtuvo el código 2. Ello lo define como una dominancia de uso no preferente, por lo que tu cerebro podría recurrir a ella cuando la necesite como complemento para la construcción de la realidad.
            </div>
        @endif
        @if($COD_VE == '3')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    CÓDIGO 3, CUADRANCIA DE MAYOR ESFUERZO
                </h3>
            </div><br>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento utilitario, obtuvo el código 3. Ello lo define como una dominancia de mayor esfuerzo, por lo que tu cerebro al utilizarla podría requerir mayor cantidad de tiempo y concentración en la construcción de la realidad.
            </div>
        @endif



    </div>
</div>
<!-- CODIGO A-->
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<br>
<div class="row">
    <div class="col-sm-6 text-center">
        @if($COD_RO == '1')
            <canvas id="cod1Rojo" width="300px" height="150px"></canvas>
        @endif
        @if($COD_RO == '2')
            <canvas id="cod2Rojo" width="300px" height="150px"></canvas>
        @endif
        @if($COD_RO == '3')
            <div id="codigoChartA3" class="ct-chart" style="width:100%; height:250px;"></div>
        @endif
    </div>
    <div class="col-sm-6">
        @if($COD_RO == '1')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    @if($PT_NUCLEO_RO >100)
                        CÓDIGO 1*, CUADRANCIA DE PREFERENCIA
                        @else
                        CÓDIGO 1, CUADRANCIA DE PREFERENCIA
                    @endif
                </h3>
            </div>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento armonizador, obtuvo el código 1. Ello lo define como una dominancia primaria o preferente y tu cerebro podría utilizarla recurrentemente en su modelo de construcción de la realidad.
            </div>
        @endif
        @if($COD_RO == '2')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    CÓDIGO 2, CUADRANCIA DE USO NO PREFERENTE
                </h3>
            </div>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento armonizador, obtuvo el código 2. Ello lo define como una dominancia de uso no preferente, por lo que tu cerebro podría recurrir a ella cuando la necesite como complemento para la construcción de la realidad.
            </div>
        @endif
        @if($COD_RO == '3')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    CÓDIGO 3, CUADRANCIA DE MAYOR ESFUERZO
                </h3>
            </div>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento armonizador, obtuvo el código 3. Ello lo define como una dominancia de mayor esfuerzo, por lo que tu cerebro al utilizarla podría requerir mayor cantidad de tiempo y concentración en la construcción de la realidad.
            </div>
        @endif



    </div>
</div>
<!-- CODIGO D-->
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<br>
<div class="row">
    <div class="col-sm-6 text-center">
        @if($COD_AM == '1')
            <canvas id="cod1Amarillo" width="300px" height="150px"></canvas>
        @endif
        @if($COD_AM == '2')
            <canvas id="cod2Amarillo" width="300px" height="150px"></canvas>
        @endif
        @if($COD_AM == '3')
            <div id="codigoChartD3" class="ct-chart" style="width:100%; height:250px;"></div>
        @endif
    </div>
    <div class="col-sm-6">
        @if($COD_AM == '1')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    @if($PT_NUCLEO_AM >100)
                        CÓDIGO 1*, CUADRANCIA DE PREFERENCIA
                        @else
                        CÓDIGO 1, CUADRANCIA DE PREFERENCIA
                    @endif
                </h3>
            </div>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento desarrollador , obtuvo el código 1. Ello lo define como una dominancia primaria o preferente y tu cerebro podría utilizarla recurrentemente en su modelo de construcción de la realidad.
            </div>
        @endif
        @if($COD_AM == '2')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    CÓDIGO 2, CUADRANCIA DE USO NO PREFERENTE
                </h3>
            </div>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento desarrollador , obtuvo el código 2. Ello lo define como una dominancia de uso no preferente, por lo que tu cerebro podría recurrir a ella cuando la necesite como complemento para la construcción de la realidad.
            </div>
        @endif
        @if($COD_AM == '3')
            <div class="text-left">
                <h3 class="display-5 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
                    CÓDIGO 3, CUADRANCIA DE MAYOR ESFUERZO
                </h3>
            </div>
            <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                Tu modelo de pensamiento desarrollador , obtuvo el código 3. Ello lo define como una dominancia de mayor esfuerzo, por lo que tu cerebro al utilizarla podría requerir mayor cantidad de tiempo y concentración en la construcción de la realidad.
            </div>
        @endif
    </div>
</div>
