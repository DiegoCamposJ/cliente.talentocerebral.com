<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class SituacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Situacion 1
        DB::table('situaciones')->insert([
            'herramienta_id'=>3,
            'codigo' => 1,
            'nombre'=>'SITUACION1',
            'descripcion'=>'Los 6 animales salen en una excursión muy peligrosa, ya que tienen que llegar a la cueva de la Montaña Azul para conseguir la flor que crece en el arroyuelo. Esta flor tiene el poder que curará la bosque de su infestación.
             Es un sendero muy difícil de seguir, cada cierto tramo hay pasos que están controlados por los guardianes del bosque.  En cada paso se tendrá que quedar un animal por lo cual ten presente que no todos llegarán al riachuelo. Al final del sendero solo quedará uno que podrá entrar en la cueva. Cada animal tiene una opinión distinta de cuál sería el mejor plan para lograr este objetivo, además cada animal tiene una destreza especial que describiremos a continuación:',
            'usuario_registra'=>'ADMIN',
            'mensaje'=>'Selecciónalas según el orden de importancia',
            'titulo' => 'Cuento de los animales situación 1/4',
            'tipo' => 'CAOS',
            'created_at' => Carbon::now(),
        ]);

          //Situacion 2
          DB::table('situaciones')->insert([
            'herramienta_id'=>3,
            'codigo' => 2,
            'nombre'=>'SITUACION2',
            'descripcion'=>'Entre los 6 animales que habitan el antiguo bosque se ha decidido escoger al nuevo REY, y tu serás la persona responsable de colocar a los candidatos en orden de prioridades o de preferencia para asumir este rol en la selva. Las propuestas son las siguientes:',
            'usuario_registra'=>'ADMIN',
            'mensaje'=>'Selecciónalas según el orden de importancia',
            'titulo' => 'Cuento de los animales situación 2/4',
            'tipo' => 'NORMAL',
            'created_at' => Carbon::now(),
        ]);

          //Situacion 3
          DB::table('situaciones')->insert([
            'herramienta_id'=>3,
            'codigo' => 3,
            'nombre'=>'SITUACION3',
            'descripcion'=>'Al bosque ha llegado un conejo. Para conocer un poco más sobre su nuevo hogar desea conocer a los 6 animales que viven ahí. A continuación te contaremos cuál es la reacción de cada animal ante la llegada del nuevo habitante.
             ¿Cuál de las 6 reacciones te parece la más adecuada y en qué orden las escogerías?',
            'usuario_registra'=>'ADMIN',
            'mensaje'=>'Selecciónalas según el orden de importancia',
            'titulo' => 'Cuento de los animales situación 3/4',
            'tipo' => 'NORMAL',
            'created_at' => Carbon::now(),
        ]);

          //Situacion 4
          DB::table('situaciones')->insert([
            'herramienta_id'=>3,
            'codigo' => 4,
            'nombre'=>'SITUACION4',
            'descripcion'=>'Empezaba el día como cualquier otro, pero los animales no se esperaban que esté día algo terrible ocurriría. Se había inciado un incendio en la parte norte del bosque, avanzaba rápido y consumía todo a su paso. Los animales se reunieron para hacer propuestas y mitigar la situación.
             Según tu preferencia, pon en orden de acción cada propuesta de los 6 animales.',
            'usuario_registra'=>'ADMIN',
            'mensaje'=>'Selecciónalas según el orden de importancia',
            'titulo' => 'Cuento de los animales situación 4/4',
            'tipo' => 'CAOS',
            'created_at' => Carbon::now(),
        ]);

          //Situacion 5
          DB::table('situaciones')->insert([
            'herramienta_id'=>3,
            'codigo' => 5,
            'nombre'=>'SITUACION5',
            'descripcion'=>'José tenía 23 años cuando quedó huérfano de padre, apenas unos meses atrás a causa de un tumor cerebral fulminante. José poco tiempo antes se había comprometido con su novia, con quién tenía 6 años de relación.  La muerte del padre de José dejó una viuda de apenas 45 años y 6 hermanos que dependían económicamente del padre fallecido.
            José se encontraba en una encrucijada al determinar su destino entre formar una nueva familia y casarse con su novia de varios años, o ayudar a su madre y trabajar para sacar a adelante a sus hermanos menores. Con pocas ideas y sin una dirección que tomar en su vida, José pretende encontrar un camino que beneficie a todos o un sendero en el que uno de los dos lados tome más ventaja que el otro:',
            'descripcion2'=>'Camila tenía 23 años cuando quedó huérfana de padre, apenas unos meses atrás a causa de un tumor cerebral fulminante. Camila poco tiempo antes se había comprometido con su novio, con quién tenía 6 años de relación.  La muerte del padre de Camila dejó una viuda de apenas 45 años y 6 hermanos que dependían económicamente del padre fallecido.
            Camila se encontraba en una encrucijada al determinar su destino entre formar una nueva familia y casarse con su novio de varios años, o ayudar a su madre y trabajar para sacar a adelante a sus hermanos menores. Con pocas ideas y sin una dirección que tomar en su vida, Camila pretende encontrar un camino que beneficie a todos o un sendero en el que uno de los dos lados tome más ventaja que el otro:',
            'usuario_registra'=>'ADMIN',
            'mensaje'=>'Que opción tomarías tú.',
            'titulo' => 'Si tú fueras',
            'tipo' => 'NORMAL',
            'created_at' => Carbon::now(),
        ]);

          //Situacion 6
          DB::table('situaciones')->insert([
            'herramienta_id'=>3,
            'codigo' => 6,
            'nombre'=>'SITUACION6',
            'descripcion2' => 'Camila es una joven de 35 años que trabaja para una multinacional con presencia en distintos países del mundo. Camila labora como directora del departamento de Talento Humano de dicha empresa. Debido a la expansión de la compañía, la gerencia general requiere que las habilidades y alto potencial de Camila, se mude a Francia para reclutar personal y manejar a los colaboradores ya existentes. Sin embargo Camila está casada, tiene dos hijos y la oferta laboral no tiene un tiempo de estancia límite, si tú fueses Camila: ',
            'descripcion' => 'José es un joven de 35 años que trabaja para una multinacional con presencia en distintos países del mundo. José labora como director del departamento de Talento Humano de dicha empresa. Debido a la expansión de la compañía, la gerencia general requiere que las habilidades y alto potencial de José, se mude a Francia para reclutar personal y manejar a los colaboradores ya existentes. Sin embargo José está casado, tiene dos hijos y la oferta laboral no tiene un tiempo de estancia límite, si tú fueses José: ',
            'usuario_registra'=>'ADMIN',
            'mensaje'=>'Que opción tomarías tú.',
            'titulo' => 'Si tú fueras',
            'tipo' => 'CAOS',
            'created_at' => Carbon::now(),
        ]);

        //Situacion 7
        DB::table('situaciones')->insert([
            'herramienta_id'=>3,
            'codigo' => 7,
            'nombre'=>'SITUACION7',
            'descripcion'=>'De los siguientes 30 descriptores,  selecciónelos en el orden que mejor describan su personalidad, afinidad o importancia para usted',
            'usuario_registra'=>'ADMIN',
            'mensaje'=>'Selecciónalas según el orden de importancia',
            'titulo' => 'Descriptores Importantes',
            'created_at' => Carbon::now(),
        ]);
        //Situacion 8
        DB::table('situaciones')->insert([
            'herramienta_id'=>3,
            'codigo' => 8,
            'nombre'=>'SITUACION8',
            'descripcion'=>'Del siguiente par de descriptores, selecciona aquel con que el que más se identifique',
            'usuario_registra'=>'ADMIN',
            'mensaje'=>'Selecciona el atributo que más te identifique',
            'titulo' => 'Pares de Atributos',
            'created_at' => Carbon::now(),
        ]);

        //Situacion 9
        DB::table('situaciones')->insert([
            'herramienta_id'=>3,
            'codigo' => 9,
            'nombre'=>'SITUACION9',
            'descripcion'=>'Califica las 12 preguntas según tu grado de aceptación ',
            'usuario_registra'=>'ADMIN',
            'mensaje'=>'Selecciona una respuesta por pregunta',
            'titulo' => 'Preguntas Finales',
            'created_at' => Carbon::now(),
        ]);

        //Situacion 10
        DB::table('situaciones')->insert([
            'herramienta_id'=>3,
            'codigo' => 10,
            'nombre'=>'SITUACION10',
            'descripcion'=>'Evalúa a tu colaborador',
            'usuario_registra'=>'ADMIN',
            'mensaje'=>'Selecciona una respuesta por pregunta',
            'titulo' => 'Evaluación de Personal',
            'created_at' => Carbon::now(),
        ]);
    }
}
