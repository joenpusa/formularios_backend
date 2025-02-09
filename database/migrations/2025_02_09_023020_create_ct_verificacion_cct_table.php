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
            $table->string('etc',100);
            $table->date('fecha_visita',20)->nullable();
            $table->string('municipio',10)->nullable();
            $table->string('institucion',10)->nullable();
            $table->string('sede',10)->nullable();
            $table->time('hora_inicial')->nullable();
            $table->time('hora_final')->nullable();
            $table->string('tipo_visita')->nullable();
            $table->string('numero_visita',10)->nullable();
            $table->string('operador',100)->nullable();
            $table->string('contrato',100)->nullable();
            $table->integer('num_beneficiarios')->nullable();

            for ($i = 1; $i <= 73; $i++) {
                $table->text("pre_{$i}")->nullable();
                $table->text("pre_{$i}_obs")->nullable();
            }

            for ($i = 1; $i <= 5; $i++) {
                for ($j = 1; $j <= 9; $j++) {
                    $table->string("tb_verificacion{$i}_{$j}",100)->nullable();
                }
            }

            $table->integer('indicador1');
            $table->integer('indicador2');
            $table->integer('indicador3');

            foreach (['proteico', 'leguminosa', 'cereal', 'tuberculos', 'verdura', 'jugo'] as $tipo) {
                for ($i = 1; $i <= 8; $i++) {
                    if ($i == 1) {
                        $table->string("{$tipo}{$i}",150)->nullable();
                    } else {
                        $table->string("{$tipo}{$i}",20)->nullable();
                    }
                }
            }

            $table->string('cdp')->nullable();
            $table->string('placa_vehiculo')->nullable();
            $table->integer('numero_sedes')->nullable();

            for ($i = 1; $i <= 4; $i++) {
                $table->string("nombre{$i}")->nullable();
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
    }

    public function down(): void
    {
        Schema::dropIfExists('ct_verificacion_cct');
    }
};
