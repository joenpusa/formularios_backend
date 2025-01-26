<?php
// Migración
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ct_seguimiento_etiquetados', function (Blueprint $table) {
            $table->id();
            $table->string('etc', 100)->nullable();
            $table->string('municipio',10)->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('operador',100)->nullable();
            $table->string('contrato',50)->nullable();
            $table->date('fecha_visita')->nullable();

            // Campos Leguminosas
            $fields = [
                'A_Leguminosa', 'B_Leguminosa', 'C_Leguminosa',
                'A_Arroz', 'A_Azucar', 'A_Sal', 'A_Aceite',
                'A_Lechep', 'A_Spaghetti', 'A_PanLeche',
                'B_PanMantequilla', 'C_PanSal', 'D_PanDulce', 'E_PanMaiz',
                'F_GlletaCasera', 'A_LacheEntera', 'B_LacteoAvena',
                'B_LacteoAvenaSaborMaracuya', 'B_DulceBocadilloGuayaba'
            ];

            foreach ($fields as $field) {
                $table->string("marca_$field",100)->nullable();
                $table->string("contenido_$field",100)->nullable();
                $table->string("pais_$field",100)->nullable();
                $table->string("fabricante_$field",100)->nullable();
                $table->string("lote_$field",100)->nullable();
                $table->date("fecha_$field")->nullable();
                $table->string("registro_$field",100)->nullable();
            }

            // Otros campos
            $table->text('observaciones')->nullable();

            // Datos del apoyo
            for ($i = 1; $i <= 2; $i++) {
                $table->string("nombre_apoyo$i",120)->nullable();
                $table->string("cedula_apoyo$i",30)->nullable();
                $table->string("cargo_apoyo$i")->nullable();
                $table->string("telefono_apoyo$i",30)->nullable();
            }

            // Datos de quien atiende
            $table->string('nombre_atiende',120)->nullable();
            $table->string('cedula_atiende',30)->nullable();
            $table->string('cargo_atiende',50)->nullable();
            $table->string('telefono_atiende',30)->nullable();

            // Firmas
            $table->text('firma1')->nullable();
            $table->text('firma2')->nullable();
            $table->text('firma3')->nullable();

            // Metadatos
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ct_seguimiento_etiquetados');
    }
};
