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
                    <td rowspan="2">VERIFICACIÓN CARACTERISTICAS DE CALIDAD DE LOS PRODUCTOS CARNE DE RES, CARNE DE
                        CERDO Y POLLO</td>
                    <td><strong>CÓDIGO:</strong> F-ECI-05</td>
                </tr>
                <tr>
                    <td><strong>VIGENTE DESDE:</strong> ENERO 2024</td>
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
                    <td colspan="2">Lugar de verificación</td>
                    <td colspan="2">{{ $registro->lugar_verificacion }}</td>
                    <td colspan="2">{{ $registro->lugar_verificacion_otro }}</td>
                <tr>
                    <td>Municipio</td>
                    <td>{{ $registro->data_municipio->nombre }}</td>
                    <td>Dirección</td>
                    <td>{{ $registro->direccion }}</td>
                    <td>Fecha de la visita</td>
                    <td>{{ $registro->fecha_visita }}</td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA CARNE DE RES -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="6">PRODUCTO CARNE DE RES</th>
                </tr>
                <tr>
                    <td>Fecha de Recepción</td>
                    <td>{{ $registro->fecha_recepcion_res }}</td>
                    <td>Cantidad Recepcionada</td>
                    <td>{{ $registro->cantidad_recepcionada_res }}</td>
                    <td>Proveedores</td>
                    <td>{{ $registro->proveedores_res }}</td>
                </tr>
                <tr>
                    <th colspan="6">PROPIEDADES ORGANOLEPTICAS DEL PRODUCTO</th>
                </tr>
                <tr>
                    <td>OLOR</td>
                    <td>Caracteristicas propias de la Especie</td>
                    <td>
                        @if ($registro->olor_res == 'caracteristico')
                            X
                        @endif
                    <td>

                        No Caracteristico, fuerte, fetido, amoniaco
                    </td>
                    <td>
                        @if ($registro->olor_res == 'no-caracteristico')
                            X
                        @endif
                    </td>
                    <td class="col-obs">Observaciones: {{ $registro->obs_olor_res }}</td>
                </tr>
                <tr>
                    <td>COLOR</td>
                    <td>
                        Caracteristico rojo cerezo brillante
                    </td>
                    <td>
                        @if ($registro->color_res == 'caracteristico')
                            X
                        @endif
                    <td>
                        tonalidades oscuras, verdosas, azuladas
                    </td>
                    <td>
                        @if ($registro->color_res == 'no-caracteristico')
                            X
                        @endif
                    </td>
                    <td>Observaciones: {{ $registro->obs_color_res }}</td>
                </tr>
                <tr>
                    <td>TEXTURA</td>
                    <td>
                        Firme al tacto
                    <td>
                        @if ($registro->textura_res == 'firme')
                            X
                        @endif
                    <td>
                        Textura pegajosa, viscosa o babosa
                    </td>
                    <td>
                        @if ($registro->textura_res == 'pegajosa')
                            X
                        @endif
                    </td>
                    <td>Observaciones: {{ $registro->obs_textura_res }}</td>
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
                    <td>{{ $registro->cuarto_res }}</td>
                    <td>Tanque</td>
                    <td>{{ $registro->tanque_res }}</td>
                    <td>Nevera</td>
                    <td>{{ $registro->nevera_res }}</td>
                    <td>Caba</td>
                    <td>{{ $registro->caba_res }}</td>
                    <td>Temperatura de refrigeración</td>
                    <td>{{ $registro->temp_ref_res }}</td>
                    <td>Temperatura de congelación</td>
                    <td>{{ $registro->temp_con_res }}</td>
                    <td>Cantidad de producto almacenado</td>
                    <td>{{ $registro->cantidad_alm_res }}</td>
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
                @foreach (json_decode($registro->filas_res, true) as $fila)
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

        <!-- TABLA DE CARNE DE CERDO -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="6">PRODUCTO CARNE DE CERDO</th>
                </tr>
                <tr>
                    <td>Fecha de Recepción</td>
                    <td>{{ $registro->fecha_recepcion_cerdo }}</td>
                    <td>Cantidad Recepcionada</td>
                    <td>{{ $registro->cantidad_recepcionada_cerdo }}</td>
                    <td>Proveedores</td>
                    <td>{{ $registro->proveedores_cerdo }}</td>
                </tr>
                <tr>
                    <th colspan="6">PROPIEDADES ORGANOLEPTICAS DEL PRODUCTO</th>
                </tr>
                <tr>
                    <td>OLOR</td>
                    <td>Caracteristicas propias de la Especie</td>
                    <td>
                        @if ($registro->olor_cerdo == 'caracteristico')
                            X
                        @endif
                    <td>
                        No Caracteristico, fuerte, fetido, amoniaco
                    </td>
                    <td>
                        @if ($registro->olor_cerdo == 'no-caracteristico')
                            X
                        @endif
                    </td>
                    <td class="col-obs">Observaciones: {{ $registro->obs_olor_cerdo }}</td>
                </tr>
                <tr>
                    <td>COLOR</td>
                    <td>
                        Porcion de carne rosado blanquesino
                    </td>
                    <td>
                        @if ($registro->color_cerdo == 'caracteristico')
                            X
                        @endif
                    <td>
                        tonalidades gris verdoso o azulado
                    </td>
                    <td>
                        @if ($registro->color_cerdo == 'no-caracteristico')
                            X
                        @endif
                    </td>
                    <td>Observaciones: {{ $registro->obs_color_cerdo }}</td>
                </tr>
                <tr>
                    <td>TEXTURA</td>
                    <td>
                        Firme al tacto, ligeramente humeda
                    <td>
                        @if ($registro->textura_cerdo == 'firme')
                            X
                        @endif
                    <td>
                        Textura pegajosa, viscosa o babosa
                    </td>
                    <td>
                        @if ($registro->textura_cerdo == 'pegajosa')
                            X
                        @endif
                    </td>
                    <td>Observaciones: {{ $registro->obs_textura_cerdo }}</td>
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
                    <td>{{ $registro->cuarto_cerdo }}</td>
                    <td>Tanque</td>
                    <td>{{ $registro->tanque_cerdo }}</td>
                    <td>Nevera</td>
                    <td>{{ $registro->nevera_cerdo }}</td>
                    <td>Caba</td>
                    <td>{{ $registro->caba_cerdo }}</td>
                    <td>Temperatura de refrigeración</td>
                    <td>{{ $registro->temp_ref_cerdo }}</td>
                    <td>Temperatura de congelación</td>
                    <td>{{ $registro->temp_con_cerdo }}</td>
                    <td>Cantidad de producto almacenado</td>
                    <td>{{ $registro->cantidad_alm_cerdo }}</td>
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
                @foreach (json_decode($registro->filas_cerdo, true) as $fila)
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

        <!-- TABLA DE POLLO -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="6">PRODUCTO POLLO</th>
                </tr>
                <tr>
                    <td>Fecha de Recepción</td>
                    <td>{{ $registro->fecha_recepcion_pollo }}</td>
                    <td>Cantidad Recepcionada</td>
                    <td>{{ $registro->cantidad_recepcionada_pollo }}</td>
                    <td>Proveedores</td>
                    <td>{{ $registro->proveedores_pollo }}</td>
                </tr>
                <tr>
                    <th colspan="6">PROPIEDADES ORGANOLEPTICAS DEL PRODUCTO</th>
                </tr>
                <tr>
                    <td>OLOR</td>
                    <td>Caracteristicas propias de la Especie</td>
                    <td>
                        @if ($registro->olor_pollo == 'caracteristico')
                            X
                        @endif
                    <td>
                        fuerte, hedor agrio o similar al azufre
                    </td>
                    <td>
                        @if ($registro->olor_pollo == 'no-caracteristico')
                            X
                        @endif
                    </td>
                    <td class="col-obs">Observaciones: {{ $registro->obs_olor_pollo }}</td>
                </tr>
                <tr>
                    <td>COLOR</td>
                    <td>
                        Rosado blanquesino, tonalidad amarillenta
                    </td>
                    <td>
                        @if ($registro->color_pollo == 'caracteristico')
                            X
                        @endif
                    <td>
                        tonalidades gris verdoso
                    </td>
                    <td>
                        @if ($registro->color_pollo == 'no-caracteristico')
                            X
                        @endif
                    </td>
                    <td>Observaciones: {{ $registro->obs_color_pollo }}</td>
                </tr>
                <tr>
                    <td>TEXTURA</td>
                    <td>
                        Firme al tacto, piel adherida al musculo
                    <td>
                        @if ($registro->textura_pollo == 'firme')
                            X
                        @endif
                    <td>
                        Textura pegajosa, viscosa o babosa
                    </td>
                    <td>
                        @if ($registro->textura_pollo == 'pegajosa')
                            X
                        @endif
                    </td>
                    <td>Observaciones: {{ $registro->obs_textura_pollo }}</td>
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
                    <td>{{ $registro->cuarto_pollo }}</td>
                    <td>Tanque</td>
                    <td>{{ $registro->tanque_pollo }}</td>
                    <td>Nevera</td>
                    <td>{{ $registro->nevera_pollo }}</td>
                    <td>Caba</td>
                    <td>{{ $registro->caba_pollo }}</td>
                    <td>Temperatura de refrigeración</td>
                    <td>{{ $registro->temp_ref_pollo }}</td>
                    <td>Temperatura de congelación</td>
                    <td>{{ $registro->temp_con_pollo }}</td>
                    <td>Cantidad de producto almacenado</td>
                    <td>{{ $registro->cantidad_alm_pollo }}</td>
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
                @foreach (json_decode($registro->filas_pollo, true) as $fila)
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
                    <th>FIRMA QUIEN ATIENDE LA VISITA</th>
                    <th>FIRMA EQUIPO PAE /APOYO A LA SUPERVISIÓN</th>
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
