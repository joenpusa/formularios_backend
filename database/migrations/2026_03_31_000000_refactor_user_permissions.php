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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'chk_social_all',
                'chk_tecnico_all',
                'chk_reportes_all',
            ]);
            $table->boolean('chk_diagnosticos')->default(false)->after('chk_galeria'); // Permiso diagnósticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('chk_diagnosticos');
            $table->boolean('chk_social_all')->default(false)->after('chk_social');
            $table->boolean('chk_tecnico_all')->default(false)->after('chk_tecnico');
            $table->boolean('chk_reportes_all')->default(false)->after('chk_reportes');
        });
    }
};
