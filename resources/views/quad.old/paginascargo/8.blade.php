<div class="row">
    <div class="col-sm-12">
        <div class="text-center fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            PUNTAJE  NÚCLEO  vs  PUNTAJE CIRCUNSTANCIAL
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                    <br><br>
                    <img src="{{ asset('img/brain/logo.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 70%;">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                    <br><br>
                    @if($evaluacion->sexo == 'F')
                        <img src="{{ asset('img/brain/nvsc_f.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 70%;">                    @else

                        <img src="{{ asset('img/brain/nvsc_m.png') }}" style=" display: block;margin-left: auto;margin-right: auto;width: 70%;">
                    @endif
            </div>
        </div>
    </div>
</div>

<br>
<hr style="height:2px;border-width:0px;color:#2198F3;background-color:#2198F3">
<br><br>
<div class="row row-divided">
    <div class="col-sm-6 text-center">

        <div class="text-left fs-xxl fw-900 color-warning-600 keep-print-font pt-1 l-h-n m-0">
            MOVILIDADES DEL PERFIL <br> EN MOMENTOS DE  <br> CRISIS O PRESIÓN
        </div>
        <br> <br><br><br><br>
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
                            <strong>NÚCLEO</strong>
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
                            <strong>CIRCUNSTANCIAL</strong>
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
            </div>
        </div>


        <br><br><br><br>
        <div class="row">
            <div class="col-sm-11">
                <div class="text-justify fw-900 fs-xl keep-print-font pt-01 l-h-n m-0">
                    Diferencias de hasta 5 puntos muestra inteligencia emocional en el cuadrante.
                </div>
                <br>
                <div class="text-justify fs-xl keep-print-font pt-1 l-h-n m-0">
                    •	La primera línea corresponde a tu puntaje NÚCLEO. <br>
                    •	La segunda línea corresponde a tu puntaje CIRCUNSTANCIAL. <br>
                    •	Al obtener la diferencia entre ambos puntajes si el resultado es negativo, quiere decir que tu cuadrante decrece; si el resultado es positivo, indica que tu cuadrante crece. <br>
                </div>
            </div>
        </div>


    </div>
    <div class="vertical-divider"></div>
    <div class="col-sm-6 text-justify">
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
</div>
