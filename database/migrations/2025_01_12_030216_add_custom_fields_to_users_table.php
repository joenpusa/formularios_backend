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
        Schema::table('users', function (Blueprint $table) {
            $table->string('tipo_documento')->nullable()->after('email'); // Tipo de documento
            $table->string('num_documento')->unique()->nullable()->after('tipo_documento'); // Número de documento
            $table->boolean('chk_social')->default(false)->after('num_documento'); // Permiso social
            $table->boolean('chk_social_all')->default(false)->after('chk_social'); // Permiso global social
            $table->boolean('chk_reportes')->default(false)->after('chk_social_all'); // Permiso reportes
            $table->boolean('chk_reportes_all')->default(false)->after('chk_reportes'); // Permiso global reportes
            $table->boolean('chk_usuarios')->default(false)->after('chk_reportes_all'); // Permiso usuarios
            $table->boolean('chk_tecnico')->default(false)->after('chk_usuarios'); // Permiso técnico
            $table->boolean('chk_tecnico_all')->default(false)->after('chk_tecnico'); // Permiso global técnico
            $table->boolean('chk_galeria')->default(false)->after('chk_tecnico_all'); // Permiso galería
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'tipo_documento',
                'num_documento',
                'chk_social',
                'chk_social_all',
                'chk_reportes',
                'chk_reportes_all',
                'chk_usuarios',
                'chk_tecnico',
                'chk_tecnico_all',
                'chk_galeria',
            ]);
        });
    }
};
