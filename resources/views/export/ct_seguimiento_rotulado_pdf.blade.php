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
        }

        th,
        td {
            border: 1px solid black;
            padding: 6px;
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
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td rowspan="3"><img src="{{ public_path('images/logo2.png') }}"
                            style="width: 150px; padding: 5px" /></td>
                    <th>PROGRAMA DE ALIMENTACIÓN ESCOLAR NORTE DE SANTANDER</th>
                    <td><strong>VERSIÓN:</strong> 01</td>
                </tr>
                <tr>
                    <td rowspan="2">FORMATO DE SEGUIMIENTO ROTULADO Y/O ETIQUETADO DE LOS ALIMENTOS </td>
                    <td><strong>CÓDIGO:</strong> F-ECI-20</td>
                </tr>
                <tr>
                    <td><strong>VIGENTE DESDE:</strong> ENERO 2024</td>
                </tr>
            </tbody>
        </table>
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
                    <td>{{ $registro->hora_inicial }}</td>
                </tr>
                <tr>
                    <td>Institución Educativa</td>
                    <td colspan="2">{{ $registro->data_institucion->nombre }}</td>
                    <td>Sede Educativa</td>
                    <td colspan="2">{{ $registro->data_sede->nombre }}</td>
                    <td>Final</td>
                    <td>{{ $registro->hora_final }}</td>
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
                    <td colspan="3">{{ $registro->modalidad }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Alimento</th>
                    <th>Marca</th>
                    <th>contenido neto</th>
                    <th>nombre o direccion del fabricante</th>
                    <th>Lote</th>
                    <th>Fecha de vencimiento</th>
                    <th>Registro, permiso, notificación sanitaria</th>
                </tr>
                @if (!empty($registro->filas))
                    @foreach (json_decode($registro->filas, true) as $fila)
                        <tr>
                            <td>{{ $fila['material'] }}</td>
                            <td>{{ $fila['marca'] }}</td>
                            <td>{{ $fila['contenido'] }}</td>
                            <td>{{ $fila['dir_fabricante'] }}</td>
                            <td>{{ $fila['lote'] }}</td>
                            <td>{{ $fila['fecha'] }}</td>
                            <td>{{ $fila['registro'] }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2">Observaciones:</th>
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
