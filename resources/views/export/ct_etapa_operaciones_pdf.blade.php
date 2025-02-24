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
            width: 12%;
            text-align: center;
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
                    <td rowspan="2">VERIFICACIÓN TÉCNICA A ETAPA OPERATIVA BODEGA DE ALMACENAMIENTO Y MODALIDADES PS,
                        CCT Y I</td>
                    <td><strong>CÓDIGO:</strong> F-ECI-03</td>
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
                    <td colspan="2">{{ $registro->etc }}</td>
                    <td>Ciudad/Municipio</td>
                    <td colspan="2">{{ $registro->data_municipio->nombre }}</td>
                </tr>
                <tr>
                    <td>Operador</td>
                    <td colspan="2">{{ $registro->operador }}</td>
                    <td>No Contrato</td>
                    <td colspan="2">{{ $registro->contrato }}</td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td colspan="2">{{ $registro->direccion }}</td>
                    <td>Telefono/Correo</td>
                    <td colspan="2">{{ $registro->correo }}</td>
                </tr>
                <tr>
                    <td>Fecha inicio de la visita</td>
                    <td>{{ $registro->fecha_visita }}</td>
                    <td>Hora inicio</td>
                    <td>{{ $registro->hora_inicio }}</td>
                    <td>Hora de terminación</td>
                    <td>{{ $registro->hora_fin }}</td>
                </tr>
                <tr>
                    <td>Fecha final de la visita</td>
                    <td>{{ $registro->fecha_visita2 }}</td>
                    <td>Hora inicio</td>
                    <td>{{ $registro->hora_inicio2 }}</td>
                    <td>Hora de terminación</td>
                    <td>{{ $registro->hora_fin2 }}</td>
                </tr>
                <tr>
                    <td>N. de vista</td>
                    <td colspan="2">{{ $registro->numero_visita }}</td>
                    <td>Tipo de visita</td>
                    <td colspan="2">{{ $registro->tipo_visita }}</td>
                </tr>
                <tr>
                    <td colspan="6">OBJETO DE LA VISITA: Realizar apoyo a la supervisión técnica de la etapa
                        operativa a cargo del contratista, en aras de verificar las condiciones
                        de operación del Programa de Alimentación Escolar PAE, de conformidad con lo establecido en la
                        resolución 00335 de 2021.
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- TABLA CUESTIONARIO DE LA VISITA -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="4">CRITERIOS DE EVALUACIÓN: 1(CUMPLE), 0 (NO CUMPLE), NA (NO APLICA), NO (NO
                        OBSERVADO)</th>
                </tr>
                <tr>
                    <th colspan="4">I. CONDICIONES SANITARIAS DE LAS INSTALACIONES DE LA BODEGA DE ALMACENAMIENTO
                    </th>
                </tr>
                <tr>
                    <th class="col-num">ÍTEM</th>
                    <th>ASPECTO A EVALUAR</th>
                    <th class="col-num">PUNTAJE</th>
                    <th>OBSERVACIONES</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
                        Los pisos, paredes y techos se encuentran limpios y se realiza mantenimiento para garantizar
                        condiciones higienico sanitarias.
                    </td>
                    <td>
                        {{ $registro->pre_1 }}
                    </td>
                    <td>
                        {{ $registro->pre_1_obs }}
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        No se permite la presencia de animales en la bodega.
                    </td>
                    <td>
                        {{ $registro->pre_2 }}
                    </td>
                    <td>
                        {{ $registro->pre_2_obs }}
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        El manejo de los residuos líquidos dentro del establecimiento se realiza de manera que impide la
                        contaminación de los alimentos o de las superficies de potencial contacto con éste.
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
                        Los servicios sanitarios son los adecuados, están limpios y cuentan con los elementos requeridos
                        para la higiene personal tales como papel higiénico, jabón líquido antibacterial, toallas de
                        papel, implementos desechables o equipos automáticos para el secado de manos y papeleras.
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
                        En las proximidades de los lavamanos se ubican avisos o advertencias al personal sobre la
                        necesidad de lavarse las manos luego de usar los servicios sanitarios, después de cualquier
                        cambio de actividad y antes de iniciar labores de producción.
                    </td>
                    <td>
                        {{ $registro->pre_5 }}
                    </td>
                    <td>
                        {{ $registro->pre_5_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">II. PERSONAL MANIPULADOR DE BODEGA</th>
                </tr>
                <tr>
                    <td>6</td>
                    <td>
                        El personal manipulador de bodega, utiliza la dotación completa (vestimenta, calzado cerrado,
                        gorro, tapabocas, delantal) en buen estado, de color claro y cumple con las especificaciones de
                        la normatividad legal vigente.
                    </td>
                    <td>
                        {{ $registro->pre_6 }}
                    </td>
                    <td>
                        {{ $registro->pre_6_obs }}
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>
                        La presentación personal de los manipuladores es adecuada (uñas cortas, limpias y sin esmalte,
                        cabello recogido, sin uso de joyas, accesorios y portan el uniforme limpio.)
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
                        El personal ajeno a la bodega ingresa con la debida dotación (tapabocas, cofia y bata).
                    </td>
                    <td>
                        {{ $registro->pre_8 }}
                    </td>
                    <td>
                        {{ $registro->pre_8_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">III. REQUISITOS HIGIÉNICOS DE ALMACENAMIENTO DE LOS ALIMENTOS EN LA BODEGA</th>
                </tr>
                <tr>
                    <td>9</td>
                    <td>
                        Los productos o alimentos que conforman las raciones de acuerdo a la modalidad de atención, son
                        conservados de acuerdo a las caracteristicas y condiciones de cada producto (refrigeración,
                        congelación, ambiente), de manera que garanticen su calidad, inocuidad y vida util.
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
                        Los productos o alimentos se encuentran dentro de su vida útil, con fecha de vencimiento vigente
                        y son aptos para el consumo.
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
                        No se evidencia alimentos con algun tipo de contaminación biológica, química, física o cruzada,
                        o en condiciones de riesgo de contaminación.
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
                        Se evidencia estantes, anaqueles y estibas limpias, fabricados de material resistente, no
                        porosos y de fácil limpieza y desinfección.
                    </td>
                    <td>
                        {{ $registro->pre_12 }}
                    </td>
                    <td>
                        {{ $registro->pre_12_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">IV. CONDICIONES DE ALMACENAMIENTO DE LOS ALIMENTOS</th>
                </tr>
                <tr>
                    <td>13</td>
                    <td>
                        El almacenamiento de los productos y materias primas que requieren refrigeración o congelación,
                        se realiza teniendo en cuenta las condiciones de temperatura, humedad y circulación del aire que
                        requiere cada alimento.
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
                        El almacenamiento de los alimentos se realiza en recipientes o superficies en buen estado, de
                        material sanitario, ordenadamente en pilas, estibas, canastillas, estanteria, tarimas, canecas
                        con tapa u otra forma de almacenamiento, de manera que evite cualquier forma de contaminación y
                        garantice sus propiedades fisicas.
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
                        El almacenamiento de los alimentos se realiza ordenadamente en pilas o estibas con separación
                        mínima de 60 centímetros con respecto a las paredes perimetrales, y se dispone sobre paletas o
                        tarimas elevadas del piso por lo menos 15 centímetros de manera que se permita la inspección,
                        limpieza y fumigación, si es el caso.
                    </td>
                    <td>
                        {{ $registro->pre_15 }}
                    </td>
                    <td>
                        {{ $registro->pre_15_obs }}
                    </td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>
                        Los alimentos se encuentran separados entre sí, según sus caracteristicas, de manera que se
                        evita la contaminación cruzada.
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
                        Los productos empleados para la limpieza y desinfección se encuentran rotulados y se almacenan
                        en un sitio protegido y aislado de los alimentos.
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
                        El almacenamiento y apilación de los alimentos, cumplen con la altura y el número máximo
                        indicado en el exterior de la caja, evitando el deterioro o daño del envase y embalaje.
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
                        Los embalajes de los productos se almacenan en forma cruzada o de traba para evitar el
                        deslizamiento de los mismos.
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
                        Las cajas no sobrepasan el nivel del borde de la estiba, del anaquel o estantería donde se
                        encuentren almacenadas.
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
                        Existen espacios que permiten la adecuada limpieza y desinfección del área de almacenamiento.
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
                    <td>
                        Los alimentos están almacenados en su empaque secundario original.
                    </td>
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
                        El área de almacenamiento de los alimentos se encuentra debidamente identificada.
                    </td>
                    <td>
                        {{ $registro->pre_23 }}
                    </td>
                    <td>
                        {{ $registro->pre_23_obs }}
                    </td>
                </tr>
                <tr>
                    <td>24</td>
                    <td>
                        Los productos envasados, no poseen rupturas ni abulladuras. (Si aplica)
                    </td>
                    <td>
                        {{ $registro->pre_24 }}
                    </td>
                    <td>
                        {{ $registro->pre_24_obs }}
                    </td>
                </tr>
                <tr>
                    <td>25</td>
                    <td>
                        Los empaques de los alimentos no se encuentran rotos.
                    </td>
                    <td>
                        {{ $registro->pre_25 }}
                    </td>
                    <td>
                        {{ $registro->pre_25_obs }}
                    </td>
                </tr>
                <tr>
                    <td>26</td>
                    <td>
                        El rotulado del empaque de los alimentos cumple con las especificaciones exigidas en la
                        normatividad vigente (Resolución 5109/2005).
                    </td>
                    <td>
                        {{ $registro->pre_26 }}
                    </td>
                    <td>
                        {{ $registro->pre_26_obs }}
                    </td>
                </tr>
                <tr>
                    <td>27</td>
                    <td>
                        Los alimentos perecederos de alto riesgo en salud pública y aquellos que por sus
                        características, de acuerdo con la información contenida en su rotulado, requieran condiciones
                        especiales de almacenamiento y manejo, se transportan en refrigeración o congelación.
                    </td>
                    <td>
                        {{ $registro->pre_27 }}
                    </td>
                    <td>
                        {{ $registro->pre_27_obs }}
                    </td>
                </tr>
                <tr>
                    <td>28</td>
                    <td>
                        Los alimentos perecederos de alto riesgo en salud pública son almacenados bajo las condiciones
                        exigidas y se encuentran debidamente rotulados.
                    </td>
                    <td>
                        {{ $registro->pre_28 }}
                    </td>
                    <td>
                        {{ $registro->pre_28_obs }}
                    </td>
                </tr>
                <tr>
                    <td>29</td>
                    <td>
                        Las frutas y verduras almacenadas se encuentran sin daño físico o deterioro
                    </td>
                    <td>
                        {{ $registro->pre_29 }}
                    </td>
                    <td>
                        {{ $registro->pre_29_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">V. EQUIPOS Y/O UTENSILIOS DE BODEGA</th>
                </tr>
                <tr>
                    <td>30</td>
                    <td>
                        Los equipos y/o utensilios están fabricados con materiales resistentes al uso y a la corrosión.
                    </td>
                    <td>
                        {{ $registro->pre_30 }}
                    </td>
                    <td>
                        {{ $registro->pre_30_obs }}
                    </td>
                </tr>
                <tr>
                    <td>31</td>
                    <td>
                        Los equipos y/o utensilios, son de acabado liso, no poroso, no absorbente, libre de defectos y
                        grietas, y permiten unas adecuadas actividades de limpieza y desinfección.
                    </td>
                    <td>
                        {{ $registro->pre_31 }}
                    </td>
                    <td>
                        {{ $registro->pre_31_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">VI. CONDICIONES DE TRANSPORTE DE LOS ALIMENTOS</th>
                </tr>
                <tr>
                    <td>32</td>
                    <td>
                        El transporte garantiza el mantenimiento de las condiciones de conservación requeridas para el
                        producto alimenticio: refrigeración, congelación, recipientes o canastillas de material
                        sanitario con tapa, etc., y cumple con la normatividad vigente. (si aplica)
                    </td>
                    <td>
                        {{ $registro->pre_32 }}
                    </td>
                    <td>
                        {{ $registro->pre_32_obs }}
                    </td>
                </tr>
                <tr>
                    <td>33</td>
                    <td>
                        Los vehículos se encuentran en adecuadas condiciones sanitarias, de aseo y operación para el
                        transporte de los alimentos. (Si aplica)
                    </td>
                    <td>
                        {{ $registro->pre_33 }}
                    </td>
                    <td>
                        {{ $registro->pre_33_obs }}
                    </td>
                </tr>
                <tr>
                    <td>34</td>
                    <td>
                        los vehículos son utilizados exclusivamente para el transporte de alimentos y llevan el aviso de
                        transporte de alimentos. (Si aplica)
                    </td>
                    <td>
                        {{ $registro->pre_34 }}
                    </td>
                    <td>
                        {{ $registro->pre_34_obs }}
                    </td>
                </tr>
                <tr>
                    <td>35</td>
                    <td>
                        El transportador y el auxiliar, cuentan con la vestimenta adecuada, de acuerdo a la normatividad
                        sanitaria vigente. (Si aplica)
                    </td>
                    <td>
                        {{ $registro->pre_35 }}
                    </td>
                    <td>
                        {{ $registro->pre_35_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">VII. VERIFICACIÓN DOCUMENTAL / REGISTROS / SOPORTES DE OPERACIÓN BODEGA DE
                        ALMACENAMIENTO</th>
                </tr>
                <tr>
                    <td>36</td>
                    <td>
                        Se implementa el programa de limpieza y desinfección en areas y superficies utilizadas en la
                        bodega, asi como en equipos y utensilios, se evidencian registros de las actividades realizadas.
                    <td>
                        {{ $registro->pre_36 }}
                    </td>
                    <td>
                        {{ $registro->pre_36_obs }}
                    </td>
                </tr>
                <tr>
                    <td>37</td>
                    <td>
                        Se implementa el programa de manejo de residuos solidos, de conformidad a los procedimientos
                        descritos en el documento, se evidencian registros de las actividades realizadas.
                    </td>
                    <td>
                        {{ $registro->pre_37 }}
                    </td>
                    <td>
                        {{ $registro->pre_37_obs }}
                    </td>
                </tr>
                <tr>
                    <td>38</td>
                    <td>
                        Se Implementa el programa de monitoreo y calidad de agua (existencia de tanques de
                        almacenamiento, protección de los mismos, limpieza y desinfección, registros, entre otros
                        aspectos).
                    </td>
                    <td>
                        {{ $registro->pre_38 }}
                    </td>
                    <td>
                        {{ $registro->pre_38_obs }}
                    </td>
                </tr>
                <tr>
                    <td>39</td>
                    <td>
                        No se evidencia presencia fisica, huellas, excremento o daños a los empaques o alimentos
                        causados por plagas, se evidencian soportes y registros de control.
                    </td>
                    <td>
                        {{ $registro->pre_39 }}
                    </td>
                    <td>
                        {{ $registro->pre_39_obs }}
                    </td>
                </tr>
                <tr>
                    <td>40</td>
                    <td>
                        Se cuenta con los soportes de capacitación continua, dirigido al personal manipulador de
                        alimentos de la bodega, en cumplimiento al cronograma establecido en el respectivo programa.
                    </td>
                    <td>
                        {{ $registro->pre_40 }}
                    </td>
                    <td>
                        {{ $registro->pre_40_obs }}
                    </td>
                </tr>
                <tr>
                    <td>41</td>
                    <td>
                        Se evidencia hoja de vida de equipos y soportes de mantenimiento preventivo y/o correctivo, de
                        conformidad a los procedimientos y cronogramas establecidos en el respectivo programa.
                    </td>
                    <td>
                        {{ $registro->pre_41 }}
                    </td>
                    <td>
                        {{ $registro->pre_41_obs }}
                    </td>
                </tr>
                <tr>
                    <td>42</td>
                    <td>
                        Se evidencia hoja de vida de los equipos e instrumentos de medición, ademas de los soportes de
                        calibración a los mismos, de conformidad al cronograma establecido en el respectivo programa.
                    </td>
                    <td>
                        {{ $registro->pre_42 }}
                    </td>
                    <td>
                        {{ $registro->pre_42_obs }}
                    </td>
                </tr>
                <tr>
                    <td>43</td>
                    <td>
                        Se cuenta con la lista e información correspondiente de los proveedores de alimentos.
                    </td>
                    <td>
                        {{ $registro->pre_43 }}
                    </td>
                    <td>
                        {{ $registro->pre_43_obs }}
                    </td>
                </tr>
                <tr>
                    <td>44</td>
                    <td>
                        Se evidencian los registros de control y criterios de calidad, durante el ingreso de los
                        alimentos a la bodega de almacenamiento.
                    </td>
                    <td>
                        {{ $registro->pre_44 }}
                    </td>
                    <td>
                        {{ $registro->pre_44_obs }}
                    </td>
                </tr>
                <tr>
                    <td>45</td>
                    <td>
                        Se llevan los registros con fecha de recepción y cantidades de productos no conformes, de
                        conformidad al criterio de rechazo identificado.
                    </td>
                    <td>
                        {{ $registro->pre_45 }}
                    </td>
                    <td>
                        {{ $registro->pre_45_obs }}
                    </td>
                </tr>
                <tr>
                    <td>46</td>
                    <td>
                        Se lleva un control y registros de la rotación de los alimentos almacenados de acuerdo a su
                        fecha de vencimiento y caracteristicas, de tal manera que se cumpla con la premisa "primeras
                        entradas - primeras salidas" (metodo PEPS).
                    </td>
                    <td>
                        {{ $registro->pre_46 }}
                    </td>
                    <td>
                        {{ $registro->pre_46_obs }}
                    </td>
                </tr>
                <tr>
                    <td>47</td>
                    <td>
                        Se cuenta con registros diarios de verificación de temperatura de los equipos de refrigeración y
                        congelación.
                    </td>
                    <td>
                        {{ $registro->pre_47 }}
                    </td>
                    <td>
                        {{ $registro->pre_47_obs }}
                    </td>
                </tr>
                <tr>
                    <td>48</td>
                    <td>
                        Se cuenta con las fichas técnicas de los alimentos y/o productos almacenados en bodega.
                    </td>
                    <td>
                        {{ $registro->pre_48 }}
                    </td>
                    <td>
                        {{ $registro->pre_48_obs }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4">VIII. VERIFICACIÓN DOCUMENTAL / REGISTROS / SOPORTES DE OPERACIÓN PAE MODALIDADES
                        APS, CCT Y RI</th>
                </tr>
                <tr>
                    <td>49</td>
                    <td>
                        Se informa periodicamente a la entidad territorial (supervisión del programa), el grado de
                        avance operativo del contrato, mediante el sistema de monitoreo y control establecido (Informe
                        de Actividades Obligaciones Contractuales Operador PAE).
                    </td>
                    <td>
                        {{ $registro->pre_49 }}
                    </td>
                    <td>
                        {{ $registro->pre_49_obs }}
                    </td>
                </tr>
                <tr>
                    <td>50</td>
                    <td>
                        Se cuenta con los soportes, sobre las actividades de mantenimiento preventivo de equipos
                        (licuadora, estufa, nevera, olla a presión), para la totalidad de unidades de servicio con
                        modalidad PS, CCT y I de acuerdo al programa establecido y según APU correspondiente.
                    </td>
                    <td>
                        {{ $registro->pre_50 }}
                    </td>
                    <td>
                        {{ $registro->pre_50_obs }}
                    </td>
                </tr>
                <tr>
                    <td>51</td>
                    <td>
                        Se cuenta con los soportes, sobre las actividades de mantenimiento correctivo de equipos
                        (licuadora, estufa, nevera, olla a presión), realizadas al 40% del total de las unidades de
                        servicio con modalidad PS, CCT y I, de acuerdo al programa establecido y según APU
                        correspondiente.
                    </td>
                    <td>
                        {{ $registro->pre_51 }}
                    </td>
                    <td>
                        {{ $registro->pre_51_obs }}
                    </td>
                </tr>
                <tr>
                    <td>52</td>
                    <td>
                        Se cuenta con los soportes sobre las actividades de calibración de equipos e instrumentos de
                        medición (termometros, grameras) realizadas en las unidades de servicio con modalidad PS, CCT y
                        I, de acuerdo al programa establecido.
                    </td>
                    <td>
                        {{ $registro->pre_52 }}
                    </td>
                    <td>
                        {{ $registro->pre_52_obs }}
                    </td>
                </tr>
                <tr>
                    <td>53</td>
                    <td>
                        Cuenta con los soportes de entrega de la dotación y elementos de protección en material
                        antifluido:1 pantalon, 1 camisa, 1 delantal, 1 gorro, 1 tapabocas, 1 par calzado cerrado, al
                        personal manipulador de alimentos en los comedores escolares con modalidad PS, de acuerdo a las
                        cantidades establecidas por la entidad según APU correspondiente (una (1) dotación completa).
                    </td>
                    <td>
                        {{ $registro->pre_53 }}
                    </td>
                    <td>
                        {{ $registro->pre_53_obs }}
                    </td>
                </tr>
                <tr>
                    <td>54</td>
                    <td>
                        Cuenta con los soportes de entrega de la dotación y elementos de protección en material
                        antifluido:1 pantalon, 1 camisa, 1 delantal, 1 gorro, 1 tapabocas, 1 par calzado cerrado, al
                        personal manipulador de alimentos y 1 delantal, 1 gorro, 1 tapabocas al personal auxiliar, de
                        los establecimientos de preparación con modalidad CCT, de acuerdo a las cantidades establecidas
                        por la entidad, según APU correspondiente (una (1) dotación completa).
                    </td>
                    <td>
                        {{ $registro->pre_54 }}
                    </td>
                    <td>
                        {{ $registro->pre_54_obs }}
                    </td>
                </tr>
                <tr>
                    <td>55</td>
                    <td>
                        Cuenta con los soportes de entrega de la dotación y elementos de protección en material
                        antifluido: 1 delantal, 1 gorro, 1 tapabocas, al personal manipulador de alimentos en los
                        establecimientos educativos con modalidad I, de acuerdo a las cantidades establecidas por la
                        entidad según APU correspondiente (una (1) dotación completa).
                    </td>
                    <td>
                        {{ $registro->pre_55 }}
                    </td>
                    <td>
                        {{ $registro->pre_55_obs }}
                    </td>
                </tr>
                <tr>
                    <td>56</td>
                    <td>
                        Se cuenta con los soportes de las actividades realizadas, encuanto a la remisión y entrega de
                        alimentos, efectuados en cada una de las instituciones y sedes educativas del departamento.
                        (formatos diligenciados con sus respectivas firmas de recibido por parte de los responsables).
                    </td>
                    <td>
                        {{ $registro->pre_56 }}
                    </td>
                    <td>
                        {{ $registro->pre_56_obs }}
                    </td>
                </tr>
                <tr>
                    <td>57</td>
                    <td>
                        Se cuenta con los soportes, de las actividades de reposición de productos o entrega de alimentos
                        faltantes, en los comedores escolares y/o establecimientos educativos, (formatos debidamente
                        diligenciado, con sus respectivas firmas).
                    </td>
                    <td>
                        {{ $registro->pre_57 }}
                    </td>
                    <td>
                        {{ $registro->pre_57_obs }}
                    </td>
                </tr>
                <tr>
                    <td>58</td>
                    <td>
                        Se cuenta con las actas de soporte de la entrega de insumos e implementos de aseo, conforme a
                        las cantidades y periodicidad por modalidad de atención (PS, CCT, I), correspondientes a cada
                        uno de las instituciones y sedes educativas beneficiarias del Programa, donde se desarrollan
                        actividades de limpieza y desinfección. Lo anterior según APU correspondiente.
                    </td>
                    <td>
                        {{ $registro->pre_58 }}
                    </td>
                    <td>
                        {{ $registro->pre_58_obs }}
                    </td>
                </tr>
                <tr>
                    <td>59</td>
                    <td>
                        El operador realiza entrega de las acciones de mejora, de acuerdo a los hallazgos evidenciados
                        en campo por la supervisión del Programa.
                    </td>
                    <td>
                        {{ $registro->pre_59 }}
                    </td>
                    <td>
                        {{ $registro->pre_59_obs }}
                    </td>
                </tr>
                <tr>
                    <td>60</td>
                    <td>
                        La carpeta de cada una de las manipuladoras de alimentos por modalidad de atención (PS, CCT, I)
                        cuentan con los examenes medicos (coprológico, KOH (uñas), frotis de garganta), certificados
                        medicos y certificación de asistencia a curso de manipulacion, buenas practicas de manufactura e
                        higiene de los alimentos.
                    </td>
                    <td>
                        {{ $registro->pre_60 }}
                    </td>
                    <td>
                        {{ $registro->pre_60_obs }}
                    </td>
                </tr>
                <tr>
                    <td>61</td>
                    <td>
                        Se reporta a la ETC, los resultados de analisis microbiologicos de las muestras de alimentos:
                        ensalada, jugo, seco y leche en polvo, por modalidad de atención (PS y CCT), conforme al numero
                        de muestras indicadas en el APU correspondiente.
                    </td>
                    <td>
                        {{ $registro->pre_61 }}
                    </td>
                    <td>
                        {{ $registro->pre_61_obs }}
                    </td>
                </tr>
                <tr>
                    <td>62</td>
                    <td>
                        Se reporta a la ETC, los resultados de analisis microbiologicos de las muestras de alimentos:
                        lacteo y cereal, para la modalidad de atención I, conforme al numero de muestras indicadas en el
                        APU correspondiente.
                    </td>
                    <td>
                        {{ $registro->pre_62 }}
                    </td>
                    <td>
                        {{ $registro->pre_62_obs }}
                    </td>
                </tr>
                <tr>
                    <td>63</td>
                    <td>
                        Se desarrollan capacitaciones continuas acorde con el cronograma y la metodologia del plan,
                        sobre prácticas higiénicas en la manipulación de alimentos, preparación, almacenamiento,
                        conservación, rotulado y/o etiquetado, minuta patron, ciclos de menús, estandarización de
                        porciones, diligenciamiento de formatos, manejo de PEPS, plan de saneamiento basico, entre
                        otros. verificación de soportes mediante listados de asistencia, fotos y actas.
                    </td>
                    <td>
                        {{ $registro->pre_63 }}
                    </td>
                    <td>
                        {{ $registro->pre_63_obs }}
                    </td>
                </tr>
                <tr>
                    <td>64</td>
                    <td>
                        La compra de alimentos corresponde a los establecidos en el ciclo de menús dispuestos y aprobado
                        por la ETC.
                    </td>
                    <td>
                        {{ $registro->pre_64 }}
                    </td>
                    <td>
                        {{ $registro->pre_64_obs }}
                    </td>
                </tr>
                <tr>
                    <td>65</td>
                    <td>
                        En el marco del comunicado DAB N° 4000-4113- 2020 del 25 de septiembre del 2020, emitido por el
                        Instituto Nacional de Vigilancia de Medicamentos y Alimentos - INVIMA, el operador cuenta con
                        los soportes respectivos que indican que la carne que se suministra a los beneficiarios del
                        Programa, proviene de establecimientos autorizados por la autoridad competente (guia de
                        transporte, destino de la carne, inscripción y autorización INVIMA o ETS).
                    </td>
                    <td>
                        {{ $registro->pre_65 }}
                    </td>
                    <td>
                        {{ $registro->pre_65_obs }}
                    </td>
                </tr>
                <tr>
                    <td>66</td>
                    <td>
                        La compra de alimentos perecederos se hace máximo para cinco (5) días.
                    </td>
                    <td>
                        {{ $registro->pre_66 }}
                    </td>
                    <td>
                        {{ $registro->pre_66_obs }}
                    </td>
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
                    <th colspan="3">CONCLUSIONES / OBSERVACIONES / RECOMENDACIONES</th>
                </tr>
                <tr>
                    <td colspan="3">{{ $registro->observaciones }}</td>
                </tr>
                <tr>
                    <th colspan="3">OBSERVACIONES DE QUIEN RECIBE LA VISITA</th>
                </tr>
                <tr>
                    <td colspan="3">{{ $registro->observaciones_recibe }}</td>
                </tr>
                <tr>
                    <th>Visita realizada por:</th>
                    <th>Visita realizada por:</th>
                    <th>Visita atendida por:</th>
                </tr>
                <tr>
                    <td><img src="{{ $registro->firma1 }}" style="width: 150px; padding: 5px" /></td>
                    <td><img src="{{ $registro->firma2 }}" style="width: 150px; padding: 5px" /></td>
                    <td><img src="{{ $registro->firma3 }}" style="width: 150px; padding: 5px" /></td>

                </tr>
                <tr>
                    <td>NOMBRE: <strong>{{ $registro->nombre_atiende }}</strong></td>
                    <td>NOMBRE: <strong>{{ $registro->nombre_apoyo }}</strong></td>
                    <td>NOMBRE: <strong>{{ $registro->nombre_apoyo2 }}</strong></td>
                </tr>
                <tr>
                    <td>CEDULA: <strong>{{ $registro->cedula_atiende }}</strong></td>
                    <td>CEDULA: <strong>{{ $registro->cedula_apoyo }}</strong></td>
                    <td>CEDULA: <strong>{{ $registro->cedula_apoyo2 }}</strong></td>
                </tr>
                <tr>
                    <td>CARGO: <strong>{{ $registro->cargo_atiende }}</strong></td>
                    <td>CARGO: <strong>{{ $registro->cargo_apoyo }}</strong></td>
                    <td>CARGO: <strong>{{ $registro->cargo_apoyo2 }}</strong></td>
                </tr>
                <tr>
                    <td>TELEFONO: <strong>{{ $registro->telefono_atiende }}</strong></td>
                    <td>TELEFONO: <strong>{{ $registro->telefono_apoyo }}</strong></td>
                    <td>TELEFONO: <strong>{{ $registro->telefono_apoyo2 }}</strong></td>
            </tbody>
        </table>
    </div>
</body>

</html>
