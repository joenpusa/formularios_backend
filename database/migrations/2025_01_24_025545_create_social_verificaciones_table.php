<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('social_verificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('etc', 255)->nullable();
            $table->date('fecha_visita')->nullable();
            $table->string('municipio', 255)->nullable();
            $table->string('institucion', 255)->nullable();
            $table->string('operador', 255)->nullable();
            $table->string('contrato', 255)->nullable();
            $table->string('nombre_apoyo', 255)->nullable();
            $table->string('cedula_apoyo', 255)->nullable();
            $table->string('cargo_apoyo', 255)->nullable();
            $table->string('telefono_apoyo', 255)->nullable();
            $table->string('nombre_atiende', 255)->nullable();
            $table->string('cedula_atiende', 255)->nullable();
            $table->string('cargo_atiende', 255)->nullable();
            $table->string('telefono_atiende', 255)->nullable();
            $table->string('firma1', 255)->nullable();
            $table->string('firma2', 255)->nullable();
            $table->json('filas')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_verificaciones');
    }
};
