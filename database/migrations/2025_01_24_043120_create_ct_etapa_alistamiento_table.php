<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ct_etapa_alistamiento', function (Blueprint $table) {
            $table->id();
            $table->string('etc');
            $table->string('municipio')->nullable();
            $table->string('operador')->nullable();
            $table->string('contrato')->nullable();
            $table->string('direccion')->nullable();
            $table->string('correo')->nullable();
            $table->date('fecha_visita')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->string('num_visita')->nullable();
            $table->string('tipo_visita')->nullable();
            for ($i = 1; $i <= 28; $i++) {
                $table->string("pre_{$i}")->nullable();
                if ($i != 14) {
                    $table->text("pre_{$i}_obs")->nullable();
                }
            }
            $table->date('fecha_certificado')->nullable();
            $table->string('concepto_sanitario')->nullable();
            $table->integer('puntaje_esperado')->default(0);
            $table->integer('puntaje_obtenido')->default(0);
            $table->decimal('porcentaje', 5, 2)->default(0);
            $table->text('observaciones')->nullable();
            $table->text('observaciones_recibe')->nullable();
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();
            $table->string('nombre_apoyo')->nullable();
            $table->string('cedula_apoyo')->nullable();
            $table->string('cargo_apoyo')->nullable();
            $table->string('telefono_apoyo')->nullable();
            $table->string('nombre_atiende')->nullable();
            $table->string('cedula_atiende')->nullable();
            $table->string('cargo_atiende')->nullable();
            $table->string('telefono_atiende')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ct_etapa_alistamiento');
    }
};
