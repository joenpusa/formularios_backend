<?php
$vueContent = file_get_contents('/var/www/html/pae/formularios_frontend/src/views/Diagnostico/FormDiagnostico.vue');
preg_match('/form:\s*\{([^}]*)\}/s', $vueContent, $matches);
$formContent = $matches[1];
$lines = explode("\n", $formContent);
$fields = [];
foreach ($lines as $line) {
    if (preg_match('/([a-zA-Z0-9_]+):\s*(?:""|"Norte de Santander"|\[\])/', $line, $fieldMatch)) {
        $fields[] = trim($fieldMatch[1]);
    }
}
$fields = array_diff($fields, ['files']);
echo "Fields found: " . count($fields) . "\n";
echo implode(", ", $fields) . "\n";

$dbFields = [
    'sede_id', 'etc', 'municipio', 'institucion', 'sede', 'fecha_visita', 'hora_visita', 'zona_geografica', 'modalidad_atencion', 'tipo_servicio', 'vias_acceso', 'transporte_alimentos', 'zona_conflicto', 'frecuencia_conflicto', 'area_almacenamiento', 'area_preparacion', 'area_consumo', 'unidades_sanitarias', 'cuarto_residuos', 'energia_electrica', 'acueducto_agua', 'tipo_gas', 'recoleccion_basura', 'equipos_almacenamiento', 'equipos_preparacion', 'menaje_dotacion', 'recip_sani', 'banos_exc', 'lav_exc', 'modelo_implementar', 'firma1', 'firma2', 'nombre_apoyo', 'cedula_apoyo', 'cargo_apoyo', 'telefono_apoyo', 'nombre_atiende', 'cedula_atiende', 'cargo_atiende', 'telefono_atiende', 'created_by'
];

$toAdd = array_diff($fields, $dbFields);
$toRemove = array_diff($dbFields, $fields); // Note: created_by and sede_id, tipo_servicio might be needed?
echo "\nTo Add (" . count($toAdd) . "):\n";
echo implode(", ", $toAdd) . "\n";
echo "\nTo Remove (" . count($toRemove) . "):\n";
echo implode(", ", $toRemove) . "\n";
