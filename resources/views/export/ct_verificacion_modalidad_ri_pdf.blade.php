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

        .col-textos {
            width: 60%;
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
                    <td><strong>CÓDIGO:</strong> F-ECI-11</td>
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
                    <td>Numero de visita</td>
                    <td colspan="2">{{ $registro->numero_visita }}</td>
                    <td>tipo de visita</td>
                    <td colspan="2">{{ $registro->tipo_visita }}</td>
                    <td>No Beneficiarios</td>
                    <td colspan="2">{{ $registro->num_beneficiarios }}</td>

                </tr>
            </tbody>
        </table>
        <!-- Tabla de criterios de evaluación -->
        <table class="table table-bordered">
            <tr>
                <td colspan="4">Crterios de evaluación</td>
            </tr>
            <tr>
                <td colspan="1">Aceptable (A)</td>
                <td colspan="3">
                    Seleccione con un círculo cuando se cumplen la totalidad de
                    los requisitos descritos en el aspecto a evaluar
                </td>
            </tr>
            <tr>
                <td colspan="1">Aceptable con Requerimiento (AR)</td>
                <td colspan="3">
                    Seleccione con un círculo cuando se cumplen parcialmente los
                    requisitos descritos en el aspecto a evaluar
                </td>
            </tr>
            <tr>
                <td colspan="1">Inaceptable (I)</td>
                <td colspan="3">
                    Seleccione con un círculo cuando no cumple ninguno de los
                    requisitos descritos en el aspecto a evaluar
                </td>
            </tr>
            <tr>
                <td colspan="1">No Aplica (NA)</td>
                <td colspan="3">
                    Marque con una X la casilla "NA" en caso que el aspecto a
                    verificar no se realice y calificar como Aceptable (A).
                    Justificar la razón del no aplica en el espacio de
                    observaciones.
                </td>
            </tr>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="4">
                        <strong>VERIFICACIÓN DE CONDICIONES DE TRANSPORTE Y DISTRIBUCIÓN</strong>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">Personal manipulador</th>
                </tr>
                <tr>
                    <th class="col-num">N°</th>
                    <th class="col-textos">Aspectos a evaluar</th>
                    <th>Criterios para evaluar</th>
                    <th>Observaciones</th>
                </tr>

                <tr>
                    <td class="col-num">1</td>
                    <td class="col-textos">
                        El personal que distribuye los complementos en las sedes
                        educativas presenta la documentación vigente para la
                        manipulación de alimentos.
                    </td>
                    <td>
                        {{ $registro->pre_1 }}
                    </td>
                    <td>
                        {{ $registro->pre_1_obs }}
                    </td>
                </tr>
                <tr>
                    <td class="col-num">2</td>
                    <td>
                        El personal que distribuye los complementos en las sedes
                        educativas aplica las Buenas Practicas de Manufactura y
                        están dotados con los elementos de protección requeridos.
                    </td>
                    <td>
                        {{ $registro->pre_2 }}
                    </td>
                    <td>
                        {{ $registro->pre_2_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">Condiciones de transporte y Recepción</th>
                </tr>
                <tr>
                    <th class="col-num">N°</th>
                    <th>Aspectos a evaluar</th>
                    <th>Criterios para evaluar</th>
                    <th>Observaciones</th>
                </tr>

                <tr>
                    <td>3</td>
                    <td>
                        Las canastillas utilizadas para el transporte de los
                        componentes se observan en buen estado de limpieza y
                        desinfección.
                    </td>
                    <td>
                        {{ $registro->pre_3 }}
                    </td>
                    <td>
                        {{ $registro->pre_3_obs }}
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        El vehículo transportador de los complementos se encuentra
                        en buen estado, y cumple con las condiciones higiénicas
                        sanitarias establecidas por la normatividad vigente.
                    </td>
                    <td>
                        {{ $registro->pre_4 }}
                    </td>
                    <td>
                        {{ $registro->pre_4_obs }}
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        El vehículo transportador de los complementos presenta
                        concepto sanitario favorable de acuerdo a los alimentos
                        transportados.
                    </td>
                    <td>
                        {{ $registro->pre_5 }}
                    </td>
                    <td>
                        {{ $registro->pre_5_obs }}
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>
                        El vehículo transportador es de uso exclusivo para el
                        transporte de los complementos alimentarios.
                    </td>
                    <td>
                        {{ $registro->pre_6 }}
                    </td>
                    <td>
                        {{ $registro->pre_6_obs }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        El personal de transporte de alimentos cuenta con la
                        dotación mínima requerida.
                    </td>
                    <td>
                        {{ $registro->pre_7 }}
                    </td>
                    <td>
                        {{ $registro->pre_7_obs }}
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>
                        El personal del transporte cumple con los horarios
                        establecidos de entrega de los complementos a las sedes
                        educativas, de acuerdo con 7 3,5 0 las necesidades de la
                        sede educativa.
                    </td>
                    <td>
                        {{ $registro->pre_8 }}
                    </td>
                    <td>
                        {{ $registro->pre_8_obs }}
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>
                        Durante la recepción de los componentes del complemento en
                        los establecimientos educativos cumplen con los rangos
                        establecidos de temperatura en la normatividad sanitaria
                        vigente; (Temperaturas de refrigeración no mayores 4°C +/-
                        2) (Bebidas y derivados lácteos). (Si aplica)
                    </td>
                    <td>
                        {{ $registro->pre_9 }}
                    </td>
                    <td>
                        {{ $registro->pre_9_obs }}
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>
                        Se evita el riesgo de contaminación cruzada durante la
                        entrega de los componentes del suministro, en las sedes
                        educativas.
                    </td>
                    <td>
                        {{ $registro->pre_10 }}
                    </td>
                    <td>
                        {{ $registro->pre_10_obs }}
                    </td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>
                        El operador entrega la cantidad total de complementos
                        alimentarios programados.
                    </td>
                    <td>
                        {{ $registro->pre_11 }}
                    </td>
                    <td>
                        {{ $registro->pre_11_obs }}
                    </td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>
                        El rotulado del empaque primario cumplen con las condiciones
                        estipuladas en la normatividad vigente.
                    </td>
                    <td>
                        {{ $registro->pre_12 }}
                    </td>
                    <td>
                        {{ $registro->pre_12_obs }}
                    </td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>
                        El cierre de los empaques primarios y empaque secundario (si
                        aplica) se encuentran en perfecto estado.
                    </td>
                    <td>
                        {{ $registro->pre_13 }}
                    </td>
                    <td>
                        {{ $registro->pre_13_obs }}
                    </td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>
                        El operador realiza la entrega de todos los componentes del
                        complemento alimentario de acuerdo al menú programado.
                    </td>
                    <td>
                        {{ $registro->pre_14 }}
                    </td>
                    <td>
                        {{ $registro->pre_14_obs }}
                    </td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>
                        Los empaques plásticos de los alimentos entregados son
                        clasificados como residuos inorgánicos y son dispuestos en
                        canecas.
                    </td>
                    <td>
                        {{ $registro->pre_15 }}
                    </td>
                    <td>
                        {{ $registro->pre_15_obs }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        INDICADOR: Porcentaje de cumplimiento de condiciones de
                        despacho y suministro
                    </td>
                    <td>% de Cumplimiento</td>
                    <td>
                        {{ $registro->indicador1 }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">
                        VERIFICACIÓN DE REQUERIMIENTOS ALIMENTARIOS Y NUTRICIONALES
                        - CUMPLIMIENTO MINUTA PATRÓN
                    </th>
                </tr>
                <tr>
                    <th>N°</th>
                    <th>Aspectos a evaluar</th>
                    <th>Criterios para evaluar</th>
                    <th>Observaciones</th>
                </tr>

                <tr>
                    <td>16</td>
                    <td>
                        El menu del dia es acorde a lo establecido en el ciclo de
                        menus y minuta patron adoptada y aprobada.
                    </td>
                    <td>
                        {{ $registro->pre_16 }}
                    </td>
                    <td>
                        {{ $registro->pre_16_obs }}
                    </td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>
                        En caso de presentarse intercambios, estos se realizan de
                        acuerdo al componente, a la frecuencia y cuentan con
                        documento soporte de aprobación.
                    </td>
                    <td>
                        {{ $registro->pre_17 }}
                    </td>
                    <td>
                        {{ $registro->pre_17_obs }}
                    </td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>
                        El menú entregado a los estudiantes tiene aspecto atractivo
                        y buena presentación.
                    </td>
                    <td>
                        {{ $registro->pre_18 }}
                    </td>
                    <td>
                        {{ $registro->pre_18_obs }}
                    </td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>
                        Se cumple con los horarios de distribución establecidos para
                        el servicio y no se generan retrasos durante el suministro.
                    </td>
                    <td>
                        {{ $registro->pre_19 }}
                    </td>
                    <td>
                        {{ $registro->pre_19_obs }}
                    </td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>
                        En el ciclo de menús se incluye alimentos propios del
                        territorio
                    </td>
                    <td>
                        {{ $registro->pre_20 }}
                    </td>
                    <td>
                        {{ $registro->pre_20_obs }}
                    </td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>
                        En la sede de entrega, el operador promocionan practicas
                        adecuadas de habitos alimentarios en los estudiantes
                        beneficiarios.
                    </td>
                    <td>
                        {{ $registro->pre_21 }}
                    </td>
                    <td>
                        {{ $registro->pre_21_obs }}
                    </td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>La aceptabilidad de los alimentos es adecuada.</td>
                    <td>
                        {{ $registro->pre_22 }}
                    </td>
                    <td>
                        {{ $registro->pre_22_obs }}
                    </td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>
                        El desperdicio de alimentos es bajo, de conformidad a la
                        política para prevenir la pérdida y el desperdicio de
                        alimentos según la ley 1990 de 2019.
                    </td>
                    <td>
                        {{ $registro->pre_23 }}
                    </td>
                    <td>
                        {{ $registro->pre_23_obs }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        INDICADOR: Porcentaje de cumplimiento de Requerimientos
                        Alimentarios y Nutricionales
                    </td>
                    <td>% de Cumplimiento</td>
                    <td>
                        {{ $registro->indicador2 }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th colspan="10">
                    VERIFICACIÓN DE CARACTERÍSTICAS ORGANOLÉPTICAS Y GRAMAJES
                </th>
            </tr>
            <tr>
                <th colspan="5">
                    Identificación y Características Organolépticas
                </th>
                <th colspan="5">Verificación Peso / Volumen</th>
            </tr>
            <tr>
                <th>Componente</th>
                <th>Color</th>
                <th>Olor</th>
                <th>Sabor</th>
                <th>Textura</th>
                <th>Grupo escolar verificado</th>
                <th>Peso / Vol declarado</th>
                <th>Peso / Vol verificado</th>
                <th>Temp °C</th>
                <th>Cumplim. Cumple/No cumple</th>
            </tr>
        </thead>
        <tbody>
            @foreach (json_decode($registro->filas, true) as $fila)
                <tr>
                    <td>{{ $fila['componente'] }}</td>
                    <td>{{ $fila['color'] }}</td>
                    <td>{{ $fila['olor'] }}</td>
                    <td>{{ $fila['sabor'] }}</td>
                    <td>{{ $fila['textura'] }}</td>
                    <td>{{ $fila['grupo'] }}</td>
                    <td>{{ $fila['declarado'] }}</td>
                    <td>{{ $fila['verificado'] }}</td>
                    <td>{{ $fila['temperatura'] }}</td>
                    <td>{{ $fila['cumplimiento'] }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="10">
                    <label class="form-label">Nota: Para evaluar la temperatura y características
                        organolépticas se debe tener en cuenta las fichas
                        técnicas determinadas en el anexo de calidad e inocuidad
                        de la Resolución 00335 de 2021.</label>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <strong>INDICADOR:</strong> Número de productos que cumplen criterios de
                    calidad organolépticos y gramajes / Número de productos
                    verificados</strong>
                </td>
                <td colspan="2">% de Cumplimiento</td>
                <td colspan="2">
                    {{ $registro->indicador3 }}
                </td>
            </tr>
        </tbody>
    </table>
    <!-- TABLA DE FIRMAS -->
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th colspan="2"><strong>Observaciones:</strong></th>
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
