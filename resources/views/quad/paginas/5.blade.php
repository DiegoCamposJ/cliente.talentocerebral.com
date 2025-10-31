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
<br>
<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-2">
                <img src="{{ asset('img/brain/cz1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;">
            </div>
            <div class="col-sm-10">
                <div id="pag5textaz" class="text-left fs-xxl color-warning-600 keep-print-font pt-1 l-h-n m-0">
                    QUANTIFIER {{ $PT_NUCLEO_AZ }}  pts
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-2">
                <img src="{{ asset('img/brain/ca1.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 100%; height: 100%;">
            </div>
            <div class="col-sm-10">
                <div id="pag5textam" class="text-left fs-xxl color-warning-600 keep-print-font pt-1 l-h-n m-0">
                    DEVELOPER {{ $PT_NUCLEO_AM }}  pts
                </div>
            </div>


        </div>
    </div>
</div>

<div class="row row-divided">
    <!--QUANTIFIER AZUL -->
    <div class="col-sm-6">
        <br/>
        <!--QUANTIFIER 0 a 33-->
        <div id="pag5textazdet" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                @if((0 <= $PT_NUCLEO_AZ) && ($PT_NUCLEO_AZ <=33))

                        {{$evaluacion->nombre}} el uso de tu cuadrante azul ha marcado un puntaje que se encuentra entre 0 a 33 puntos aspecto que te ubica dentro de la zona de baja competencia. Esto indica que tus capacidades lógicas, analíticas, racionales tienden a presentar cierta dificultad en tu modelo de pensamiento; aspecto que está vinculado directamente con la resolución de conflictos y con encontrar elementos esenciales al analizar cualquier aspecto de tu realidad.<br><br>

                        <strong>Toma de decisiones:</strong> Podrías experimentar frecuentemente la pérdida de objetividad y excesiva emotividad en la toma de decisiones.<br><br>

                        <strong>Trabajo en equipo:</strong> Cuando te involucres dentro de un equipo de trabajo, podrías requerir siempre de una validación u opinión externa para resolver problemas, por lo que tus compañeros de equipo podrían percibir que tus capacidades resolutivas requieren de apoyo. <br> <br>

                        <strong>Oportunidades de mejora: </strong>Fortalecimiento del pensamiento elemental, desarrollo del
                        pensamiento analítico, y mejora en la comunicación asertiva.

                @endif

                @if((34 <= $PT_NUCLEO_AZ) && ($PT_NUCLEO_AZ <=66))

                    {{$evaluacion->nombre}} el uso de tu cuadrante azul ha marcado un puntaje que se encuentra entre los 34 a 66 puntos aspecto que te ubica dentro de la zona de competencia media. Esto indica que tus capacidades de análisis, pensamiento lógico y resolución de problemas tienden a utilizarse en segunda instancia. <br><br>

                    <strong>Toma de decisiones:</strong> Ante algún acontecimiento en donde se requiera la toma de una decisión la prioridad podría estar en la utilización de alguna de las otras capacidades, dejando el aspecto lógico-racional como un soporte secundario. <br><br>

                    <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, el uso de las capacidades lógicas-racionales al ser secundarias, podrían no ser un claro distintivo dentro de tu aporte, por lo que podrías preferir adherirte a soluciones diseñadas por otros miembros del equipo. <br><br>

                    <strong>Oportunidades de mejora:</strong> Desarrollo de un estilo de liderazgo y participación en el potenciamiento del uso de la razón y el pensamiento elemental. <br><br>

                @endif

                @if((67 <= $PT_NUCLEO_AZ) && ($PT_NUCLEO_AZ <=99))

                    {{$evaluacion->nombre}} el uso de tu cuadrante azul ha marcado un puntaje que se encuentra entre los 67 a 99 puntos aspecto que te ubica dentro de la zona de dominio de competencia.  Esto indica que prefieres un enfoque racional y cognitivo para tratar los distintos asuntos. <br><br>

                    <strong>Toma de decisiones:</strong> Prefieres aproximarte a la resolución de problemas de una manera lógica y tomar en cuenta los hechos, figuras, estadísticas y otras cosas tangibles, con una adecuada habilidad para tomar decisiones de manera objetiva. <br><br>

                    <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, el uso de las capacidades lógicas y analíticas al ser primarias, serán un gran aporte para las decisiones que se tomen; y sobre todo cuando exista la oportunidad de resolver conflictos, tu mirada elemental brindará soluciones imparciales y objetivas. <br><br>

                @endif

                @if((100 <= $PT_NUCLEO_AZ) && ($PT_NUCLEO_AZ <=150))
                    {{$evaluacion->nombre}} el uso de tu cuadrante azul marcado por un puntaje que se encuentra entre 100 y 150 puntos te ubica dentro de una zona de obstinación. Esto indica que tus capacidades lógico racionales podrían convertirse en un enfoque único en la construcción de la realidad, es decir podrías eventualmente pasar por episodios de obstinación e intolerancia. <br><br>

                    <strong>Toma de decisiones:</strong> Frente a cualquier acontecimiento externo, tu forma preferente de afrontar problemas será validar de forma preponderante los datos, los hechos y las evidencias pudiendo dejar de lado completamente cualquier otro criterio.  Esto puede conducir a una visión parcializada y enfoque único, ya que puedes llegar a pensar que solo tú tienes la razón frente a determinada circunstancia. <br><br>

                    <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, la situación antes expuesta podría provocar un sesgo muy marcado hacia los aspectos lógicos, analíticos y racionales, generando cierta incredulidad sobre cualquier tipo de información que no cuente con datos suficientes para ser validada, razón por la cual, tus compañeros de equipo podrían percibirte como una persona cerrada y poco dispuesta a acoger otras opiniones. <br><br>

                    <strong>Oportunidades de mejora:</strong> Desarrollo de las habilidades comprendidas en los tres cuadrantes cerebrales adicionales, es decir, secuenciales-procedimentales, emotivas-interpersonales y creativas-innovadoras, para enriquecer y ampliar tu enfoque y pensamiento. <br><br>
                @endif

        </div>
    </div>
    <div class="vertical-divider"></div>
    <!--DEVELOPER AMARILLO -->
    <div class="col-sm-6"><br>
        <div id="pag5textamdet" class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                @if((0 <= $PT_NUCLEO_AM) && ($PT_NUCLEO_AM <=33))

                    {{$evaluacion->nombre}} el uso de tu cuadrante naranja ha marcado un puntaje que se encuentra entre 0 a 33 puntos aspecto que te ubica dentro de la zona de baja competencia. Esto indica que tus capacidades de simultaneidad, creatividad e integración de ideas podrían presentar ciertas limitantes; la adaptabilidad al cambio, la innovación y la mejora continua también podrían ser aspectos que generen resistencia en tu modelo de pensamiento. <br> <br>

                    <strong>Toma de decisiones:</strong> Podrías experimentar cierta dificultad para encontrar nuevas ideas y falta de imaginación al tomar decisiones. <br> <br>

                    <strong>Trabajo en equipo:</strong>Cuando te involucres en un equipo de trabajo, esto requerirá muchas veces de una capacidad de adaptación y flexibilidad de pensamiento ante ideas innovadoras, así como visión de largo plazo, por lo que tus compañeros podrían percibirte como una persona un poco inflexible. <br> <br>

                    <strong>Oportunidades de mejora:</strong>Desarrollo de una visión de mayor perspectiva, flexibilidad al cambio y potenciación de la creatividad.
                @endif

                @if((34 <= $PT_NUCLEO_AM) && ($PT_NUCLEO_AM <=66))
                    {{$evaluacion->nombre}} el uso de tu cuadrante naranja ha marcado un puntaje que se encuentra entre los 34 a 66 puntos aspecto que te ubica dentro de la zona de competencia media. Esto indica que tus capacidades creativas, integradoras y estratégicas suelen aparecer casi siempre en segunda instancia, una vez que se hayan utilizado de forma primaria cualquiera de los otros cuadrantes. <br><br>

                    <strong>Toma de decisiones:</strong> Ante algún acontecimiento en donde se requiera la toma de una decisión la prioridad podría estar en la utilización de alguna de las otras capacidades, dejando los aspectos creativos y estratégicos como soportes secundarios.  <br><br>

                    <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, el uso de las capacidades creativas e innovadoras al ser secundarias, podrían no ser un claro distintivo dentro de tu aporte, por lo que podrías preferir que otra persona encabece los temas de visión a largo plazo o gestión del cambio. <br><br>

                    <strong>Oportunidades de mejora:</strong> Desarrollo del pensamiento lateral, técnicas de innovación y creatividad.  <br><br>

                @endif

                @if((67 <= $PT_NUCLEO_AM) && ($PT_NUCLEO_AM <=99))
                    {{$evaluacion->nombre}} el uso de tu cuadrante naranja ha marcado un puntaje que se encuentra entre los 67 a 99 puntos aspecto que te ubica dentro de la zona de dominio de competencia. Esto indica que puedes manejar varios datos mentales simultáneamente, hacer conexiones rápidas y sentirte cómodo frente a conceptos abstractos. <br><br>

                    <strong>Toma de decisiones:</strong> Prefieres  aproximarte a la resolución de problemas de una manera creativa, tomando en cuenta una visión holística, evaluando varios aspectos y facetas simultáneamente. Eres capaz de hacer rompecabezas mentales y alcanzar las conclusiones de una manera espontánea más que de una forma estudiada. <br><br>

                    <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, el uso de las capacidades innovadoras e integradoras al ser primarias, serán un gran aporte para las acciones que se tomen; y sobre todo cuando exista la oportunidad de aportar con ideas ya que tu facilidad de pensamiento lateral inspirará soluciones imaginativas y originales promoviendo el proceso creativo y estratégico. <br><br>

                @endif

                @if((100 <= $PT_NUCLEO_AM) && ($PT_NUCLEO_AM <=150))
                    {{$evaluacion->nombre}} el uso de tu cuadrante naranja marcado por un puntaje que se encuentra entre 100 y 150 puntos te ubica dentro de una zona de obstinación. Esto indica que tus capacidades integradoras y creativas podrían convertirse en un enfoque único en la construcción de la realidad, es decir podrías eventualmente pasar por episodios de dispersión e informalidad. <br><br>

                    <strong>Toma de decisiones:</strong> Frente a cualquier asunto externo, tu forma preferente de afrontar dificultades será actuando con menos seriedad de la que realmente se requiere, tratando de minimizar los acontecimientos, cambiando permanentemente de decisión y actividad,  pudiendo dejar de lado completamente el enfoque en la implementación de una solución, la formalidad y el orden. <br><br>

                    <strong>Trabajo en equipo:</strong> Cuando te involucres en un equipo de trabajo, la situación antes expuesta podría provocar un sesgo muy marcado hacia los aspectos creativos y estratégicos, generando conflicto con la organización, la planificación y los procedimientos, razón por la cual, tus compañeros de equipo podrían percibirte como una persona informal y poco comprometida con la consecución de objetivos. <br><br>

                    <strong>Oportunidades de mejora:</strong> Desarrollo de habilidades de organización y planificación operativa, manejo del tiempo, implementación de procesos y proyectos. <br><br>

                @endif

        </div>
    </div>
</div>
