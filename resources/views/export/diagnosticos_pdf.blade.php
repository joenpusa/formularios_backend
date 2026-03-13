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

        h3,
        h4 {
            font-size: 12px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <!-- TABLA DE LOGO Y NOMBRE DEL PROGRAMA -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td rowspan="3"><img src="{{ public_path('images/logo2.png') }}"
                            style="width: 150px; padding: 5px" /></td>
                    <td class="header-section">PROGRAMA DE ALIMENTACIÓN ESCOLAR NORTE DE SANTANDER</td>
                    <td><strong>VERSIÓN:</strong> 01</td>
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

        <h4>CONDICIONES GENERALES DE LA OPERACIÓN</h4>
        <!-- TABLA DE DATOS BASICOS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>ETC</th>
                    <td>{{ $registro->etc }}</td>
                    <th>Sede ID</th>
                    <td>{{ $registro->sede_id }}</td>
                    <th>ZONA GEOGRÁFICA DE LA SEDE</th>
                    <td>{{ $registro->zona_geografica }}</td>
                </tr>
                <tr>
                    <th>Municipio</th>
                    <td>{{ $registro->data_municipio ? $registro->data_municipio->nombre : $registro->municipio }}</td>
                    <th>Institución Educativa</th>
                    <td>{{ $registro->data_institucion ? $registro->data_institucion->nombre : $registro->institucion }}
                    </td>
                    <th>Sede Educativa</th>
                    <td>{{ $registro->data_sede ? $registro->data_sede->nombre : $registro->sede }}</td>
                </tr>
                <tr>
                    <th>Fecha de la Visita</th>
                    <td>{{ $registro->fecha_visita }}</td>
                    <th>Hora de la Visita</th>
                    <td colspan="3">{{ $registro->hora_visita }}</td>
                </tr>
                <tr>
                    <th>Modalidad de Atención</th>
                    <td colspan="2">{{ $registro->modalidad_atencion }}</td>
                    <th>Tipo de Servicio Solicitado</th>
                    <td colspan="2">{{ $registro->tipo_servicio }}</td>
                </tr>
            </tbody>
        </table>

        <h4>CUESTIONARIO DIAGNÓSTICO</h4>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2" style="background-color: #e9ecef;">Subcategoría: Ubicación y Acceso</th>
                </tr>
                <tr>
                    <td style="width: 70%;">1. Las vías de acceso a la sede permiten el transporte de alimentos</td>
                    <td>{{ $registro->vias_acceso }}</td>
                </tr>
                <tr>
                    <td>Indique el tipo de transporte que llega con alimentos a la sede</td>
                    <td>{{ $registro->transporte_alimentos }}</td>
                </tr>
                <tr>
                    <td>2. ¿La sede educativa se encuentra en zona de conflicto?</td>
                    <td>{{ $registro->zona_conflicto }}</td>
                </tr>
                <tr>
                    <td>En caso de ser afirmativa su respuesta indique la frecuencia</td>
                    <td>{{ $registro->frecuencia_conflicto }}</td>
                </tr>

                <tr>
                    <th colspan="2" style="background-color: #e9ecef;">Subcategoría: Condiciones de Infraestructura</th>
                </tr>
                <tr>
                    <td>3. ¿La sede educativa cuenta con área y/o espacio EXCLUSIVO para el almacenamiento de los
                        alimentos?</td>
                    <td>{{ $registro->area_almacenamiento }}</td>
                </tr>
                <tr>
                    <td>4. ¿La sede educativa cuenta con área y/o espacio para la preparación de alimentos (Área sucia,
                        área limpia)?</td>
                    <td>{{ $registro->area_preparacion }}</td>
                </tr>
                <tr>
                    <td>5. ¿La sede educativa cuenta con área y/o espacio EXCLUSIVO para el consumo de los alimentos?
                        (comedor)</td>
                    <td>{{ $registro->area_consumo }}</td>
                </tr>
                <tr>
                    <td>6. ¿Las unidades sanitarias y/o punto de desinfección con las que cuenta el establecimiento se
                        encuentran en buenas condiciones para el correcto lavado de manos antes y después del consumo de
                        alimentos para todos los titulares de derecho?</td>
                    <td>{{ $registro->unidades_sanitarias }}</td>
                </tr>
                <tr>
                    <td>7. ¿La sede cuenta con un cuarto y/o espacio para el almacenamiento de residuos de tal manera
                        que no genere riesgo de contaminación cruzada en el área de preparación?</td>
                    <td>{{ $registro->cuarto_residuos }}</td>
                </tr>

                <tr>
                    <th colspan="2" style="background-color: #e9ecef;">Subcategoría: Acceso y Calidad de Servicios
                        Públicos</th>
                </tr>
                <tr>
                    <td>8. ¿El servicio de energía eléctrica que llega a la sede es constante?</td>
                    <td>{{ $registro->energia_electrica }}</td>
                </tr>
                <tr>
                    <td>9. ¿La sede educativa cuenta con acueducto y servicio de agua constante para la preparación de
                        los alimentos?</td>
                    <td>{{ $registro->acueducto_agua }}</td>
                </tr>
                <tr>
                    <td>10. ¿Qué tipo de gas se utiliza de manera regular para la preparación de los alimentos?</td>
                    <td>{{ $registro->tipo_gas }}</td>
                </tr>
                <tr>
                    <td>11. ¿La sede educativa cuenta con servicio de recolección de basura o residuos sólidos al menos
                        una vez por semana?</td>
                    <td>{{ $registro->recoleccion_basura }}</td>
                </tr>
            </tbody>
        </table>

        @if(in_array($registro->modalidad_atencion, ['Industrializada', 'Preparada en sitio e Industrializada', 'Caliente Transportada e Industrializada']))
            <h4>Subcategoría: Dotación de Equipos y Menaje (Industrializada)</h4>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td style="width: 70%;">12. ¿Los equipos para el almacenamiento de alimentos (Estantes- Neveras -
                            Congeladores) de la sede educativa se encuentran en óptimas condiciones para su funcionamiento?
                        </td>
                        <td>{{ $registro->equipos_almacenamiento }}</td>
                    </tr>
                    <tr>
                        <td>13. ¿Los equipos para la preparación de alimentos de la sede educativa se encuentran en óptimas
                            condiciones para su funcionamiento?</td>
                        <td>{{ $registro->equipos_preparacion }}</td>
                    </tr>
                    <tr>
                        <td>14. ¿El menaje de dotación propia o de operación en la sede tiene la capacidad requerida para
                            brindar la atención a los titulares de derecho asignados?</td>
                        <td>{{ $registro->menaje_dotacion }}</td>
                    </tr>
                </tbody>
            </table>
        @endif

        <h4>Dotación (General)</h4>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width: 70%;">Cantidad de Recipientes para el Manejo de Residuos Sólidos con Tapa y Pedal
                    </td>
                    <td>{{ $registro->recip_sani }}</td>
                </tr>
                <tr>
                    <td>15. Baños exclusivos para manipuladoras de alimentos</td>
                    <td>{{ $registro->banos_exc }}</td>
                </tr>
                <tr>
                    <td>16. Lavamanos y/o puntos de desinfección exclusivos para manipuladoras de alimentos</td>
                    <td>{{ $registro->lav_exc }}</td>
                </tr>
            </tbody>
        </table>

        <h4>CONCLUSIÓN DEL DIAGNÓSTICO</h4>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>MODELO DE ATENCIÓN PAE a implementar</th>
                </tr>
                <tr>
                    <td>{{ $registro->modelo_implementar }}</td>
                </tr>
            </tbody>
        </table>

        <!-- TABLA DE FIRMAS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="header-section" style="width: 50%;">FIRMA EQUIPO PAE / APOYO A LA SUPERVISIÓN</td>
                    <td class="header-section" style="width: 50%;">FIRMA QUIEN ATIENDE LA VISITA</td>
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

        @if ($imagenes->isNotEmpty())
            <h3>Archivos Adjuntos</h3>
            <table style="width: 100%; border-collapse: collapse;">
                @foreach ($imagenes->chunk(2) as $fila)
                    <tr>
                        @foreach ($fila as $imagen)
                            <td style="text-align: center; padding: 5px; width: 50%;">
                                <img src="{{ $imagen }}" style="max-width: 350px; max-height: 350px; object-fit: contain;" />
                            </td>
                        @endforeach
                        @if ($fila->count() == 1)
                            <td style="width: 50%;"></td> {{-- Celda vacía si hay un número impar de imágenes --}}
                        @endif
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</body>

</html>