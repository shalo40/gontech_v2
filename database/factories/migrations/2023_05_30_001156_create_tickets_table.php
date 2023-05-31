<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id_tickets');
            $table->dateTime('fecha_hora_asignacion')->nullable();

            //CLIENTE
            $table->unsignedBigInteger('cliente_id')->nullable();
            //TICKET
            $table->string('tipo_servicio')->nullable();
            $table->string('area_del_requerimiento')->nullable();
            $table->string('descripcion_problema')->nullable();
            //DETALLE TICKET
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->dateTime('fecha_hora_limite_respuesta')->nullable();
            $table->string('estado_ticket')->nullable();
            $table->timestamps();
            //CLAVES FORANEAS
            $table->foreign('cliente_id')->references('id_clientes')->on('clientes')->OnDelete('cascade');
            $table->foreign('responsable_id')->references('id_personals')->on('personals')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
