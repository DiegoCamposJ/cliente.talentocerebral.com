<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGrupoToPreguntas extends Migration
{

    public function up()
    {
        Schema::table('preguntas', function (Blueprint $table) {
            $table->bigInteger('variable_id')->default(0)->after('evaluacion_id');
            $table->integer('pareja')->nullable()->after('tipo');
        });
    }


    public function down()
    {
        Schema::table('preguntas', function (Blueprint $table) {
            $table->dropColumn('variable_id');
            $table->dropColumn('pareja');
        });
    }
}
