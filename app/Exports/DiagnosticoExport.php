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
            'ETC',
            'Municipio',
            'Institución Educativa',
            'Sede Educativa',
            'Fecha de la Visita',
            'Hora de la Visita',
            '4. Zona Geográfica',
            '7. Modalidades de Atención del Servicio que actualmente se presta',
            '5. Modelos de Atención que actualmente se presta',
            '6. Tipos de Complemento Alimentario',
            '8. Si la I.E. o sede es modalidad industrializada, ¿tiene algún área que se pueda utilizar como comedor?',
            '9. Si la I.E. o sede es modalidad es industrializada, ¿tiene área que se pueda utilizar para producción (cocina), con dotación de mesones y lavaplatos?',
            '10. Si la I.E. o sede es modalidad es industrializada, ¿tiene acceso a agua potable?',
            '11. ¿La sede está cerca de potenciales fuentes de contaminación (basureros, mataderos, pantanos, etc.)?',
            '12. ¿La sede educativa está ubicada en zona de conflicto armado e inestabilidad social?',
            '13. ¿Con qué frecuencia las dinámicas de conflicto armado e inestabilidad social afectan la Operación o entrega del PAE?',
            '14. ¿La sede tiene un espacio dedicado al almacenamiento de alimentos?',
            '15. El material predominante del techo en ese lugar es (almacenamiento)',
            '16. El material predominante del piso en ese lugar es (almacenamiento)',
            '17. El material predominante de las paredes en ese lugar es (almacenamiento)',
            '18. ¿En qué estado se encuentra el espacio dedicado al almacenamiento?',
            '19. ¿La sede tiene un espacio dedicado a la preparación de alimentos (cocina)?',
            '20. El material predominante del techo en ese lugar es (preparación)',
            '21. El material predominante del piso en ese lugar es (preparación)',
            '22. El material predominante de las paredes en ese lugar es (preparación)',
            '23. ¿En qué estado se encuentra el espacio dedicado a la preparación?',
            '24. ¿Cómo es el espacio que se utiliza para el consumo de alimentos?',
            '25. ¿En qué estado se encuentra el espacio dedicado al consumo?',
            '26. ¿La sede tiene un espacio o área demarcada para la disposición de residuos?',
            '27. ¿La sede tiene baños de uso exclusivo para el personal manipulador de alimentos?',
            '28. ¿La sede cuenta con el servicio de electricidad?',
            '29. ¿La sede cuenta con acceso a agua?',
            '30. ¿De dónde obtiene principalmente el agua para el PAE?',
            '31. ¿La sede cuenta con el servicio de alcantarillado?',
            '32. ¿Cuál de los siguientes combustibles se utilizan en la sede educativa para la preparación de los alimentos?',
            '33. ¿Cuenta con un espacio adecuado para almacenar la pipeta de gas?',
            '34. ¿La sede cuenta con el servicio de recolección de basuras (aseo)?',
            '35. ¿De qué forma se hace la disposición de residuos orgánicos (provenientes de los restos de alimentos) del PAE en esta sede educativa?',
            '36. ¿De qué forma se hace la disposición de residuos no orgánicos (envases de plástico, metal, vidrio, papel, cartón, etc.) del PAE en esta sede educativa?',
            '37. ¿Realizan algún tipo de clasificación de residuos sólidos?',
            '38. ¿Cuántas neveras tiene?',
            '39. ¿Cuántas de esas funcionan?',
            '40. ¿Cuál de los siguientes tamaños corresponde a la mayoría de las neveras que funcionan?',
            '41. ¿Cuántos congeladores tiene?',
            '42. ¿Cuántos de estos funcionan?',
            '43. ¿Cuál de los siguientes tamaños corresponde a la mayoría de los congeladores que funcionan?',
            '44. ¿Almacena los alimentos en tarimas o estibas de tal forma que se encuentren elevados del suelo?',
            '45. ¿Qué elementos utiliza para el almacenamiento de los alimentos?',
            '46. ¿Cuántas básculas o pesos tiene (funcionales)?',
            '47. ¿Cuánta es la capacidad de la báscula o el peso?',
            '48. Unidad de medida del peso o de la báscula',
            '49. ¿La sede cuenta con termómetro funcionando exclusivo para el PAE?',
            '50. ¿La sede cuenta con ollas a presión exclusivas para el uso del PAE?',
            '51. ¿Las ollas a presión son de 4 Lt o 6 Lt?',
            '52. ¿Cuántas de estas ollas a presión funcionan?',
            '53. Cantidad de Ralladores en buen estado',
            '54. Cantidad de exprimidores en buen estado',
            '55. Cantidad de Tablas de Picar en buen estado (No de madera)',
            '56. ¿Cuántas estufas tiene?',
            '57. ¿Cuántos quemadores o fogones tienen en total sus estufas?',
            '58. ¿Cuántos de estos quemadores funcionan correctamente?',
            '59. ¿Cuántas licuadoras tiene?',
            '60. ¿Cuántas de estas licuadoras funcionan?',
            '61. ¿Cuántas de las licuadoras que funcionan son industriales?',
            '62. ¿La sede cuenta con ollas, olletas o pailas exclusivas para el PAE?',
            '63. ¿Cuántas ollas u olletas presentan buena vida útil?',
            '64. ¿Cuántas pailas presentan buena vida útil?',
            '65. ¿Cuántos calderos presentan buena vida útil?',
            '66. ¿Qué tamaño son los calderos arroceros?',
            '67. ¿La sede cuenta con cuchillos exclusivos para el uso del PAE?',
            '68. ¿Cuántos cuchillos presentan buena vida útil?',
            '69. ¿La sede cuenta con cucharones y cucharas de servir exclusivas para el uso del PAE?',
            '70. De los niños que reciben PAE ¿Cuántos niños caben sentados al tiempo?',
            '71. ¿De cuántos platos dispone para el consumo de alimentos?',
            '72. ¿Cuántos de estos platos son llanos y se encuentran en buen estado?',
            '73. ¿Cuántos de estos platos son hondos y se encuentran en buen estado?',
            '74. ¿Con cuántos portas en buen estado cuentan para el consumo de alimentos?',
            '75. ¿De cuántos pocillos o vasos dispone para el consumo de alimentos en buen estado?',
            '76. ¿De cuántas cucharas dispone para el consumo de alimentos?',
            '77. ¿De cuántos tenedores dispone para el consumo de alimentos?',
            '78. ¿Cuántos recipientes de material sanitario (canecas) con tapa y bolsa plástica tiene la sede?',
            '79. ¿Tiene batería sanitaria (tazas o inodoros) exclusivos para personal manipulador de alimentos?',
            '80. ¿Tiene lavamanos exclusivos para personal manipulador de alimentos?',
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
