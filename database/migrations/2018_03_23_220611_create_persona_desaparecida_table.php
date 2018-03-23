<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaDesaparecidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nombre_desaparecidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('apodo');
            $table->string('edadAparente',10);
            $table->integer('nacionalidad');
            $table->integer('edad');
            $table->string('fechaNacimiento');
            $table->enum('estadoCivil',['Soltero', 'Casado', 'Viudo', 'Divorciado', 'Separado']);
            $table->enum('genero',['Masculino', 'Femenino']);
            $table->string('embarazo');
            $table->string('periodoGestacion');
            $table->string('rumores');
            $table->string('pormenores');
            $table->string('escolaridad');
            $table->string('ocupacion');
            //LLaves foraneas
            $table->integer('id_parentesco')->unsigned();
            $table->foreign('id_parentesco')->references('id')->on('cat_parentesco');
            $table->integer('id_nacionalidad')->unsigned();
            $table->foreign('id_nacionalidad')->references('id')->on('cat_nacionalidad');
            //Fin de LLaves foraneas
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
        Schema::dropIfExists('nombre_desaparecidos');
    }
}
