<div class="row">
    <div class="col-sm-12 text-center">
        <div class="text-center fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            FLUJO DEL PENSAMIENTO
        </div>
        <div class="text-center fs-xl color-warning-600 keep-print-font pt-1 l-h-n m-0">
            EN ESTA GRÁFICA PODRÁS DEFINIR CUÁL ES EL ESTILO NEUROCOGNITIVO <br> QUE TU CEREBRO UTILIZA PARA CONSTRUIR LA REALIDAD
        </div>
    </div>
</div>
<br>
<div id="pag9text1" class="row">
    <div class="col-sm-6">
        <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            @if($FLUJO_PENSAMIENTO == "CONTINUO")
                    Es importante comprender que en el caso de las personas que poseen este flujo de <b>PENSAMIENTO CONTINUO</b>,
                    su cerebro podría realizar MENOR esfuerzo en la toma de decisiones y el consumo de glucosa igualmente
                    será MENOR cuando esté tomando las mismas  decisiones; mientras que su velocidad decisional será RÁPIDA.
                    <br><br>
                    En cambio la visualización  de detalles es BAJA. Cuando tenga que entregar instrucciones su resultado
                    también será BAJO así como su nivel de indecisión también será BAJO; mientras que su Constructo percibirá
                    y de inmediato decidirá.
            @endif

            @if($FLUJO_PENSAMIENTO == "SEMICRUZADO")
                Cuando nos referimos al flujo de <b>PENSAMIENTO SEMICRUZADO</b>, queremos decir que el esfuerzo
                de tu cerebro en toma de decisiones será MEDIO, al igual que el consumo de glucosa en la
                misma toma de decisiones.
                <br><br>
                Por otro lado, tanto tu velocidad decisional, como la visualización de detalles también
                tendrán un nivel MEDIO, así como también será nivel MEDIO la acción de entregar instrucciones.
                <br><br>
                De igual forma tu nivel de indecisión será MEDIO y tu cuadrante 1 será el que decida. Finalmente
                el comportamiento de tu Constructo será: decidir, dudar, evaluar y finalmente resolver.
            @endif

            @if($FLUJO_PENSAMIENTO == "CRUZADO")
                ¿ Cómo interpretamos el flujo de <b>PENSAMIENTO CRUZADO</b> ? <br><br>
                En primer lugar vamos a decir que el esfuerzo que hace tu cerebro en la toma de decisiones será MAYOR.
                <br><br>
                Igual situación será cuando el cerebro consuma glucosa en la misma toma de decisiones.
                <br><br>
                La velocidad decisional de tu cerebro en cambio podría ser LENTA; pero cuando se presente la
                visualización de detalles, tu cerebro reaccionará de forma ALTA y de la misma forma reaccionará
                cuando tengas que entregar instrucciones.
                <br><br>
                Por otro lado, tu nivel de indecisión será ALTO y decidirá tu cuadrante 3.
                <br><br>
                Cuando nos referimos a tu Constructo, éste evalúa / polemiza, duda y decide.
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10 text-center">
                <canvas id="flujoPensamiento" width="300px" height="300px"></canvas>
                <canvas id="flujoLeyenda" width="300px" height="30px"></canvas>
            </div>
        </div>
    </div>

</div>
<br>
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<div class="row">
    <div class="col-sm-12">
        <div class="text-center fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            TUS 8 INTELIGENCIAS
        </div>
        <div class="text-center fs-xl color-warning-600 keep-print-font pt-1 l-h-n m-0">
            CADA UNO DE TUS CUADRANTES SE DIVIDEN EN DOS INTELIGENCIAS. <br>
            EN LA GRÁFICA LATERAL IZQUIERDA PUEDES DESCUBRIR  TUS PUNTAJES EN CADA UNA DE ELLAS
        </div>

    </div>
