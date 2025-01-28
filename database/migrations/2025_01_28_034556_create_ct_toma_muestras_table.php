<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtTomaMuestrasTable extends Migration
{
    public function up()
    {
        Schema::create('ct_toma_muestras', function (Blueprint $table) {
            $table->id();
            $table->string('tipo')->nullable();
            $table->string('etc')->nullable();
            $table->string('operador')->nullable();
            $table->string('contrato')->nullable();
            $table->string('municipio')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_visita')->nullable();
            $table->string('producto')->nullable();
            $table->string('institucion')->nullable();
            $table->string('hora')->nullable();
            $table->integer('cantidad_kardex')->nullable();
            $table->integer('cantidad_muestra')->nullable();
            $table->string('nombre_operador')->nullable();
            $table->string('olor')->nullable();
            $table->string('color')->nullable();
            $table->string('textura')->nullable();
            $table->text('obs_olor')->nullable();
            $table->text('obs_color')->nullable();
            $table->text('obs_textura')->nullable();
            $table->string('cuarto')->nullable();
            $table->string('tanque')->nullable();
            $table->string('nevera')->nullable();
            $table->string('caba')->nullable();
            $table->float('temp_ref')->nullable();
            $table->float('temp_con')->nullable();
            $table->integer('cantidad_alm')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();
            $table->string('nombre_atiende',120)->nullable();
            $table->string('cedula_atiende',30)->nullable();
            $table->string('cargo_atiende',50)->nullable();
            $table->string('telefono_atiende',30)->nullable();
            $table->string('nombre_apoyo',120)->nullable();
            $table->string('cedula_apoyo',30)->nullable();
            $table->string('cargo_apoyo',50)->nullable();
            $table->string('telefono_apoyo',30)->nullable();
            $table->json('filas')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ct_toma_muestras');
    }
}
