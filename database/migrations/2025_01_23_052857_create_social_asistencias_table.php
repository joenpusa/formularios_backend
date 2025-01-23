<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('social_asistencias', function (Blueprint $table) {
            $table->id();
            $table->string('etc')->nullable();
            $table->date('fecha_visita')->nullable();
            $table->string('municipio')->nullable();
            $table->string('institucion')->nullable();
            $table->string('sede')->nullable();
            $table->string('operador')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('contrato')->nullable();
            $table->integer('num_beneficiarios')->default(0);
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->string('nombre_apoyo')->nullable();
            $table->string('cedula_apoyo')->nullable();
            $table->string('cargo_apoyo')->nullable();
            $table->string('telefono_apoyo')->nullable();
            $table->string('nombre_atiende')->nullable();
            $table->string('cedula_atiende')->nullable();
            $table->string('cargo_atiende')->nullable();
            $table->string('telefono_atiende')->nullable();
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();
            $table->json('filas')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_asistencias');
    }
};
