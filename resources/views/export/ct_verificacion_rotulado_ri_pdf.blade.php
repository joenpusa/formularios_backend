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
            background-color: #c1e6cc;
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
                    <td rowspan="2">FORMATO VERIFICACIÓN DE ROTULADO RACIÓN INDUSTRIALIZADA - I</td>
                    <td><strong>CÓDIGO:</strong> F-ECI-10</td>
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
                    <td colspan="3">{{ $registro->operador }}</td>
                    <td>No Contrato</td>
                    <td colspan="4">{{ $registro->contrato }}</td>
                </tr>
                <tr>
                    <td>Número de visita</td>
                    <td colspan="2">{{ $registro->numero_visita }}</td>
                    <td>Tipo de visita</td>
                    <td colspan="2">{{ $registro->tipo_visita }}</td>
                    <td>N° Beneficiarios</td>
                    <td colspan="2">{{ $registro->num_beneficiarios }}</td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA RESOLUCION 5109 -->
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th colspan="16">
                        Criterios para evaluar: Cumple (C), No cumple (NC), No
                        observado (NO), No aplica (NA)
                    </th>
                </tr>
                <tr>
                    <th rowspan="2">Producto</th>
                    <th rowspan="2">Fecha Fabricación</th>
                    <th rowspan="2">Fecha Vencimiento</th>
                    <th rowspan="2">Lote</th>
                    <th colspan="11">Verificación Res. 5109/2005</th>
                    <th rowspan="2">Cumplimiento (Cumple / No cumple)</th>
                </tr>
                <tr>
                    <th>Nombre del alimento</th>
                    <th>Lista ingredientes</th>
                    <th>Lote</th>
                    <th>Contenido neto</th>
                    <th>Nombre y dirección del fabricante</th>
                    <th>Instrucciones conservación</th>
                    <th>Fecha Vencimiento</th>
                    <th>Instrucción de uso</th>
                    <th>Registro sanitario</th>
                    <th>Condiciones empaque primario</th>
                    <th>Declaración de tabla nutricional</th>
                </tr>
            </thead>
            <tbody>
                @foreach (json_decode($registro->filas_5109, true) as $fila)
                    <tr>
                        <td>{{ $fila['producto'] }}</td>
                        <td>{{ $fila['fabricacion'] }}</td>
                        <td>{{ $fila['vencimiento'] }}</td>
                        <td>{{ $fila['lote'] }}</td>
                        <td>{{ $fila['nombre'] }}</td>
                        <td>{{ $fila['lista_ingredientes'] }}</td>
                        <td>{{ $fila['lote2'] }}</td>
                        <td>{{ $fila['contenido_neto'] }}</td>
                        <td>{{ $fila['fabricante'] }}</td>
                        <td>{{ $fila['conservacion'] }}</td>
                        <td>{{ $fila['vencimiento2'] }}</td>
                        <td>{{ $fila['uso'] }}</td>
                        <td>{{ $fila['registro'] }}</td>
                        <td>{{ $fila['contabla_nutricionaldiciones'] }}</td>
                        <td>{{ $fila['declaracion'] }}</td>
                        <td>{{ $fila['cumplimiento'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- TABLA RESOLUCION 810 -->
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th rowspan="2">Producto</th>
                    <th rowspan="2">Fecha Fabricación</th>
                    <th rowspan="2">Fecha Vencimiento</th>
                    <th rowspan="2">Lote</th>
                    <th colspan="5">
                        Verificación Res. 810 de 2021 y Res 2492 de 2022
                    </th>
                    <th rowspan="2">Cumplimiento (Cumple / No cumple)</th>
                </tr>
                <tr>
                    <th>Declaración de nutrientes</th>
                    <th>Tamaños y características de las porciones</th>
                    <th>Declaración de las medidas caseras</th>
                    <th>Número de porciones por envase</th>
                    <th>Equivalencias de medidas caseras comunes</th>
                </tr>
            </thead>
            <tbody>
                @foreach (json_decode($registro->filas_810, true) as $fila)
                    <tr>
                        <td>{{ $fila['producto'] }}</td>
                        <td>{{ $fila['fabricacion'] }}</td>
                        <td>{{ $fila['vencimiento'] }}</td>
                        <td>{{ $fila['lote'] }}</td>
                        <td>{{ $fila['nutrientes'] }}</td>
                        <td>{{ $fila['tamanos'] }}</td>
                        <td>{{ $fila['medidas'] }}</td>
                        <td>{{ $fila['porciones'] }}</td>
                        <td>{{ $fila['equivalencia'] }}</td>
                        <td>{{ $fila['cumplimiento'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- TABLA DE FIRMAS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>INDICADOR: Número de productos que cumplen condiciones de rotulado / Número de productos
                        verificados</td>
                    <td>Porcentaje de cumplimiento: {{ $registro->porcentaje }}</td>
                </tr>
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
