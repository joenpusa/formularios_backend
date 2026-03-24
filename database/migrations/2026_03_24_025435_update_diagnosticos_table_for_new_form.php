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
        Schema::table('diagnosticos', function (Blueprint $table) {
            $table->dropColumn([
                'tipo_servicio',
                'vias_acceso',
                'transporte_alimentos',
                'area_almacenamiento',
                'area_preparacion',
                'area_consumo',
                'unidades_sanitarias',
                'cuarto_residuos',
                'energia_electrica',
                'acueducto_agua',
                'tipo_gas',
                'equipos_almacenamiento',
                'equipos_preparacion',
                'menaje_dotacion'
            ]);
            $table->text('modelo_atencion')->nullable();
            $table->text('tipo_complemento')->nullable();
            $table->text('ind_area_comedor')->nullable();
            $table->text('ind_area_produccion')->nullable();
            $table->text('ind_agua_potable')->nullable();
            $table->text('cerca_contaminacion')->nullable();
            $table->text('esp_almacenamiento')->nullable();
            $table->text('mat_techo_alm')->nullable();
            $table->text('mat_piso_alm')->nullable();
            $table->text('mat_paredes_alm')->nullable();
            $table->text('est_almacenamiento')->nullable();
            $table->text('esp_preparacion')->nullable();
            $table->text('mat_techo_prep')->nullable();
            $table->text('mat_piso_prep')->nullable();
            $table->text('mat_paredes_prep')->nullable();
            $table->text('est_preparacion')->nullable();
            $table->text('esp_consumo')->nullable();
            $table->text('est_consumo')->nullable();
            $table->text('area_residuos')->nullable();
            $table->text('banos_manipuladores')->nullable();
            $table->text('electricidad')->nullable();
            $table->text('acceso_agua')->nullable();
            $table->text('fuente_agua')->nullable();
            $table->text('alcantarillado')->nullable();
            $table->text('combustible')->nullable();
            $table->text('espacio_gas')->nullable();
            $table->text('disp_organicos')->nullable();
            $table->text('disp_no_organicos')->nullable();
            $table->text('clasi_residuos')->nullable();
            $table->integer('cant_neveras')->nullable();
            $table->integer('func_neveras')->nullable();
            $table->text('tamano_neveras')->nullable();
            $table->integer('cant_conge')->nullable();
            $table->integer('func_conge')->nullable();
            $table->text('tamano_conge')->nullable();
            $table->text('almacena_estibas')->nullable();
            $table->text('elementos_alm')->nullable();
            $table->integer('cant_bas')->nullable();
            $table->integer('cap_bas')->nullable();
            $table->text('uni_bas')->nullable();
            $table->text('term_fun')->nullable();
            $table->text('ollas_pre')->nullable();
            $table->text('cap_ollas_pre')->nullable();
            $table->integer('ollas_pre_fun')->nullable();
            $table->integer('cant_ral')->nullable();
            $table->integer('cant_exp')->nullable();
            $table->integer('cant_tab_pic')->nullable();
            $table->integer('cant_estufas')->nullable();
            $table->integer('total_quemadores')->nullable();
            $table->integer('quemadores_fun')->nullable();
            $table->integer('cant_lic')->nullable();
            $table->integer('lic_fun')->nullable();
            $table->integer('lic_ind')->nullable();
            $table->string('ollas_exc')->nullable();
            $table->integer('ollas_util')->nullable();
            $table->integer('pailas_util')->nullable();
            $table->integer('calderos_util')->nullable();
            $table->string('tam_calderos')->nullable();
            $table->string('cuch_exc')->nullable();
            $table->integer('cuch_util')->nullable();
            $table->string('cuchara_serv')->nullable();
            $table->string('cap_ninos')->nullable();
            $table->integer('cant_platos')->nullable();
            $table->integer('pla_lla')->nullable();
            $table->integer('pla_hon')->nullable();
            $table->integer('portas')->nullable();
            $table->integer('vasos')->nullable();
            $table->integer('cucharas')->nullable();
            $table->integer('tenedores')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diagnosticos', function (Blueprint $table) {
            $table->string('tipo_servicio')->nullable();
            $table->string('vias_acceso')->nullable();
            $table->string('transporte_alimentos')->nullable();
            $table->string('area_almacenamiento')->nullable();
            $table->string('area_preparacion')->nullable();
            $table->string('area_consumo')->nullable();
            $table->string('unidades_sanitarias')->nullable();
            $table->string('cuarto_residuos')->nullable();
            $table->string('energia_electrica')->nullable();
            $table->string('acueducto_agua')->nullable();
            $table->string('tipo_gas')->nullable();
            $table->string('equipos_almacenamiento')->nullable();
            $table->string('equipos_preparacion')->nullable();
            $table->string('menaje_dotacion')->nullable();
        });
    }
};
