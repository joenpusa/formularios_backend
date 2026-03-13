<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();

            // Header Information
            $table->string('sede_id')->nullable();
            $table->string('etc')->nullable();
            $table->string('municipio')->nullable();
            $table->string('institucion')->nullable();
            $table->string('sede')->nullable();
            $table->date('fecha_visita')->nullable();
            $table->time('hora_visita')->nullable();

            // Generales de la Operación
            $table->string('zona_geografica')->nullable();
            $table->string('modalidad_atencion')->nullable();
            $table->string('tipo_servicio')->nullable();

            // Cuestionario - Ubicación y Acceso
            $table->string('vias_acceso')->nullable();
            $table->string('transporte_alimentos')->nullable();
            $table->string('zona_conflicto')->nullable();
            $table->string('frecuencia_conflicto')->nullable();

            // Cuestionario - Condiciones de Infraestructura
            $table->string('area_almacenamiento')->nullable();
            $table->string('area_preparacion')->nullable();
            $table->string('area_consumo')->nullable();
            $table->string('unidades_sanitarias')->nullable();
            $table->string('cuarto_residuos')->nullable();

            // Cuestionario - Acceso y Calidad de Servicios Públicos
            $table->string('energia_electrica')->nullable();
            $table->string('acueducto_agua')->nullable();
            $table->string('tipo_gas')->nullable();
            $table->string('recoleccion_basura')->nullable();

            // Cuestionario - Dotación de Equipos y Menaje (Solo si es industrializada)
            $table->string('equipos_almacenamiento')->nullable();
            $table->string('equipos_preparacion')->nullable();
            $table->string('menaje_dotacion')->nullable();

            // Dotación general
            $table->string('recip_sani')->nullable();
            $table->string('banos_exc')->nullable();
            $table->string('lav_exc')->nullable();

            // Conclusión del Diagnóstico
            $table->text('modelo_implementar')->nullable();

            // Signatures and Attachments
            $table->longText('firma1')->nullable();
            $table->longText('firma2')->nullable();

            $table->string('nombre_apoyo')->nullable();
            $table->string('cedula_apoyo')->nullable();
            $table->string('cargo_apoyo')->nullable();
            $table->string('telefono_apoyo')->nullable();

            $table->string('nombre_atiende')->nullable();
            $table->string('cedula_atiende')->nullable();
            $table->string('cargo_atiende')->nullable();
            $table->string('telefono_atiende')->nullable();

            // Tracking
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosticos');
    }
};
