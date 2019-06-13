<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('nivelacademico');
            $table->string('duracion');
            $table->integer('materia_id')->unsigned()->nullable();
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->integer('aula_id')->unsigned()->nullable();
            $table->foreign('aula_id')->references('id')->on('aulas');
            $table->integer('horario_id')->unsigned()->nullable();
            $table->foreign('horario_id')->references('id')->on('horarios');
            
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
        Schema::dropIfExists('carreras');
    }
}
