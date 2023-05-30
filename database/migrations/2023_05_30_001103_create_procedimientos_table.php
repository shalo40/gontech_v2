<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos', function (Blueprint $table) {
            $table->bigIncrements('id_procedimientos');
            $table->unsignedBigInteger('encargado_id')->nullable();
            $table->string('codigo_procedimiento')->nullable();
            $table->string('tipo_procedimiento')->nullable();
            $table->string('descripcion_procedimiento')->nullable();
            $table->string('recursos_necesarios_procedimiento')->nullable();
            $table->float('valor_aproximado_procedimiento')->nullable();
            $table->string('tiempo_estimado_procedimiento')->nullable();
            //clave foranea
            $table->foreign('encargado_id')->references('id_personals')->on('personals')->OnDelete('cascade');
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
        Schema::dropIfExists('procedimientos');
    }
}
