<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pqrs', function (Blueprint $table) {
            $table->id();
            $table->string('municipio');
            $table->string('operador');
            $table->string('contrato');
            $table->string('institucion');
            $table->string('sede');
            $table->string('direccion');
            $table->string('telefono');
            $table->date('fecha_visita')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_final')->nullable();
            $table->string('tipo_visita');
            $table->string('num_visita')->nullable();
            $table->string('modalidad')->nullable();
            $table->integer('num_programados');
            $table->integer('num_atendidos');
            $table->text('descripcion')->nullable();
            $table->date('fechaReporte');
            $table->string('medio_recepcion')->nullable();
            $table->text('situacion')->nullable();
            $table->text('compromisos')->nullable();
            $table->text('recomendaciones')->nullable();
            $table->string('estado_final');
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();
            $table->text('firma3')->nullable();
            $table->text('firma4')->nullable();
            $table->string('fir_cargo1',50)->nullable();
            $table->string('fir_cargo2',50)->nullable();
            $table->string('fir_cargo3',50)->nullable();
            $table->string('fir_cargo4',50)->nullable();
            $table->string('fir_telefono1',30)->nullable();
            $table->string('fir_telefono2',30)->nullable();
            $table->string('fir_telefono3',30)->nullable();
            $table->string('fir_telefono4',30)->nullable();
            $table->string('fir_cedula1',30)->nullable();
            $table->string('fir_cedula2',30)->nullable();
            $table->string('fir_cedula3',30)->nullable();
            $table->string('fir_cedula4',30)->nullable();
            $table->string('fir_nombre1',120)->nullable();
            $table->string('fir_nombre2',120)->nullable();
            $table->string('fir_nombre3',120)->nullable();
            $table->string('fir_nombre4',120)->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pqrs');
    }
};
