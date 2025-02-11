<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ct_verificacion_rotulado_ri', function (Blueprint $table) {
            $table->id();
            $table->text('etc')->nullable();
            $table->date('fecha_visita');
            $table->string('municipio',10);
            $table->time('hora_inicial');
            $table->time('hora_final');
            $table->string('institucion');
            $table->string('sede',10);
            $table->string('numero_visita');
            $table->string('tipo_visita',50)->nullable();
            $table->integer('num_beneficiarios');
            $table->string('operador',60)->nullable();
            $table->string('contrato',60)->nullable();
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();
            $table->string('nombre_apoyo',100)->nullable();
            $table->string('cedula_apoyo',30)->nullable();
            $table->string('cargo_apoyo',50)->nullable();
            $table->string('telefono_apoyo',30)->nullable();
            $table->string('nombre_atiende',100)->nullable();
            $table->string('cedula_atiende',30)->nullable();
            $table->string('cargo_atiende',50)->nullable();
            $table->string('telefono_atiende',30)->nullable();
            $table->json('filas_5109')->nullable();
            $table->json('filas_810')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ct_verificacion_rotulado_ri');
    }
};
