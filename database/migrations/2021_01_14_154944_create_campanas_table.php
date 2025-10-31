<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->string('descripcion');
            $table->enum('estado', ['PROCESO', 'FINALIZADA'])->default('PROCESO');
            $table->integer('participantes')->default(0);
            $table->string('usuario_crea',100)->nullable();
            $table->string('usuario_actualiza',100)->nullable();
            $table->dateTime('f_creación')->nullable();
            $table->dateTime('f_actualizacion')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campanas');
    }
}
