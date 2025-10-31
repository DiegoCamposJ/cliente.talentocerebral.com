<div class="row">
    <div class="col-sm-12 text-center">
        <h3 class="display-3 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
            DESCRIPTOR DE CUADRANTES
        </h3>
        <h3 class="display-2 fw-500 color-warning-600 keep-print-font pt-4 l-h-n m-0">
            SEGÚN TU PUNTAJE
        </h3>
    </div>
</div>
<br><br>
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<br><br>
<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-2">
                <img src="{{ asset('img/brain/cv1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;">
            </div>
            <div class="col-sm-10">
                <div id="pag5textve" class="text-left fs-xxl color-warning-600 keep-print-font pt-1 l-h-n m-0">
                    UTILITARIAN {{ $PT_NUCLEO_VE }}  pts
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-2 text-center">
                <img src="{{ asset('img/brain/cr1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;">
            </div>
            <div class="col-sm-10">
                <div id="pag5textro" class="text-left fs-xxl color-warning-600 keep-print-font pt-1 l-h-n m-0">
                    ATTENTIVE {{ $PT_NUCLEO_RO }}  pts
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row row-divided">
    <!--UTILITARIAN VERDE -->
    <div class="col-sm-6 text-left">
        <br/>
        <div id="pag6textvedet" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            @if((0 <= $PT_NUCLEO_VE) && ($PT_NUCLEO_VE <=33))
                {{ $evaluacion->nombre}} el uso de tu cuadrante verde ha marcado un puntaje que se encuentra entre 0 a 33 puntos aspecto que te ubica dentro de la zona de baja competencia. Esto indica que tus capacidades de organización, secuencia, cumplimiento y control del tiempo podrían mostrar cierta dificultad en su desarrollo; aspecto que podría generar en determinados momentos la necesidad de un control externo ejercido por otra persona que te ayude a conseguir tus metas dentro de los plazos establecidos. <br><br>

                <strong>Toma de decisiones:</strong> Podrías experimentar cierta dificultad para el cumplimiento de reglas y acatar procedimientos, pasando por encima de ellos al tomar decisiones. <br><br>

                <strong>Trabajo en equipo:</strong> Cuando te involucres dentro de un equipo de trabajo podrías requerir de una supervisión permanente, y tus compañeros de equipo podrían manifestar cierta desconfianza debido a tu capacidad de cumplimiento de reglas y compromisos. <br><br>

                <strong>Oportunidades de mejora:</strong> Desarrollo de técnicas para el manejo del tiempo y cumplimiento de metas.<br><br>
            @endif

            @if((34 <= $PT_NUCLEO_VE) && ($PT_NUCLEO_VE <=66))

                {{ $evaluacion->nombre}} el uso de tu cuadrante verde ha marcado un puntaje que se encuentra entre los 34 a 66 puntos aspecto que te ubica dentro de la zona de competencia media. Esto indica que tus capacidades del uso de las secuencias ordenadas, la planificación y la administración del tiempo eficiente podrían utilizarse de forma secundaria. <br><br>

                <strong>Toma de decisiones:</strong> Ante algún acontecimiento en donde se requiera la toma de una decisión la prioridad podría estar en la utilización de alguna de las otras capacidades, dejando los aspectos de planificación y organización como soportes secundarios. <br><br>

                <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, el uso de las capacidades secuenciales-organizativas al ser secundarias, podrían no ser un claro distintivo dentro de tu aporte, por lo que podrías preferir adherirte a cronogramas o procedimientos elaborados por otros miembros del equipo. <br><br>

                <strong>Oportunidades de mejora:</strong> Desarrollo de mecanismos de manejo del tiempo, organización y procesos. <br><br>


            @endif

            @if((67 <= $PT_NUCLEO_VE) && ($PT_NUCLEO_VE <=99))

                {{ $evaluacion->nombre}} el uso de tu cuadrante verde ha marcado un puntaje que se encuentra entre los 67 a 99 puntos aspecto que te ubica dentro de la zona de dominio de competencia. Esto indica que gustas de lo estructurado en un sentido práctico y procedimental. <br><br>

                <strong>Toma de decisiones:</strong> Prefieres aproximarte a la resolución de problemas de una manera organizada, tomando en cuenta el orden, los detalles, los métodos, procedimientos y el manejo del tiempo, con una adecuada habilidad para planear operativamente las acciones. <br><br>

                <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, el uso de las capacidades secuenciales y organizativas al ser primarias, serán un gran aporte para las acciones que se tomen; y sobre todo cuando exista la oportunidad de planificar operativamente, tu mirada minuciosa y disciplinada brindará soluciones prácticas y estructuradas. <br><br>

            @endif

            @if((100 <= $PT_NUCLEO_VE) && ($PT_NUCLEO_VE <=150))
                {{ $evaluacion->nombre}} el uso de tu cuadrante verde marcado por un puntaje que se encuentra entre 100 y 150 puntos te ubica dentro de una zona de obstinación. Esto indica que tus capacidades de organización, planificación y control se encuentran en una zona de importancia superlativa, por lo que podrían convertirse en un enfoque único en la construcción de la realidad, es decir podrías eventualmente pasar por episodios de estrés y preocupación excesivos. <br><br>

                <strong>Toma de decisiones:</strong> Frente a cualquier acontecimiento externo, tu forma preferente de afrontar problemas será la necesidad de controlar la situación a través de requerir garantías y resguardos que te brinden seguridad, pudiendo dejar de lado completamente cualquier otro criterio.  Esto puede conducir a una visión parcializada y enfoque único, ya que puedes llegar a pensar que si algo no es completamente seguro no vale la pena ni siquiera intentarlo porque puede salir mal. <br><br>

                <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, la situación antes expuesta podría provocar un sesgo muy marcado hacia los aspectos de orden y control, razón por la cual, tus compañeros de equipo podrían percibirte como una persona demasiado estricta y rigurosa, con poca flexibilidad al cambio. <br><br>

                <strong>Oportunidades de mejora:</strong> Desarrollo de pensamiento lateral, flexibilidad al cambio e innovación, para enriquecer y ampliar tu enfoque y apreciación de los distintos puntos de vista. <br><br>

            @endif

        </div>
        <br/>
    </div>
    <div class="vertical-divider"></div>
    <!-- ATTENTIVE ROJO -->
    <div class="col-sm-6 text-left">
        <br/>
        <div id="pag6textrodet" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            @if((0 <= $PT_NUCLEO_RO) && ($PT_NUCLEO_RO <=33))

                {{ $evaluacion->nombre}} el uso de tu cuadrante rojo ha marcado un puntaje que se encuentra entre 0 a 33 puntos aspecto que te ubica dentro de la zona de baja competencia. Esto indica que tus capacidades de empatía, comunicación y relaciones interpersonales podrían mostrar cierta dificultad, o tendencia a evitar vínculos profundos emocionales con otras personas al establecer relaciones tanto personales como profesionales. <br><br>

                <strong>Toma de decisiones:</strong> Podrías experimentar cierta dificultad para tomar en cuenta las opiniones o puntos de vista, así como los sentimientos de otras personas al tomar decisiones. <br><br>

                <strong>Trabajo en equipo:</strong>  Cuando te involucres dentro de un equipo de trabajo,  el cierto rechazo a la empatía y a la comprensión de las emociones de otras personas podría provocar que tu comunicación no sea lo suficientemente eficiente y que tu capacidad de escucha sea limitada y que muchas veces se priorice la verdad propia sobre la ajena.<br><br>

                <strong>Oportunidades de mejora:</strong> Desarrollo de la escucha empática y los modelos de comunicación. <br><br>

            @endif

            @if((34 <= $PT_NUCLEO_RO) && ($PT_NUCLEO_RO <=66))
                {{ $evaluacion->nombre}} el uso de tu cuadrante rojo ha marcado un puntaje que se encuentra entre los 34 a 66 puntos aspecto que te ubica dentro de la zona de competencia media. Esto indica que tus capacidades de comunicación, empatía y relaciones interpersonales suelen estar casi siempre subyugadas por el uso de cualquiera de los otros cuadrantes. <br><br>

                <strong>Toma de decisiones:</strong> Ante algún acontecimiento en donde se requiera la toma de una decisión la prioridad podría estar en la utilización de alguna de las otras capacidades, dejando los aspectos de comunicación efectiva y empatía como soportes secundarios. <br><br>

                <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, el uso de las capacidades emotivas-relacionales al ser secundarias, podrían no ser un claro distintivo dentro de tu aporte, por lo que podrías preferir que otra persona encabece los temas de comunicación e influencia en otros. <br><br>

                <strong>Oportunidades de mejora:</strong> Desarrollo de escucha activa, comunicación y relaciones inter-personales. <br><br>

            @endif

            @if((67 <= $PT_NUCLEO_RO) && ($PT_NUCLEO_RO <=99))
                {{ $evaluacion->nombre}} el uso de tu cuadrante rojo ha marcado un puntaje que se encuentra entre los 67 a 99 puntos aspecto que te ubica dentro de la zona de dominio de competencia. Esto indica que estás naturalmente en sintonía emocional y cuentas con un modelo empático hacia las necesidades, estados de ánimo, actitudes o nivel de energía de los demás. <br><br>

                <strong>Toma de decisiones:</strong> Prefieres  aproximarte a la resolución de problemas de una manera sensitiva, tomando en cuenta los sentimientos, opiniones, afectación e interrelación con otras personas, con una adecuada habilidad para comunicar, influenciar y percibir a los demás. <br><br>

                <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, el uso de las capacidades emotivas y relacionales al ser primarias, serán un gran aporte para las acciones que se tomen; y sobre todo cuando exista la oportunidad de comunicar, tu mirada empática y facilidad de expresión brindará soluciones que tomen en cuenta principalmente el factor humano.  <br><br>

            @endif

            @if((100 <= $PT_NUCLEO_RO) && ($PT_NUCLEO_RO <=150))
                {{ $evaluacion->nombre}} el uso de tu cuadrante rojo marcado por un puntaje que se encuentra entre 100 y 150 puntos te ubica dentro de una zona de obstinación. Esto indica que tus capacidades sensitivas e interpersonales se encuentran en una zona de importancia superlativa, por lo que podrían convertirse en un enfoque único en la construcción de la realidad, es decir podrías eventualmente pasar por episodios de sentimientos exacerbados, resentimiento y tristeza. <br><br>

                <strong>Toma de decisiones:</strong> Frente a cualquier acontecimiento externo, tu forma preferente de afrontar dificultades será la necesidad de encontrar validación y aprobación en la opinión de los demás antes de tomar una decisión, con una excesiva carga de emotividad y sobreabundancia de detalles en tu comunicación, lo que podría limitar tu capacidad objetiva de mirar los asuntos y tendería a sobredimensionar las situaciones como mucho más complejas de lo que realmente son, haciendo difícil el llegar a una solución. <br><br>

                <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, la situación antes expuesta podría provocar un sesgo muy marcado hacia los aspectos sensitivos e interpersonales, razón por la cual, tus compañeros de equipo podrían percibirte como una persona demasiado dependiente y emotiva, con necesidad constante de trabajar con otras personas de manera colectiva, pasando por alto el respeto a los espacios personales que también son necesarios para la generación de resultados individuales. <br><br>

                <strong>Oportunidades de mejora:</strong> Desarrollo de pensamiento elemental, fortalecimiento de la autoestima, validación propia y respeto a los espacios individuales, para enriquecer y ampliar tu enfoque y apreciación de los distintos modelos de pensamiento. <br><br>

            @endif

        </div>
        <br/>


    </div>
</div>
