<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ct_seguimiento_locales', function (Blueprint $table) {
            $table->id();
            for ($i = 1; $i <= 14; $i++) {
                $table->string('pre_' . $i, 10)->nullable();
            }
            $table->text('observaciones')->nullable();
            $table->date('fecha_visita')->nullable();
            $table->string('municipio')->nullable();
            $table->string('institucion')->nullable();
            $table->string('sede')->nullable();
            $table->string('etc')->nullable();
            $table->string('operador')->nullable();
            $table->string('contrato')->nullable();
            $table->string('supervisor')->nullable();
            $table->integer('num_beneficiarios')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->boolean('chk_ps')->nullable();
            $table->boolean('chk_i')->nullable();
            $table->boolean('chk_cct')->nullable();
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();
            $table->string('nombre_apoyo',120)->nullable();
            $table->string('cedula_apoyo',20)->nullable();
            $table->string('cargo_apoyo',50)->nullable();
            $table->string('telefono_apoyo',50)->nullable();
            $table->string('nombre_atiende',120)->nullable();
            $table->string('cedula_atiende',20)->nullable();
            $table->string('cargo_atiende',50)->nullable();
            $table->string('telefono_atiende',50)->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ct_seguimiento_locales');
    }
};
