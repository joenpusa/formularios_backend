<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('encuesta_satisfaccion', function (Blueprint $table) {
            $table->id();

            // Claves foráneas
            $table->unsignedBigInteger('municipio_id');
            $table->unsignedBigInteger('institucion_id');
            $table->unsignedBigInteger('sede_id');

            // Definir relaciones foráneas
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
            $table->foreign('institucion_id')->references('id')->on('instituciones')->onDelete('cascade');
            $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');

            // Campos de la encuesta
            $table->enum('complemento', ['I', 'PS', 'CCT']);
            $table->enum('satisfaccion_complemento', ['Muy satisfecho', 'Satisfecho', 'Poco satisfecho']);
            $table->enum('estado_complemento', ['Muy satisfecho', 'Satisfecho', 'Poco satisfecho']);
            $table->enum('tiempo_complemento', ['Muy satisfecho', 'Satisfecho', 'Poco satisfecho']);
            $table->enum('necesidades_complemento', ['Sí', 'No']);
            $table->enum('calidad_productos', ['Muy satisfecho', 'Satisfecho', 'Poco satisfecho']);
            $table->enum('atencion_personal', ['Muy satisfecho', 'Satisfecho', 'Poco satisfecho']);

            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('encuesta_satisfaccion');
    }
};
