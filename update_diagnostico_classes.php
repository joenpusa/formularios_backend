<?php
$fields = [
    'sede_id', 'etc', 'municipio', 'institucion', 'sede', 'fecha_visita', 'hora_visita',
    'zona_geografica', 'modalidad_atencion', 'modelo_atencion', 'tipo_complemento', 'ind_area_comedor',
    'ind_area_produccion', 'ind_agua_potable', 'cerca_contaminacion', 'zona_conflicto',
    'frecuencia_conflicto', 'esp_almacenamiento', 'mat_techo_alm', 'mat_piso_alm', 'mat_paredes_alm',
    'est_almacenamiento', 'esp_preparacion', 'mat_techo_prep', 'mat_piso_prep', 'mat_paredes_prep',
    'est_preparacion', 'esp_consumo', 'est_consumo', 'area_residuos', 'banos_manipuladores',
    'electricidad', 'acceso_agua', 'fuente_agua', 'alcantarillado', 'combustible', 'espacio_gas',
    'recoleccion_basura', 'disp_organicos', 'disp_no_organicos', 'clasi_residuos', 'cant_neveras',
    'func_neveras', 'tamano_neveras', 'cant_conge', 'func_conge', 'tamano_conge', 'almacena_estibas',
    'elementos_alm', 'cant_bas', 'cap_bas', 'uni_bas', 'term_fun', 'ollas_pre', 'cap_ollas_pre',
    'ollas_pre_fun', 'cant_ral', 'cant_exp', 'cant_tab_pic', 'cant_estufas', 'total_quemadores',
    'quemadores_fun', 'cant_lic', 'lic_fun', 'lic_ind', 'ollas_exc', 'ollas_util', 'pailas_util',
    'calderos_util', 'tam_calderos', 'cuch_exc', 'cuch_util', 'cuchara_serv', 'cap_ninos', 'cant_platos',
    'pla_lla', 'pla_hon', 'portas', 'vasos', 'cucharas', 'tenedores', 'recip_sani', 'banos_exc',
    'lav_exc', 'modelo_implementar', 'firma1', 'firma2', 'nombre_apoyo', 'cedula_apoyo', 'cargo_apoyo',
    'telefono_apoyo', 'nombre_atiende', 'cedula_atiende', 'cargo_atiende', 'telefono_atiende', 'created_by'
];

$fillableStr = "    protected \$fillable = [\n        '" . implode("',\n        '", $fields) . "'\n    ];";

$modelPath = 'app/Models/Diagnostico.php';
$modelContent = file_get_contents($modelPath);
$modelContent = preg_replace('/protected\s+\$fillable\s*=\s*\[.*?\];/s', $fillableStr, $modelContent);
file_put_contents($modelPath, $modelContent);

$rules = [];
foreach ($fields as $field) {
    if ($field == 'created_by') continue;
    $rule = ($field == 'hora_visita') ? 'nullable|date_format:H:i' :
           (($field == 'fecha_visita') ? 'nullable|date' : 'nullable');
    $rules[] = "            '$field' => '$rule',";
}
$validateStr = "\$request->validate([\n" . implode("\n", $rules) . "\n        ]);";

$controllerPath = 'app/Http/Controllers/DiagnosticoController.php';
$controllerContent = file_get_contents($controllerPath);
$controllerContent = preg_replace('/\$request->validate\(\[.*?\]\);/s', $validateStr, $controllerContent);
file_put_contents($controllerPath, $controllerContent);

echo "Model and Controller updated successfully.\n";
