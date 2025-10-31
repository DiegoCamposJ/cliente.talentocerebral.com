<div class="row">
    <div class="col-sm-6">
        <div class="fs-xxl color-warning-600 keep-print-font pt-1 l-h-n m-0">
            COMENCEMOS
        </div>
        <div id="pag3text1" class="fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            @if($evaluacion->sexo == 'F')
                EL CEREBRO FEMENINO
            @else
                EL CEREBRO MASCULINO
            @endif
        </div>

        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <br>
                    @if($evaluacion->sexo == 'F')
                        <img id="cnvpag3_generoF" src="{{ asset('img/brain/girl.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 40%; height: 50%;">

                    @else
                        <img id="cnvpag3_generoM" src="{{ asset('img/brain/boy.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 40%; height: 50%;">
                    @endif
                </div>
            </div>
        </div>

    </div>

    <div class="col-sm-6">
        <div id="pag3text2" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            <br><br><br><br>
            @if($evaluacion->sexo == 'F')
                Para empezar, {{ $evaluacion->nombre}} es importante que comprendas que tu cerebro –aunque es fisiológicamente muy parecido al de un hombre, cuenta con capacidades distintas y genera pensamientos diferentes; así como sensaciones propias. Empezando por una irrigación hormonal principalmente definida por la progesterona y los estrógenos, el cerebro femenino tiene una mayor capacidad de control y equilibrio de varias situaciones al mismo tiempo. Además, en el cerebro femenino el cuerpo calloso (zona que une los hemisferios) es más grueso. Esto tiene la función de comunicar a los dos hemisferios cerebrales de forma más potente, lo que le permite validar situaciones de riesgo con mayor amplitud que el hombre.
            @else
                Para empezar, {{ $evaluacion->nombre}} es importante que comprendas que tu cerebro –aunque es fisiológicamente muy parecido al de una mujer, cuenta con capacidades distintas y genera pensamientos diferentes; así como sensaciones propias; empezando por una irrigación hormonal principalmente definida por la testosterona y la vasopresina, lo cual te lleva a una necesidad permanente de enfrentar retos y desafíos; así como una inclinación marcada hacia el crecimiento profesional e incluso financiero. Además, a diferencia del femenino, el cerebro de un hombre tiene un cuerpo calloso delgado (zona que une a los dos hemisferios), lo cual le permite resolver los problemas con un foco de atención de mayor profundidad.
            @endif
        </div>
    </div>
</div>

<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">

<div class="row row-divided">
    <div class="row">
        <div class="col-sm-6">
            <div class="fs-xl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
                USO DE HEMISFERIOS CEREBRALES
            </div>
            <div class="display-5 fw-500 color-warning-600 keep-print-font pt-1 l-h-n m-0">
                (TEORÍA SPERRY, 1961)
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-11">
                    <div id="pag3text3" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                        ¿Sabías que tienes un cerebro especializado? Esto quiere decir que procesa la información que le rodea apartir de zonas específicas. Estas han sido divididas en hemisferio izquierdo y hemisferio derecho.
                        <br/><br/>
                        @if($HEM_IZQUIERO > $HEM_DERECHO)
                            {{ $evaluacion->nombre}} cuentas con habilidades primarias <strong>izquierdas</strong>, lo que significa que prefieres procedimientos claros, argumentos lógicos y condiciones seguras a la hora d percibir la realidad y tomar decisiones.
                        @endif
                        @if($HEM_IZQUIERO < $HEM_DERECHO)
                            {{ $evaluacion->nombre}} cuentas con habilidades primarias <strong>derechas</strong>, lo que quiere decir que prefieres espacios creativos, experiencias sensoriales, alternativas holísticas y libertad  la hora de tomar decisiones.
                        @endif
                        @if($HEM_IZQUIERO == $HEM_DERECHO)
                        {{ $evaluacion->nombre}}  usas ambos hemisferios cerebrales de forma equitativa lo que te entrega una visión más amplia y general, aunque en momentos podrías generar cierta indecisión.
                        @endif
                        <br/><br/>
                        Las capacidades con las que cuenta tu cerebro en cada uno de los hemisferios puedes verlas en la gráfica lateral.
                    </div>
                </div>
            </div>

        </div>
        <div class="vertical-divider"></div>
        <div class="col-sm-6">
            <div class="text-center fs-xl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
                DESCRIPTORES DE TUS HEMISFERIOS
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3 text-right fs-nano">
                        <strong>
                            <br>
                            Numérico <br><br>
                            Racional <br><br>
                            Resolutor <br><br><br>
                            Deductivo <br><br>
                            Directivo <br><br>
                            Procedimental <br><br>
                            Articulado <br><br><br>
                            Estructurado
                        </strong>
                </div>
                <div class="col-sm-6">
                    <div id="barDescriptoresHemisferios">
                        <canvas id="cnvDescriptores"  style="width:100%; height:320px;"></canvas>
                    </div>
                </div>
                <div class="col-sm-3 text-left fs-nano">
                            <strong>
                                <br>
                                Conceptual <br><br>
                                Creativo <br><br>
                                Metafórico <br><br><br>
                                Imaginativo <br><br>
                                Comunicador <br><br>
                                Apasionado <br><br>
                                Empático <br><br><br>
                                Capacitador
                            </strong>
                </div>
            </div>
            <canvas id="leyandahemisferios" width="450px" height="30px"></canvas>


    </div>
