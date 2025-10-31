<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->string('slug')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            //$table->string('identificacion')->unique();
            $table->string('identificacion');
            $table->string('genero');
            $table->date('f_nacimiento')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('estado', ['CARGADO','ACTIVO', 'INACTIVO'])->default('INACTIVO');
            $table->enum('cambio_password', ['ACTIVO', 'INACTIVO'])->default('INACTIVO');
            $table->date('f_cambio_password')->nullable();
            $table->integer('departamento')->nullable();
            $table->integer('jefe')->default(0);
            $table->integer('test')->default(1);
            $table->date('f_notificacion')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
