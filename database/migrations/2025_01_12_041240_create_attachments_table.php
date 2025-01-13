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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id(); // ID único
            $table->string('form_name'); // Nombre del formulario al que pertenece
            $table->unsignedBigInteger('form_id'); // ID del formulario al que pertenece
            $table->string('file_path'); // Ruta del archivo
            $table->string('original_name'); // Nombre original del archivo cargado
            $table->string('file_type'); // Tipo de archivo (PDF, PNG, etc.)
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
