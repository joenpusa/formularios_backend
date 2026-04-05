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
                    <td><strong>VIGENTE DESDE:</strong> ENERO 2026</td>
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
                    <td>Modalidades de Atención del Servicio que actualmente se presta:</td>
                    <td>{{ $registro->modalidad_atencion }}</td>
                </tr>
                <tr>
                    <td>Si la I.E. o sede es modalidad industrializada, ¿tiene algún área que se pueda utilizar como
                        comedor?:</td>
                    <td>{{ $registro->ind_area_comedor }}</td>
                </tr>
                <tr>
                    <td>Si la I.E. o sede es modalidad es industrializada, ¿tiene área que se pueda utilizar para
                        producción (cocina), con dotación de mesones y lavaplatos?:</td>
                    <td>{{ $registro->ind_area_produccion }}</td>
                </tr>
                <tr>
                    <td>Si la I.E. o sede es modalidad es industrializada, ¿tiene acceso a agua potable?:</td>
                    <td>{{ $registro->ind_agua_potable }}</td>
                </tr>
                <tr>
                    <td>¿La sede está cerca de potenciales fuentes de contaminación (basureros, mataderos, pantanos,
                        etc.)?:</td>
                    <td>{{ $registro->cerca_contaminacion }}</td>
                </tr>
                <tr>
                    <td>¿La sede educativa está ubicada en zona de conflicto armado e inestabilidad social?:</td>
                    <td>{{ $registro->zona_conflicto }}</td>
                </tr>
                <tr>
                    <td>¿Con qué frecuencia las dinámicas de conflicto armado e inestabilidad social afectan la
                        Operación o entrega del PAE?:</td>
                    <td>{{ $registro->frecuencia_conflicto }}</td>
                </tr>

                <tr class="table-info">
                    <th colspan="2">2. INFRAESTRUCTURA DE LA SEDE</th>
                </tr>
                <tr>
                    <td>¿La sede tiene un espacio dedicado al almacenamiento de alimentos?:</td>
                    <td>{{ $registro->esp_almacenamiento }}</td>
                </tr>
                <tr>
                    <td>El material predominante del techo en ese lugar es (almacenamiento):</td>
                    <td>{{ $registro->mat_techo_alm }}</td>
                </tr>
                <tr>
                    <td>El material predominante del piso en ese lugar es (almacenamiento):</td>
                    <td>{{ $registro->mat_piso_alm }}</td>
                </tr>
                <tr>
                    <td>El material predominante de las paredes en ese lugar es (almacenamiento):</td>
                    <td>{{ $registro->mat_paredes_alm }}</td>
                </tr>
                <tr>
                    <td>¿En qué estado se encuentra el espacio dedicado al almacenamiento?:</td>
                    <td>{{ $registro->est_almacenamiento }}</td>
                </tr>

                <tr>
                    <td>¿La sede tiene un espacio dedicado a la preparación de alimentos (cocina)?:</td>
                    <td>{{ $registro->esp_preparacion }}</td>
                </tr>
                <tr>
                    <td>El material predominante del techo en ese lugar es (preparación):</td>
                    <td>{{ $registro->mat_techo_prep }}</td>
                </tr>
                <tr>
                    <td>El material predominante del piso en ese lugar es (preparación):</td>
                    <td>{{ $registro->mat_piso_prep }}</td>
                </tr>
                <tr>
                    <td>El material predominante de las paredes en ese lugar es (preparación):</td>
                    <td>{{ $registro->mat_paredes_prep }}</td>
                </tr>
                <tr>
                    <td>¿En qué estado se encuentra el espacio dedicado a la preparación?:</td>
                    <td>{{ $registro->est_preparacion }}</td>
                </tr>

                <tr>
                    <td>¿Cómo es el espacio que se utiliza para el consumo de alimentos?:</td>
                    <td>{{ $registro->esp_consumo }}</td>
                </tr>
                <tr>
                    <td>¿En qué estado se encuentra el espacio dedicado al consumo?:</td>
                    <td>{{ $registro->est_consumo }}</td>
                </tr>
                <tr>
                    <td>¿La sede tiene un espacio o área demarcada para la disposición de residuos?:</td>
                    <td>{{ $registro->area_residuos }}</td>
                </tr>
                <tr>
                    <td>¿La sede tiene baños de uso exclusivo para el personal manipulador de alimentos?:</td>
                    <td>{{ $registro->banos_manipuladores }}</td>
                </tr>

                <tr class="table-info">
                    <th colspan="2">3. SERVICIOS PÚBLICOS Y SANEAMIENTO</th>
                </tr>
                <tr>
                    <td>¿La sede cuenta con el servicio de electricidad?:</td>
                    <td>{{ $registro->electricidad }}</td>
                </tr>
                <tr>
                    <td>¿La sede cuenta con acceso a agua?:</td>
                    <td>{{ $registro->acceso_agua }}</td>
                </tr>
                <tr>
                    <td>¿De dónde obtiene principalmente el agua para el PAE?:</td>
                    <td>{{ $registro->fuente_agua }}</td>
                </tr>
                <tr>
                    <td>¿La sede cuenta con el servicio de alcantarillado?:</td>
                    <td>{{ $registro->alcantarillado }}</td>
                </tr>
                <tr>
                    <td>¿Cuál de los siguientes combustibles se utilizan en la sede educativa para la preparación de
                        los alimentos?:</td>
                    <td>{{ $registro->combustible }}</td>
                </tr>
                <tr>
                    <td>¿Cuenta con un espacio adecuado para almacenar la pipeta de gas?:</td>
                    <td>{{ $registro->espacio_gas }}</td>
                </tr>
                <tr>
                    <td>¿La sede cuenta con el servicio de recolección de basuras (aseo)?:</td>
                    <td>{{ $registro->recoleccion_basura }}</td>
                </tr>
                <tr>
                    <td>¿De qué forma se hace la disposición de residuos orgánicos (provenientes de los restos
                        de alimentos) del PAE en esta sede educativa?:</td>
                    <td>{{ $registro->disp_organicos }}</td>
                </tr>
                <tr>
                    <td>¿De qué forma se hace la disposición de residuos no orgánicos (envases de plástico, metal,
                        vidrio, papel, cartón, etc.) del PAE en esta sede educativa?:</td>
                    <td>{{ $registro->disp_no_organicos }}</td>
                </tr>
                <tr>
                    <td>¿Realizan algún tipo de clasificación de residuos sólidos?:</td>
                    <td>{{ $registro->clasi_residuos }}</td>
                </tr>

                <tr class="table-info">
                    <th colspan="2">4. EQUIPOS E INVENTARIO (ALMACENAMIENTO Y PREPARACIÓN)</th>
                </tr>
                <tr>
                    <td>¿Cuántas neveras tiene?:</td>
                    <td>{{ $registro->cant_neveras }}</td>
                </tr>
                <tr>
                    <td>¿Cuántas de esas funcionan?:</td>
                    <td>{{ $registro->func_neveras }}</td>
                </tr>
                <tr>
                    <td>¿Cuál de los siguientes tamaños corresponde a la mayoría de las neveras que funcionan?:</td>
                    <td>{{ $registro->tamano_neveras }}</td>
                </tr>
                <tr>
                    <td>¿Cuántos congeladores tiene?:</td>
                    <td>{{ $registro->cant_conge }}</td>
                </tr>
                <tr>
                    <td>¿Cuántos de estos funcionan?:</td>
                    <td>{{ $registro->func_conge }}</td>
                </tr>
                <tr>
                    <td>¿Cuál de los siguientes tamaños corresponde a la mayoría de los congeladores que funcionan?:
                    </td>
                    <td>{{ $registro->tamano_conge }}</td>
                </tr>
                <tr>
                    <td>¿Almacena los alimentos en tarimas o estibas de tal forma que se encuentren elevados del
                        suelo?:</td>
                    <td>{{ $registro->almacena_estibas }}</td>
                </tr>
                <tr>
                    <td>¿Qué elementos utiliza para el almacenamiento de los alimentos?:</td>
                    <td>{{ $registro->elementos_alm }}</td>
                </tr>

                <tr>
                    <td>¿Cuántas básculas o pesos tiene (funcionales)?:</td>
                    <td>{{ $registro->cant_bas }}</td>
                </tr>
                <tr>
                    <td>¿Cuánta es la capacidad de la báscula o el peso?:</td>
                    <td>{{ $registro->cap_bas }}</td>
                </tr>
                <tr>
                    <td>Unidad de medida del peso o de la báscula:</td>
                    <td>{{ $registro->uni_bas }}</td>
                </tr>
                <tr>
                    <td>¿La sede cuenta con termómetro funcionando exclusivo para el PAE?:</td>
                    <td>{{ $registro->term_fun }}</td>
                </tr>

                <tr>
                    <td>¿La sede cuenta con ollas a presión exclusivas para el uso del PAE?:</td>
                    <td>{{ $registro->ollas_pre }}</td>
                </tr>
                <tr>
                    <td>¿Las ollas a presión son de 4 Lt o 6 Lt?:</td>
                    <td>{{ $registro->cap_ollas_pre }}</td>
                </tr>
                <tr>
                    <td>¿Cuántas de estas ollas a presión funcionan?:</td>
                    <td>{{ $registro->ollas_pre_fun }}</td>
                </tr>

                <tr>
                    <td>Cantidad de Ralladores en buen estado:</td>
                    <td>{{ $registro->cant_ral }}</td>
                </tr>
                <tr>
                    <td>Cantidad de exprimidores en buen estado:</td>
                    <td>{{ $registro->cant_exp }}</td>
                </tr>
                <tr>
                    <td>Cantidad de Tablas de Picar en buen estado (No de madera):</td>
                    <td>{{ $registro->cant_tab_pic }}</td>
                </tr>

                <tr>
                    <td>¿Cuántas estufas tiene?:</td>
                    <td>{{ $registro->cant_estufas }}</td>
                </tr>
                <tr>
                    <td>¿Cuántos quemadores o fogones tienen en total sus estufas?:</td>
                    <td>{{ $registro->total_quemadores }}</td>
                </tr>
                <tr>
                    <td>¿Cuántos de estos quemadores funcionan correctamente?:</td>
                    <td>{{ $registro->quemadores_fun }}</td>
                </tr>

                <tr>
                    <td>¿Cuántas licuadoras tiene?:</td>
                    <td>{{ $registro->cant_lic }}</td>
                </tr>
                <tr>
                    <td>¿Cuántas de estas licuadoras funcionan?:</td>
                    <td>{{ $registro->lic_fun }}</td>
                </tr>
                <tr>
                    <td>¿Cuántas de las licuadoras que funcionan son industriales?:</td>
                    <td>{{ $registro->lic_ind }}</td>
                </tr>

                <tr class="table-info">
                    <th colspan="2">5. DOTACIÓN GENERAL DE MENAJE</th>
                </tr>
                <tr>
                    <td>¿La sede cuenta con ollas, olletas o pailas exclusivas para el PAE?:</td>
                    <td>{{ $registro->ollas_exc }}</td>
                </tr>
                <tr>
                    <td>¿Cuántas ollas u olletas presentan buena vida útil?:</td>
                    <td>{{ $registro->ollas_util }}</td>
                </tr>
                <tr>
                    <td>¿Cuántas pailas presentan buena vida útil?:</td>
                    <td>{{ $registro->pailas_util }}</td>
                </tr>
                <tr>
                    <td>¿Cuántos calderos presentan buena vida útil?:</td>
                    <td>{{ $registro->calderos_util }}</td>
                </tr>
                <tr>
                    <td>¿Qué tamaño son los calderos arroceros?:</td>
                    <td>{{ $registro->tam_calderos }}</td>
                </tr>
                <tr>
                    <td>¿La sede cuenta con cuchillos exclusivos para el uso del PAE?:</td>
                    <td>{{ $registro->cuch_exc }}</td>
                </tr>
                <tr>
                    <td>¿Cuántos cuchillos presentan buena vida útil?:</td>
                    <td>{{ $registro->cuch_util }}</td>
                </tr>
                <tr>
                    <td>¿La sede cuenta con cucharones y cucharas de servir exclusivas para el uso del PAE?:</td>
                    <td>{{ $registro->cuchara_serv }}</td>
                </tr>

                <tr>
                    <td>De los niños que reciben PAE ¿Cuántos niños caben sentados al tiempo?:</td>
                    <td>{{ $registro->cap_ninos }}</td>
                </tr>
                <tr>
                    <td>¿De cuántos platos dispone para el consumo de alimentos?:</td>
                    <td>{{ $registro->cant_platos }}</td>
                </tr>
                <tr>
                    <td>¿Cuántos de estos platos son llanos y se encuentran en buen estado?:</td>
                    <td>{{ $registro->pla_lla }}</td>
                </tr>
                <tr>
                    <td>¿Cuántos de estos platos son hondos y se encuentran en buen estado?:</td>
                    <td>{{ $registro->pla_hon }}</td>
                </tr>
                <tr>
                    <td>¿Con cuántos portas en buen estado cuentan para el consumo de alimentos?:</td>
                    <td>{{ $registro->portas }}</td>
                </tr>
                <tr>
                    <td>¿De cuántos pocillos o vasos dispone para el consumo de alimentos en buen estado?:</td>
                    <td>{{ $registro->vasos }}</td>
                </tr>
                <tr>
                    <td>¿De cuántas cucharas dispone para el consumo de alimentos?:</td>
                    <td>{{ $registro->cucharas }}</td>
                </tr>
                <tr>
                    <td>¿De cuántos tenedores dispone para el consumo de alimentos?:</td>
                    <td>{{ $registro->tenedores }}</td>
                </tr>

                <tr class="table-info">
                    <th colspan="2">6. SANEAMIENTO Y CONCLUSIÓN</th>
                </tr>
                <tr>
                    <td>¿Cuántos recipientes de material sanitario (canecas) con tapa y bolsa plástica tiene la
                        sede?:</td>
                    <td>{{ $registro->recip_sani }}</td>
                </tr>
                <tr>
                    <td>¿Tiene batería sanitaria (tazas o inodoros) exclusivos para personal manipulador de
                        alimentos?:</td>
                    <td>{{ $registro->banos_exc }}</td>
                </tr>
                <tr>
                    <td>¿Tiene lavamanos exclusivos para personal manipulador de alimentos?:</td>
                    <td>{{ $registro->lav_exc }}</td>
                </tr>
                <tr>
                    <td><strong>MODELO DE ATENCIÓN PAE a implementar:</strong>De acuerdo al analisis del estado de las
                        condiciones de infraestruuta, servicios publicos, dotacion y accesibilidad identificada en el
                        presente diagnostico. Se detemina que el MODELO DE ATENCION PAE a implementar en esta SEDE
                        EDUCATIVA es:</td>
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