</div>
</div>
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<div class="row">
    <div class="col-sm-6">
        <div class="text-left fs-xl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            CAPAS CEREBRALES
        </div>
        <div class="row">
            <div class="Q-pagina3">
                <div class="fs-nano fw-900 color-fusion-900 keep-print-font pt-1 l-h-n m-0">
                    Cazador
                </div>
            </div>
            <div class="D-pagina3">
                <div class="fs-nano fw-900 color-fusion-900 keep-print-font pt-1 l-h-n m-0">
                    Generador de Ideas
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div id="barCapaCerebral">
                <canvas id = "cnvCapaCerebral" style="width:100%; height:280px;"></canvas>
            </div>
                <canvas id="leyandacapascerebrales" width="400px" height="40px"></canvas>
        </div>
        <div class="row">
            <div class="U-pagina3">
                <div class="fs-nano fw-900 color-fusion-900 keep-print-font pt-1 l-h-n m-0">
                    Recolector
                </div>
            </div>
            <div class="A-pagina3">
                <div class="fs-nano fw-900 color-fusion-900 keep-print-font pt-1 l-h-n m-0">
                    Influyente
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="text-right fs-xl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            USO DE CAPAS CEREBRALES
        </div>
        <div class="text-right display-5 fw-500 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            (TEORÍA MACLEAN, 1952)
        </div>
        <br>
        <div id="pag3text4" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            ¿Sabías que tu cerebro tiene tres capas?. Hace mucho tiempo, una investigación en cerebros humanos de difuntos comprobó mediante cortes ventrales, que nuestro cerebro tiene tres capas. A ellas se atribuyen distintas funciones:<br/><br/>
                •	Neocórtex, zona de lenguaje, la lógica de la creatividad y la estrategia.<br/>
                •	Límbico, zona de las emociones y la memoria.<br/>
                •	Reptil, zona de la supervivencia y el instinto.<br/>
            <br/>
            @if($CAPA_NEOCORTEX > $CAPA_LIMBICA)
                {{ $evaluacion->nombre}} según la gráfica podrás ver que tienes dominancia en el uso de la capa Neocórtex. Es decir que prefieres situaciones en las que se priorice tu visión de largo plazo y la capacidad de desarrollar planes estratégicos. Eso te hace un estratega.
            @endif
            @if($CAPA_NEOCORTEX < $CAPA_LIMBICA)
                {{ $evaluacion->nombre}} según la gráfica podrás ver que tienes dominancia en el uso de la carpa límbica. Es decir que prefieres espacios en los que se priorice la implementación de planes, el seguimiento de procesos y la definición de detalles. Eso te hace un implementador.
            @endif
            @if($CAPA_NEOCORTEX == $CAPA_LIMBICA)
                {{ $evaluacion->nombre}}  según la gráfica de al lado podrás ver que cuentas con un uso equitativo de las capas Neocórtex y Límbica, permitiéndote tener una visión de corto y largo plazo más amplia, aunque podrías presentar ciertas indecisiones.
            @endif
        {{ $evaluacion->nombre}}
        </div>
    </div>
</div>
