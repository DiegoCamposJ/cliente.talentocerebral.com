<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class VariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1 LABORAL AMARILLO
        //---------------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Conceptualización',
            'estado'=>'ACTIVO',
            'color'=>'AMARILLO',
            'tipo'=>'LABORAL',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Unir ideas separadas',
            'estado'=>'ACTIVO',
            'color'=>'AMARILLO',
            'tipo'=>'LABORAL',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Innovación',
            'estado'=>'ACTIVO',
            'color'=>'AMARILLO',
            'tipo'=>'LABORAL',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Aspectos Creativos',
            'estado'=>'ACTIVO',
            'color'=>'AMARILLO',
            'tipo'=>'LABORAL',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //1 LABORAL AZUL

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Análisis',
            'estado'=>'ACTIVO',
            'color'=>'AZUL',
            'tipo'=>'LABORAL',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);
        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Aspectos Técnicos',
            'estado'=>'ACTIVO',
            'color'=>'AZUL',
            'tipo'=>'LABORAL',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //1 LABORAL ROJO

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Expresión',
            'estado'=>'ACTIVO',
            'color'=>'ROJO',
            'tipo'=>'LABORAL',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //1 LABORAL VERDE

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Administración',
            'estado'=>'ACTIVO',
            'color'=>'VERDE',
            'tipo'=>'LABORAL',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //2 DESCRIPTOR AMARILLO
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Creativo',
            'estado'=>'ACTIVO',
            'color'=>'AMARILLO',
            'tipo'=>'DESCRIPTOR',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //2 DESCRIPTOR AZUL
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Lógico',
            'estado'=>'ACTIVO',
            'color'=>'AZUL',
            'tipo'=>'DESCRIPTOR',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //2 DESCRIPTOR ROJO
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Musical',
            'estado'=>'ACTIVO',
            'color'=>'ROJO',
            'tipo'=>'DESCRIPTOR',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);


        //2 DESCRIPTOR ROJO
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Secuencial',
            'estado'=>'ACTIVO',
            'color'=>'ROJO',
            'tipo'=>'DESCRIPTOR',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);


        //2 DESCRIPTOR ROJO
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Sintetizador',
            'estado'=>'ACTIVO',
            'color'=>'ROJO',
            'tipo'=>'DESCRIPTOR',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);





        //3 AFICION AMARILLO
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Artesanías / Trabajos manuales',
            'estado'=>'ACTIVO',
            'color'=>'AMARILLO',
            'tipo'=>'AFICION',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //3 AFICION AZUL
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Visitar Museos',
            'estado'=>'ACTIVO',
            'color'=>'AZUL',
            'tipo'=>'AFICION',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //3 AFICION ROJO
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Acampar/ Escalar montañas',
            'estado'=>'ACTIVO',
            'color'=>'ROJO',
            'tipo'=>'AFICION',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //3 AFICION VERDE
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Jugar Cartas',
            'estado'=>'ACTIVO',
            'color'=>'VERDE',
            'tipo'=>'AFICION',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //3 AFICION VERDE
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Coleccionar',
            'estado'=>'ACTIVO',
            'color'=>'VERDE',
            'tipo'=>'AFICION',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        //3 AFICION VERDE
        //-----------------

        DB::table('variables')->insert([
            'herramienta_id'=>1,
            'slug'=>Str::random(8),
            'descripcion'=>'Cocinar',
            'estado'=>'ACTIVO',
            'color'=>'VERDE',
            'tipo'=>'AFICION',
            'usuario_registra'=>'ADMIN',
            'created_at' => Carbon::now(),
        ]);
    }
}
