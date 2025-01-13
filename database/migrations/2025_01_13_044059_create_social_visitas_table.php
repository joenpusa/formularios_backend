<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialVisitasTable extends Migration
{
    public function up()
    {
        Schema::create('social_visitas', function (Blueprint $table) {
            $table->id();
            $table->string('etc');
            $table->date('fechaVisita')->nullable();
            $table->string('municipio')->nullable();
            $table->string('institucion')->nullable();
            $table->string('sede')->nullable();
            $table->string('operador')->nullable();
            $table->string('contrato')->nullable();
            $table->string('num_visita')->nullable();
            $table->string('modalidad')->nullable();
            $table->integer('num_beneficiarios')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->string('pre_1')->nullable();
            $table->string('pre_2')->nullable();
            $table->string('pre_3')->nullable();
            $table->string('pre_4')->nullable();
            $table->string('pre_5')->nullable();
            $table->string('pre_6')->nullable();
            $table->string('pre_7')->nullable();
            $table->string('pre_8')->nullable();
            $table->string('pre_9')->nullable();
            $table->string('pre_10')->nullable();
            $table->string('pre_11')->nullable();
            $table->string('pre_12')->nullable();
            $table->string('pre_13')->nullable();
            $table->string('pre_14')->nullable();
            $table->string('pre_15')->nullable();
            $table->string('compromiso_1_desc')->nullable();
            $table->string('compromiso_1_resp')->nullable();
            $table->date('compromiso_1_fecha')->nullable();
            $table->string('compromiso_1_mecanismo')->nullable();
            $table->string('compromiso_2_desc')->nullable();
            $table->string('compromiso_2_resp')->nullable();
            $table->date('compromiso_2_fecha')->nullable();
            $table->string('compromiso_2_mecanismo')->nullable();
            $table->string('compromiso_3_desc')->nullable();
            $table->string('compromiso_3_resp')->nullable();
            $table->date('compromiso_3_fecha')->nullable();
            $table->string('compromiso_3_mecanismo')->nullable();
            $table->string('cedula_apoyo')->nullable();
            $table->string('nombre_apoyo')->nullable();
            $table->string('telefono_apoyo')->nullable();
            $table->string('cargo_apoyo')->nullable();
            $table->string('cedula_atiende')->nullable();
            $table->string('nombre_atiende')->nullable();
            $table->string('telefono_atiende')->nullable();
            $table->string('cargo_atiende')->nullable();
            $table->decimal('perc_gest_social', 5, 2)->nullable();
            $table->text('observaciones')->nullable();
            $table->text('firstSignature')->nullable();
            $table->text('secondSignature')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_visitas');
    }
}
