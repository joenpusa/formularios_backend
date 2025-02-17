<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ct_verificacion_modalidad_ri', function (Blueprint $table) {
            $table->date('fecha_visita')->nullable()->after('tipo_visita'); // Agregar después de 'tipo_visita'
        });
    }

    public function down()
    {
        Schema::table('ct_verificacion_modalidad_ri', function (Blueprint $table) {
            $table->dropColumn('fecha_visita'); // Eliminar columna en rollback
        });
    }
};
