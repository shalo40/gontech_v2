<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id_equipos');
            $table->string('n_serie_equipo')->nullable();
            $table->string('accesorios_equipo')->nullable();
            $table->string('color_equipo')->nullable();
            $table->string('detalles_equipo')->nullable();
           // $table->string('foto_1')->nullable();
           // $table->string('foto_2')->nullable();
            $table->unsignedBigInteger('marca_equipo')->nullable();
            $table->unsignedBigInteger('modelo_equipo')->nullable();
            $table->unsignedBigInteger('categoria_equipo')->nullable();
            $table->unsignedBigInteger('dueno_equipo')->nullable();

            //Claves foraneas

            //marca
            $table->foreign('marca_equipo')->references('id_marca_equipo')->on('marca_equipos')->OnDelete('cascade');
            //modelo
            $table->foreign('modelo_equipo')->references('id_modelo_equipos')->on('modelo_equipos')->OnDelete('cascade');
            //categoria
            $table->foreign('categoria_equipo')->references('id_cat_equipos')->on('cat_equipos')->OnDelete('cascade');
            //dueño
            $table->foreign('dueno_equipo')->references('id_clientes')->on('clientes')->OnDelete('cascade');
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
        Schema::dropIfExists('equipos');
    }
}
