<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ct_verificacion_modalidad_rps', function (Blueprint $table) {
            $table->id();
            $table->string('etc',100);
            $table->date('fecha_visita')->nullable();
            $table->time('hora_inicial')->nullable();
            $table->time('hora_final')->nullable();
            $table->string('institucion',20)->nullable();
            $table->string('municipio',20);
            $table->string('sede',20)->nullable();
            $table->string('numero_visita',10)->nullable();
            $table->string('tipo_visita',40)->nullable();
            $table->integer('num_beneficiarios')->nullable();
            $table->string('operador',120)->nullable();
            $table->string('contrato',120)->nullable();
            $table->text('observaciones')->nullable();

            // Condiciones (Booleanas)
            for ($i = 1; $i <= 60; $i++) {
                $table->string("condi_$i",10)->nullable();
                $table->text("condi_{$i}_obs",120)->nullable();
            }

            // Alimentos
            for ($i = 1; $i <= 5; $i++) {
                for ($j = 1; $j <= 9; $j++) {
                    $table->string("alimento{$i}_{$j}",50)->nullable();
                }
            }

            // Otros datos
            $table->float('porcentaje1')->nullable();
            $table->float('porcentaje2')->nullable();
            $table->float('porcentaje3')->nullable();

            // Proteicos, leguminosas, cereales, tubérculos, verduras y jugos
            $categories = ['proteico', 'leguminosa', 'cereal', 'tuberculo', 'verdura', 'jugo'];
            foreach ($categories as $category) {
                for ($i = 1; $i <= 8; $i++) {
                    $table->string("{$category}{$i}",120)->nullable();
                }
            }

            // Fechas y concepto
            $table->date('fecha_ultima_fumiga')->nullable();
            $table->date('fecha_ultima_limpieza')->nullable();
            $table->date('fecha_ultima_visita')->nullable();
            $table->string('concepto_emitido',120)->nullable();

            // Información del apoyo
            $table->string('nombre_apoyo',120)->nullable();
            $table->string('cedula_apoyo',30)->nullable();
            $table->string('cargo_apoyo',50)->nullable();
            $table->string('telefono_apoyo',50)->nullable();

            // Información de quien atiende
            $table->string('nombre_atiende',120)->nullable();
            $table->string('cedula_atiende',30)->nullable();
            $table->string('cargo_atiende',50)->nullable();
            $table->string('telefono_atiende',50)->nullable();

            // Firmas y usuario
            $table->text('firma1');
            $table->text('firma2');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ct_verificacion_modalidad_rps');
    }
};
