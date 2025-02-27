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
        Schema::table('ct_seguimiento_etiquetados', function (Blueprint $table) {
            // Convertir los campos de string a integer
            $table->unsignedBigInteger('municipio')->change();

            // Agregar claves foráneas sin cambiar los nombres de los campos
            $table->foreign('municipio')->references('id')->on('municipios')->onDelete('cascade');

            // Agregar campos nuevos
            $table->string('nombre_A_Leguminosa',100)->nullable();
            $table->string('nombre_B_Leguminosa',100)->nullable();
            $table->string('nombre_C_Leguminosa',100)->nullable();
            $table->string('nombre_A_Arroz',100)->nullable();
            $table->string('nombre_A_Azucar',100)->nullable();
            $table->string('nombre_A_Sal',100)->nullable();
            $table->string('nombre_A_Aceite',100)->nullable();
            $table->string('nombre_A_Lechep',100)->nullable();
            $table->string('nombre_A_Spaghetti',100)->nullable();
            $table->string('nombre_A_PanLeche',100)->nullable();
            $table->string('nombre_B_PanMantequilla',100)->nullable();
            $table->string('nombre_C_PanSal',100)->nullable();
            $table->string('nombre_D_PanDulce',100)->nullable();
            $table->string('nombre_E_PanMaiz',100)->nullable();
            $table->string('nombre_F_GlletaCasera',100)->nullable();
            $table->string('nombre_A_LacheEntera',100)->nullable();
            $table->string('nombre_B_LacteoAvena',100)->nullable();
            $table->string('nombre_B_LacteoAvenaSaborMaracuya',100)->nullable();
            $table->string('nombre_B_DulceBocadilloGuayaba',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ct_seguimiento_etiquetados', function (Blueprint $table) {
            // Eliminar claves foráneas
            $table->dropForeign(['municipio']);

            // Restaurar los campos a string
            $table->string('municipio')->change();

            // Eliminar el campo tematica
            $table->dropColumn('nombre_A_Leguminosa');
            $table->dropColumn('nombre_B_Leguminosa');
            $table->dropColumn('nombre_C_Leguminosa');
            $table->dropColumn('nombre_A_Arroz');
            $table->dropColumn('nombre_A_Azucar');
            $table->dropColumn('nombre_A_Sal');
            $table->dropColumn('nombre_A_Aceite');
            $table->dropColumn('nombre_A_Lechep');
            $table->dropColumn('nombre_A_Spaghetti');
            $table->dropColumn('nombre_A_PanLeche');
            $table->dropColumn('nombre_B_PanMantequilla');
            $table->dropColumn('nombre_C_PanSal');
            $table->dropColumn('nombre_D_PanDulce');
            $table->dropColumn('nombre_E_PanMaiz');
            $table->dropColumn('nombre_F_GlletaCasera');
            $table->dropColumn('nombre_A_LacheEntera');
            $table->dropColumn('nombre_B_LacteoAvena');
            $table->dropColumn('nombre_B_LacteoAvenaSaborMaracuya');
            $table->dropColumn('nombre_B_DulceBocadilloGuayaba');
        });
    }
};
