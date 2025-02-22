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
            background-color: #a4ecf9;
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
                    <td rowspan="2">FORMATO DE VERIFICACIÓN PERSONAL MANIPULADOR DE ALIMENTOS PADRES DE FAMILIA DE
                        LOS BENEFICIARIOS PAE.</td>
                    <td><strong>CÓDIGO:</strong> F-ECI-03</td>
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
                    <td>Fecha de la visita</td>
                    <td>{{ $registro->fecha_visita }}</td>
                    <td>Municipio</td>
                    <td>{{ $registro->data_municipio->nombre }}</td>
                </tr>
                <tr>
                    <td colspan="2">Institución Educativa principal o CER principal</td>
                    <td colspan="4">{{ $registro->data_institucion->nombre }}</td>
                </tr>
                <tr>
                    <td>Operador</td>
                    <td colspan="2">{{ $registro->operador }}</td>
                    <td>No Contrato</td>
                    <td colspan="2">{{ $registro->contrato }}</td>
                </tr>
                <tr>
                    <td colspan="6">Digite cada uno de los campos con la información de cada una de las Sedes que
                        conforman el Establecimiento Educativo
                        Principal.</td>
                </tr>
            </tbody>
        </table>
        <!-- Tabla de cantidad de manipuladores -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="col" rowspan="2">Nombre de la sede educativa</th>
                    <th scope="col" rowspan="2">Modalidad de Atención</th>
                    <th scope="col" colspan="3">
                        Número total de manipuladores
                    </th>
                    <th scope="col" colspan="3">
                        Número de manipuladores padres de familia
                    </th>
                </tr>
                <tr>
                    <th scope="col">PS</th>
                    <th scope="col">CCT</th>
                    <th scope="col">I</th>
                    <th scope="col">PS</th>
                    <th scope="col">CCT</th>
                    <th scope="col">I</th>
                </tr>
                @php
                    $totalRps1 = 0;
                    $totalCct1 = 0;
                    $totalRi1 = 0;
                    $totalRps2 = 0;
                    $totalCct2 = 0;
                    $totalRi2 = 0;
                @endphp
                @foreach (json_decode($registro->filas, true) as $fila)
                    @php
                        $totalRps1 += $fila['rps1'];
                        $totalCct1 += $fila['cct1'];
                        $totalRi1 += $fila['ri1'];
                        $totalRps2 += $fila['rps2'];
                        $totalCct2 += $fila['cct2'];
                        $totalRi2 += $fila['ri2'];
                    @endphp
                    <tr class="text-center">
                        <td>{{ $fila['nombreSede'] }}</td>
                        <td>{{ $fila['modalidad'] }}</td>
                        <td>{{ $fila['rps1'] }}</td>
                        <td>{{ $fila['cct1'] }}</td>
                        <td>{{ $fila['ri1'] }}</td>
                        <td>{{ $fila['rps2'] }}</td>
                        <td>{{ $fila['cct2'] }}</td>
                        <td>{{ $fila['ri2'] }}</td>
                    </tr>
                @endforeach
                <tr class="text-center font-weight-bold">
                    <td colspan="2">Totales</td>
                    <td>{{ $totalRps1 }}</td>
                    <td>{{ $totalCct1 }}</td>
                    <td>{{ $totalRi1 }}</td>
                    <td>{{ $totalRps2 }}</td>
                    <td>{{ $totalCct2 }}</td>
                    <td>{{ $totalRi2 }}</td>
                </tr>
                <tr>
                    <td colspan="8" class="small-text-row">
                        I: Modalidad Industrializada<br />
                        CCT: Modalidad Comida Caliente Transportada<br />
                        PS: Modalidad Preparada en Sitio
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE FIRMAS -->
        <table class="table table-bordered">
            <tbody>
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
