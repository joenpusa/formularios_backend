<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ct_verificacion_modalidad_ri', function (Blueprint $table) {
            $table->id();
            $table->string('etc',30)->nullable();
            $table->string('municipio',10)->nullable();
            $table->time('hora_inicial')->nullable();
            $table->time('hora_final')->nullable();
            $table->string('institucion',10)->nullable();
            $table->string('sede',10)->nullable();
            $table->string('numero_visita')->nullable();
            $table->string('operador',60)->nullable();
            $table->string('contrato',60)->nullable();
            $table->integer('num_beneficiarios')->nullable();
            $table->string('tipo_visita',40)->nullable();

            // Preguntas y observaciones
            for ($i = 1; $i <= 23; $i++) {
                $table->string("pre_{$i}", 20)->nullable();
                $table->text("pre_{$i}_obs")->nullable();
            }

            // Indicadores
            $table->float('indicador1')->nullable();
            $table->float('indicador2')->nullable();
            $table->float('indicador3')->nullable();
            // Pie de formato
            $table->text('observaciones')->nullable();
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();
            $table->string('nombre_apoyo',100)->nullable();
            $table->string('cedula_apoyo',30)->nullable();
            $table->string('cargo_apoyo',40)->nullable();
            $table->string('telefono_apoyo',30)->nullable();
            $table->string('nombre_atiende',100)->nullable();
            $table->string('cedula_atiende',30)->nullable();
            $table->string('cargo_atiende',40)->nullable();
            $table->string('telefono_atiende',30)->nullable();

            // JSON para almacenar las filas
            $table->json('filas')->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ct_verificacion_modalidad_ri');
    }
};
