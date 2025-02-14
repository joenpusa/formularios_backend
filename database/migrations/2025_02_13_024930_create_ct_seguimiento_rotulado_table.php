<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ct_seguimiento_rotulado', function (Blueprint $table) {
            $table->id();
            $table->string('etc',50);
            $table->date('fecha_visita')->nullable();
            $table->string('municipio',10);
            $table->string('institucion',10);
            $table->string('sede',10);
            $table->time('hora_inicial')->nullable();
            $table->time('hora_final')->nullable();
            $table->string('modalidad',40);
            $table->string('operador',60);
            $table->string('contrato',60);
            $table->string('supervisor',80)->nullable();
            $table->text('observaciones')->nullable();
            $table->json('filas')->nullable();
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
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ct_seguimiento_rotulado');
    }
};
