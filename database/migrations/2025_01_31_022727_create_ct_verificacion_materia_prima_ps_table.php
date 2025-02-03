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
        Schema::create('ct_verificacion_materia_prima_ps', function (Blueprint $table) {
            $table->id();
            $table->string('etc',60);
            $table->date('fecha_visita');
            $table->string('municipio');
            $table->string('institucion');
            $table->string('sede');
            $table->time('hora_inicial');
            $table->time('hora_final');
            $table->string('operador');
            $table->string('contrato');
            $table->string('tipo_visita',20)->nullable();
            $table->string('numero_visita',10)->nullable();
            $table->integer('num_beneficiarios')->default(0);
            $table->text('descripcion_menu')->nullable();
            $table->text('observaciones')->nullable();
            $table->decimal('porcentajeCumplimiento', 5, 2)->default(0);
            $table->json('filas')->nullable();
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();
            $table->string('nombre_apoyo',120)->nullable();
            $table->string('cedula_apoyo',30)->nullable();
            $table->string('cargo_apoyo',50)->nullable();
            $table->string('telefono_apoyo',30)->nullable();
            $table->string('nombre_atiende',120)->nullable();
            $table->string('cedula_atiende',30)->nullable();
            $table->string('cargo_atiende',50)->nullable();
            $table->string('telefono_atiende',30)->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ct_verificacion_materia_prima_ps');
    }
};
