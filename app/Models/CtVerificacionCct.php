<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtVerificacionCct extends Model
{
    use HasFactory;

    protected $table = 'ct_verificacion_cct';

    protected $fillable = [
        'etc', 'fecha_visita', 'municipio', 'institucion', 'sede', 'hora_inicial', 'hora_final',
        'tipo_visita', 'numero_visita', 'operador', 'contrato', 'num_beneficiarios', 'cdp',
        'placa_vehiculo', 'numero_sedes', 'observaciones_recibe', 'fecha_fumigacion',
        'fecha_limpieza_tanque', 'fecha_ultima_visita', 'concepto_emitido', 'firma1', 'firma2', 'created_by',
        'pre_1', 'pre_1_obs', 'pre_2', 'pre_2_obs', 'pre_3', 'pre_3_obs', 'pre_4', 'pre_4_obs',
        'pre_5', 'pre_5_obs', 'pre_6', 'pre_6_obs', 'pre_7', 'pre_7_obs', 'pre_8', 'pre_8_obs',
        'pre_9', 'pre_9_obs', 'pre_10', 'pre_10_obs', 'pre_11', 'pre_11_obs', 'pre_12', 'pre_12_obs',
        'pre_13', 'pre_13_obs', 'pre_14', 'pre_14_obs', 'pre_15', 'pre_15_obs', 'pre_16', 'pre_16_obs',
        'pre_17', 'pre_17_obs', 'pre_18', 'pre_18_obs', 'pre_19', 'pre_19_obs', 'pre_20', 'pre_20_obs',
        'pre_21', 'pre_21_obs', 'pre_22', 'pre_22_obs', 'pre_23', 'pre_23_obs', 'pre_24', 'pre_24_obs',
        'pre_25', 'pre_25_obs', 'pre_26', 'pre_26_obs', 'pre_27', 'pre_27_obs', 'pre_28', 'pre_28_obs',
        'pre_29', 'pre_29_obs', 'pre_30', 'pre_30_obs', 'pre_31', 'pre_31_obs', 'pre_32', 'pre_32_obs',
        'pre_33', 'pre_33_obs', 'pre_34', 'pre_34_obs', 'pre_35', 'pre_35_obs', 'pre_36', 'pre_36_obs',
        'pre_37', 'pre_37_obs', 'pre_38', 'pre_38_obs', 'pre_39', 'pre_39_obs', 'pre_40', 'pre_40_obs',
        'pre_41', 'pre_41_obs', 'pre_42', 'pre_42_obs', 'pre_43', 'pre_43_obs', 'pre_44', 'pre_44_obs',
        'pre_45', 'pre_45_obs', 'pre_46', 'pre_46_obs', 'pre_47', 'pre_47_obs', 'pre_48', 'pre_48_obs',
        'pre_49', 'pre_49_obs', 'pre_50', 'pre_50_obs', 'pre_51', 'pre_51_obs', 'pre_52', 'pre_52_obs',
        'pre_53', 'pre_53_obs', 'pre_54', 'pre_54_obs', 'pre_55', 'pre_55_obs', 'pre_56', 'pre_56_obs',
        'pre_57', 'pre_57_obs', 'pre_58', 'pre_58_obs', 'pre_59', 'pre_59_obs', 'pre_60', 'pre_60_obs',
        'pre_61', 'pre_61_obs', 'pre_62', 'pre_62_obs', 'pre_63', 'pre_63_obs', 'pre_64', 'pre_64_obs',
        'pre_65', 'pre_65_obs', 'pre_66', 'pre_66_obs', 'pre_67', 'pre_67_obs', 'pre_68', 'pre_68_obs',
        'pre_69', 'pre_69_obs', 'pre_70', 'pre_70_obs', 'pre_71', 'pre_71_obs', 'pre_72', 'pre_72_obs', 'pre_73', 'pre_73_obs',
        'tb_verificacion1_1', 'tb_verificacion1_2', 'tb_verificacion1_3', 'tb_verificacion1_4',
        'tb_verificacion1_5', 'tb_verificacion1_6', 'tb_verificacion1_7', 'tb_verificacion1_8',
        'tb_verificacion1_9', 'tb_verificacion2_1', 'tb_verificacion2_2', 'tb_verificacion2_3',
        'tb_verificacion2_4', 'tb_verificacion2_5', 'tb_verificacion2_6', 'tb_verificacion2_7',
        'tb_verificacion2_8', 'tb_verificacion2_9', 'tb_verificacion3_1', 'tb_verificacion3_2',
        'tb_verificacion3_3', 'tb_verificacion3_4', 'tb_verificacion3_5', 'tb_verificacion3_6',
        'tb_verificacion3_7', 'tb_verificacion3_8', 'tb_verificacion3_9', 'tb_verificacion4_1',
        'tb_verificacion4_2', 'tb_verificacion4_3', 'tb_verificacion4_4', 'tb_verificacion4_5',
        'tb_verificacion4_6', 'tb_verificacion4_7', 'tb_verificacion4_8', 'tb_verificacion4_9',
        'tb_verificacion5_1', 'tb_verificacion5_2', 'tb_verificacion5_3', 'tb_verificacion5_4',
        'tb_verificacion5_5', 'tb_verificacion5_6', 'tb_verificacion5_7', 'tb_verificacion5_8',
        'tb_verificacion5_9', 'indicador1', 'indicador2', 'indicador3', 'proteico1', 'proteico2',
        'proteico3', 'proteico4', 'proteico5', 'proteico6', 'proteico7', 'proteico8', 'leguminosa1',
        'leguminosa2', 'leguminosa3', 'leguminosa4', 'leguminosa5', 'leguminosa6', 'leguminosa7',
        'leguminosa8', 'cereal1', 'cereal2', 'cereal3', 'cereal4', 'cereal5', 'cereal6', 'cereal7',
        'cereal8', 'tuberculos1', 'tuberculos2', 'tuberculos3', 'tuberculos4', 'tuberculos5',
        'tuberculos6', 'tuberculos7', 'tuberculos8', 'verdura1', 'verdura2', 'verdura3', 'verdura4',
        'verdura5', 'verdura6', 'verdura7', 'verdura8', 'jugo1', 'jugo2', 'jugo3', 'jugo4', 'jugo5',
        'jugo6', 'jugo7', 'jugo8', 'cdp', 'placa_vehiculo', 'numero_sedes', 'nombre1', 'nombre2',
        'nombre3', 'nombre4', 'hora_salida1', 'hora_salida2', 'hora_salida3', 'hora_salida4',
        'temperatura_salida1', 'temperatura_salida2', 'temperatura_salida3', 'temperatura_salida4',
        'hora_llegada1', 'hora_llegada2', 'hora_llegada3', 'hora_llegada4', 'temperatura_llegada1',
        'temperatura_llegada2', 'temperatura_llegada3', 'temperatura_llegada4', 'cantidad_raciones1',
        'cantidad_raciones2', 'cantidad_raciones3', 'cantidad_raciones4'. 'nombre_apoyo', 'cedula_apoyo',
        'cargo_apoyo', 'telefono_apoyo', 'nombre_atiende', 'cedula_atiende', 'cargo_atiende',
        'telefono_atiende', 'observaciones_recibe', 'fecha_fumigacion', 'fecha_limpieza_tanque',

    ];

    protected $casts = [
        'files' => 'array'
    ];
}
