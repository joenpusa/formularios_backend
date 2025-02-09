<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ct_verificacion_cct', function (Blueprint $table) {
            $table->id();
            $table->text('etc');
            $table->date('fecha_visita')->nullable();
            $table->text('municipio')->nullable();
            $table->text('institucion')->nullable();
            $table->text('sede')->nullable();
            $table->time('hora_inicial')->nullable();
            $table->time('hora_final')->nullable();
            $table->text('tipo_visita')->nullable();
            $table->text('numero_visita')->nullable();
            $table->text('operador')->nullable();
            $table->text('contrato')->nullable();
            $table->integer('num_beneficiarios')->nullable();

            for ($i = 1; $i <= 73; $i++) {
                $table->text("pre_{$i}")->nullable();
                $table->text("pre_{$i}_obs")->nullable();
            }

            for ($i = 1; $i <= 5; $i++) {
                for ($j = 1; $j <= 9; $j++) {
                    $table->text("tb_verificacion{$i}_{$j}")->nullable();
                }
            }

            $table->integer('indicador1');
            $table->integer('indicador2');
            $table->integer('indicador3');

            foreach (['proteico', 'leguminosa', 'cereal', 'tuberculos', 'verdura', 'jugo'] as $tipo) {
                for ($i = 1; $i <= 8; $i++) {
                    if ($i == 1) {
                        $table->text("{$tipo}{$i}")->nullable();
                    } else {
                        $table->text("{$tipo}{$i}")->nullable();
                    }
                }
            }

            $table->string('cdp',50)->nullable();
            $table->string('placa_vehiculo',10)->nullable();
            $table->integer('numero_sedes')->nullable();

            for ($i = 1; $i <= 4; $i++) {
                $table->text("nombre{$i}")->nullable();
                $table->time("hora_salida{$i}")->nullable();
                $table->float("temperatura_salida{$i}")->nullable();
                $table->time("hora_llegada{$i}")->nullable();
                $table->float("temperatura_llegada{$i}")->nullable();
                $table->integer("cantidad_raciones{$i}")->nullable();
            }

            $table->text('observaciones_recibe')->nullable();
            $table->date('fecha_fumigacion')->nullable();
            $table->date('fecha_limpieza_tanque')->nullable();
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();

            foreach (['apoyo', 'atiende'] as $persona) {
                $table->text("nombre_{$persona}")->nullable();
                $table->text("cedula_{$persona}")->nullable();
                $table->text("cargo_{$persona}")->nullable();
                $table->text("telefono_{$persona}")->nullable();
            }

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        // Forzar ROW_FORMAT=DYNAMIC
        \DB::statement('ALTER TABLE ct_verificacion_cct ROW_FORMAT=DYNAMIC;');
    }

    public function down(): void
    {
        Schema::dropIfExists('ct_verificacion_cct');
    }
};
