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
        Schema::table('ct_verificacion_cct', function (Blueprint $table) {
            // Convertir los campos de string a integer
            $table->unsignedBigInteger('municipio')->change();
            $table->unsignedBigInteger('institucion')->change();
            $table->unsignedBigInteger('sede')->change();

            // Agregar claves foráneas sin cambiar los nombres de los campos
            $table->foreign('municipio')->references('id')->on('municipios')->onDelete('cascade');
            $table->foreign('institucion')->references('id')->on('instituciones')->onDelete('cascade');
            $table->foreign('sede')->references('id')->on('sedes')->onDelete('cascade');

            $table->float('indicador1', 6, 2)->change();
            $table->float('indicador2', 6, 2)->change();
            $table->float('indicador3', 6, 2)->change();
            $table->float('indicador4',6, 2)->nullable()->after('indicador3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ct_verificacion_cct', function (Blueprint $table) {
            // Eliminar claves foráneas
            $table->dropForeign(['municipio']);
            $table->dropForeign(['institucion']);
            $table->dropForeign(['sede']);

            // Restaurar los campos a string
            $table->string('municipio')->change();
            $table->string('institucion')->change();
            $table->string('sede')->change();

            // dejar indicadores como antes
            $table->integer('indicador1')->change();
            $table->integer('indicador2')->change();
            $table->integer('indicador3')->change();
            $table->dropColumn('indicador4');
        });
    }
};
