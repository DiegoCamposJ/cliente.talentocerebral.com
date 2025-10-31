<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('evaluacion_id')->unsigned();
            $table->String('descripcion');
            $table->integer('valor');
            $table->string('estado');
            $table->string('color')->nullable();
            $table->string('tipo')->nullable();
            $table->string('usuario_actualiza',100)->nullable();
            $table->date('fecha_respuesta')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
