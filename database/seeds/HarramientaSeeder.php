<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class HarramientaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('herramientas')->insert([
            'slug' => 'QUAD2020',
            'nombre' => 'QUAD',
            'descripcion' => '...',
            'version' => 1,
            'duracion' =>60,
            'empresa_id' => 1,
            'usuario_registra' => 'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        DB::table('herramientas')->insert([
            'slug' => 'VAL2020',
            'nombre' => 'VAL',
            'descripcion' => '...',
            'version' => 1,
            'duracion' =>60,
            'empresa_id' => 1,
            'usuario_registra' => 'ADMIN',
            'created_at' => Carbon::now(),
        ]);

        DB::table('herramientas')->insert([
            'slug' => 'BGR2020',
            'nombre' => 'BGR',
            'descripcion' => '...',
            'version' => 1,
            'duracion' =>45,
            'empresa_id' => 2,
            'usuario_registra' => 'ADMIN',
            'created_at' => Carbon::now(),
        ]);
    }
}
