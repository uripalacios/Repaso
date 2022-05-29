<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="../webroot/css/style.css">

</head>
<body>
    <h1>Ejercicio 1</h1>

 
    <a target="_blank" id="idVerCodigo" title="Vér el código PHP" href="codigoPHP.php?paginaPHP=<?php
        $pagina = basename($_SERVER['SCRIPT_FILENAME']);
        echo $pagina;?>"
    >
       Ver codigo</img>
    </a>

    <?php

        // a)
        echo '<h2>a) Muestra el nombre del fichero que se está ejecutando.</h2>';

        $nombre_fichero = basename($_SERVER['SCRIPT_FILENAME']);
        echo "<p>El nombre del fichero que se está ejecutando es: <b>" . $nombre_fichero . "</b></p>";

        // b)
        echo '<h2>b) Muestra la dirección IP del equipo desde el que estás accediendo.</h2>';

        $ipEquipo = basename($_SERVER['REMOTE_ADDR']);
        echo "<p>La dirección IP del equipo desde el que estás accediendo es: <b>" . $ipEquipo . "</b></p>";

        // c)
        echo '<h2>c) Muestra el path donde se encuentra el fichero que se está ejecutando.</h2>';

        $pathFichero = $_SERVER['SCRIPT_FILENAME'];
        echo "<p>El path donde se encuentra el fichero que se está ejecutando es: <b>" . $pathFichero . "</b></p>";

        // d)
        echo '<h2>d) Muestra la fecha y hora actual formateada en 2021-10-5 19:17:18.</h2>';
        
        // La establezco en Madrid
        date_default_timezone_set('Europe/Madrid');

        echo 'La fecha y hora actual es: <b>' . date('y-m-d h:i:s',time()) . '</b>';

        // e)
        echo '<h2>e) Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de mes,día de año, hh:mm:ss, Zona horaria).</h2>';

        // La establezco en Oporto
        date_default_timezone_set('Europe/Lisbon');

        // Se recoge la fecha actual en un array
        $arrayFecha = getdate(time());

        // Se recoge cada elemento
        $diaSemana = $arrayFecha['weekday'];
        $diaMes = $arrayFecha['mday'];
        $mes = $arrayFecha['mon'];
        $año = $arrayFecha['year'];
        $zonaHoraria = date_default_timezone_get();
        $segundosTranscurridos = time();

        echo 'La fecha y hora actual en Oporto es: <b>' . $diaSemana . " " . $diaMes . 
            " del " . $mes . " de " . $año . "</b> con hora: <b>" . date('h:i:s',time()) 
            . ' </b>con zona horaria <b>' . $zonaHoraria . '</b>';

        // f)
        echo '<h2>f) Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyy de tu cumpleaños.</h2>';

        $cumple = strtotime('07/27/01');
        echo 'Mi cumpleaños es el: <b>' . date('d-m-y',$cumple) 
            . ' </b>y el timestamp (sg transcurridos) es <b>' . $segundosTranscurridos ."</b>";

        // g)
        echo '<h2>g) Calcular la fecha y el día de la semana dentro de 60 días.</h2>';

        // Fecha dentro de 60 dias
        $nuevaFecha = getdate(strtotime("+ 60 day"));

        $diaSemana = $nuevaFecha['weekday'];
        $diaMes = $nuevaFecha['mday'];
        $mes = $nuevaFecha['mon'];
        $año = $nuevaFecha['year'];

        echo 'La fecha dentro de 60 días es: <b>' . $diaSemana . " " . $diaMes . 
            " del " . $mes . " de " . $año . '</b>';
    ?>


</body>
</html>