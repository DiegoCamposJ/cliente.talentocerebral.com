

<br><br>
<div class="row row-divided">
    <div class="col-sm-6 text-center">        
        <br><br><br><br>
        <div class="text-left fw-900 fs-xl color-warning-600 keep-print-font pt-1 l-h-n m-0">
            ANALICEMOS TU INTELIGENCIA EMOCIONAL:
        </div>
        <br>
        <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
        •	Si tu puntuación en uno de los cuadrantes se mantiene igual o tiene desviaciones de entre 1 y 4 puntos, entonces no es un campo en el que se deba tomar atención, pues la capacidad cerebral se mantiene estable sin manifestar cambios importantes. <br><br>
        </div>
        <!--MOVILIDAD DEL PERFIL VARIABLE 1-->
        <br><br>
        <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            @if(abs($MO_VALOR1) > 4 )
                @switch($MOV_CUAD1)
                    @case('AZUL')
                        @if($MOV_CUAD1_TIPO == 'CRECE' )
                        •	Si tu puntuación circunstancial azul crece en más de 5 puntos con relación al puntaje núcleo, quiere decir que podrías defender tus propias razones y creencias de forma radical y con enfoque en lo que piensas únicamente. También podrías preferir espacios de soledad -en los que no exista interacción con otras personas- para volver a tu centro emocional. <br><br>
                        @else
                        •	Si tu puntuación circunstancial azul tiene una relación de decrecimiento mayor a 5 puntos, con relación al puntaje núcleo, quiere decir que podrías perder objetividad en la resolución de problemas y requerir de criterios externos que le aporten alternativas para lograrlo. <br><br>
                        @endif
                    @break

                    @case('VERDE')
                        @if($MOV_CUAD1_TIPO == 'CRECE' )
                        •	Si tu puntuación circunstancial verde crece en más de 5 puntos, con relación al puntaje núcleo, quiere decir que en estos momentos podrías presentar ciertas situaciones de miedo innecesario. Esto a su vez genera escenarios mentales de alta carta de negatividad. Además, modelos de perfeccionismo radical e intolerancia al error y sensaciones de que todo anda mal, sin lograr ver los elementos positivos. <br><br>
                        @else
                        •	Si tu puntuación circunstancial verde tiene una relación de decrecimiento mayor a 5 puntos, con relación al puntaje núcleo, quiere decir que podrías perder cierta capacidad de ajuste a las normas o reglas. Además, es posible que se presenten pensamientos de irreverencia innecesarios, los que pueden provocar acciones riesgosas, desapegadas a las normas o procedimientos. <br><br>
                        @endif
                    @break

                    @case('ROJO')
                        @if($MOV_CUAD1_TIPO == 'CRECE' )
                        •	Si tu puntuación circunstancial roja crece en más de 5 puntos, con relación al puntaje núcleo, quiere decir que en momentos de crisis podrías sentir tristeza profunda, sensación de soledad, pensamientos de victimismo y culpa; además de modelos de dependencia del criterio de otras personas. <br><br>
                        @else
                        •	Si tu puntuación circunstancial roja tiene una relación de decrecimiento mayor a 5 puntos, con relación al puntaje núcleo, quiere decir que podrías no tomar en cuenta el criterio de los demás al tomar decisiones. Incluso sentir cierto placer en que tu decisión no esté sujeta a un pensamiento colectivo y mostrar también actitudes indiferentes respecto a los demás; así como lenguajes severos y poco empáticos en tu comunicación con quien te rodea. <br><br>
                        @endif
                    @break

                    @case('AMARILLO')
                        @if($MOV_CUAD1_TIPO == 'CRECE' )
                        •	Si tu puntuación circunstancial naranja crece en más de 5 puntos, con relación al puntaje núcleo, quiere decir que en estos momentos podrías generar pensamientos y sensaciones de injusticia por parte de terceros. También dispersión, exceso de alegría y que tus decisiones podrían carecer de análisis y tornarse impulsivas, con poca validación de las consecuencias. <br><br>
                        @else
                        •	Si tu puntuación circunstancial naranja tiene una relación de decrecimiento mayor a 5 puntos, con relación al puntaje núcleo, quiere decir que pierdes la capacidad lateral de buscar soluciones y de agregar creatividad a situaciones de presión.  También que podrías ocupar las mismas soluciones que ya fueron probadas anteriormente. <br><br>
                        @endif
                    @break


                @endswitch
            @endif
        </div>
        <br><br>
        <!--MOVILIDAD DEL PERFIL VARIABLE 2-->
        <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
            @if(abs($MO_VALOR2) > 4 )
                @switch($MOV_CUAD2)
                    @case('AZUL')
                        @if($MOV_CUAD2_TIPO == 'CRECE' )
                        •	Si tu puntuación circunstancial azul crece en más de 5 puntos con relación al puntaje núcleo, quiere decir que podrías defender tus propias razones y creencias de forma radical y con enfoque en lo que piensas únicamente. También podrías preferir espacios de soledad -en los que no exista interacción con otras personas- para volver a tu centro emocional. <br><br>
                        @else
                        •	Si tu puntuación circunstancial azul tiene una relación de decrecimiento mayor a 5 puntos, con relación al puntaje núcleo, quiere decir que podrías perder objetividad en la resolución de problemas y requerir de criterios externos que le aporten alternativas para lograrlo. <br><br>
                        @endif
                    @break

                    @case('VERDE')
                        @if($MOV_CUAD2_TIPO == 'CRECE' )
                        •	Si tu puntuación circunstancial verde crece en más de 5 puntos, con relación al puntaje núcleo, quiere decir que en estos momentos podrías presentar ciertas situaciones de miedo innecesario. Esto a su vez genera escenarios mentales de alta carta de negatividad. Además, modelos de perfeccionismo radical e intolerancia al error y sensaciones de que todo anda mal, sin lograr ver los elementos positivos. <br><br>
                        @else
                        •	Si tu puntuación circunstancial verde tiene una relación de decrecimiento mayor a 5 puntos, con relación al puntaje núcleo, quiere decir que podrías perder cierta capacidad de ajuste a las normas o reglas. Además, es posible que se presenten pensamientos de irreverencia innecesarios, los que pueden provocar acciones riesgosas, desapegadas a las normas o procedimientos. <br><br>
                        @endif
                    @break

                    @case('ROJO')
                        @if($MOV_CUAD2_TIPO == 'CRECE' )
                        •	Si tu puntuación circunstancial roja crece en más de 5 puntos, con relación al puntaje núcleo, quiere decir que en momentos de crisis podrías sentir tristeza profunda, sensación de soledad, pensamientos de victimismo y culpa; además de modelos de dependencia del criterio de otras personas. <br><br>
                        @else
                        •	Si tu puntuación circunstancial roja tiene una relación de decrecimiento mayor a 5 puntos, con relación al puntaje núcleo, quiere decir que podrías no tomar en cuenta el criterio de los demás al tomar decisiones. Incluso sentir cierto placer en que tu decisión no esté sujeta a un pensamiento colectivo y mostrar también actitudes indiferentes respecto a los demás; así como lenguajes severos y poco empáticos en tu comunicación con quien te rodea. <br><br>
                        @endif
                    @break

                    @case('AMARILLO')
                        @if($MOV_CUAD2_TIPO == 'CRECE' )
                        •	Si tu puntuación circunstancial naranja crece en más de 5 puntos, con relación al puntaje núcleo, quiere decir que en estos momentos podrías generar pensamientos y sensaciones de injusticia por parte de terceros. También dispersión, exceso de alegría y que tus decisiones podrían carecer de análisis y tornarse impulsivas, con poca validación de las consecuencias. <br><br>
                        @else
                        •	Si tu puntuación circunstancial naranja tiene una relación de decrecimiento mayor a 5 puntos, con relación al puntaje núcleo, quiere decir que pierdes la capacidad lateral de buscar soluciones y de agregar creatividad a situaciones de presión.  También que podrías ocupar las mismas soluciones que ya fueron probadas anteriormente. <br><br>
                        @endif
                    @break


                @endswitch
            @endif
        </div>
    </div>
    <div class="vertical-divider"></div>
    <div class="col-sm-6 text-justify">
        <br><br><br><br>
        <div class="text-left fw-900 fs-xl color-warning-600 keep-print-font pt-1 l-h-n m-0">
            FLUJO DEL PENSAMIENTO
        </div>
        <br>
        <div class="row">
    
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

    </div>
</div>
