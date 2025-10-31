<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class VariablesBGRSeeder extends Seeder
{

    public function run()
    {
        //Situacion 1
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(5),
            'descripcion'=>'MARIPOSA.- La mariposa cree  que los que puedan deberían volar sobre el bosque para llegar más rápido e ir pasando los obstáculos según como vayan llegando. Además cosidera que deben ser valientes, enfrentarse a los monstruos que puedan aparecer en el camino y llevar armaduras para protegerse.',
            'color'=>'ESCEPTICO',
            'tipo'=>'PIONERO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(12),
            'descripcion'=>'CABALLO.- El caballo cree que tienen que ir a todo galope por el sendero y aprovechar recolectando bayas, hojas medicinales y raíces en el camino. Además piensa que estarán a salvo si todos van uno cerca del otro. El caballo tuvo una experiencia pasada en la que junto a otros caballos visitó un bosque cercano para conocer a sus habitantes, por lo que piensa que esta vez se puede aplicar la misma estrategia.',
            'color'=>'CONSERVADOR',
            'tipo'=>'ADAPTADOR TEMPRANO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(12),
            'descripcion'=>'GOLONDRINA.- La golondrina cree que primero debería ir un grupo pequeño de animales para verificar el estado del sendero y trazar la ruta que pueden seguir.',
            'color'=>'PRAGMATICO',
            'tipo'=>'MAYORIA TEMPRANA',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(12),
            'descripcion'=>'TORO.- El toro cree que se deben evaluar todas las propuestas que se han realizado para ver con cuál de ellas podrán llegar al arroyuelo de la Montaña Azul. Además, considera que deben esperar y estar seguros del plan que deben seguir.',
            'color'=>'MAYORIA TEMPRANA',
            'tipo'=>'PRAGMATICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(12),
            'descripcion'=>'ELEFANTE.- El elefante preferiría buscar la flor dentro del bosque, cree que si la flor está en el bosque sería innecesario realizar el viaje a la Montaña Azul y poner en riesgo su seguridad. El elefante irá si todos aceptan ir.',
            'color'=>'ADAPTADOR TEMPRANO',
            'tipo'=>'CONSERVADOR',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(12),
            'descripcion'=>'GATO.- El gato piensa que si bien la flor es muy importante para algunos animales, más valiosa es la vida de todos y cada uno de ellos y cree que no se debería correr riesgos innecesarios por alcanzar una solución que aunque es alentadora podría ser devastadora.',
            'color'=>'PIONERO',
            'tipo'=>'ESCEPTICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        //--------Situacion 2
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(6),
            'descripcion'=>'<p>MARIPOSA.- El lema de la mariposa es: &nbsp;&ldquo;Nuestro bosque puede ser un mejor lugar para vivir&rdquo;, por lo que propone:<br />
            &bull;&nbsp;&nbsp; &nbsp;Crear un nuevo sistema que nos permita atravesar el bosque desde el aire.<br />
            &bull;&nbsp;&nbsp; &nbsp;Construir nuevas zonas de diversi&oacute;n y vida que aunque deba demoler algunos espacios tradicionales permitan a los animales tener nuevas &aacute;reas con mayor amplitud y novedad.</p>',
            'color'=>'ESCEPTICO',
            'tipo'=>'PIONERO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(6),
            'descripcion'=>'<p>CABALLO.- El lema del caballo es: &ldquo;El bosque puede avanzar y modernizarse&rdquo;, por lo que plantea:<br />
            &bull;&nbsp;&nbsp; &nbsp;Realizar un consejo con todos los animales para hablar sobre los temas relevantes del bosque.<br />
            &bull;&nbsp;&nbsp; &nbsp;Construir una canal para recoger el agua de la lluvia para que en la &eacute;poca de sequ&iacute;a no les falte agua.</p>',
            'color'=>'CONSERVADOR',
            'tipo'=>'ADAPTADOR TEMPRANO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(6),
            'descripcion'=>'<p>GOLONDRINA.- El lema de la golondrina es: &ldquo;Las mejoras siempre tienen que ser analizadas, y las reglas tiene que ser aplicadas para todos los animales&rdquo;, por lo que plantea:<br />
            &bull;&nbsp;&nbsp; &nbsp;Que se utilicen los recursos como lo han hecho antes ya que el sistema anterior ha tenido muy buenos resultados en el manejo y control del bosque.<br />
            &bull;&nbsp;&nbsp; &nbsp;Que se pueden evaluar ideas que tengan los otros animales para decidir cu&aacute;l de ellas se pueden aplicar.<br />
            &bull;&nbsp;&nbsp; &nbsp;Que tengan un tiempo determinado para aplicar las nuevas propuestas, que evaluen las ideas que se escojan para la direcci&oacute;n del bosque, as&iacute; las podr&aacute;n estudiar a profundidad y conocer si van a funcionar o no.</p>',
            'color'=>'PRAGMATICO',
            'tipo'=>'MAYORIA TEMPRANA',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(6),
            'descripcion'=>'<p>TORO.- &nbsp;El lema del toro es: &ldquo;Las ideas revolucionarias solo funcionan para los humanos, nosotros debemos mantenernos con las reglas del bosque&rdquo;, por lo que propone:<br />
            &bull;&nbsp;&nbsp; &nbsp;Que no se dejen llevar por ideas que no se han probado, ya que la seguridad de todos los animales depende de esas propuestas.<br />
            &bull;&nbsp;&nbsp; &nbsp;Que deber&iacute;an tomar las ideas del bosque vecino, puesto que a ellos les ha ido muy bien y tienen evidencias de que ese m&eacute;todo est&aacute; funcionando.</p>',
            'color'=>'MAYORIA TEMPRANA',
            'tipo'=>'PRAGMATICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(6),
            'descripcion'=>'<p>ELEFANTE.- El lema del elefante es: &ldquo;Mantener las normas que estamos usando, para seguir viviendo como hasta ahora, porque nuestras reglas si funcionan&rdquo;, por lo que plantea.<br />
            &bull;&nbsp;&nbsp; &nbsp;Continuar con la adiministraci&oacute;n del bosque tal como est&aacute;, es un m&eacute;todo antiguo pero con el cual han podido vivir tranquilamente. Considera que no tienen que arriesgar su tranquilidad con propuestas nuevas y que no est&aacute;n probadas.</p>',
            'color'=>'ADAPTADOR TEMPRANO',
            'tipo'=>'CONSERVADOR',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(6),
            'descripcion'=>'<p>GATO.- &nbsp;El lema del gato es: &ldquo;La tradici&oacute;n siempre es uno de los pilares que se deben honrar en cualquier situaci&oacute;n, m&aacute;s all&aacute; de que las cosas cambian una sociedad de animales se basa en no perder los principios b&aacute;sicos que la regulan por lo que plantea:<br />
            &bull;&nbsp;&nbsp; &nbsp;Que todo tiene que manejarse en base a los principios heredados de los ancestros. &nbsp;Todo funciona perfectamente y alg&uacute;n cambio podr&iacute;a analizarse pero no hace falta revolucionar la vida en el bosque.<br />
            &bull;&nbsp;&nbsp; &nbsp;Regirse a los mandamientos m&aacute;s antiguos del bosque ya que estos han sido una tradici&oacute;n legendaria &nbsp;y todos los animales han vivido con ellos.<br />
            &bull;&nbsp;&nbsp; &nbsp;Se debe rescatar lso viejos rituales y ense&ntilde;arlos a los cachorros de cada especie para que esto recate la identidad y el adn del bosque.&nbsp;</p>',
            'color'=>'PIONERO',
            'tipo'=>'ESCEPTICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 2,
            'created_at' => Carbon::now(),
        ]);

        //Situacion 3
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(7),
            'descripcion'=>'MARIPOSA.- Llega a la casa del Sr. Conejo y le cuenta que el bosque es el mejor lugar del mundo, un sitio mágico y que no hay nada como su bosque.  Dice que los animales son todos muy buenos. Ofrece darle su amistad, confianza y ayudarle en todo lo que necesite. Además desea hacer una fiesta con bombos y platillos para darle la bienvenida.',
            'color'=>'ESCEPTICO',
            'tipo'=>'PIONERO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 3,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(7),
            'descripcion'=>'CABALLO.- Está feliz de que el Sr. Conejo se mude al bosque. Piensa que podría ser refrescante conocer a un nuevo habitante con otras costumbres y nuevas historias para contar. Le ofrece presentarle a todos los animales para que lo conozcan.',
            'color'=>'CONSERVADOR',
            'tipo'=>'ADAPTADOR TEMPRANO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 3,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(7),
            'descripcion'=>'GOLONDRINA.- Primero quiere saber qué animales han ido a visitar al conejo, es un factor importante para su decisión de visitarlo. Considera que tiene que conocer muy bien al recién llegado para poder ser amigos y entregarle su confianza.',
            'color'=>'PRAGMATICO',
            'tipo'=>'MAYORIA TEMPRANA',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 3,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(7),
            'descripcion'=>'TORO.- Primero desea hablar con los animales que ya han visitado al Sr. Conejo es muy importante las impresiones que tengan de él. Piensa que primero deberían investigar al Sr. Conejo antes de darle la bienvenida al bosque, pero no se lo menciona a nadie para no crear controversia.',
            'color'=>'MAYORIA TEMPRANA',
            'tipo'=>'PRAGMATICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 3,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(7),
            'descripcion'=>'ELEFANTE.- Piensa mucho en si debe o no ir a visitar al Sr. Conejo. Considera que los demás animales también deberían evaluar la visita. Sin embargo, si realizan una fiesta de presentación no podría faltar.',
            'color'=>'ADAPTADOR TEMPRANO',
            'tipo'=>'CONSERVADOR',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 3,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(7),
            'descripcion'=>'GATO.- La visita tendrá que esperar mucho tiempo.  Considera que hay  que darle un tiempo al recién llegado para que se organice por lo que no desea molestarlo. Mejor se encarga de sus propios pendientes.  Piensa que todos los animales deberían hacer lo mismo y evitar las visitas al nuevo integrante del bosque para no invadir su espacio.',
            'color'=>'PIONERO',
            'tipo'=>'ESCEPTICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 3,
            'created_at' => Carbon::now(),
        ]);

        //situacion 4
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(8),
            'descripcion'=>'MARIPOSA.- Propone volar al riachuelo por sobre las llamas las veces que sea necesario y llevar agua en sus alas y así mitigar las llamas, dice que los animales que no vuelan podrían soplar y soplar para apagar las llamas.',
            'color'=>'ESCEPTICO',
            'tipo'=>'PIONERO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 4,
            'created_at' => Carbon::now(),
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(8),
            'descripcion'=>'CABALLO.-  Propone organizar dos grupos:  uno en los que se encuentren los animales ancianos y los más jóvenes, para que se pongan a salvo, y otro con los aminales más fuertes para tratar de apagar las llamas utilizando hojas para llevar agua.',
            'color'=>'CONSERVADOR',
            'tipo'=>'ADAPTADOR TEMPRANO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(8),
            'descripcion'=>'GOLONDRINA.- Plantea que la primera parte del plan del caballo se la podría aplicar. Para la segunda parte del plan deberían hacerlo solo un grupo pequeño de animales y si les resulta los demás animales hacerlo también.',
            'color'=>'PRAGMATICO',
            'tipo'=>'MAYORIA TEMPRANA',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(8),
            'descripcion'=>'TORO.- Plantea utilizar la estrategia que usaron en la sabana y que mitigó el fuego. Hicieron una zanja alrededro del fuego, así el fuego no pudo avanzar, quedó encerrado y se extinguió.',
            'color'=>'MAYORIA TEMPRANA',
            'tipo'=>'PRAGMATICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(8),
            'descripcion'=>'ELEFANTE.- Plantea que sería mejor si se quedan en el bosque junto al arroyuelo pero considera que deberían hacer algo si todos y cada uno de los animales están de acuerdo.',
            'color'=>'ADAPTADOR TEMPRANO',
            'tipo'=>'CONSERVADOR',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(8),
            'descripcion'=>'GATO.- Plantea que todos los animales deben quedarse en sus lugares ya que el fuego se extinguirá antes de que llegue a los puntos donde viven, considera que es muy arriesgado salir a recorrer el bosque en búsqueda de otro lugar porque podrían morir en el intento. ',
            'color'=>'PIONERO',
            'tipo'=>'ESCEPTICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 4,
            'created_at' => Carbon::now(),
        ]);


        //situacion 5

        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'¿Te casarías con tu pareja dado que si bien tu familia es importante crees que debe primar tu futuro y tus proyectos de vida ante cualquier situación familiar?  ',
            'tipo'=>'PIONERO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 5,
            'created_at' => Carbon::now(),
        ]);



        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'¿Acoplas tu vida y la divides para avanzar con los planes de boda  pero hablas con tu esposa para apoyar a tu madre y hermanos en aspectos de alta vulnerabilidad? ',
            'tipo'=>'ADAPTADOR TEMPRANO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 5,
            'created_at' => Carbon::now(),
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'¿Conversarías con tu pareja planteando que tomen la decisión de casarse, pero que de inicio se muden a la casa de tu madre y hermanos hasta que su situación económica y personal se estabilice?',
            'tipo'=>'MAYORÍA TEMPRANA',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 5,
            'created_at' => Carbon::now(),
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'¿Decidirías postergar tu boda hasta que la situación de tu madre y hermanos se estabilice y en base a eso tomar decisiones buenas para todos, a pesar de que te causa dolor dejar de lado ese compromiso con tu pareja por el momento?',
            'tipo'=>'PRAGMÁTICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 5,
            'created_at' => Carbon::now(),
        ]);


        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'¿Te quedarías a apoyar a tu madre y hermanos y renunciarías a iniciar una nueva vida con tu pareja de varios años, sin importar las consecuencias que vengan detrás? ',
            'tipo'=>'CONSERVADOR',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 5,
            'created_at' => Carbon::now(),
        ]);




        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'¿Continuarías con tu vida de familia y piensas que la mejor forma más sabia de afrontar esto es dejando que el tiempo decida por ti?',
            'tipo'=>'ESCEPTICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 5,
            'created_at' => Carbon::now(),
        ]);




        //BGR
        //situacion 6

        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'Decides dar un paso adelante en tu profesión llevas tu talento, ideas y a tu familia y te mudas a Francia, con una consigna de fe absoluta y sin un plan completamente claro.',
            'tipo'=>'PIONERO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 6,
            'created_at' => Carbon::now(),
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'Propones a la empresa realizar un viaje de exploración tanto del país como de tu lugar de trabajo y las actividades que tendrás a tu cargo, previo a mudarte de forma indefinida a Francia.',
            'tipo'=>'ADAPTADOR TEMPRANO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 6,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'Solicitas un tiempo de un mes para dejar en orden tu vida en el país de residencia actual antes de viajar y mudarte a Francia.',
            'tipo'=>'MAYORÍA TEMPRANA',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 6,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'Realizas una evaluación completa del equipo de trabajo que tendrías a tu cargo, te informas acerca del salario que percibirías, el costo de vida, retos y desafíos que esto generará, por lo que solicitas una convivencia de dos semanas con tu equipo de trabajo, lo que te permita determinar la mecánica de trabajo que ellos manejan.',
            'tipo'=>'PRAGMÁTICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 6,
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'Piensas que el costo que esta decisión podría tener para tu familia es un poco elevado, que si bien te permite crecer tanto personal como profesionalmente, desearías evaluar este aspecto con más elementos de juicio tomando en cuenta el criterio de tu familia y círculo social. Ves muy poco probable la opción de un cambio radical ya que consideras que para ti tu familia es lo más importante.',
            'tipo'=>'CONSERVADOR',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 6,
            'created_at' => Carbon::now(),
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>3,
            'slug'=>Str::random(10),
            'descripcion'=>'Piensas que este tipo de cambios demandan demasiado riesgo injustificado, considerando que tu personalidad y adaptación al cambio no son compatibles.',
            'tipo'=>'ESCEPTICO',
            'usuario_registra'=>'ADMIN',
            'situacion_id' => 6,
            'created_at' => Carbon::now(),
        ]);

        //SITUACION 7
        //________DESCRIPTORES___________

        //PIONERO
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'PIONERO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Apasionado',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'PIONERO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Vanguardista',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'PIONERO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Arriesgado',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'PIONERO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Visionario',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'PIONERO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Automotivado',

        ]);
        //ADAPTADOR TEMPRANO
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'ADAPTADOR TEMPRANO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Flexible',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'ADAPTADOR TEMPRANO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Cualitativo',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'ADAPTADOR TEMPRANO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Experiencial',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'ADAPTADOR TEMPRANO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Asertivo',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'ADAPTADOR TEMPRANO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Curioso',
        ]);


        //MAYORÍA TEMPRANA
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'MAYORÍA TEMPRANA','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Observador',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'MAYORÍA TEMPRANA','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Enfocado a la acción',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'MAYORÍA TEMPRANA','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Estratega',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'MAYORÍA TEMPRANA','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Conservador',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'MAYORÍA TEMPRANA','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Validador',
        ]);

        //PRAGMÁTICO
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'PRAGMÁTICO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Basados en hechos',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'PRAGMÁTICO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Cauteloso',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'PRAGMÁTICO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Basado en resultados',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'PRAGMÁTICO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Mesurado',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'PRAGMÁTICO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Analítico',
        ]);
        //CONSERVADOR
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'CONSERVADOR','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Estructurado',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'CONSERVADOR','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Trabajador',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'CONSERVADOR','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Estable',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'CONSERVADOR','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Técnico',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'CONSERVADOR','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Cuantitativo',
        ]);

        //ESCEPTICO
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'ESCEPTICO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Crítico',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'ESCEPTICO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Dominante',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'ESCEPTICO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Persistente',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'ESCEPTICO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Determinante',
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(4),'tipo'=>'ESCEPTICO','situacion_id' => 7,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Realista',
        ]);

        //SITUACION 8
        //________PARES DE ATRIBUTOS___________
        //1
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'PIONERO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Apasionado','pareja' => 1,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'ESCEPTICO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Realista','pareja' => 1,
        ]);

        //2
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'ESCEPTICO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Dominante','pareja' => 2,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'PIONERO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Automotivado','pareja' => 2,

        ]);

        //3
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'PIONERO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Vanguardista','pareja' => 3,
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'ESCEPTICO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Determinante','pareja' => 3,
        ]);

        //4
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'ESCEPTICO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Persistente','pareja' => 4,
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'PIONERO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Arriesgado','pareja' => 4,
        ]);

        //5
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'ESCEPTICO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Crítico','pareja' => 5,
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'PIONERO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Visionario','pareja' => 5,
        ]);

        //6

        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'ADAPTADOR TEMPRANO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Flexible','pareja' => 6,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'CONSERVADOR','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Estructurado','pareja' => 6,
        ]);

        //7
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'CONSERVADOR','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Trabajador','pareja' => 7,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'ADAPTADOR TEMPRANO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Asertivo','pareja' => 7,
        ]);

        //8
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'CONSERVADOR','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Estable','pareja' => 8,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'ADAPTADOR TEMPRANO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Curioso','pareja' => 8,
        ]);

        //9
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'ADAPTADOR TEMPRANO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Cualitativo','pareja' => 9,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'CONSERVADOR','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Cuantitativo','pareja' => 9,
        ]);

        //10
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'CONSERVADOR','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Técnico','pareja' => 10,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'ADAPTADOR TEMPRANO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Experiencial','pareja' => 10,
        ]);

        //11
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'MAYORÍA TEMPRANA','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Observador','pareja' => 11,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'PRAGMÁTICO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Analítico','pareja' => 11,
        ]);

        //12
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'MAYORÍA TEMPRANA','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Estratega','pareja' => 12,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'PRAGMÁTICO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Mesurado','pareja' => 12,
        ]);

        //13
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'PRAGMÁTICO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Cauteloso','pareja' => 13,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'MAYORÍA TEMPRANA','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Enfocado a la acción','pareja' => 13,
        ]);

        //14
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'PRAGMÁTICO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Basado en resultados','pareja' => 14,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'MAYORÍA TEMPRANA','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Conservador','pareja' => 14,
        ]);

        //15
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'PRAGMÁTICO','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Basados en hechos','pareja' => 15,
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo'=>'MAYORÍA TEMPRANA','situacion_id' => 8,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Validador','pareja' => 15,
        ]);

        //SITUACION 9
        //________12 PREGUNTAS___________

        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'PIONERO','color' => 'ESCEPTICO','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que el mundo está en un cambio dinámico y que lo único que puedes controlar ante este fenómeno permanente son tus emociones?',
            'pareja' =>1
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'ESCEPTICO','color' => 'PIONERO','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que la planificación permite tener un control adecuado de la situación y que los cambios permanente pueden generar caos y desgaste emocional innecesario?',
            'pareja' =>1
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'ESCEPTICO','color' => 'PIONERO','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que todas las circunstancias de la vida ameritan una mirada realista que impida apasionamiento innecesario y la toma de decisiones con el corazón?',
            'pareja' =>2
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'PIONERO','color' => 'ESCEPTICO','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que en muchas cosas de la vida más allá de los escenarios negativos que puedan plantearse están siempre la actitud y pasión que pongamos para enfrentarlos?',
            'pareja' =>2
        ]);


        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'ADAPTADOR TEMPRANO','color' => 'CONSERVADOR','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que además de mirar las cosas de forma diferente siempre es valioso o importante tener un conocimiento profundo del tema antes de tomar una decisión?',
            'pareja' =>3
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'CONSERVADOR','color' => 'ADAPTADOR TEMPRANO','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que cuando se dan circunstancias difíciles y cambios radicales, es prioritario esperar y mirar como las decisiones de otras personas para evitar riesgo y sumarte a tendencias menos riesgosas?',
            'pareja' =>3
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'ADAPTADOR TEMPRANO','color' => 'CONSERVADOR','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que las propuestas que buscan la trascendencia, el crecimiento y la mejora merecen tu apoyo, aunque muchas veces pueden parecer amenazantes con el ¨status quo¨?',
            'pareja' =>4
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'CONSERVADOR','color' => 'ADAPTADOR TEMPRANO','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que las ideas más soñadoras y ambiciosas son las que requieren mayor nivel de análisis y podrían requerir de más de un criterio para validar su viabilidad?',
            'pareja' =>4
        ]);



        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'MAYORIA TEMPRANA','color' => 'PRAGMATICO','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que es importante mantener una mente abierta ante aquellas ideas u oportunidades que sugieran nuevas formas de hacer las cosas pero que además guarden equilibrio de tiempo y ocupación?',
            'pareja' =>5
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'PRAGMATICO','color' => 'MAYORIA TEMPRANA','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que todo esfuerzo adicional debe ser directamente proporcional al reconocimiento, estás dispuesto a dar lo mejor de ti en la medida en que el entorno también lo pueda ver y valorar?',
            'pareja' =>5
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'MAYORIA TEMPRANA','color' => 'PRAGMATICO','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que muchos cambios son buenos, pero requieren siempre de un tiempo de adaptación y estudio que no solo validen el impacto, sino que permitan un avance ordenado y paulatino?',
            'pareja' =>6
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(7),'tipo' => 'PRAGMATICO','color' => 'MAYORIA TEMPRANA','situacion_id' => 9,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'Piensas que antes de iniciar cualquier nueva aventura o experiencia se requiere de claridad en los conceptos, objetivos y alcances, para no tener reprocesos o desiluciones innecesarios?',
            'pareja' =>6
        ]);

        //SITUACION 10, EVALUACION LIDER
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(5),'tipo'=>'','situacion_id' => 10,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'El colaborador se muestra dinámico, propositivo, proactivo y abierto a nuevas ideas o tendencias?'
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(5),'tipo'=>'','situacion_id' => 10,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'El colaborador tiene un rol importante de aporte de actitud positiva y sugerencia de puntos de vista ante nuevas propuestas?',

        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(5),'tipo'=>'','situacion_id' => 10,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'El colaborador está abierto a cambios moderados, pero ya en aspectos que demandan mayor cantidad de esfuerzo y tiempo de dedicación suele tardar más en sumarse?',

        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(5),'tipo'=>'','situacion_id' => 10,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'El colaborador requiere de seguimiento y argumentos sólidos de mejora para sumarse a nuevas propuestas?',

        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(5),'tipo'=>'','situacion_id' => 10,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'El colaborador se mantiene estático ante el cambio y solamente se suma cuando ve que el cambio es inminente?',

        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>3,'slug'=>Str::random(5),'tipo'=>'','situacion_id' => 10,'usuario_registra'=>'ADMIN','created_at' => Carbon::now(),
            'descripcion'=>'El colaborador muestra actitud hostil ante el cambio y puede llegar a influir negativamente en la conciencia colectiva del equipo?',

        ]);



    }
}
