<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('ct_verificacion_materia_prima', function (Blueprint $table) {
            $table->string('numero_visita')->change();
        });
    }

    public function down() {
        Schema::table('ct_verificacion_materia_prima', function (Blueprint $table) {
            $table->integer('numero_visita')->nullable()->change(); // Para revertir el cambio si es necesario
        });
    }
};
