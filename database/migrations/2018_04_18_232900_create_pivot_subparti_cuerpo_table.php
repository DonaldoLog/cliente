<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotSubpartiCuerpoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_subparti_cuerpo', function (Blueprint $table) {
            $table->integer('idCedulaPartesCuerpo')->unsigned()->nullable();           
            $table->foreign('idCedulaPartesCuerpo')->references('id')->on('cedula_partes_cuerpo');
            $table->integer('idSubParticularidades')->unsigned()->nullable();           
            $table->foreign('idSubParticularidades')->references('id')->on('cat_sub_particularidades');
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
        Schema::dropIfExists('pivot_subparti_cuerpo');
    }
}
