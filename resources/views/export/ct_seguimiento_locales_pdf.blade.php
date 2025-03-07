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

        .col-num {
            width: 5%;
            text-align: center;
        }

        .col-num2 {
            width: 10%;
            text-align: center;
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
                    <th>PROGRAMA DE ALIMENTACIÓN ESCOLAR NORTE DE SANTANDER</th>
                    <td><strong>VERSIÓN:</strong> 01</td>
                </tr>
                <tr>
                    <td rowspan="2">FORMATO DE REPORTE DIARIO DE VISITAS DE SEGUIMIENTO LOCAL AL PROGRAMA DE
                        ALIMENTACION ESCOLAR </td>
                    <td><strong>CÓDIGO:</strong> F-ECI-19</td>
                </tr>
                <tr>
                    <td><strong>VIGENTE DESDE:</strong> ENERO 2025</td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE DATOS BASICOS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>ETC</td>
                    <td>{{ $registro->etc }}</td>
                    <td>Fecha de la visita</td>
                    <td>{{ $registro->fecha_visita }}</td>
                    <td>Municipio</td>
                    <td>{{ $registro->data_municipio->nombre }}</td>
                    <td rowspan="2">Hora de la visita</td>
                    <td>Inicial</td>
                    <td>{{ $registro->hora_inicio }}</td>
                </tr>
                <tr>
                    <td>Institución Educativa</td>
                    <td colspan="2">{{ $registro->data_institucion->nombre }}</td>
                    <td>Sede Educativa</td>
                    <td colspan="2">{{ $registro->data_sede->nombre }}</td>
                    <td>Final</td>
                    <td>{{ $registro->hora_fin }}</td>
                </tr>
                <tr>
                    <td>Operador</td>
                    <td colspan="2">{{ $registro->operador }}</td>
                    <td>No Contrato</td>
                    <td colspan="2">{{ $registro->contrato }}</td>
                    <td colspan="3" rowspan="2">Supervisor: {{ $registro->supervisor }}</td>
                </tr>
                <tr>
                    <td colspan="3">Modalidad</td>
                    <td>
                        @if ($registro->chk_cct)
                            CCT
                        @endif
                    </td>
                    <td>
                        @if ($registro->chk_i)
                            I
                        @endif
                    </td>
                    <td>
                        @if ($registro->chk_ps)
                            PS
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Tabla de aspectos a evaluar -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th class="col-num">N°</th>
                    <th>ASPECTOS TÉCNICOS A EVALUAR</th>
                    <th class="col-num2">SÍ</th>
                    <th class="col-num2">NO</th>
                    <th class="col-num2">NO APLICA</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
                        <label>El personal manipulador usa la indumentaria mínima
                            requerida para manipular los alimentos.</label>
                    </td>
                    <td>
                        @if ($registro->pre_1 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_1 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_1 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <label>El personal manipulador se lava las manos después de cada
                            cambio de actividad durante la operación del
                            programa.</label>
                    </td>
                    <td>
                        @if ($registro->pre_2 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_2 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_2 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <label>La presentación del personal manipulador es adecuada (no se
                            observa esmalte en las uñas, no usa joyas u otros
                            accesorios).</label>
                    </td>
                    <td>
                        @if ($registro->pre_3 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_3 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_3 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <label>El personal manipulador mantiene el cabello recogido y
                            cubierto totalmente mediante un gorro.</label>
                    </td>
                    <td>
                        @if ($registro->pre_4 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_4 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_4 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        <label>El personal manipulador mantiene estricta limpieza e
                            higiene en todas las actividades de operación del
                            programa.</label>
                    </td>
                    <td>
                        @if ($registro->pre_5 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_5 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_5 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>
                        <label>El personal manipulador utiliza el tapabocas cubriendo
                            totalmente la nariz, boca y menton durante todos los
                            procesos de manipulación de alimentos.</label>
                    </td>
                    <td>
                        @if ($registro->pre_6 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_6 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_6 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>
                        <label>Los alimentos almacenados cumplen con los requisitos de
                            rotulado según la Resolución 5109/2005.</label>
                    </td>
                    <td>
                        @if ($registro->pre_7 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_7 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_7 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>
                        <label>Los alimentos se almacenan correctamente y se mantienen las
                            características del alimento (congelación, refrigeración,
                            ambiente).</label>
                    </td>
                    <td>
                        @if ($registro->pre_8 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_8 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_8 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>
                        <label>Se evidencia que los alimentos almacenados y/o distribuidos
                            a los beneficiarios presentan condiciones de calidad aptas
                            para el consumo.</label>
                    </td>
                    <td>
                        @if ($registro->pre_9 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_9 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_9 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>
                        <label>Los alimentos se entregan completamente a los beneficiarios
                            sin que se genere desperdicio por alimentos
                            sobrantes.</label>
                    </td>
                    <td>
                        @if ($registro->pre_10 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_10 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_10 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>
                        <label>Los alimentos son consumidos únicamente por los estudiantes
                            beneficiarios del programa.</label>
                    </td>
                    <td>
                        @if ($registro->pre_11 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_11 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_11 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>
                        <label>La distribución de los alimentos se realiza de manera
                            ordenada y se cuenta con el apoyo por parte de la
                            institución educativa.</label>
                    </td>
                    <td>
                        @if ($registro->pre_12 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_12 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_12 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>
                        <label>Se tiene conocimiento de los canales de atención al
                            ciudadano que dispone la Entidad Territorial Certificada
                            para la recepción de Sugerencias, Peticiones, Quejas o
                            Reclamos.</label>
                    </td>
                    <td>
                        @if ($registro->pre_13 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_13 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_13 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>
                        <label>Se evidencia que los equipos suministrados por la ETC se
                            les está dando uso exclusivo para la ejecución y operación
                            del Programa de Alimentación Escolar PAE.</label>
                    </td>
                    <td>
                        @if ($registro->pre_14 == 'Si')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_14 == 'No')
                            X
                        @endif
                    </td>
                    <td>
                        @if ($registro->pre_14 == 'No aplica')
                            X
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE FIRMAS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2">Observaciones generales:</th>
                </tr>
                <tr>
                    <td colspan="2">{{ $registro->observaciones }}</td>
                </tr>
                <tr>
                    <th>FIRMA EQUIPO PAE /APOYO A LA SUPERVISIÓN</th>
                    <th>FIRMA QUIEN ATIENDE LA VISITA</th>
                </tr>
                <tr>
                    <td><img src="{{ $registro->firma1 }}" style="width: 150px; padding: 5px" /></td>
                    <td><img src="{{ $registro->firma2 }}" style="width: 150px; padding: 5px" /></td>
                </tr>
                <tr>
                    <td>NOMBRE: <strong>{{ $registro->nombre_apoyo }}</strong></td>
                    <td>NOMBRE: <strong>{{ $registro->nombre_atiende }}</strong></td>
                </tr>
                <tr>
                    <td>CEDULA: <strong>{{ $registro->cedula_apoyo }}</strong></td>
                    <td>CEDULA: <strong>{{ $registro->cedula_atiende }}</strong></td>
                </tr>
                <tr>
                    <td>CARGO: <strong>{{ $registro->cargo_apoyo }}</strong></td>
                    <td>CARGO: <strong>{{ $registro->cargo_atiende }}</strong></td>
                </tr>
                <tr>
                    <td>TELEFONO: <strong>{{ $registro->telefono_apoyo }}</strong></td>
                    <td>TELEFONO: <strong>{{ $registro->telefono_atiende }}</strong></td>
            </tbody>
        </table>
        @if ($imagenes->isNotEmpty())
            <h3>Archivos Adjuntos</h3>
            <table style="width: 100%; border-collapse: collapse;">
                @foreach ($imagenes->chunk(2) as $fila)
                    <tr>
                        @foreach ($fila as $imagen)
                            <td style="text-align: center; padding: 5px; width: 50%;">
                                <img src="{{ $imagen }}"
                                    style="max-width: 350px; max-height: 350px; object-fit: contain;" />
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
