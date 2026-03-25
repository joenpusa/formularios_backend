<?php

namespace App\Exports;

use App\Models\Diagnostico;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DiagnosticoExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    protected $fechaInicio;
    protected $fechaFin;
    protected $municipioId;
    protected $usuarioId;

    public function __construct($fechaInicio, $fechaFin, $municipioId = null, $usuarioId = null)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->municipioId = $municipioId;
        $this->usuarioId = $usuarioId;
    }

    public function query()
    {
        $query = Diagnostico::query()
            ->with(['user', 'data_municipio', 'data_institucion', 'data_sede'])
            ->whereBetween('fecha_visita', [$this->fechaInicio, $this->fechaFin]);

        if (!empty($this->municipioId) && is_numeric($this->municipioId)) {
            $query->where('municipio', $this->municipioId);
        }
        if (!empty($this->usuarioId)) {
            $query->where('created_by', $this->usuarioId);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'ID Reporte',
            'Generado Por',
            'Sede ID',
            'ETC',
            'Municipio',
            'Institución Educativa',
            'Sede Educativa',
            'Fecha de la Visita',
            'Hora de la Visita',
            '4. Zona Geográfica',
            '7. Modalidades de Atención del Servicio',
            '5. Modelos de Atención que actualmente se presta',
            '6. Tipos de Complemento Alimentario',
            '8. Si es industrializada, ¿tiene área para comedor?',
            '9. Si es industrializada, ¿tiene área para producción (cocina)?',
            '10. Si es industrializada, ¿tiene acceso a agua potable?',
            '11. ¿Está cerca de fuentes de contaminación?',
            '12. ¿Ubicada en zona de conflicto armado?',
            '13. ¿Con qué frecuencia el conflicto afecta la entrega?',
            '14. ¿Tiene espacio dedicado al almacenamiento?',
            '15. Material predominante del techo (alm)',
            '16. Material predominante del piso (alm)',
            '17. Material predominante de las paredes (alm)',
            '18. Estado del espacio de almacenamiento',
            '19. ¿Tiene espacio dedicado a la preparación?',
            '20. Material predominante del techo (prep)',
            '21. Material predominante del piso (prep)',
            '22. Material predominante de las paredes (prep)',
            '23. Estado del espacio de preparación',
            '24. ¿Cómo es el espacio de consumo?',
            '25. Estado del área de consumo',
            '26. ¿Tiene área demarcada para residuos?',
            '27. ¿Baños exclusivos para manipuladores?',
            '28. ¿Cuenta con electricidad?',
            '29. ¿Cuenta con acceso a agua?',
            '30. ¿De dónde obtiene el agua para el PAE?',
            '31. ¿Cuenta con alcantarillado?',
            '32. Combustible utilizado para preparación',
            '33. ¿Espacio adecuado para pipeta de gas?',
            '34. ¿Cuenta con recolección de basuras?',
            '35. Disposición de residuos orgánicos',
            '36. Disposición de residuos no orgánicos',
            '37. ¿Realizan clasificación de residuos?',
            '38. ¿Cuántas neveras tiene?',
            '39. ¿Cuántas funcionan? (neveras)',
            '40. Tamaño de la mayoría de neveras',
            '41. ¿Cuántos congeladores tiene?',
            '42. ¿Cuántos funcionan? (congeladores)',
            '43. Tamaño de la mayoría de congeladores',
            '44. ¿Almacena alimentos sobre estibas?',
            '45. Elementos para almacenar alimentos',
            '46. ¿Cuántas básculas tiene?',
            '47. Capacidad de la báscula',
            '48. Unidad de medida',
            '49. ¿Termómetro funcional?',
            '50. ¿Ollas a presión funcionales?',
            '51. Capacidad de ollas a presión',
            '52. ¿Cuántas ollas a presión funcionan?',
            '53. ¿Cuántos ralladores tiene?',
            '54. ¿Cuántos exprimidores tiene?',
            '55. ¿Cuántas tablas de picar (acrílico/plástico)?',
            '56. ¿Cuántas estufas tiene?',
            '57. Total de quemadores',
            '58. ¿Cuántos quemadores funcionan?',
            '59. ¿Cuántas licuadoras tiene?',
            '60. ¿Cuántas licuadoras funcionan?',
            '61. ¿Son licuadoras industriales?',
            '62. ¿Ollas exclusivas para PAE?',
            '63. ¿Ollas útiles?',
            '64. ¿Pailas útiles?',
            '65. ¿Calderos útiles?',
            '66. Tamaño de la mayoría de calderos',
            '67. ¿Cuchillos exclusivos?',
            '68. ¿Cuchillos útiles?',
            '69. ¿Cucharas/cucharones de servir útiles?',
            '70. Menaje: Capacidad para # niños',
            '71. Cantidad de platos',
            '72. Platos llanos útiles:',
            '73. Platos hondos útiles:',
            '74. Portas en buen estado:',
            '75. Cantidad de vasos:',
            '76. Cantidad de cucharas:',
            '77. Cantidad de tenedores:',
            '78. ¿Recipientes para sanitizar?',
            '79. ¿Baños exclusivos para PAE?',
            '80. ¿Lavamanos exclusivos?',
            '81. Modelo a implementar recomendado',
            '82. Nombre Profesional Apoyo',
            '83. Cédula Profesional Apoyo',
            '84. Cargo Profesional Apoyo',
            '85. Teléfono Profesional Apoyo',
            '86. Nombre Quien Atiende',
            '87. Cédula Quien Atiende',
            '88. Cargo Quien Atiende',
            '89. Teléfono Quien Atiende',
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->user ? $row->user->name : '',
            $row->sede_id,
            $row->etc,
            $row->data_municipio ? $row->data_municipio->nombre : '',
            $row->data_institucion ? $row->data_institucion->nombre : '',
            $row->data_sede ? $row->data_sede->nombre : '',
            $row->fecha_visita,
            $row->hora_visita,
            $row->zona_geografica,
            $row->modalidad_atencion,
            $row->modelo_atencion,
            $row->tipo_complemento,
            $row->ind_area_comedor,
            $row->ind_area_produccion,
            $row->ind_agua_potable,
            $row->cerca_contaminacion,
            $row->zona_conflicto,
            $row->frecuencia_conflicto,
            $row->esp_almacenamiento,
            $row->mat_techo_alm,
            $row->mat_piso_alm,
            $row->mat_paredes_alm,
            $row->est_almacenamiento,
            $row->esp_preparacion,
            $row->mat_techo_prep,
            $row->mat_piso_prep,
            $row->mat_paredes_prep,
            $row->est_preparacion,
            $row->esp_consumo,
            $row->est_consumo,
            $row->area_residuos,
            $row->banos_manipuladores,
            $row->electricidad,
            $row->acceso_agua,
            $row->fuente_agua,
            $row->alcantarillado,
            $row->combustible,
            $row->espacio_gas,
            $row->recoleccion_basura,
            $row->disp_organicos,
            $row->disp_no_organicos,
            $row->clasi_residuos,
            $row->cant_neveras,
            $row->func_neveras,
            $row->tamano_neveras,
            $row->cant_conge,
            $row->func_conge,
            $row->tamano_conge,
            $row->almacena_estibas,
            $row->elementos_alm,
            $row->cant_bas,
            $row->cap_bas,
            $row->uni_bas,
            $row->term_fun,
            $row->ollas_pre,
            $row->cap_ollas_pre,
            $row->ollas_pre_fun,
            $row->cant_ral,
            $row->cant_exp,
            $row->cant_tab_pic,
            $row->cant_estufas,
            $row->total_quemadores,
            $row->quemadores_fun,
            $row->cant_lic,
            $row->lic_fun,
            $row->lic_ind,
            $row->ollas_exc,
            $row->ollas_util,
            $row->pailas_util,
            $row->calderos_util,
            $row->tam_calderos,
            $row->cuch_exc,
            $row->cuch_util,
            $row->cuchara_serv,
            $row->cap_ninos,
            $row->cant_platos,
            $row->pla_lla,
            $row->pla_hon,
            $row->portas,
            $row->vasos,
            $row->cucharas,
            $row->tenedores,
            $row->recip_sani,
            $row->banos_exc,
            $row->lav_exc,
            $row->modelo_implementar,
            $row->nombre_apoyo,
            $row->cedula_apoyo,
            $row->cargo_apoyo,
            $row->telefono_apoyo,
            $row->nombre_atiende,
            $row->cedula_atiende,
            $row->cargo_atiende,
            $row->telefono_atiende,
        ];
    }
}
