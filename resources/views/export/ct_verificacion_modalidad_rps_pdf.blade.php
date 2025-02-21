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
        }

        body {
            font-size: 11px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #96f1fd;
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
                    <td rowspan="2">FORMATO VERIFICACIÓN MODALIDAD RACIÓN PARA PREPARAR EN SITIO - PS</td>
                    <td><strong>CÓDIGO:</strong> F-ECI-09</td>
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
                    <td colspan="4">{{ $registro->operador }}</td>
                    <td>No Contrato</td>
                    <td colspan="3">{{ $registro->contrato }}</td>
                </tr>
                <tr>
                    <td>Número de visita</td>
                    <td colspan="2">{{ $registro->numero_visita }}</td>
                    <td>tipo de visita</td>
                    <td colspan="2">{{ $registro->tipo_visita }}</td>
                    <td>No Beneficiarios</td>
                    <td colspan="2">{{ $registro->num_beneficiarios }}</td>
                </tr>
                <tr>
                    <td colspan="2">Fecha de la última visita de la Autoridad Sanitaria:</td>
                    <td colspan="2">{{ $registro->fecha_ultima_visita }}</td>
                    <td colspan="2">Concepto emitido</td>
                    <td colspan="3">{{ $registro->concepto_emitido }}</td>
                </tr>
            </tbody>
        </table>
        <!-- Tabla de criterios de evaluación -->
        <table class="table table-bordered">
            <tr>
                <td colspan="4">Crterios de evaluación</td>
            </tr>
            <tr>
                <td colspan="2">Aceptable (A)</td>
                <td colspan="2">
                    Seleccione con un círculo cuando se cumplen la totalidad de
                    los requisitos descritos en el aspecto a evaluar
                </td>
            </tr>
            <tr>
                <td colspan="2">Aceptable con Requerimiento (AR)</td>
                <td colspan="2">
                    Seleccione con un círculo cuando se cumplen parcialmente los
                    requisitos descritos en el aspecto a evaluar
                </td>
            </tr>
            <tr>
                <td colspan="2">Inaceptable (I)</td>
                <td colspan="2">
                    Seleccione con un círculo cuando no cumple ninguno de los
                    requisitos descritos en el aspecto a evaluar
                </td>
            </tr>
            <tr>
                <td colspan="2">No Aplica (NA)</td>
                <td colspan="2">
                    Marque con una X la casilla "NA" en caso que el aspecto a
                    verificar no se realice y calificar como Aceptable (A).
                    Justificar la razón del no aplica en el espacio de
                    observaciones.
                </td>
            </tr>
        </table>
        <!-- Tabla preguntas 1-49 -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th class="text-center table-info" colspan="4">
                        VERIFICACIÓN CONDICIONES DE OPERACIÓN
                    </th>
                </tr>
                <tr>
                    <th class="table-info" colspan="4">
                        Condiciones higiénico sanitarias
                    </th>
                </tr>
                <tr>
                    <th class="table-info" colspan="4">
                        Edificaciones e instalaciones
                    </th>
                </tr>
                <tr class="table-info">
                    <th>N°</th>
                    <th>Aspectos a evaluar</th>
                    <th>Criterio</th>
                    <th>Observaciones</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
                        El área de almacenamiento de los alimentos se encuentra
                        limpia y se garantizan condiciones higiénico-sanitarias.
                    </td>
                    <td>
                        {{ $registro->condi_1 }}
                    </td>
                    <td>
                        {{ $registro->condi_1_obs }}
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        El área de preparación de los alimentos se encuentra limpia
                        y se garantizan condiciones higiénico-sanitarias.
                    </td>
                    <td>
                        {{ $registro->condi_2 }}
                    </td>
                    <td>
                        {{ $registro->condi_2_obs }}
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        El área de consumo de los alimentos se encuentra limpia y se
                        garantizan condiciones higiénico-sanitarias.
                    </td>
                    <td>
                        {{ $registro->condi_3 }}
                    </td>
                    <td>
                        {{ $registro->condi_3_obs }}
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        Se dispone de servicios sanitarios para el personal
                        manipulador de alimentos.
                    </td>
                    <td>
                        {{ $registro->condi_4 }}
                    </td>
                    <td>
                        {{ $registro->condi_4_obs }}
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        Las Instalaciones sanitarias se encuentran limpias y se
                        cuenta con la dotación adecuada (jabón líquido, gel
                        antibacterial, papel higiénico y papeleras con bolsa).
                    </td>
                    <td>
                        {{ $registro->condi_5 }}
                    </td>
                    <td>
                        {{ $registro->condi_5_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">Plan de saneamiento</th>
                </tr>
                <tr>
                    <th colspan="4">
                        Programa de Limpieza y Desinfección
                    </th>
                </tr>
                <tr>
                    <td>6</td>
                    <td>
                        Existe el documento que soporte el programa de limpieza y
                        desinfección, en su contenido se describen los
                        procedimientos, operaciones y formatos de registros para la
                        periodicidad de los mismos (áreas, equipos, superficies,
                        utensilios, personal manipulador y alimentos).
                    </td>
                    <td>
                        {{ $registro->condi_6 }}
                    </td>
                    <td>
                        {{ $registro->condi_6_obs }}
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>
                        Los implementos (escobas, traperos, recogedores, guantes
                        entre otros) que se utilizan para el aseo, permanecen en
                        adecuadas condiciones de limpieza y en el lugar establecido.
                    </td>
                    <td>
                        {{ $registro->condi_7 }}
                    </td>
                    <td>
                        {{ $registro->condi_7_obs }}
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>
                        Los equipos, utensilios y menaje empleados se limpian y
                        desinfectan antes de cada uso y son de materiales
                        resistentes al uso y a la corrosión.
                    </td>
                    <td>
                        {{ $registro->condi_8 }}
                    </td>
                    <td>
                        {{ $registro->condi_8_obs }}
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>
                        Se llevan los registros actualizados que soportan el
                        cumplimiento de las actividades del programa de limpieza y
                        desinfección.
                    </td>
                    <td>
                        {{ $registro->condi_9 }}
                    </td>
                    <td>
                        {{ $registro->condi_9_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">Control de plagas</th>
                </tr>
                <tr>
                    <td>10</td>
                    <td>
                        No se evidencia indicio o presencia de plagas y las áreas
                        cuentan con barreras que minimicen el ingreso de vectores.
                    </td>
                    <td>
                        {{ $registro->condi_10 }}
                    </td>
                    <td>
                        {{ $registro->condi_10_obs }}
                    </td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>
                        Se realiza un control de plagas y se cuenta con los
                        siguientes documentos soportes: diagnóstico empresa
                        fumigadora, cronograma, formato de inspección interno,
                        documentación de empresa fumigadora, fichas técnicas. Se
                        encuentran diligenciadas de forma adecuada y oportuna. Fecha
                        de la ultima fumigación:
                        {{ $registro->fecha_ultima_fumiga }}
                    </td>
                    <td>
                        {{ $registro->condi_11 }}
                    </td>
                    <td>
                        {{ $registro->condi_11_obs }}
                    </td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>
                        Se llevan los registros actualizados que soportan el
                        cumplimiento de las actividades del programa de control de
                        plagas.
                    </td>
                    <td>
                        {{ $registro->condi_12 }}
                    </td>
                    <td>
                        {{ $registro->condi_12_obs }}
                    </td>
                </tr>
                <tr>
                    <th class="table-info" colspan="4">
                        Manejo y disposición de residuos sólidos y líquidos
                    </th>
                </tr>
                <tr>
                    <td>13</td>
                    <td>
                        Existe al interior del servicio de alimentación, recipientes
                        de material sanitario, para la recolección de residuos
                        sólidos, en buen estado, en cantidad suficiente, bien
                        ubicados e identificados conforme a la norma sanitaria
                        vigente.
                    </td>
                    <td>
                        {{ $registro->condi_13 }}
                    </td>
                    <td>
                        {{ $registro->condi_13_obs }}
                    </td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>
                        La clasificación y segregación de residuos sólidos se
                        realiza de acuerdo con lo establecido en el programa de
                        manejo de residuos. Adicionalmente, los residuos sólidos son
                        retirados con la frecuencia necesaria para evitar generación
                        de olores y/o proliferación de plagas.
                    </td>
                    <td>
                        {{ $registro->condi_14 }}
                    </td>
                    <td>
                        {{ $registro->condi_14_obs }}
                    </td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>
                        El manejo de los residuos líquidos y sólidos no representa
                        riesgo de contaminación para los alimentos ni para las
                        superficies en contacto con éstos.
                    </td>
                    <td>
                        {{ $registro->condi_15 }}
                    </td>
                    <td>
                        {{ $registro->condi_15_obs }}
                    </td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>
                        Se cuenta y se cumple con protocolos para el manejo y
                        disposición de aceite vegetal usado.
                    </td>
                    <td>
                        {{ $registro->condi_16 }}
                    </td>
                    <td>
                        {{ $registro->condi_16_obs }}
                    </td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>
                        Se efectúa mantenimiento y limpieza a las trampas de grasas
                        ubicadas en las instalaciones del establecimiento.
                    </td>
                    <td>
                        {{ $registro->condi_17 }}
                    </td>
                    <td>
                        {{ $registro->condi_17_obs }}
                    </td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>
                        Se llevan los registros actualizados que soportan el
                        cumplimiento de las actividades del programa de residuos
                        sólidos y líquidos.
                    </td>
                    <td>
                        {{ $registro->condi_18 }}
                    </td>
                    <td>
                        {{ $registro->condi_18_obs }}
                    </td>
                </tr>
                <tr>
                    <th class="table-info" colspan="4">Abastecimiento de agua</th>
                </tr>
                <tr>
                    <td>19</td>
                    <td>
                        Disponen de un tanque de almacenamiento de agua potable y se
                        encuentra construido de material higiénico sanitario,
                        hermético y se encuentra en constante circulación, además
                        tiene la capacidad suficiente para un día de producción.
                    </td>
                    <td>
                        {{ $registro->condi_19 }}
                    </td>
                    <td>
                        {{ $registro->condi_19_obs }}
                    </td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>
                        Se realiza la limpieza y desinfección periódica del tanque
                        de almacenamiento de agua potable. Fecha de la última
                        limpieza y desinfección realizada:
                        {{ $registro->fecha_ultima_limpieza }}
                    </td>
                    <td>
                        {{ $registro->condi_20 }}
                    </td>
                    <td>
                        {{ $registro->condi_20_obs }}
                    </td>
                </tr>
                <tr>
                    <th class="table-info" colspan="4">Personal manipulador</th>
                </tr>
                <tr>
                    <td>21</td>
                    <td>
                        El personal manipulador no presenta afecciones de la piel o
                        enfermedades infectocontagiosas.
                    </td>
                    <td>
                        {{ $registro->condi_21 }}
                    </td>
                    <td>
                        {{ $registro->condi_21_obs }}
                    </td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>
                        Cuenta con la dotación completa, limpia, en buen estado y
                        hace uso adecuado de la misma de acuerdo a lo establecido en
                        la normatividad vigente.
                    </td>
                    <td>
                        {{ $registro->condi_22 }}
                    </td>
                    <td>
                        {{ $registro->condi_22_obs }}
                    </td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>
                        Cumple con las buenas practicas de manufactura durante todas
                        las etapas del proceso de acuerdo a lo establecido en la
                        normatividad vigente.
                    </td>
                    <td>
                        {{ $registro->condi_23 }}
                    </td>
                    <td>
                        {{ $registro->condi_23_obs }}
                    </td>
                </tr>
                <tr>
                    <td>24</td>
                    <td>
                        Se evidencia por cada una de las manipuladoras certificado
                        médico (apto para manipular alimentos) con los respectivos
                        soportes de los exámenes médicos.
                    </td>
                    <td>
                        {{ $registro->condi_24 }}
                    </td>
                    <td>
                        {{ $registro->condi_24_obs }}
                    </td>
                </tr>
                <tr>
                    <td>25</td>
                    <td>
                        El personal manipulador acreditan formación en educación
                        sanitaria, principios básicos de buenas prácticas de
                        manufactura y practicas higiénicas en manipulación de
                        alimentos.
                    </td>
                    <td>
                        {{ $registro->condi_25 }}
                    </td>
                    <td>
                        {{ $registro->condi_25_obs }}
                    </td>
                </tr>
                <tr>
                    <th class="table-info" colspan="4">
                        Operaciones de fabricación
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        Condiciones de distribución y transporte en recepción de
                        materia prima
                    </th>
                </tr>
                <tr>
                    <td>26</td>
                    <td>
                        Las condiciones sanitarias del vehículo transportador de
                        alimentos, cumple con lo establecido en la normatividad
                        sanitaria vigente. (Condiciones de higiene y limpieza
                        adecuadas pisos, paredes, techo, estibas, canastillas).
                    </td>
                    <td>
                        {{ $registro->condi_26 }}
                    </td>
                    <td>
                        {{ $registro->condi_26_obs }}
                    </td>
                </tr>
                <tr>
                    <td>27</td>
                    <td>
                        El vehículo cuenta con concepto sanitario expedido por la
                        autoridad competente con concepto favorable.
                    </td>
                    <td>
                        {{ $registro->condi_27 }}
                    </td>
                    <td>
                        {{ $registro->condi_27_obs }}
                    </td>
                </tr>
                <tr>
                    <td>28</td>
                    <td>
                        Los conductores y auxiliares cumplen con los documentos
                        exigidos para manipular alimentos, portan la dotación de
                        acuerdo a lo establecido en la Resolución 2674 de 2013 e
                        implementan buenas practicas de manufactura.
                    </td>
                    <td>
                        {{ $registro->condi_28 }}
                    </td>
                    <td>
                        {{ $registro->condi_28_obs }}
                    </td>
                </tr>
                <tr>
                    <td>29</td>
                    <td>
                        Las materias primas, se reciben en un lugar limpio y en
                        condiciones físicas que minimicen el riesgo de contaminación
                        o alteración de las características propias de cada
                        producto.
                    </td>
                    <td>
                        {{ $registro->condi_29 }}
                    </td>
                    <td>{{ $registro->condi_29_obs }}
                    </td>
                </tr>
                <tr>
                    <td>30</td>
                    <td>
                        Se da cumplimiento a los criterios de aceptación y rechazo
                        de la materia prima recibida y existen controles de este
                        proceso (fecha de vencimiento, lote, condiciones de empaque
                        y cumplimiento de la Resolución 5109 de 2005 y demás
                        normatividad vigente).
                    </td>
                    <td>
                        {{ $registro->condi_30 }}
                    </td>
                    <td>
                        {{ $registro->condi_30_obs }}
                    </td>
                </tr>
                <tr>
                    <td>31</td>
                    <td>
                        El personal manipulador verifica la temperatura de las
                        materias primas que requieren refrigeración y congelación.
                    </td>
                    <td>
                        {{ $registro->condi_31 }}
                    </td>
                    <td>
                        {{ $registro->condi_31_obs }}
                    </td>
                </tr>
                <tr>
                    <th class="table-info" colspan="4">Almacenamiento</th>
                </tr>
                <tr>
                    <td>32</td>
                    <td>
                        Las condiciones sanitarias del vehículo transportador de
                        alimentos, cumple con lo establecido en la normatividad
                        sanitaria vigente. (Condiciones de higiene y limpieza
                        adecuadas pisos, paredes, techo, estibas, canastillas).
                    </td>
                    <td>
                        {{ $registro->condi_32 }}
                    </td>
                    <td>
                        {{ $registro->condi_32_obs }}
                    </td>
                </tr>
                <tr>
                    <td>33</td>
                    <td>
                        Se almacenan los productos de acuerdo con las
                        características de los mismos, en sitios adecuados
                        minimizando el riesgo de contaminación.
                    </td>
                    <td>
                        {{ $registro->condi_33 }}
                    </td>
                    <td>
                        {{ $registro->condi_33_obs }}
                    </td>
                </tr>
                <tr>
                    <td>34</td>
                    <td>
                        Los alimentos y materias primas se encuentran libres de
                        presencia de moho, abombamiento, pérdida del vacío, fecha
                        caducada u otro aspecto que incumpla con las características
                        de calidad o inocuidad de los productos.
                    </td>
                    <td>
                        {{ $registro->condi_34 }}
                    </td>
                    <td>
                        {{ $registro->condi_34_obs }}
                    </td>
                </tr>
                <tr>
                    <td>35</td>
                    <td>
                        El rotulado y etiquetado del empaque primario de los
                        alimentos cumple con lo estipulado en la Resolución 5109 de
                        2005 y demás normatividad vigente.
                    </td>
                    <td>
                        {{ $registro->condi_35 }}
                    </td>
                    <td>
                        {{ $registro->condi_35_obs }}
                    </td>
                </tr>
                <tr>
                    <td>36</td>
                    <td>
                        Los registros de control de temperatura de los alimentos en
                        refrigeración y congelación, son diligenciados correctamente
                        y se realizan de manera oportuna.
                    </td>
                    <td>
                        {{ $registro->condi_36 }}
                    </td>
                    <td>
                        {{ $registro->condi_36_obs }}
                    </td>
                </tr>
                <tr>
                    <td>37</td>
                    <td>
                        Se lleva un control de entradas y salidas, Kárdex y rotación
                        de productos - PEPS.
                    </td>
                    <td>
                        {{ $registro->condi_37 }}
                    </td>
                    <td>
                        {{ $registro->condi_37_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">Preparación, ensamble y distribución</th>
                </tr>
                <tr>
                    <td>38</td>
                    <td>
                        Los procesos de producción se realizan de manera secuencial
                        y continua de tal forma que se protegen los alimentos de
                        posibles riesgos de contaminación.
                    </td>
                    <td>
                        {{ $registro->condi_38 }}
                    </td>
                    <td>
                        {{ $registro->condi_38_obs }}
                    </td>
                </tr>
                <tr>
                    <td>39</td>
                    <td>
                        Se lavan y desinfectan los empaques, los alimentos o
                        materias primas crudas como frutas, verduras y hortalizas y
                        productos de pesca con agua potable, antes de su preparación
                        y en los tiempos establecidos de desinfección.
                    </td>
                    <td>
                        {{ $registro->condi_39 }}
                    </td>
                    <td>
                        {{ $registro->condi_39_obs }}
                    </td>
                </tr>
                <tr>
                    <td>40</td>
                    <td>
                        Los procedimientos de operación como: lavar, pelar, cortar,
                        clasificar, extraer, batir, entre otros, se realizan de
                        manera que se protejan los alimentos y materias primas de
                        posibles riesgos de contaminación.
                    </td>
                    <td>
                        {{ $registro->condi_40 }}
                    </td>
                    <td>
                        {{ $registro->condi_40_obs }}
                    </td>
                </tr>
                <tr>
                    <td>41</td>
                    <td>
                        Los tiempos de exposición de los alimentos se encuentran
                        dentro de lo establecido en la normatividad vigente y no
                        generan posibles riesgos de contaminación. Adicionalmente,
                        los procesos de descongelación requeridos se realizan de
                        forma controlada para evitar el desarrollo de
                        microorganismos.
                    </td>
                    <td>
                        {{ $registro->condi_41 }}
                    </td>
                    <td>
                        {{ $registro->condi_41_obs }}
                    </td>
                </tr>
                <tr>
                    <td>42</td>
                    <td>
                        Todos los complementos están libres de contaminación física,
                        biológica, química y cumplen con las características de
                        calidad o inocuidad.
                    </td>
                    <td>
                        {{ $registro->condi_42 }}
                    </td>
                    <td>
                        {{ $registro->condi_42_obs }}
                    </td>
                </tr>
                <tr>
                    <td>43</td>
                    <td>
                        Existen manuales y hoja de vida de los equipos, así como
                        formatos para el servicio de mantenimiento preventivo y
                        correctivo de equipos ajustados a las características del
                        establecimiento. Se llevan los registros actualizados que
                        soportan el cumplimiento de las actividades realizadas.
                    </td>
                    <td>
                        {{ $registro->condi_43 }}
                    </td>
                    <td>
                        {{ $registro->condi_43_obs }}
                    </td>
                </tr>
                <tr>
                    <td>44</td>
                    <td>
                        Se realiza monitoreo de las temperaturas para los alimentos
                        fríos y calientes en las diferentes etapas de proceso.
                    </td>
                    <td>
                        {{ $registro->condi_44 }}
                    </td>
                    <td>
                        {{ $registro->condi_44_obs }}
                    </td>
                </tr>
                <tr>
                    <td>45</td>
                    <td>
                        Las temperaturas para los alimentos fríos y calientes en las
                        diferentes etapas de proceso se mantienen dentro del rango
                        de seguridad que garantiza inocuidad.
                    </td>
                    <td>
                        {{ $registro->condi_45 }}
                    </td>
                    <td>
                        {{ $registro->condi_45_obs }}
                    </td>
                </tr>
                <tr>
                    <td>46</td>
                    <td>
                        Se dispone del menaje suficiente de acuerdo al número de
                        raciones y se encuentra en buen estado.
                    </td>
                    <td>
                        {{ $registro->condi_46 }}
                    </td>
                    <td>
                        {{ $registro->condi_46_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">Aseguramiento y control de la calidad</th>
                </tr>
                <tr>
                    <td>47</td>
                    <td>
                        Se cumple con las características de calidad de los
                        alimentos que conforman la ración servida de acuerdo con las
                        normas legales vigentes.
                    </td>
                    <td>
                        {{ $registro->condi_47 }}
                    </td>
                    <td>
                        {{ $registro->condi_47_obs }}
                    </td>
                </tr>
                <tr>
                    <td>48</td>
                    <td>
                        Se cuenta con instrumentos de medición con el fin de
                        realizar control en cada una de las etapas de producción y
                        se garantiza la confiabilidad de las mediciones realizadas.
                    </td>
                    <td>
                        {{ $registro->condi_49 }}
                    </td>
                    <td>
                        {{ $registro->condi_48_obs }}
                    </td>
                </tr>
                <tr>
                    <td>49</td>
                    <td>
                        Se da cumplimiento a los gramajes servidos según grupo
                        escolar verificado en la siguiente tabla.
                    </td>
                    <td>
                        {{ $registro->condi_49 }}
                    </td>
                    <td>
                        {{ $registro->condi_49_obs }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered text-center">
            <tbody>
                <tr>
                    <th rowspan="2">Componente</th>
                    <th rowspan="2">Preparación</th>
                    <th rowspan="2">Grupo escolar verificado</th>
                    <th rowspan="2">
                        Cantidad Porción Servida según Minuta Patrón
                    </th>
                    <th colspan="4">Peso o volumen de muestras servidas</th>
                    <th rowspan="2">Cumplimiento<br />(Cumple / No cumple)</th>
                </tr>
                <tr>
                    <th>Muestra N° 1</th>
                    <th>Muestra N° 2</th>
                    <th>Muestra N° 3</th>
                    <th>Unidad de Medida (g o ml)</th>
                </tr>
                <tr>
                    <td>Proteico</td>
                    <td>
                        {{ $registro->proteico1 }}
                    </td>
                    <td>
                        {{ $registro->proteico2 }}
                    </td>
                    <td>
                        {{ $registro->proteico3 }}
                    </td>
                    <td>
                        {{ $registro->proteico4 }}
                    </td>
                    <td>
                        {{ $registro->proteico5 }}
                    </td>
                    <td>
                        {{ $registro->proteico6 }}
                    </td>
                    <td>
                        {{ $registro->proteico7 }}
                    </td>
                    <td>
                        {{ $registro->proteico8 }}
                    </td>
                </tr>
                <tr>
                    <td>Leguminosa</td>
                    <td>
                        {{ $registro->leguminosa1 }}
                    </td>
                    <td>
                        {{ $registro->leguminosa2 }}
                    </td>
                    <td>
                        {{ $registro->leguminosa3 }}
                    </td>
                    <td>
                        {{ $registro->leguminosa4 }}
                    </td>
                    <td>
                        {{ $registro->leguminosa5 }}
                    </td>
                    <td>
                        {{ $registro->leguminosa6 }}
                    </td>

                    <td>
                        {{ $registro->leguminosa7 }}
                    </td>
                    <td>
                        {{ $registro->leguminosa8 }}
                    </td>
                </tr>
                <tr>
                    <td>Cereal</td>
                    <td>
                        {{ $registro->cereal1 }}
                    </td>
                    <td>
                        {{ $registro->cereal2 }}
                    </td>
                    <td>
                        {{ $registro->cereal3 }}
                    </td>
                    <td>
                        {{ $registro->cereal4 }}
                    </td>
                    <td>
                        {{ $registro->cereal5 }}
                    </td>
                    <td>
                        {{ $registro->cereal6 }}
                    </td>
                    <td>
                        {{ $registro->cereal7 }}
                    </td>
                    <td>
                        {{ $registro->cereal8 }}
                    </td>
                </tr>
                <tr>
                    <td>Tubérculo, Plátano, Derivado del cereal</td>
                    <td>
                        {{ $registro->tuberculo1 }}
                    </td>
                    <td>
                        {{ $registro->tuberculo2 }}
                    </td>
                    <td>
                        {{ $registro->tuberculo3 }}
                    </td>
                    <td>
                        {{ $registro->tuberculo4 }}
                    </td>
                    <td>
                        {{ $registro->tuberculo5 }}
                    </td>
                    <td>
                        {{ $registro->tuberculo6 }}
                    </td>
                    <td>
                        {{ $registro->tuberculo7 }}
                    </td>
                    <td>
                        {{ $registro->tuberculo8 }}
                    </td>
                </tr>
                <tr>
                    <td>Verdura</td>
                    <td>
                        {{ $registro->verdura1 }}
                    </td>
                    <td>
                        {{ $registro->verdura2 }}
                    </td>
                    <td>
                        {{ $registro->verdura3 }}
                    </td>
                    <td>
                        {{ $registro->verdura4 }}
                    </td>
                    <td>
                        {{ $registro->verdura5 }}
                    </td>
                    <td>
                        {{ $registro->verdura6 }}
                    </td>
                    <td>
                        {{ $registro->verdura7 }}
                    </td>
                    <td>
                        {{ $registro->verdura8 }}
                    </td>
                </tr>
                <tr>
                    <td>Jugo de Fruta</td>
                    <td>
                        {{ $registro->jugo1 }}
                    </td>
                    <td>
                        {{ $registro->jugo2 }}
                    </td>
                    <td>
                        {{ $registro->jugo3 }}
                    </td>
                    <td>
                        {{ $registro->jugo4 }}
                    </td>
                    <td>
                        {{ $registro->jugo5 }}
                    </td>
                    <td>
                        {{ $registro->jugo6 }}
                    </td>
                    <td>
                        {{ $registro->jugo7 }}
                    </td>
                    <td>
                        {{ $registro->jugo8 }}
                    </td>
                </tr>

                <tr>
                    <td colspan="5" class="text-start">
                        <strong>INDICADOR:</strong> Porcentaje de cumplimiento de
                        condiciones operativas
                    </td>
                    <td colspan="4">
                        {{ $registro->porcentaje1 }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Aspectos a evaluar</th>
                    <th>Cumple/No cumple</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>50</td>
                    <td>
                        Se cuenta con la totalidad de la materia prima
                        correspondientes al cálculo de las minutas aprobadas,
                        multiplicadas por el número de servicios y tipo de menú.
                    </td>
                    <td>
                        {{ $registro->condi_50 }}
                    </td>
                    <td>
                        {{ $registro->condi_50_obs }}
                    </td>
                </tr>
                <tr>
                    <td>51</td>
                    <td>
                        El menu del día es acorde a lo establecido en el ciclo de
                        menus y minuta patron adoptada y aprobada.
                    </td>
                    <td>
                        {{ $registro->condi_51 }}
                    </td>
                    <td>
                        {{ $registro->condi_51_obs }}
                    </td>
                </tr>
                <tr>
                    <td>52</td>
                    <td>
                        Se encuentran estandarizadas los tamaños de las porciones en
                        las preparaciones y se cuenta con elementos de
                        estandarización para el servido.
                    </td>
                    <td>
                        {{ $registro->condi_52 }}
                    </td>
                    <td>
                        {{ $registro->condi_52_obs }}
                    </td>
                </tr>
                <tr>
                    <td>53</td>
                    <td>
                        El ciclo de menú se ejecuta bajo las especificaciones
                        técnicas definidas (guías de preparación).
                    </td>
                    <td>
                        {{ $registro->condi_53 }}
                    </td>
                    <td>
                        {{ $registro->condi_53_obs }}
                    </td>
                </tr>
                <tr>
                    <td>54</td>
                    <td>
                        En caso de presentarse intercambios, estos se realizan de
                        acuerdo al componente, a la frecuencia y cuentan con
                        documento soporte de aprobación.
                    </td>
                    <td>
                        {{ $registro->condi_54 }}
                    </td>
                    <td>
                        {{ $registro->condi_54_obs }}
                    </td>
                </tr>
                <tr>
                    <td>55</td>
                    <td>
                        El menú entregado a los estudiantes tiene aspecto atractivo
                        y buena presentación.
                    </td>
                    <td>
                        {{ $registro->condi_55 }}
                    </td>
                    <td>
                        {{ $registro->condi_55_obs }}
                    </td>
                </tr>
                <tr>
                    <td>56</td>
                    <td>
                        Se cumple con los tiempos de ensamble para la entrega
                        oportuna de los complementos alimentarios al vehículo
                        transportador.
                    </td>
                    <td>
                        {{ $registro->condi_56 }}
                    </td>
                    <td>
                        {{ $registro->condi_56_obs }}
                    </td>
                </tr>
                <tr>
                    <td>57</td>
                    <td>
                        En el ciclo de minutas incluye alimentos y/o preparaciones
                        propias del territorio
                    </td>
                    <td>
                        {{ $registro->condi_57 }}
                    </td>
                    <td>
                        {{ $registro->condi_57_obs }}
                    </td>
                </tr>
                <tr>
                    <td>58</td>
                    <td>
                        En el lugar de consumo se promocionan practicas adecuadas de
                        hábitos alimentarios en los estudiantes beneficiarios.
                    </td>
                    <td>
                        {{ $registro->condi_58 }}
                    </td>
                    <td>
                        {{ $registro->condi_58_obs }}
                    </td>
                </tr>
                <tr>
                    <td>59</td>
                    <td>
                        La aceptabilidad de los alimentos preparados es adecuada.
                    </td>
                    <td>
                        {{ $registro->condi_59 }}
                    </td>
                    <td>
                        {{ $registro->condi_59_obs }}
                    </td>
                </tr>
                <tr>
                    <td>60</td>
                    <td>
                        El desperdicio de alimentos en la etapa de descomide es
                        bajo, de conformidad a la política para prevenir la pérdida
                        y el desperdicio de alimentos según la ley 1990 de 2019.
                    </td>
                    <td>
                        {{ $registro->condi_60 }}
                    </td>
                    <td>
                        {{ $registro->condi_60_obs }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        INDICADOR: Porcentaje de cumplimiento de requerimientos
                        alimentarios y nutricionales
                    </td>
                    <td>% de Cumplimiento</td>
                    <td>
                        {{ $registro->porcentaje2 }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr class="table-primary">
                    <th colspan="9">
                        Verificación temperaturas y características organolépticas
                        alimentos preparados y distribuidos
                    </th>
                </tr>
                <tr class="table-primary">
                    <th>Preparación</th>
                    <th>Apariencia</th>
                    <th>Sabor</th>
                    <th>Olor</th>
                    <th>Textura</th>
                    <th>Temperatura final de cocción</th>
                    <th>Temperatura distribución inicial</th>
                    <th>Temperatura distribución final</th>
                    <th>Cumplimiento</th>
                </tr>
                <tr>
                    <td>{{ $registro->alimento1_1 }}</td>
                    <td>{{ $registro->alimento1_2 }}</td>
                    <td>{{ $registro->alimento1_3 }}</td>
                    <td>{{ $registro->alimento1_4 }}</td>
                    <td>{{ $registro->alimento1_5 }}</td>
                    <td>{{ $registro->alimento1_6 }}</td>
                    <td>{{ $registro->alimento1_7 }}</td>
                    <td>{{ $registro->alimento1_8 }}</td>
                    <td>{{ $registro->alimento1_9 }}</td>
                </tr>
                <tr>
                    <td>{{ $registro->alimento2_1 }}</td>
                    <td>{{ $registro->alimento2_2 }}</td>
                    <td>{{ $registro->alimento2_3 }}</td>
                    <td>{{ $registro->alimento2_4 }}</td>
                    <td>{{ $registro->alimento2_5 }}</td>
                    <td>{{ $registro->alimento2_6 }}</td>
                    <td>{{ $registro->alimento2_7 }}</td>
                    <td>{{ $registro->alimento2_8 }}</td>
                    <td>{{ $registro->alimento2_9 }}</td>
                </tr>
                <tr>
                    <td>{{ $registro->alimento3_1 }}</td>
                    <td>{{ $registro->alimento3_2 }}</td>
                    <td>{{ $registro->alimento3_3 }}</td>
                    <td>{{ $registro->alimento3_4 }}</td>
                    <td>{{ $registro->alimento3_5 }}</td>
                    <td>{{ $registro->alimento3_6 }}</td>
                    <td>{{ $registro->alimento3_7 }}</td>
                    <td>{{ $registro->alimento3_8 }}</td>
                    <td>{{ $registro->alimento3_9 }}</td>
                </tr>
                <tr>
                    <td>{{ $registro->alimento4_1 }}</td>
                    <td>{{ $registro->alimento4_2 }}</td>
                    <td>{{ $registro->alimento4_3 }}</td>
                    <td>{{ $registro->alimento4_4 }}</td>
                    <td>{{ $registro->alimento4_5 }}</td>
                    <td>{{ $registro->alimento4_6 }}</td>
                    <td>{{ $registro->alimento4_7 }}</td>
                    <td>{{ $registro->alimento4_8 }}</td>
                    <td>{{ $registro->alimento4_9 }}</td>
                </tr>
                <tr>
                    <td>{{ $registro->alimento5_1 }}</td>
                    <td>{{ $registro->alimento5_2 }}</td>
                    <td>{{ $registro->alimento5_3 }}</td>
                    <td>{{ $registro->alimento5_4 }}</td>
                    <td>{{ $registro->alimento5_5 }}</td>
                    <td>{{ $registro->alimento5_6 }}</td>
                    <td>{{ $registro->alimento5_7 }}</td>
                    <td>{{ $registro->alimento5_8 }}</td>
                    <td>{{ $registro->alimento5_9 }}</td>
                </tr>

                <tr>
                    <td colspan="7">
                        INDICADOR: Número de preparaciones que cumplen criterios de
                        calidad y organolépticos / Número de preparaciones
                        verificadas
                    </td>
                    <td colspan="3">
                        {{ $registro->porcentaje3 }}
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA DE FIRMAS -->
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
