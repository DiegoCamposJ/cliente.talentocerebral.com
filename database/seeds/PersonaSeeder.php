<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Persona;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Persona::create([
            'identificacion'=>'1715930168',
            'slug'=>'diego171593',
            'id_empresa' => 1,
            'nombre'=>'Fernando',
            'apellido'=>'Campos',
            'sexo' => 'M',
            'email'=>'diego1@app.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'estado' => 'ACTIVO'
        ]);

        factory(App\Persona::class,10)->create();
    }
}
