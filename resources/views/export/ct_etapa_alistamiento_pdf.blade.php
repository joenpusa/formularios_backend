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
                    <th>PROGRAMA DE ALIMENTACIÓN ESCOLAR NORTE DE SANTANDER</th>
                    <td><strong>VERSIÓN:</strong> 01</td>
                </tr>
                <tr>
                    <td rowspan="2">VERIFICACIÓN TÉCNICA A ETAPA PREOPERATIVA BODEGA DE ALMACENAMIENTO Y MODALIDADES
                        PS, CCT Y I </td>
                    <td><strong>CÓDIGO:</strong> F-ECI-02</td>
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
                </tr>
                <tr>
                    <td>Operador</td>
                    <td>{{ $registro->operador }}</td>
                    <td>No Contrato</td>
                    <td>{{ $registro->contrato }}</td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td>{{ $registro->direccion }}</td>
                    <td>Telefono/Correo</td>
                    <td>{{ $registro->correo }}</td>
                </tr>
                <tr>
                    <td>Fecha de la visita</td>
                    <td>{{ $registro->fecha_visita }}</td>
                    <td>H. Inicial: {{ $registro->hora_inicio }}</td>
                    <td>H. Terminación: {{ $registro->hora_fin }}</td>
                </tr>
                <tr>
                    <td>No Visita</td>
                    <td>{{ $registro->num_visita }}</td>
                    <td>Tipo de Visita</td>
                    <td>{{ $registro->tipo_visita }}</td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE PREGUNTAS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="4">OBJETO DE LA VISITA: Realizar apoyo a la supervisión técnica de la etapa de
                        alistamiento a cargo del operador
                        contratista, en aras de verificar las condiciones
                        previas a la operación del Programa de Alimentación Escolar PAE, de conformidad a lo establecido
                        en la resolución 00335 de 2021.</td>
                </tr>
                <tr>
                    <th colspan="4">CRITERIOS DE EVALUACIÓN: 1(CUMPLE), 0 (NO CUMPLE), NA (NO APLICA), NO (NO
                        OBSERVADO)</th>
                </tr>
                <tr>
                    <th colspan="4">I. INSTALACIONES FÍSICAS Y SANITARIAS DE LA BODEGA</th>
                </tr>
                <tr>
                    <th>ITEM</th>
                    <th>ASPECTO A EVALUAR</th>
                    <th>PUNTAJE</th>
                    <th>OBSERVACIONES</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Se localiza en sitio seco, no inundable, aislados de
                        cualquier foco de insalubridad que represente
                        riesgos potenciales para la contaminación del
                        alimento, como botaderos de basura, pantanos,
                        charcos, etc.</td>
                    <td>{{ $registro->pre_1 }}</td>
                    <td>{{ $registro->pre_1_obs }}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>La edificación está diseñada y construida de
                        manera que protege e impide la entrada de polvo,
                        lluvia, suciedades u otros contaminantes.</td>
                    <td>{{ $registro->pre_2 }}</td>
                    <td>{{ $registro->pre_2_obs }}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Sus accesos y alrededores se mantienen libres de
                        acumulación de basuras, aguas estancadas y otras
                        fuentes de contaminación para el alimento.</td>
                    <td>{{ $registro->pre_3 }}</td>
                    <td>{{ $registro->pre_3_obs }}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>La bodega está construida a prueba de vectores
                        (roedores, insectos, entre otros).</td>
                    <td>{{ $registro->pre_4 }}</td>
                    <td>{{ $registro->pre_4_obs }}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Existe(n) puerta(s) con separación de 1 cm entre el
                        borde inferior y el piso, que permita el aislamiento
                        de las instalaciones con el medio exterior.</td>
                    <td>{{ $registro->pre_5 }}</td>
                    <td>{{ $registro->pre_5_obs }}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Los techos y paredes se encuentran limpios
                        (ausencia de telarañas y suciedad).</td>
                    <td>{{ $registro->pre_6 }}</td>
                    <td>{{ $registro->pre_6_obs }}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Las diferentes áreas de la bodega se encuentran
                        debidamente separadas e identificadas.</td>
                    <td>{{ $registro->pre_7 }}</td>
                    <td>{{ $registro->pre_7_obs }}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>La edificación y sus instalaciones están construidas
                        para facilitar las operaciones de limpieza,
                        desinfección y desinfestación.</td>
                    <td>{{ $registro->pre_8 }}</td>
                    <td>{{ $registro->pre_8_obs }}</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>El tamaño de la bodega o las areas son
                        proporcionales a los volúmenes de alimentos
                        manipulados, disponiendo además de espacios
                        libres para la circulación del personal, el traslado de
                        materiales o productos y para realizar la limpieza y
                        el mantenimiento de las áreas respectivas.</td>
                    <td>{{ $registro->pre_9 }}</td>
                    <td>{{ $registro->pre_9_obs }}</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Las áreas están separadas de cualquier tipo de
                        vivienda y no se utilizan como dormitorio.</td>
                    <td>{{ $registro->pre_10 }}</td>
                    <td>{{ $registro->pre_10_obs }}</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Se dispone del agua potable para efectuar los
                        procesos de limpieza y desinfección efectiva.</td>
                    <td>{{ $registro->pre_11 }}</td>
                    <td>{{ $registro->pre_11_obs }}</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Los servicios sanitarios son los adecuados, están
                        limpios y cuentan con los elementos requeridos
                        para la higiene personal tales como papel higiénico,
                        jabón líquido antibacterial, papeleras, toallas de
                        papel, implementos desechables o equipos
                        automáticos para el secado de manos.</td>
                    <td>{{ $registro->pre_12 }}</td>
                    <td>{{ $registro->pre_12_obs }}</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Dispone de las instalaciones para limpieza y
                        desinfección de los equipos y utensilios de trabajo.</td>
                    <td>{{ $registro->pre_13 }}</td>
                    <td>{{ $registro->pre_13_obs }}</td>
                </tr>
                <tr>
                    <th colspan="4">II. VERIFICACIÓN DOCUMENTAL BODEGA Y ESTABLECIMIENTOS CON MODALIDAD PS, CCT Y I
                    </th>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Se evidencia concepto favorable, emitido por la
                        autoridad de salud competente, una vez verificado
                        el cumplimiento de las condiciones higienico
                        sanitarias de la bodega, de conformidad con la ley
                        9 de 1979 y su reglamenación.</td>
                    <td>{{ $registro->pre_14 }}</td>
                    <td>
                        Fecha de visita y/o Certificado: {{ $registro->fecha_certificado }}
                        <br>
                        Concepto Sanitario{{ $registro->concepto_sanitario }}
                    </td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Existe un plan de saneamiento aplicable a la
                        bodega y a los establecimientos educativos con
                        modalidad RPS, CCT y RI, de acuerdo con la
                        normatividad
                        vigente,
                        donde
                        incluya
                        procedimientos, formatos de registros y los
                        siguientes programas: Limpieza y desinfección,
                        desechos solidos, control de plagas y monitoreo de
                        calidad del agua.</td>
                    <td>{{ $registro->pre_15 }}</td>
                    <td>{{ $registro->pre_15_obs }}</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Se cuenta con un programa de mantenimiento
                        preventivo y correctivo de equipos, aplicable a la
                        bodega y a los establecimientos educativos con
                        modalidad RPS, CCT y RI, en cuyo contenido se
                        relaciona formato hoja de vida de equipos,
                        cronograma, responsables de las actividades de
                        mantenimiento, entre otros.</td>
                    <td>{{ $registro->pre_16 }}</td>
                    <td>{{ $registro->pre_16_obs }}</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Se cuenta con el programa de calibración de
                        equipos e instrumentos de medición existentes y
                        aplicable a la bodega y en los comedores
                        escolares.</td>
                    <td>{{ $registro->pre_17 }}</td>
                    <td>{{ $registro->pre_17_obs }}</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Dispone el operador de los ciclos de menús
                        diseñados, dispuestos y aprobados por la entidad
                        territorial, con la respectiva firma del profesional en
                        Nutrición y dietetica, con un minimo de 10 menús
                        para la modalidad industrializada, y minimo 20 para
                        modalidad preparada en sitio y comida caliente
                        transportada.</td>
                    <td>{{ $registro->pre_18 }}</td>
                    <td>{{ $registro->pre_18_obs }}</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>Los ciclos de menús estan acompañados de los
                        siguientes documentos: analisis nutricional, guias
                        de preparación, lista de intercambios.</td>
                    <td>{{ $registro->pre_19 }}</td>
                    <td>{{ $registro->pre_19_obs }}</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>Se cuenta con un plan de muestreo microbiologico,
                        para los grupos de alimentos seleccionados por la
                        entidad territorial, de las diferentes modalidades de
                        suministro en los establecimienteos y comedores
                        escolares, con la periodicidad y terminos definidos.</td>
                    <td>{{ $registro->pre_20 }}</td>
                    <td>{{ $registro->pre_20_obs }}</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>Se cuenta con el programa que detalla los aspectos
                        y criterios de evaluación, aceptación y seguimiento
                        a proveedores, materias primas e insumos en la
                        bodega del operador contratista.</td>
                    <td>{{ $registro->pre_21 }}</td>
                    <td>{{ $registro->pre_21_obs }}</td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>Se evidencia el plan de rutas con la periodicidad y
                        dias de entrega de los viveres, elementos de aseo y
                        combustible (gas) a cada comedor escolar.</td>
                    <td>{{ $registro->pre_22 }}</td>
                    <td>{{ $registro->pre_22_obs }}</td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>Se evidencia el plan de muestreo microbiologico
                        para los grupos de alimentos seleccionados por la
                        entidad territorial.</td>
                    <td>{{ $registro->pre_23 }}</td>
                    <td>{{ $registro->pre_23_obs }}</td>
                </tr>
                <tr>
                    <td>24</td>
                    <td>Se evidencia el modelo de la Ficha Técnica de
                        Información del PAE, que se publicara en los
                        establecimientos educativos.</td>
                    <td>{{ $registro->pre_24 }}</td>
                    <td>{{ $registro->pre_24_obs }}</td>
                </tr>
                <tr>
                    <td>25</td>
                    <td>Se evidencia para cada uno de los manipuladores
                        de alimentos de bodega, el certificado médico de
                        aptitud para manipular alimentos, con los
                        respectivos soportes (exámenes de laboratorio
                        clínico), no mayor a un año.</td>
                    <td>{{ $registro->pre_25 }}</td>
                    <td>{{ $registro->pre_25_obs }}</td>
                </tr>
                <tr>
                    <td>26</td>
                    <td>Cada uno de los manipuladores de alimentos de
                        bodega, acredita formación en educación sanitaria,
                        principios básicos de Buenas Prácticas de
                        Manufactura y prácticas higiénicas en manipulación
                        y protección de alimentos (no mayor a un año).</td>
                    <td>{{ $registro->pre_26 }}</td>
                    <td>{{ $registro->pre_26_obs }}</td>
                </tr>
                <tr>
                    <td>27</td>
                    <td>Se cuenta con un programa de capacitación
                        continua al personal manipulador de alimentos
                        (bodega y E.E), documentado en físico, donde
                        incluye cronograma, responsables, medodologia
                        del plan de capacitación, entre otros.</td>
                    <td>{{ $registro->pre_27 }}</td>
                    <td>{{ $registro->pre_27_obs }}</td>
                </tr>
                <tr>
                    <td>28</td>
                    <td>Los transportadores de alimentos mantienen al día
                        (vigentes) y cuentan con los siguientes
                        documentos: licencia de conducción, seguro
                        obligatorio (SOAT), tarjeta de propiedad, revisión
                        técnico-Mecánica, certificados
                        medicos y manipulación de los alimentos, concepto sanitario
                        favorable del vehiculo transportador.</td>
                    <td>{{ $registro->pre_28 }}</td>
                    <td>{{ $registro->pre_28_obs }}</td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE RESULTADOS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="3">RESULTADO FINAL DE CUMPLIMIENTO</th>
                </tr>
                <tr>
                    <td>
                        <strong>Puntaje Esperado:</strong> {{ $registro->puntaje_esperado }}
                    </td>
                    <td>
                        <strong>Puntaje Obtenido:</strong> {{ $registro->puntaje_obtenido }}
                    </td>
                    <td>
                        <strong>Porcentaje:</strong> {{ $registro->porcentaje }}
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE FIRMAS -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2">CONCLUSIONES/ OBSERVACIONES/RECOMENDACIONES</th>
                </tr>
                <tr>
                    <td colspan="2">{{ $registro->observaciones }}</td>
                </tr>
                <tr>
                    <th colspan="2">OBSERVACIONES DE QUIEN RECIBE LA VISITA</th>
                </tr>
                <tr>
                    <td colspan="2">{{ $registro->observaciones_recibe }}</td>
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
