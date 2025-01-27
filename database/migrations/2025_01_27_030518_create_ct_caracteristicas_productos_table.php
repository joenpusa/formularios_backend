<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ct_caracteristicas_productos', function (Blueprint $table) {
            $table->id();
            $table->string('etc')->nullable();
            $table->string('municipio')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_visita')->nullable();
            $table->string('operador')->nullable();
            $table->string('contrato')->nullable();
            $table->string('lugar_verificacion')->nullable();
            $table->string('lugar_verificacion_otro')->nullable();

            // Datos de res
            $table->date('fecha_recepcion_res')->nullable();
            $table->integer('cantidad_recepcionada_res')->nullable();
            $table->string('proveedores_res')->nullable();
            $table->string('olor_res')->nullable();
            $table->string('color_res')->nullable();
            $table->string('textura_res')->nullable();
            $table->text('obs_olor_res')->nullable();
            $table->text('obs_color_res')->nullable();
            $table->text('obs_textura_res')->nullable();
            $table->string('cuarto_res',20)->nullable();
            $table->string('tanque_res',20)->nullable();
            $table->string('nevera_res',20)->nullable();
            $table->string('caba_res',20)->nullable();
            $table->float('temp_ref_res')->nullable();
            $table->float('temp_con_res')->nullable();
            $table->string('cantidad_alm_res',50)->nullable();
            $table->text('observaciones_res')->nullable();

            // Datos de cerdo
            $table->date('fecha_recepcion_cerdo')->nullable();
            $table->integer('cantidad_recepcionada_cerdo')->nullable();
            $table->string('proveedores_cerdo')->nullable();
            $table->string('olor_cerdo')->nullable();
            $table->string('color_cerdo')->nullable();
            $table->string('textura_cerdo')->nullable();
            $table->text('obs_olor_cerdo')->nullable();
            $table->text('obs_color_cerdo')->nullable();
            $table->text('obs_textura_cerdo')->nullable();
            $table->string('cuarto_cerdo',20)->nullable();
            $table->string('tanque_cerdo',20)->nullable();
            $table->string('nevera_cerdo',20)->nullable();
            $table->string('caba_cerdo',20)->nullable();
            $table->float('temp_ref_cerdo')->nullable();
            $table->float('temp_con_cerdo')->nullable();
            $table->string('cantidad_alm_cerdo',50)->nullable();
            $table->text('observaciones_cerdo')->nullable();

            // Datos de pollo
            $table->date('fecha_recepcion_pollo')->nullable();
            $table->integer('cantidad_recepcionada_pollo')->nullable();
            $table->string('proveedores_pollo')->nullable();
            $table->string('olor_pollo',40)->nullable();
            $table->string('color_pollo',40)->nullable();
            $table->string('textura_pollo',40)->nullable();
            $table->text('obs_olor_pollo')->nullable();
            $table->text('obs_color_pollo')->nullable();
            $table->text('obs_textura_pollo')->nullable();
            $table->string('cuarto_pollo',20)->nullable();
            $table->string('tanque_pollo',20)->nullable();
            $table->string('nevera_pollo',20)->nullable();
            $table->string('caba_pollo',20)->nullable();
            $table->float('temp_ref_pollo')->nullable();
            $table->float('temp_con_pollo')->nullable();
            $table->string('cantidad_alm_pollo',50)->nullable();
            $table->text('observaciones_pollo')->nullable();
            // Observaciones generales
            $table->text('observaciones_generales')->nullable();


            // Datos de firma
            $table->string('nombre_apoyo',100)->nullable();
            $table->string('cedula_apoyo',30)->nullable();
            $table->string('cargo_apoyo',50)->nullable();
            $table->string('telefono_apoyo',30)->nullable();
            $table->string('nombre_atiende',100)->nullable();
            $table->string('cedula_atiende',30)->nullable();
            $table->string('cargo_atiende',50)->nullable();
            $table->string('telefono_atiende',30)->nullable();
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();

            // JSON y otros datos
            $table->json('filas_res')->nullable();
            $table->json('filas_cerdo')->nullable();
            $table->json('filas_pollo')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ct_caracteristicas_productos');
    }
};
