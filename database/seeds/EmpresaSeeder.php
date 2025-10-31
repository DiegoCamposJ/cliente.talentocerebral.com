<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'slug'=>'brainsolutions',
             'ruc' =>'1717171717',
             'nombre'=>'BRAIN SOLUTIONS',
             'usuario_registra'=>'ADMIN'

        ]);

        DB::table('empresas')->insert([
            'slug'=>'bgr20201',
             'ruc' =>'1790864316001',
             'nombre'=>'BANCO GENERAL RUMIÑAHUI S.A.',
             'usuario_registra'=>'ADMIN'

        ]);



        //factory(App\Empresa::class,20)->create();


    }
}
