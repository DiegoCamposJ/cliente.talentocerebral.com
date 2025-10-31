<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name' => 'superadmin']);
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'evaluado']);
        $role = Role::create(['name' => 'jefe-inmediato']);


        //Empresas
        $permission = Permission::create(['name' => 'crear-empresa']);
        $permission->assignRole('superadmin');

        $permission = Permission::create(['name' => 'listar-empresas']);
        $permission->assignRole('superadmin');

        //Usuarios
        $permission = Permission::create(['name' => 'crear-usuario']);
        $permission->assignRole('superadmin');

        $permission = Permission::create(['name' => 'listar-usuarios']);
        $permission->assignRole('superadmin');

        $permission = Permission::create(['name' => 'crear-usuarioBGR']);
        $permission->assignRole('admin');

        $permission = Permission::create(['name' => 'listar-usuariosBGR']);
        $permission->assignRole('admin');

        //Herramientas
        $permission = Permission::create(['name' => 'crea-herramienta']);
        $permission->assignRole('superadmin');

        $permission = Permission::create(['name' => 'listar-herramientas']);
        $permission->assignRole('superadmin');

        //Personas
        $permission = Permission::create(['name' => 'crear-persona']);
        $permission->assignRole('superadmin');

        $permission = Permission::create(['name' => 'listar-personas']);
        $permission->assignRole('superadmin');

        //Parametros
        $permission = Permission::create(['name' => 'crear-parametros']);
        $permission->assignRole('superadmin');

        //Evaluacion
        $permission = Permission::create(['name' => 'crear-evaluacionBGR']);
        $permission->assignRole('admin');

        $permission = Permission::create(['name' => 'evaluacionBGR']);
        $permission->assignRole('evaluado');

        //Evaluacion Jefe Inmdiato
        $permission = Permission::create(['name' => 'evaluar-usuario']);
        $permission->assignRole('jefe-inmediato');




        // DB::table('roles')->insert([
        //     'name' =>'SUPERADMIN',
        //     'guard_name'=>'web',
        // ]);

        // DB::table('roles')->insert([
        //     'name' =>'ADMIN',
        //     'guard_name'=>'web',
        // ]);

        // DB::table('roles')->insert([
        //     'name' =>'EVALUADO',
        //     'guard_name'=>'web',
        // ]);

    }
}
