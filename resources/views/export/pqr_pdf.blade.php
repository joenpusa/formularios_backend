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
            padding: 8px;
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
                    <td rowspan="2">VERIFICACIÓN Y SEGUIMIENTO A SPQR</td>
                    <td><strong>CÓDIGO:</strong> F-ECI-20</td>
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
                    <td>{{ $registro->municipio }}</td>
                    <td rowspan="2">Hora de la visita</td>
                    <td>Inicial</td>
                    <td>{{ $registro->hora_inicial }}</td>
                </tr>
                <tr>
                    <td>Institución Educativa</td>
                    <td colspan="2">{{ $registro->institucion }}</td>
                    <td>Sede Educativa</td>
                    <td colspan="2">{{ $registro->sede }}</td>
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
        <!-- TABLA DE FIRMAS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Observaciones:</td>
                </tr>
                <tr>
                    <td>{{ $registro->observaciones }}</td>
                </tr>
                <tr>
                    <td>FIRMA EQUIPO PAE /APOYO A LA SUPERVISIÓN</td>
                    <td>FIRMA QUIEN ATIENDE LA VISITA</td>
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
