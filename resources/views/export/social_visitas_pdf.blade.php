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
            width: 25%;
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
                    <td rowspan="2">FORMATO DE VERIFICACIÓN DE LOS MECANISMOS DE GESTIÓN SOCIAL EN EL PROGRAMA DE
                        ALIMENTACIÓN ESCOLAR - PAE </td>
                    <td><strong>CÓDIGO:</strong> FFT-OPM-01</td>
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
                    <td>{{ $registro->fechaVisita }}</td>
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
                    <td colspan="2">{{ $registro->operador }}</td>
                    <td>No Contrato</td>
                    <td colspan="2">{{ $registro->contrato }}</td>
                    <td colspan="1">Modalidad</td>
                    <td colspan="2">{{ $registro->modalidad }}</td>
                </tr>
                <tr>

                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2">Califique según nivel de cumplimiento: Cumple - No cumple - No aplica - No
                        observado </th>
                </tr>
                <tr>
                    <td>1. Conoce la Resolución 00335 de 2021 - Lineamientos Generales del Programa de Alimentación
                        Escolar- PAE.</td>
                    <td class="col-num">{{ $registro->pre_1 }}</td>
                </tr>
                <tr>
                    <td>2. Conoce los mecanismos de participación ciudadana, control social y acceso a la información
                        que dispone la resolución para que la comunidad educativa pueda realizar acompañamiento y
                        ejercer vigilancia y control a la operación del Programa de Alimentación Escolar - PAE.</td>
                    <td>{{ $registro->pre_2 }}</td>
                </tr>
                <tr>
                    <th colspan="2">Verificación Mecanismos de Participación Ciudadana </th>
                </tr>
                <tr>
                    <td>3. Se evidencia soporte de conformación del Comité de Alimentación Escolar - CAE, en el
                        Establecimiento Educativo. Adjuntar acta correspondiente del CAE.</td>
                    <td>{{ $registro->pre_3 }}</td>
                </tr>
                <tr>
                    <td>4. El Comité de Alimentación Escolar - CAE realiza la totalidad de reuniones de seguimiento y
                        acompañamiento al adecuado funcionamiento del Programa de Alimentación Escolar - PAE en la
                        Institución Educativa, según lo dispuesto en la circular N° 207 de noviembre del 2024. Adjuntar
                        actas de reunión correspondientes.</td>
                    <td>{{ $registro->pre_4 }}</td>
                </tr>
                <tr>
                    <td>5. La calidad de la información que contiene las actas evidenciadas es clara y completa según lo
                        requiere el modelo de formato Acta de Constitución de Comité de Alimentación Escolar - CAE.</td>
                    <td>{{ $registro->pre_5 }}</td>
                </tr>
                <tr>
                    <td>6. La Institución Educativa participa y promueve la asistencia a las mesas públicas convocadas
                        por la ETC como espacio de dialogo y participación entre los actores del PAE para el
                        mejoramiento continuo del programa</td>
                    <td>{{ $registro->pre_6 }}</td>
                </tr>
                <tr>
                    <th colspan="2">Verificación Mecanismos de Control Social </th>
                </tr>
                <tr>
                    <td>7. La Institución Educativa manifiesta realizar seguimiento a la gestión del Programa de
                        Alimentación Escolar mediante la rendición de cuentas que realiza la Entidad Territorial.</td>
                    <td>{{ $registro->pre_7 }}</td>
                </tr>
                <tr>
                    <td>8. Se tiene conocimiento acerca de la constitución de veedurías ciudadanas en el PAE.</td>
                    <td>{{ $registro->pre_8 }}</td>
                </tr>
                <tr>
                    <td>9. Se tiene conocimiento acerca de la ley 2042 de 2020 por medio de la cual se otrogan
                        herramientas a los padres de familia realice acompañamiento eficaz a los recursos del PAE.</td>
                    <td>{{ $registro->pre_9 }}</td>
                </tr>
                <tr>
                    <th colspan="2">Acceso a la Información </th>
                </tr>
                <tr>
                    <td>10. Se evidencia publicada la ficha técnica de información del PAE en un lugar visible, de tal
                        manera que la información mínima requerida pueda ser consultada por los actores del programa
                        para fines de seguimiento y vigilancia comunitaria.</td>
                    <td>{{ $registro->pre_10 }}</td>
                </tr>
                <tr>
                    <td>11. Se evidencian publicados los ciclos de menú establecidos, en un lugar visible a toda la
                        comunidad educativa para llevar a cabo los procesos de vigilancia comunitaria y control social.
                    </td>
                    <td>{{ $registro->pre_11 }}</td>
                </tr>
                <tr>
                    <td>12. Se tiene conocimiento de los canales de atención dispuestos por la ETC y el operador para la
                        recepción de solicitudes, peticiones, quejas y reclamos (SPQR).</td>
                    <td>{{ $registro->pre_12 }}</td>
                </tr>
                <tr>
                    <th colspan="2">Beneficiarios </th>
                </tr>
                <tr>
                    <td>13. Se tiene en cuenta los criterios establecidos en la resolución para la priorización de los
                        estudiantes beneficiarios y asignación del complemento alimentario a entregar.</td>
                    <td>{{ $registro->pre_13 }}</td>
                </tr>
                <tr>
                    <td>14. Se realiza acompañamiento por parte del Establecimiento Educativo a los estudiantes
                        beneficiarios en el área de entrega y/o consumo de los complementos alimentarios entregados.
                    </td>
                    <td>{{ $registro->pre_14 }}</td>
                </tr>
                <tr>
                    <td>15. El comportamiento de los estudiantes beneficiarios es el adecuado al momento de la entrega
                        y/o consumo del complemento.</td>
                    <td>{{ $registro->pre_15 }}</td>
                </tr>
                <tr>
                    <td>16. El Establecimiento Educativo fomenta y apoya las iniciativas pedagógicas que integren
                        procesos formativos que impulsen las buenas prácticas higiénicas, los hábitos alimentarios
                        saludables, el respeto y la tolerancia entre los diferentes estudiantes beneficiarios, de tal
                        manera que la alimentación escolar genere condiciones que permitan el logro de trayectorias
                        educativas completas y el desarrollo integral de los Niños, Niñas, Jóvenes y Adolescentes
                        beneficiarios</td>
                    <td>{{ $registro->pre_16 }}</td>
                </tr>
                <tr>
                    <td>INDICADOR: Porcentaje de Cumplimiento Mecanismos de Gestión Social </td>
                    <td>{{ $registro->perc_gest_social }}</td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE OBSERVACIONES Y COMPROMISOS  -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="4">Observaciones / Recomendaciones / Conclusiones / Acciones de Mejora</th>
                </tr>
                <tr>
                    <td colspan="4">{{ $registro->observaciones }}</td>
                </tr>
                <tr>
                    <th colspan="4">Comprimisos adquiridos</th>
                </tr>
                <tr>
                    <td colspan="4">NOTA: Si se generan compromisos en relación a los mecanismos de gestión social
                        por parte del Establecimiento Educativo se dispone el siguiente correo por parte de la Entidad
                        Territorial para realizar el envío de los soportes de
                        cumplimiento de los mismos: gestionsocialpaends@gmail.com
                    </td>
                </tr>
                <tr>
                    <td>No</td>
                    <td>Descripción del Compromiso</td>
                    <td>Responsable</td>
                    <td>Fecha prevista de Cumplimiento</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>{{ $registro->compromiso_1_desc }}</td>
                    <td>{{ $registro->compromiso_1_resp }}</td>
                    <td>{{ $registro->compromiso_1_fecha }}</td>
                </tr>
                <tr>
                    <td colspan="4">Mecanismos de Seguimiento: {{ $registro->compromiso_1_mecanismo }}</td>
                </tr>
                <tr>
                    <td>No</td>
                    <td>Descripción del Compromiso</td>
                    <td>Responsable</td>
                    <td>Fecha prevista de Cumplimiento</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>{{ $registro->compromiso_2_desc }}</td>
                    <td>{{ $registro->compromiso_2_resp }}</td>
                    <td>{{ $registro->compromiso_2_fecha }}</td>
                </tr>
                <tr>
                    <td colspan="4">Mecanismos de Seguimiento: {{ $registro->compromiso_2_mecanismo }}</td>
                </tr>
                <tr>
                    <td>No</td>
                    <td>Descripción del Compromiso</td>
                    <td>Responsable</td>
                    <td>Fecha prevista de Cumplimiento</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>{{ $registro->compromiso_3_desc }}</td>
                    <td>{{ $registro->compromiso_3_resp }}</td>
                    <td>{{ $registro->compromiso_3_fecha }}</td>
                </tr>
                <tr>
                    <td colspan="4">Mecanismos de Seguimiento: {{ $registro->compromiso_3_mecanismo }}</td>
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
