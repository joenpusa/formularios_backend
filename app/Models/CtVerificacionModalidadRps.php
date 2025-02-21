<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtVerificacionModalidadRps extends Model
{
    use HasFactory;

    protected $table = 'ct_verificacion_modalidad_rps';

    protected $fillable = [
        'etc',  'fecha_visita', 'hora_inicial', 'hora_final', 'institucion',
        'municipio', 'sede', 'numero_visita', 'tipo_visita', 'num_beneficiarios',
        'operador', 'contrato', 'observaciones', 'fecha_ultima_fumiga', 'fecha_ultima_limpieza',
        'fecha_ultima_visita', 'concepto_emitido', 'nombre_apoyo', 'cedula_apoyo',
        'cargo_apoyo', 'telefono_apoyo', 'nombre_atiende', 'cedula_atiende',
        'cargo_atiende', 'telefono_atiende', 'firma1', 'firma2', 'created_by',
        'condi_1', 'condi_1_obs', 'condi_2', 'condi_2_obs', 'condi_3', 'condi_3_obs',
        'condi_4', 'condi_4_obs', 'condi_5', 'condi_5_obs', 'condi_6', 'condi_6_obs',
        'condi_7', 'condi_7_obs', 'condi_8', 'condi_8_obs', 'condi_9', 'condi_9_obs',
        'condi_10', 'condi_10_obs', 'condi_11', 'condi_11_obs', 'condi_12', 'condi_12_obs',
        'condi_13', 'condi_13_obs', 'condi_14', 'condi_14_obs', 'condi_15', 'condi_15_obs',
        'condi_16', 'condi_16_obs', 'condi_17', 'condi_17_obs', 'condi_18', 'condi_18_obs',
        'condi_19', 'condi_19_obs', 'condi_20', 'condi_20_obs', 'condi_21', 'condi_21_obs',
        'condi_22', 'condi_22_obs', 'condi_23', 'condi_23_obs', 'condi_24', 'condi_24_obs',
        'condi_25', 'condi_25_obs', 'condi_26', 'condi_26_obs', 'condi_27', 'condi_27_obs',
        'condi_28', 'condi_28_obs', 'condi_29', 'condi_29_obs', 'condi_30', 'condi_30_obs',
        'condi_31', 'condi_31_obs', 'condi_32', 'condi_32_obs', 'condi_33', 'condi_33_obs',
        'condi_34', 'condi_34_obs', 'condi_35', 'condi_35_obs', 'condi_36', 'condi_36_obs',
        'condi_37', 'condi_37_obs', 'condi_38', 'condi_38_obs', 'condi_39', 'condi_39_obs',
        'condi_40', 'condi_40_obs', 'condi_41', 'condi_41_obs', 'condi_42', 'condi_42_obs',
        'condi_43', 'condi_43_obs', 'condi_44', 'condi_44_obs', 'condi_45', 'condi_45_obs',
        'condi_46', 'condi_46_obs', 'condi_47', 'condi_47_obs', 'condi_48', 'condi_48_obs',
        'condi_49', 'condi_49_obs', 'condi_50', 'condi_50_obs', 'condi_51', 'condi_51_obs',
        'condi_52', 'condi_52_obs', 'condi_53', 'condi_53_obs', 'condi_54', 'condi_54_obs',
        'condi_55', 'condi_55_obs', 'condi_56', 'condi_56_obs', 'condi_57', 'condi_57_obs',
        'condi_58', 'condi_58_obs', 'condi_59', 'condi_59_obs', 'condi_60', 'condi_60_obs',
        'alimento1_1', 'alimento1_2', 'alimento1_3', 'alimento1_4', 'alimento1_5', 'alimento1_6',
        'alimento1_7', 'alimento1_8',  'alimento2_1', 'alimento2_2', 'alimento2_3', 'alimento2_4',
        'alimento2_5', 'alimento2_6', 'alimento2_7', 'alimento2_8', 'alimento3_1', 'alimento3_2',
        'alimento3_3', 'alimento3_4', 'alimento3_5', 'alimento3_6', 'alimento3_7', 'alimento3_8',
        'alimento4_1', 'alimento4_2', 'alimento4_3', 'alimento4_4', 'alimento4_5', 'alimento4_6',
        'alimento4_7', 'alimento4_8', 'alimento5_1', 'alimento5_2', 'alimento5_3', 'alimento5_4',
        'alimento5_5', 'alimento5_6', 'alimento5_7', 'alimento5_8', 'porcentaje1', 'porcentaje2',
        'porcentaje3', 'proteico1', 'proteico2', 'proteico3', 'proteico4', 'proteico5', 'proteico6',
        'proteico7', 'proteico8', 'leguminosa1', 'leguminosa2', 'leguminosa3', 'leguminosa4',
        'leguminosa5', 'leguminosa6', 'leguminosa7', 'leguminosa8', 'cereal1', 'cereal2', 'cereal3',
        'cereal4', 'cereal5', 'cereal6', 'cereal7', 'cereal8', 'tuberculo1', 'tuberculo2', 'tuberculo3',
        'tuberculo4', 'tuberculo5', 'tuberculo6', 'tuberculo7', 'tuberculo8', 'verdura1', 'verdura2',
        'verdura3', 'verdura4', 'verdura5', 'verdura6', 'verdura7', 'verdura8', 'jugo1', 'jugo2',
        'jugo3', 'jugo4', 'jugo5', 'jugo6', 'jugo7', 'jugo8', 'alimento1_9', 'alimento2_9', 'alimento3_9',
        'alimento4_9', 'alimento5_9',
    ];

    protected $casts = [
        'fecha_visita' => 'date',
        'fecha_ultima_fumiga' => 'date',
        'fecha_ultima_limpieza' => 'date',
        'fecha_ultima_visita' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function data_municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio');
    }

    public function data_institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion');
    }

    public function data_sede()
    {
        return $this->belongsTo(Sede::class, 'sede');
    }
}
