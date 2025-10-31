<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaExesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas_ex', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('evaluacionesEx_id')->unsigned();
            $table->string('slug')->unique();
            $table->string('descripcion',3000);
            $table->integer('valor')->default(0);
            $table->string('estado');
            $table->string('color')->nullable();
            $table->string('tipo')->nullable();
            $table->bigInteger('situacion_id')->nullable();
            $table->integer('pareja')->default(0);
            $table->string('usuario_actualiza',100)->nullable();
            $table->date('fecha_respuesta')->nullable();
            $table->integer('orden')->default(0);
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
        Schema::dropIfExists('preguntas_ex');
    }
}
