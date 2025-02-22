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
                    <td rowspan="2">FORMATO DE ASISTENCIA DE EDUCACIÓN ALIMENTARIA Y NUTRICIONAL</td>
                    <td><strong>CÓDIGO:</strong> F-ECI-02</td>
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
                    <td colspan="3">{{ $registro->operador }}</td>
                    <td>No Contrato</td>
                    <td colspan="4">{{ $registro->contrato }}</td>
                </tr>
            </tbody>
        </table>
        <!-- Tabla de objetivos y temáticas -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Objetivo</th>
                </tr>
                <tr>
                    <td>{{ $registro->objetivo }}</td>
                </tr>
                <tr>
                    <th>Temática abordada</th>
                </tr>
                <tr>
                    <td>{{ $registro->tematica }}</td>
                </tr>
            </tbody>
            <!-- tabla de estudantes -->
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Nombres y apellidos</th>
                        <th>Grado escolar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($registro->filas, true) as $fila)
                        {{ $n = 1 }}
                        <tr>
                            <td>{{ $n }}</td>
                            <td>{{ $fila['nombre'] }}</td>
                            <td>{{ $fila['grado'] }}</td>
                        </tr>
                        {{ $n = $n + 1 }}
                    @endforeach
                    <tr>
                        <td colspan="2">Total de beneficiarios:</td>
                        <td>{{ $registro->num_beneficiarios }}</td>
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
