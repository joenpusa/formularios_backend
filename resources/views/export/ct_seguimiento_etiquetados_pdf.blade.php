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
                    <td rowspan="2">SEGUIMIENTO ROTULADO Y/O ETIQUETADO DE ALIMENTOS BODEGA DE ALMACENAMIENTO </td>
                    <td><strong>CÓDIGO:</strong> F-ECI-04</td>
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
                    <td>Municipio</td>
                    <td>{{ $registro->data_municipio->nombre }}</td>
                    <td>Dirección</td>
                    <td>{{ $registro->direccion }}</td>
                </tr>
                <tr>
                    <td>Operador</td>
                    <td>{{ $registro->operador }}</td>
                    <td>No Contrato</td>
                    <td>{{ $registro->contrato }}</td>
                    <td>Fecha de la visita</td>
                    <td>{{ $registro->fecha_visita }}</td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE ALIMENTOS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="8" class="text-center">
                        ALIMENTOS MODALIDADES RACIÓN PREPARADA EN SITIO - PS Y
                        COMIDA CALIENTE TRANSPORTADA
                    </th>
                </tr>
                <tr>
                    <th>ALIMENTO</th>
                    <th>MARCA</th>
                    <th>CONTENIDO NETO</th>
                    <th>PAIS DE ORIGEN</th>
                    <th>NOMBRE O DIRECCIÓN DEL FABRICANTE</th>
                    <th>LOTE</th>
                    <th>FECHA DE VENCIMIENTO</th>
                    <th>
                        N° DEL REGISTRO, PERMISO, NOTIFICACIÓN SANITARIA
                    </th>
                </tr>
                <tr>
                    <td>A.Leguminosa:
                        {{ $registro->nombre_A_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->marca_A_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->contenido_A_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->pais_A_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->fabricante_A_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->lote_A_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->fecha_A_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->registro_A_Leguminosa }}
                    </td>
                </tr>
                <tr>
                    <td>B.Leguminosa:
                        {{ $registro->nombre_B_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->marca_B_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->contenido_B_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->pais_B_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->fabricante_B_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->lote_B_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->fecha_B_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->registro_B_Leguminosa }}
                    </td>
                </tr>
                <tr>
                    <td>C.Leguminosa:
                        {{ $registro->nombre_C_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->marca_C_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->contenido_C_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->pais_C_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->fabricante_C_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->lote_C_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->fecha_C_Leguminosa }}
                    </td>
                    <td>
                        {{ $registro->registro_C_Leguminosa }}
                    </td>
                </tr>
                <tr>
                    <td>A. Arroz:
                        {{ $registro->nombre_A_Arroz }}
                    </td>
                    <td>
                        {{ $registro->marca_A_Arroz }}
                    </td>
                    <td>
                        {{ $registro->contenido_A_Arroz }}
                    </td>
                    <td>
                        {{ $registro->pais_A_Arroz }}
                    </td>
                    <td>
                        {{ $registro->fabricante_A_Arroz }}
                    </td>
                    <td>
                        {{ $registro->lote_A_Arroz }}
                    </td>
                    <td>
                        {{ $registro->fecha_A_Arroz }}
                    </td>
                    <td>
                        {{ $registro->registro_A_Arroz }}
                    </td>
                </tr>
                <tr>
                    <td>A. Azucar:
                        {{ $registro->nombre_A_Azucar }}
                    </td>
                    <td>
                        {{ $registro->marca_A_Azucar }}
                    </td>
                    <td>
                        {{ $registro->contenido_A_Azucar }}
                    </td>
                    <td>
                        {{ $registro->pais_A_Azucar }}
                    </td>
                    <td>
                        {{ $registro->fabricante_A_Azucar }}
                    </td>
                    <td>
                        {{ $registro->lote_A_Azucar }}
                    </td>
                    <td>
                        {{ $registro->fecha_A_Azucar }}
                    </td>
                    <td>
                        {{ $registro->registro_A_Azucar }}
                    </td>
                </tr>
                <tr>
                    <td>A. Sal:
                        {{ $registro->nombre_A_Sal }}
                    </td>
                    <td>
                        {{ $registro->marca_A_Sal }}
                    </td>
                    <td>
                        {{ $registro->contenido_A_Sal }}
                    </td>
                    <td>
                        {{ $registro->pais_A_Sal }}
                    </td>
                    <td>
                        {{ $registro->fabricante_A_Sal }}
                    </td>
                    <td>
                        {{ $registro->lote_A_Sal }}
                    </td>
                    <td>
                        {{ $registro->fecha_A_Sal }}
                    </td>
                    <td>
                        {{ $registro->registro_A_Sal }}
                    </td>
                </tr>
                <tr>
                    <td>A. Aceite:
                        {{ $registro->nombre_A_Aceite }}
                    </td>
                    <td>
                        {{ $registro->marca_A_Aceite }}
                    </td>
                    <td>
                        {{ $registro->contenido_A_Aceite }}
                    </td>
                    <td>
                        {{ $registro->pais_A_Aceite }}
                    </td>
                    <td>
                        {{ $registro->fabricante_A_Aceite }}
                    </td>
                    <td>
                        {{ $registro->lote_A_Aceite }}
                    </td>
                    <td>
                        {{ $registro->fecha_A_Aceite }}
                    </td>
                    <td>
                        {{ $registro->registro_A_Aceite }}
                    </td>
                </tr>
                <tr>
                    <td>A. Leche en polvo:
                        {{ $registro->nombre_A_Lechep }}
                    </td>
                    <td>
                        {{ $registro->marca_A_Lechep }}
                    </td>
                    <td>
                        {{ $registro->contenido_A_Lechep }}
                    </td>
                    <td>
                        {{ $registro->pais_A_Lechep }}
                    </td>
                    <td>
                        {{ $registro->fabricante_A_Lechep }}
                    </td>
                    <td>
                        {{ $registro->lote_A_Lechep }}
                    </td>
                    <td>
                        {{ $registro->fecha_A_Lechep }}
                    </td>
                    <td>
                        {{ $registro->registro_A_Lechep }}
                    </td>
                </tr>
                <tr>
                    <td>A. Spaghetti:
                        {{ $registro->nombre_A_Spaghetti }}
                    </td>
                    <td>
                        {{ $registro->marca_A_Spaghetti }}
                    </td>
                    <td>
                        {{ $registro->contenido_A_Spaghetti }}
                    </td>
                    <td>
                        {{ $registro->pais_A_Spaghetti }}
                    </td>
                    <td>
                        {{ $registro->fabricante_A_Spaghetti }}
                    </td>
                    <td>
                        {{ $registro->lote_A_Spaghetti }}
                    </td>
                    <td>
                        {{ $registro->fecha_A_Spaghetti }}
                    </td>
                    <td>
                        {{ $registro->registro_A_Spaghetti }}
                    </td>
                </tr>
                <tr>
                    <td>A. Cereal: Pan de Leche:
                        {{ $registro->nombre_A_PanLeche }}
                    </td>
                    <td>
                        {{ $registro->marca_A_PanLeche }}
                    </td>
                    <td>
                        {{ $registro->contenido_A_PanLeche }}
                    </td>
                    <td>
                        {{ $registro->pais_A_PanLeche }}
                    </td>
                    <td>
                        {{ $registro->fabricante_A_PanLeche }}
                    </td>
                    <td>
                        {{ $registro->lote_A_PanLeche }}
                    </td>
                    <td>
                        {{ $registro->fecha_A_PanLeche }}
                    </td>
                    <td>
                        {{ $registro->registro_A_PanLeche }}
                    </td>
                </tr>
                <tr>
                    <td>B. Cereal: Pan Mantequilla
                        {{ $registro->nombre_B_PanMantequilla }}
                    </td>
                    <td>
                        {{ $registro->marca_B_PanMantequilla }}
                    </td>
                    <td>
                        {{ $registro->contenido_B_PanMantequilla }}
                    </td>
                    <td>
                        {{ $registro->pais_B_PanMantequilla }}
                    </td>
                    <td>
                        {{ $registro->fabricante_B_PanMantequilla }}
                    </td>
                    <td>
                        {{ $registro->lote_B_PanMantequilla }}
                    </td>
                    <td>
                        {{ $registro->fecha_B_PanMantequilla }}
                    </td>
                    <td>
                        {{ $registro->registro_B_PanMantequilla }}
                    </td>
                </tr>
                <tr>
                    <td>C. Cereal: Pan Sal:
                        {{ $registro->nombre_C_PanSal }}
                    </td>
                    <td>
                        {{ $registro->marca_C_PanSal }}
                    </td>
                    <td>
                        {{ $registro->contenido_C_PanSal }}
                    </td>
                    <td>
                        {{ $registro->pais_C_PanSal }}
                    </td>
                    <td>
                        {{ $registro->fabricante_C_PanSal }}
                    </td>
                    <td>
                        {{ $registro->lote_C_PanSal }}
                    </td>
                    <td>
                        {{ $registro->fecha_C_PanSal }}
                    </td>
                    <td>
                        {{ $registro->registro_C_PanSal }}
                    </td>
                </tr>
                <tr>
                    <td>D. Cereal: Pan Dulce:
                        {{ $registro->nombre_D_PanDulce }}
                    </td>
                    <td>
                        {{ $registro->marca_D_PanDulce }}
                    </td>
                    <td>
                        {{ $registro->contenido_D_PanDulce }}
                    </td>
                    <td>
                        {{ $registro->pais_D_PanDulce }}
                    </td>
                    <td>
                        {{ $registro->fabricante_D_PanDulce }}
                    </td>
                    <td>
                        {{ $registro->lote_D_PanDulce }}
                    </td>
                    <td>
                        {{ $registro->fecha_D_PanDulce }}
                    </td>
                    <td>
                        {{ $registro->registro_D_PanDulce }}
                    </td>
                </tr>
                <tr>
                    <td>E. Cereal: Pan Maiz
                        {{ $registro->nombre_E_PanMaiz }}
                    </td>
                    <td>
                        {{ $registro->marca_E_PanMaiz }}
                    </td>
                    <td>
                        {{ $registro->contenido_E_PanMaiz }}
                    </td>
                    <td>
                        {{ $registro->pais_E_PanMaiz }}
                    </td>
                    <td>
                        {{ $registro->fabricante_E_PanMaiz }}
                    </td>
                    <td>
                        {{ $registro->lote_E_PanMaiz }}
                    </td>
                    <td>
                        {{ $registro->fecha_E_PanMaiz }}
                    </td>
                    <td>
                        {{ $registro->registro_E_PanMaiz }}
                    </td>
                </tr>
                <tr>
                    <td>F. Cereal: Galleta Casera
                        {{ $registro->nombre_F_GlletaCasera }}
                    </td>
                    <td>
                        {{ $registro->marca_F_GlletaCasera }}
                    </td>
                    <td>
                        {{ $registro->contenido_F_GlletaCasera }}
                    </td>
                    <td>
                        {{ $registro->pais_F_GlletaCasera }}
                    </td>
                    <td>
                        {{ $registro->fabricante_F_GlletaCasera }}
                    </td>
                    <td>
                        {{ $registro->lote_F_GlletaCasera }}
                    </td>
                    <td>
                        {{ $registro->fecha_F_GlletaCasera }}
                    </td>
                    <td>
                        {{ $registro->registro_F_GlletaCasera }}
                    </td>
                </tr>
                <tr>
                    <td>A. Lácteo: Leche Entera
                        {{ $registro->nombre_A_LacheEntera }}
                    </td>
                    <td>
                        {{ $registro->marca_A_LacheEntera }}
                    </td>
                    <td>
                        {{ $registro->contenido_A_LacheEntera }}
                    </td>
                    <td>
                        {{ $registro->pais_A_LacheEntera }}
                    </td>
                    <td>
                        {{ $registro->fabricante_A_LacheEntera }}
                    </td>
                    <td>
                        {{ $registro->lote_A_LacheEntera }}
                    </td>
                    <td>
                        {{ $registro->fecha_A_LacheEntera }}
                    </td>
                    <td>
                        {{ $registro->registro_A_LacheEntera }}
                    </td>
                </tr>
                <tr>
                    <td>B. Lácteo: Avena
                        {{ $registro->nombre_B_LacteoAvena }}
                    </td>
                    <td>
                        {{ $registro->marca_B_LacteoAvena }}
                    </td>
                    <td>
                        {{ $registro->contenido_B_LacteoAvena }}
                    </td>
                    <td>
                        {{ $registro->pais_B_LacteoAvena }}
                    </td>
                    <td>
                        {{ $registro->fabricante_B_LacteoAvena }}
                    </td>
                    <td>
                        {{ $registro->lote_B_LacteoAvena }}
                    </td>
                    <td>
                        {{ $registro->fecha_B_LacteoAvena }}
                    </td>
                    <td>
                        {{ $registro->registro_B_LacteoAvena }}
                    </td>
                </tr>
                <tr>
                    <td>B. Lácteo: Avena Sabor a Maracuya
                        {{ $registro->nombre_B_LacteoAvenaSaborMaracuya }}
                    </td>
                    <td>
                        {{ $registro->marca_B_LacteoAvenaSaborMaracuya }}
                    </td>
                    <td>
                        {{ $registro->contenido_B_LacteoAvenaSaborMaracuya }}
                    </td>
                    <td>
                        {{ $registro->pais_B_LacteoAvenaSaborMaracuya }}
                    </td>
                    <td>
                        {{ $registro->fabricante_B_LacteoAvenaSaborMaracuya }}
                    </td>
                    <td>
                        {{ $registro->lote_B_LacteoAvenaSaborMaracuya }}
                    </td>
                    <td>
                        {{ $registro->fecha_B_LacteoAvenaSaborMaracuya }}
                    </td>
                    <td>
                        {{ $registro->registro_B_LacteoAvenaSaborMaracuya }}
                    </td>
                </tr>
                <tr>
                    <td>B. Dulce: Bocadillo de Guayaba
                        {{ $registro->nombre_B_DulceBocadilloGuayaba }}
                    </td>
                    <td>
                        {{ $registro->marca_B_DulceBocadilloGuayaba }}
                    </td>
                    <td>
                        {{ $registro->contenido_B_DulceBocadilloGuayaba }}
                    </td>
                    <td>
                        {{ $registro->pais_B_DulceBocadilloGuayaba }}
                    </td>
                    <td>
                        {{ $registro->fabricante_B_DulceBocadilloGuayaba }}
                    </td>
                    <td>
                        {{ $registro->lote_B_DulceBocadilloGuayaba }}
                    </td>
                    <td>
                        {{ $registro->fecha_B_DulceBocadilloGuayaba }}
                    </td>
                    <td>
                        {{ $registro->registro_B_DulceBocadilloGuayaba }}
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE FIRMAS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="3">Observaciones:</td>
                </tr>
                <tr>
                    <td colspan="3">{{ $registro->observaciones }}</td>
                </tr>
                <tr>
                    <td>Visita Atendida por</td>
                    <td>Visita Realizada por</td>
                    <td>Visita Realizada por</td>
                </tr>
                <tr>
                    <td><img src="{{ $registro->firma1 }}" style="width: 150px; padding: 5px" /></td>
                    <td><img src="{{ $registro->firma2 }}" style="width: 150px; padding: 5px" /></td>
                    <td><img src="{{ $registro->firma3 }}" style="width: 150px; padding: 5px" /></td>
                </tr>
                <tr>
                    <td>NOMBRE: <strong>{{ $registro->nombre_atiende }}</strong></td>
                    <td>NOMBRE: <strong>{{ $registro->nombre_apoyo1 }}</strong></td>
                    <td>NOMBRE: <strong>{{ $registro->nombre_apoyo2 }}</strong></td>
                </tr>
                <tr>
                    <td>CEDULA: <strong>{{ $registro->cedula_atiende }}</strong></td>
                    <td>CEDULA: <strong>{{ $registro->cedula_apoyo1 }}</strong></td>
                    <td>CEDULA: <strong>{{ $registro->cedula_apoyo2 }}</strong></td>
                </tr>
                <tr>
                    <td>CARGO: <strong>{{ $registro->cargo_atiende }}</strong></td>
                    <td>CARGO: <strong>{{ $registro->cargo_apoyo1 }}</strong></td>
                    <td>CARGO: <strong>{{ $registro->cargo_apoyo2 }}</strong></td>
                </tr>
                <tr>
                    <td>TELEFONO: <strong>{{ $registro->telefono_atiende }}</strong></td>
                    <td>TELEFONO: <strong>{{ $registro->telefono_apoyo1 }}</strong></td>
                    <td>TELEFONO: <strong>{{ $registro->telefono_apoyo2 }}</strong></td>
            </tbody>
        </table>
    </div>
</body>

</html>
