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

        .col-obs {
            width: 45%;
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
                    <td>PROGRAMA DE ALIMENTACIÓN ESCOLAR NORTE DE SANTANDER</td>
                    <td><strong>VERSIÓN:</strong> 01</td>
                </tr>
                <tr>
                    <td rowspan="2">TOMA DE MUESTRA PRODUCTO
                        @if ($registro->tipo == 'pollo')
                            POLLO
                        @elseif ($registro->tipo == 'cerdo')
                            CERNE DE CERDO
                        @elseif ($registro->tipo == 'res')
                            CARNE DE RES
                        @endif
                    </td>
                    <td><strong>CÓDIGO:</strong>
                        @if ($registro->tipo == 'pollo')
                            F-ECI-12
                        @elseif ($registro->tipo == 'cerdo')
                            F-ECI-14
                        @elseif ($registro->tipo == 'res')
                            F-ECI-13
                        @endif
                    </td>
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
                    <td>Operador</td>
                    <td>{{ $registro->operador }}</td>
                    <td>No Contrato</td>
                    <td>{{ $registro->contrato }}</td>
                </tr>
                <tr>
                    <td>Municipio</td>
                    <td>{{ $registro->data_municipio->nombre }}</td>
                    <td>Dirección</td>
                    <td>{{ $registro->direccion }}</td>
                    <td>Fecha de la visita</td>
                    <td>{{ $registro->fecha_visita }}</td>
                </tr>
                <tr>
                    <td>Producto</td>
                    <td>{{ $registro->direccion }}</td>
                    <td>Final</td>
                    <td>{{ $registro->hora_final }}</td>
                    <td>Esblecimiento educativo</td>
                    <td>{{ $registro->data_institucion->nombre }}</td>
                </tr>
            </tbody>
        </table>
        <!-- tabla propiedades organoelipticas -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="6">PROPIEDADES ORGANOLEPTICAS DEL PRODUCTO</th>
                </tr>
                <tr>
                    <td>OLOR</td>
                    <td>Caracteristicas propias de la Especie</td>
                    <td>
                        @if ($registro->olor == 'caracteristico')
                            X
                        @endif
                    <td>
                        @if ($registro->tipo == 'pollo')
                            fuerte, hedor agrio o similar al azufre
                        @elseif ($registro->tipo == 'cerdo')
                            No Caracteristico, fuerte, fetido, amoniaco
                        @elseif ($registro->tipo == 'res')
                            No Caracteristico, fuerte, fetido, amoniaco
                        @endif
                    </td>
                    <td>
                        @if ($registro->olor == 'no-caracteristico')
                            X
                        @endif
                    </td>
                    <td class="col-obs">Observaciones: {{ $registro->obs_olor }}</td>
                </tr>
                <tr>
                    <td>COLOR</td>
                    <td>
                        @if ($registro->tipo == 'pollo')
                            Rosado blanquesino, tonalidad amarillenta
                        @elseif ($registro->tipo == 'cerdo')
                            Porcion de carne rosado blanquesino
                        @elseif ($registro->tipo == 'res')
                            Caracteristico rojo cerezo brillante
                        @endif
                    </td>
                    <td>
                        @if ($registro->color == 'caracteristico')
                            X
                        @endif
                    <td>
                        @if ($registro->tipo == 'pollo')
                            tonalidades gris verdoso
                        @elseif ($registro->tipo == 'cerdo')
                            tonalidades gris verdoso o azulado
                        @elseif ($registro->tipo == 'res')
                            tonalidades oscuras, verdosas, azuladas
                        @endif
                    </td>
                    <td>
                        @if ($registro->color == 'no-caracteristico')
                            X
                        @endif
                    </td>
                    <td>Observaciones: {{ $registro->obs_color }}</td>
                </tr>
                <tr>
                    <td>TEXTURA</td>
                    <td>
                        @if ($registro->tipo == 'pollo')
                            Firme al tacto, piel adherida al musculo
                        @elseif ($registro->tipo == 'cerdo')
                            Firme al tacto, ligeramente humeda
                        @elseif ($registro->tipo == 'res')
                            Firme al tacto
                        @endif
                    <td>
                        @if ($registro->textura == 'caracteristico')
                            X
                        @endif
                    <td>
                        Textura pegajosa, viscosa o babosa
                    </td>
                    <td>
                        @if ($registro->textura == 'no-caracteristico')
                            X
                        @endif
                    </td>
                    <td>Observaciones: {{ $registro->obs_textura }}</td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE almacenamiento -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="14">ALMACENAMIENTO - TEMPERATURAS DE CONSERVACIÓN DEL PRODUCTO</th>
                </tr>
                <tr>
                    <td>Cuarto Frio</td>
                    <td>{{ $registro->cuarto }}</td>
                    <td>Tanque</td>
                    <td>{{ $registro->tanque }}</td>
                    <td>Nevera</td>
                    <td>{{ $registro->nevera }}</td>
                    <td>Caba</td>
                    <td>{{ $registro->caba }}</td>
                    <td>Temperatura de refrigeración</td>
                    <td>{{ $registro->temp_ref }}</td>
                    <td>Temperatura de congelación</td>
                    <td>{{ $registro->temp_con }}</td>
                    <td>Cantidad de producto almacenado</td>
                    <td>{{ $registro->cantidad_alm }}</td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE ROTULADO Y ETIQUETADOS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="6">ROTULADO Y/O ETIQUETADO</th>
                </tr>
                <tr>
                    <th>MARCA</th>
                    <th>CONTENIDO NETO</th>
                    <th>DIRECCION / LUGAR PROCEDENCIA</th>
                    <th>LOTE - FECHA EMPACADO - FECHA DE DESPACHO</th>
                    <th>FECHA DE VENCIMIENTO</th>
                    <th>OBSERVACIONES</th>
                </tr>
                @foreach (json_decode($registro->filas, true) as $fila)
                    <tr>
                        <td>{{ $fila['marca'] }}</td>
                        <td>{{ $fila['contenido'] }}</td>
                        <td>{{ $fila['direccion'] }}</td>
                        <td>{{ $fila['lote'] }}</td>
                        <td>{{ $fila['fecha'] }}</td>
                        <td>{{ $fila['observaciones'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- TABLA DE FIRMAS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2">OBSERVACIONES GENERALES</th>
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
    </div>
</body>

</html>
