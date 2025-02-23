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
        Schema::table('ct_etapa_operaciones', function (Blueprint $table) {
            // Convertir los campos de string a integer
            $table->unsignedBigInteger('municipio')->change();

            // Agregar claves foráneas sin cambiar los nombres de los campos
            $table->foreign('municipio')->references('id')->on('municipios')->onDelete('cascade');

            // Agregar campos nuevos
            $table->text('firma3')->nullable();
            $table->date('fecha_visita2')->nullable();
            $table->time('hora_inicio2')->nullable();
            $table->time('hora_fin2')->nullable();
            $table->string('nombre_apoyo2',100)->nullable();
            $table->string('cedula_apoyo2',20)->nullable();
            $table->string('cargo_apoyo2',40)->nullable();
            $table->string('telefono_apoyo2',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ct_etapa_operaciones', function (Blueprint $table) {
            // Eliminar claves foráneas
            $table->dropForeign(['municipio']);

            // Restaurar los campos a string
            $table->string('municipio')->change();

            // Eliminar el campo tematica
            $table->dropColumn('firma3');
            $table->dropColumn('fecha_visita2');
            $table->dropColumn('hora_inicio2');
            $table->dropColumn('hora_fin2');
            $table->dropColumn('nombre_apoyo2');
            $table->dropColumn('cedula_apoyo2');
            $table->dropColumn('cargo_apoyo2');
            $table->dropColumn('telefono_apoyo2');
        });
    }
};
