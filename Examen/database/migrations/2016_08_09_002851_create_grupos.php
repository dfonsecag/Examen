<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idProfesor')->unsigned();
            $table->integer('idCurso')->unsigned();

            $table->foreign('idProfesor')
            ->references('id')
            ->on('profesores');
            $table->foreign('idCurso')
            ->references('id')
            ->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grupos');
    }
}