</div>
<div class="row row-divided">
    <div class="col-sm-6 text-center">
        <br><br><br><br>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-8">
                <div id="inteligencias">
                    <canvas id="inteligenciascnv" style="width:50px; height:50px;"></canvas>
                </div>
                <br><br>
                <canvas id="leyendainteligencias" width="400px" height="90px"></canvas>
            </div>
        </div>


    </div>
    <div class="vertical-divider"></div>
    <div class="col-sm-6 text-center">
        <br>
        <div class="row">
            <div class="col-sm-2">
                <img id="pag9img1" src="{{ asset('img/quad/1.png') }}" style="width: 10mm; height: 10mm; opacity: 1;">
            </div>

            <div id="txtinteligencia1" class="col-sm-10 text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                <strong>RESOLUTOR: </strong>Visualiza problemas con claridad y sugiere soluciones eficientes
            </div>
        </div> <br>
        <div class="row">
            <div class="col-sm-2">
                <img id="pag9img2" src="{{ asset('img/quad/2.png') }}" style="width: 10mm; height: 10mm; opacity: 1;">
            </div>
            <div id="txtinteligencia2" class="col-sm-10 text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                <strong>TECNICO: </strong>Orientado al aprendizaje cientifico, su posterior aplicación funcional y sistémica.
            </div>
        </div> <br>
        <div class="row">
            <div class="col-sm-2">
                <img id="pag9img3" src="{{ asset('img/quad/3.png') }}" style="width: 10mm; height: 10mm; opacity: 1;">
            </div>
            <div id="txtinteligencia3" class="col-sm-10 text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                <strong>SECUENCIAL: </strong>Visualiza senderos y procesos claros con hitos y metas articuladas entre si.
            </div>
        </div> <br>
        <div class="row">
            <div class="col-sm-2">
                <img id="pag9img4" src="{{ asset('img/quad/4.png') }}" style="width: 10mm; height: 10mm; opacity: 1;">
            </div>
            <div id="txtinteligencia4" class="col-sm-10 text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                <strong>ORGANIZADO: </strong>Determina y mide efectivamente los recursos necesarios ya sean humanos, económicos y materiales para lograr un objetivo.
            </div>
        </div> <br>
        <div class="row">
            <div class="col-sm-2">
                <img id="pag9img5" src="{{ asset('img/quad/5.png') }}" style="width: 10mm; height: 10mm; opacity: 1;">
            </div>
            <div id="txtinteligencia5" class="col-sm-10 text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                <strong>INTRAPERSONAL: </strong>Capaz de referenciar y tomar conciencia de sensaciones, emociones, sentimientos y motivaciones propias.
            </div>
        </div> <br>
        <div class="row">
            <div class="col-sm-2">
                <img id="pag9img6" src="{{ asset('img/quad/6.png') }}" style="width: 10mm; height: 10mm; opacity: 1;">
            </div>
            <div id="txtinteligencia6" class="col-sm-10 text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                <strong>INTERPERSONAL: </strong>Capaz de referenciar y tomar conciencia de sensaciones, emociones, sentimientos y motivaciones de los demas.
            </div>
        </div> <br>
        <div class="row">
            <div class="col-sm-2">
                <img id="pag9img7" src="{{ asset('img/quad/7.png') }}" style="width: 10mm; height: 10mm; opacity: 1;">
            </div>
            <div id="txtinteligencia7" class="col-sm-10 text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                <strong>CREATIVO: </strong>Visualiza conceptos abstractos, genera ideas, arte y modelos disruptivos.
            </div>
        </div> <br>
        <div class="row">
            <div class="col-sm-2">
                <img id="pag9img8" src="{{ asset('img/quad/8.png') }}" style="width: 10mm; height: 10mm; opacity: 1;">
            </div>
            <div id="txtinteligencia8" class="col-sm-10 text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                <strong>ESTRATEGA: </strong>Visualiza y prospecta futuros, lateraliza ideas y alternativas y se vincula con la innovación y el cambio.
            </div>
        </div> <br>

    </div>
</div>
