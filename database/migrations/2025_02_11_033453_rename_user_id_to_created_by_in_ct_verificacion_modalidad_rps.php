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
        Schema::table('ct_verificacion_modalidad_rps', function (Blueprint $table) {
            // Renombrar la columna user_id a created_by
            $table->renameColumn('user_id', 'created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ct_verificacion_modalidad_rps', function (Blueprint $table) {
            // Revertir el cambio en caso de rollback
            $table->renameColumn('created_by', 'user_id');
        });
    }
};
