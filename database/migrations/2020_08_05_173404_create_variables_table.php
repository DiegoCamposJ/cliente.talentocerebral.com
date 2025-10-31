<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('herramienta_id')->unsigned();
            $table->string('slug')->unique();
            $table->string('descripcion',5000);
            $table->enum('estado', ['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->string('color')->nullable();
            $table->string('tipo')->nullable();
            $table->bigInteger('situacion_id')->nullable();
            $table->integer('pareja')->default(0);
            $table->string('usuario_registra',100);
            $table->string('usuario_actualiza',100)->nullable();
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
        Schema::dropIfExists('variables');
    }
}
