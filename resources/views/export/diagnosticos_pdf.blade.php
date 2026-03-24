<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            table-layout: fixed;
            word-wrap: break-word;
            font-family: Calibri, sans-serif;
        }

        body {
            font-size: 11px;
            font-family: Calibri, sans-serif;
        }

        th,
        td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }

        th {
            background-color: #F9E5A4;
        }

        .header-section {
            text-align: center;
            font-weight: bold;
        }

        .table-info th,
        .table-info td {
            background-color: #d1ecf1 !important;
            font-weight: bold;
            text-align: center;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-4">
        <!-- TABLA DE LOGO Y NOMBRE DEL PROGRAMA -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td rowspan="3" style="width: 25%; text-align:center;"><img
                            src="{{ public_path('images/logo2.png') }}" style="width: 150px; padding: 5px" /></td>
                    <td class="header-section" style="width: 50%;">PROGRAMA DE ALIMENTACIÓN ESCOLAR NORTE DE SANTANDER
                    </td>
                    <td style="width: 25%;"><strong>VERSIÓN:</strong> 01</td>
                </tr>
                <tr>
                    <td rowspan="2" class="header-section">DIAGNÓSTICO INFRAESTRUCTURA Y CONDICIONES</td>
                    <td><strong>CÓDIGO:</strong> F-DIAG-01</td>
                </tr>
                <tr>
                    <td><strong>VIGENTE DESDE:</strong> ENERO 2025</td>
                </tr>
            </tbody>
        </table>

        <!-- TABLA DE DATOS BASICOS -->
        <table class="table table-bordered mt-2">
            <tbody>
                <tr>
                    <th style="width: 15%;">ETC</th>
                    <td style="width: 35%;">{{ $registro->etc }}</td>
                    <th style="width: 15%;">Fecha de la Visita</th>
                    <td style="width: 35%;">{{ $registro->fecha_visita }}</td>
                </tr>
                <tr>
                    <th>Municipio</th>
                    <td>{{ $registro->data_municipio ? $registro->data_municipio->nombre : $registro->municipio }}</td>
                    <th>Institución Educativa</th>
                    <td>{{ $registro->data_institucion ? $registro->data_institucion->nombre : $registro->institucion }}
                    </td>
                </tr>
                <tr>
                    <th>Sede Educativa</th>
                    <td>{{ $registro->data_sede ? $registro->data_sede->nombre : $registro->sede }}</td>
                    <th>Hora de la Visita</th>
                    <td>{{ $registro->hora_visita }}</td>
                </tr>
            </tbody>
        </table>

        <!-- CUESTIONARIO -->
        <table class="table table-bordered mt-2">
            <tbody>
                <tr class="table-info">
                    <th colspan="2">1. INFORMACIÓN GENERAL Y CONDICIONES EXTERNAS</th>
                </tr>
                <tr>
                    <td style="width: 70%;">Zona Geográfica:</td>
                    <td>{{ $registro->zona_geografica }}</td>
                </tr>
                <tr>
                    <td>Modelos de Atención que actualmente se presta:</td>
                    <td>{{ $registro->modelo_atencion }}</td>
                </tr>
                <tr>
                    <td>Tipos de Complemento Alimentario:</td>
                    <td>{{ $registro->tipo_complemento }}</td>
                </tr>
                <tr>
                    <td>Modalidades de Atención del Servicio:</td>
                    <td>{{ $registro->modalidad_atencion }}</td>
                </tr>
                <tr>
                    <td>¿Tiene área para comedor (Industrializada)?:</td>
                    <td>{{ $registro->ind_area_comedor }}</td>
                </tr>
                <tr>
                    <td>¿Tiene área para producción (Industrializada)?:</td>
                    <td>{{ $registro->ind_area_produccion }}</td>
                </tr>
                <tr>
                    <td>¿Tiene servicio de agua potable en la sede?:</td>
                    <td>{{ $registro->ind_agua_potable }}</td>
                </tr>
                <tr>
                    <td>¿Está cerca de fuentes de contaminación?:</td>
                    <td>{{ $registro->cerca_contaminacion }}</td>
                </tr>
                <tr>
                    <td>¿Está en zona de conflicto?:</td>
                    <td>{{ $registro->zona_conflicto }}</td>
                </tr>
                <tr>
                    <td>Frecuencia del conflicto:</td>
                    <td>{{ $registro->frecuencia_conflicto }}</td>
                </tr>

                <tr class="table-info">
                    <th colspan="2">2. INFRAESTRUCTURA DE LA SEDE</th>
                </tr>
                <tr>
                    <td>Área exclusiva para almacenamiento:</td>
                    <td>{{ $registro->esp_almacenamiento }}</td>
                </tr>
                <tr>
                    <td>Material techo (almacenamiento):</td>
                    <td>{{ $registro->mat_techo_alm }}</td>
                </tr>
                <tr>
                    <td>Material piso (almacenamiento):</td>
                    <td>{{ $registro->mat_piso_alm }}</td>
                </tr>
                <tr>
                    <td>Material paredes (almacenamiento):</td>
                    <td>{{ $registro->mat_paredes_alm }}</td>
                </tr>
                <tr>
                    <td>Estado general del área de almacenamiento:</td>
                    <td>{{ $registro->est_almacenamiento }}</td>
                </tr>

                <tr>
                    <td>Área exclusiva para preparación:</td>
                    <td>{{ $registro->esp_preparacion }}</td>
                </tr>
                <tr>
                    <td>Material techo (preparación):</td>
                    <td>{{ $registro->mat_techo_prep }}</td>
                </tr>
                <tr>
                    <td>Material piso (preparación):</td>
                    <td>{{ $registro->mat_piso_prep }}</td>
                </tr>
                <tr>
                    <td>Material paredes (preparación):</td>
                    <td>{{ $registro->mat_paredes_prep }}</td>
                </tr>
                <tr>
                    <td>Estado general del área de preparación:</td>
                    <td>{{ $registro->est_preparacion }}</td>
                </tr>

                <tr>
                    <td>Área exclusiva para consumo (comedor):</td>
                    <td>{{ $registro->esp_consumo }}</td>
                </tr>
                <tr>
                    <td>Estado general del área de consumo:</td>
                    <td>{{ $registro->est_consumo }}</td>
                </tr>
                <tr>
                    <td>Área para disposición de residuos:</td>
                    <td>{{ $registro->area_residuos }}</td>
                </tr>
                <tr>
                    <td>Baños para manipuladores de alimentos:</td>
                    <td>{{ $registro->banos_manipuladores }}</td>
                </tr>

                <tr class="table-info">
                    <th colspan="2">3. SERVICIOS PÚBLICOS Y SANEAMIENTO</th>
                </tr>
                <tr>
                    <td>Servicio de energía eléctrica:</td>
                    <td>{{ $registro->electricidad }}</td>
                </tr>
                <tr>
                    <td>Acceso a agua para preparación y limpieza:</td>
                    <td>{{ $registro->acceso_agua }}</td>
                </tr>
                <tr>
                    <td>Fuente principal de agua de la sede:</td>
                    <td>{{ $registro->fuente_agua }}</td>
                </tr>
                <tr>
                    <td>Sistema de alcantarillado o disposición de aguas residuales:</td>
                    <td>{{ $registro->alcantarillado }}</td>
                </tr>
                <tr>
                    <td>Tipo de combustible para preparación:</td>
                    <td>{{ $registro->combustible }}</td>
                </tr>
                <tr>
                    <td>Espacio adecuado para cilindros de gas:</td>
                    <td>{{ $registro->espacio_gas }}</td>
                </tr>
                <tr>
                    <td>Servicio regular de recolección de basura:</td>
                    <td>{{ $registro->recoleccion_basura }}</td>
                </tr>
                <tr>
                    <td>Manejo de residuos orgánicos:</td>
                    <td>{{ $registro->disp_organicos }}</td>
                </tr>
                <tr>
                    <td>Manejo de residuos no orgánicos:</td>
                    <td>{{ $registro->disp_no_organicos }}</td>
                </tr>
                <tr>
                    <td>¿Se realiza clasificación de residuos en la sede?:</td>
                    <td>{{ $registro->clasi_residuos }}</td>
                </tr>

                <tr class="table-info">
                    <th colspan="2">4. EQUIPOS E INVENTARIO (ALMACENAMIENTO Y PREPARACIÓN)</th>
                </tr>
                <tr>
                    <td>Cantidad de neveras:</td>
                    <td>{{ $registro->cant_neveras }}</td>
                </tr>
                <tr>
                    <td>¿Cuántas neveras están funcionando?:</td>
                    <td>{{ $registro->func_neveras }}</td>
                </tr>
                <tr>
                    <td>Tamaño de la mayoría de neveras:</td>
                    <td>{{ $registro->tamano_neveras }}</td>
                </tr>
                <tr>
                    <td>Cantidad de congeladores:</td>
                    <td>{{ $registro->cant_conge }}</td>
                </tr>
                <tr>
                    <td>¿Cuántos congeladores están funcionando?:</td>
                    <td>{{ $registro->func_conge }}</td>
                </tr>
                <tr>
                    <td>Tamaño de la mayoría de congeladores:</td>
                    <td>{{ $registro->tamano_conge }}</td>
                </tr>
                <tr>
                    <td>¿Se almacenan los alimentos sobre estibas?:</td>
                    <td>{{ $registro->almacena_estibas }}</td>
                </tr>
                <tr>
                    <td>Elementos de medición y control de almacenamiento:</td>
                    <td>{{ $registro->elementos_alm }}</td>
                </tr>

                <tr>
                    <td>Cantidad de básculas:</td>
                    <td>{{ $registro->cant_bas }}</td>
                </tr>
                <tr>
                    <td>Capacidad de la(s) báscula(s):</td>
                    <td>{{ $registro->cap_bas }}</td>
                </tr>
                <tr>
                    <td>Unidad de medida báscula(s):</td>
                    <td>{{ $registro->uni_bas }}</td>
                </tr>
                <tr>
                    <td>¿Termómetros en funcionamiento y calibrados?:</td>
                    <td>{{ $registro->term_fun }}</td>
                </tr>

                <tr>
                    <td>Cantidad de ollas de presión:</td>
                    <td>{{ $registro->ollas_pre }}</td>
                </tr>
                <tr>
                    <td>Capacidad promedio de las ollas de presión (Lt):</td>
                    <td>{{ $registro->cap_ollas_pre }}</td>
                </tr>
                <tr>
                    <td>¿Cuántas funcionan correctamente?:</td>
                    <td>{{ $registro->ollas_pre_fun }}</td>
                </tr>

                <tr>
                    <td>Cantidad de ralladores:</td>
                    <td>{{ $registro->cant_ral }}</td>
                </tr>
                <tr>
                    <td>Cantidad de exprimidores:</td>
                    <td>{{ $registro->cant_exp }}</td>
                </tr>
                <tr>
                    <td>Cantidad de tablas de picar:</td>
                    <td>{{ $registro->cant_tab_pic }}</td>
                </tr>

                <tr>
                    <td>Cantidad de estufas:</td>
                    <td>{{ $registro->cant_estufas }}</td>
                </tr>
                <tr>
                    <td>Total de quemadores (fogones):</td>
                    <td>{{ $registro->total_quemadores }}</td>
                </tr>
                <tr>
                    <td>¿Cuántos quemadores funcionan?:</td>
                    <td>{{ $registro->quemadores_fun }}</td>
                </tr>

                <tr>
                    <td>Cantidad de licuadoras:</td>
                    <td>{{ $registro->cant_lic }}</td>
                </tr>
                <tr>
                    <td>¿Cuántas licuadoras están funcionando?:</td>
                    <td>{{ $registro->lic_fun }}</td>
                </tr>
                <tr>
                    <td>¿Cuántas licuadoras son industriales?:</td>
                    <td>{{ $registro->lic_ind }}</td>
                </tr>

                <tr class="table-info">
                    <th colspan="2">5. DOTACIÓN GENERAL DE MENAJE</th>
                </tr>
                <tr>
                    <td>Cantidad de ollas exclusivas para el PAE:</td>
                    <td>{{ $registro->ollas_exc }}</td>
                </tr>
                <tr>
                    <td>Cantidad de ollas útiles:</td>
                    <td>{{ $registro->ollas_util }}</td>
                </tr>
                <tr>
                    <td>Cantidad de pailas útiles:</td>
                    <td>{{ $registro->pailas_util }}</td>
                </tr>
                <tr>
                    <td>Cantidad de calderos útiles:</td>
                    <td>{{ $registro->calderos_util }}</td>
                </tr>
                <tr>
                    <td>Tamaño predominante de calderos (Lt):</td>
                    <td>{{ $registro->tam_calderos }}</td>
                </tr>
                <tr>
                    <td>Cantidad de cuchillos exclusivos del PAE:</td>
                    <td>{{ $registro->cuch_exc }}</td>
                </tr>
                <tr>
                    <td>Cantidad de cuchillos útiles:</td>
                    <td>{{ $registro->cuch_util }}</td>
                </tr>
                <tr>
                    <td>Cucharas de servicio (soperas/arroz):</td>
                    <td>{{ $registro->cuchara_serv }}</td>
                </tr>

                <tr>
                    <td>Capacidad de atención simultánea (niños):</td>
                    <td>{{ $registro->cap_ninos }}</td>
                </tr>
                <tr>
                    <td>Cantidad total de platos:</td>
                    <td>{{ $registro->cant_platos }}</td>
                </tr>
                <tr>
                    <td>Cantidad de platos llanos:</td>
                    <td>{{ $registro->pla_lla }}</td>
                </tr>
                <tr>
                    <td>Cantidad de platos hondos:</td>
                    <td>{{ $registro->pla_hon }}</td>
                </tr>
                <tr>
                    <td>Cantidad de portas (bandejas/viandas):</td>
                    <td>{{ $registro->portas }}</td>
                </tr>
                <tr>
                    <td>Cantidad de vasos:</td>
                    <td>{{ $registro->vasos }}</td>
                </tr>
                <tr>
                    <td>Cantidad de cucharas:</td>
                    <td>{{ $registro->cucharas }}</td>
                </tr>
                <tr>
                    <td>Cantidad de tenedores:</td>
                    <td>{{ $registro->tenedores }}</td>
                </tr>

                <tr class="table-info">
                    <th colspan="2">6. SANEAMIENTO Y CONCLUSIÓN</th>
                </tr>
                <tr>
                    <td>Recipientes para residuos (con tapa y pedal):</td>
                    <td>{{ $registro->recip_sani }}</td>
                </tr>
                <tr>
                    <td>Baños exclusivos para manipuladoras de alimentos:</td>
                    <td>{{ $registro->banos_exc }}</td>
                </tr>
                <tr>
                    <td>Lavamanos / puntos de desinfección para manipuladoras:</td>
                    <td>{{ $registro->lav_exc }}</td>
                </tr>
                <tr>
                    <td><strong>MODELO DE ATENCIÓN PAE a implementar:</strong></td>
                    <td><strong>{{ $registro->modelo_implementar }}</strong></td>
                </tr>
            </tbody>
        </table>

        <!-- TABLA DE FIRMAS -->
        <table class="table table-bordered mt-3" style="page-break-inside: avoid;">
            <tbody>
                <tr class="table-info">
                    <th style="width: 50%;">FIRMA EQUIPO PAE / APOYO A LA SUPERVISIÓN</th>
                    <th style="width: 50%;">FIRMA QUIEN ATIENDE LA VISITA</th>
                </tr>
                <tr>
                    <td style="text-align: center;"><img src="{{ $registro->firma1 }}"
                            style="width: 150px; padding: 5px" /></td>
                    <td style="text-align: center;"><img src="{{ $registro->firma2 }}"
                            style="width: 150px; padding: 5px" /></td>
                </tr>
                <tr>
                    <td>NOMBRE: <strong>{{ $registro->nombre_apoyo }}</strong></td>
                    <td>NOMBRE: <strong>{{ $registro->nombre_atiende }}</strong></td>
                </tr>
                <tr>
                    <td>CÉDULA: <strong>{{ $registro->cedula_apoyo }}</strong></td>
                    <td>CÉDULA: <strong>{{ $registro->cedula_atiende }}</strong></td>
                </tr>
                <tr>
                    <td>CARGO: <strong>{{ $registro->cargo_apoyo }}</strong></td>
                    <td>CARGO: <strong>{{ $registro->cargo_atiende }}</strong></td>
                </tr>
                <tr>
                    <td>TELÉFONO: <strong>{{ $registro->telefono_apoyo }}</strong></td>
                    <td>TELÉFONO: <strong>{{ $registro->telefono_atiende }}</strong></td>
                </tr>
            </tbody>
        </table>

        <!-- REGISTRO FOTOGRÁFICO -->
        @if ($imagenes != null && $imagenes->isNotEmpty())
            <table class="table table-bordered mt-3" style="page-break-inside: avoid;">
                <tr class="table-info">
                    <th colspan="2" class="text-center">REGISTRO FOTOGRÁFICO</th>
                </tr>
                @foreach ($imagenes->chunk(2) as $fila)
                    <tr>
                        @foreach ($fila as $img)
                            <td style="text-align: center; width: 50%; padding: 10px; vertical-align: middle;">
                                <img src="{{ $img }}" style="width: 300px; padding: 5px; border: 1px solid #ddd;" />
                            </td>
                        @endforeach
                        @if ($fila->count() == 1)
                            <td style="width: 50%;"></td>
                        @endif
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</body>

</html>