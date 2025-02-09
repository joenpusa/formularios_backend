<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ct_verificacion_cct', function (Blueprint $table) {
            $table->date('fecha_ultima_visita')->nullable()->after('fecha_limpieza_tanque');
            $table->string('concepto_emitido')->nullable()->after('fecha_ultima_visita');
        });
    }

    public function down(): void
    {
        Schema::table('ct_verificacion_cct', function (Blueprint $table) {
            $table->dropColumn(['fecha_ultima_visita', 'concepto_emitido']);
        });
    }
};
