<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSocialVisitasTable extends Migration
{
    public function up()
    {
        Schema::table('social_visitas', function (Blueprint $table) {
            // Agregar el nuevo campo pre_16
            $table->string('pre_16')->nullable()->after('pre_15');

            // Renombrar columnas existentes
            $table->renameColumn('firstSignature', 'firma1');
            $table->renameColumn('secondSignature', 'firma2');
        });
    }

    public function down()
    {
        Schema::table('social_visitas', function (Blueprint $table) {
            // Revertir el cambio del nuevo campo
            $table->dropColumn('pre_16');

            // Revertir los nombres de las columnas
            $table->renameColumn('firma1', 'firstSignature');
            $table->renameColumn('firma2', 'secondSignature');
        });
    }
}
