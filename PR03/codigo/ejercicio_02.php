<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="../webroot/css/style.css">

</head>
<body>
    <h1>Ejercicio 2</h1>

    <a target="_blank" id="idVerCodigo" title="Vér el código PHP" href="codigoPHP.php?paginaPHP=<?php
        $pagina = basename($_SERVER['SCRIPT_FILENAME']);
        echo $pagina;?>"
    >
        Ver codigo</img>
    </a>

    <?php

        echo '<h2>Crea una página a la que se le pase por url una variable con el nombre que quieras 
        y muestre el valor de la variable, si es numérico o no y si lo es, si es entero o float.</h2>';

        $variableRecogida = urlencode($_GET['variable']);

        echo 'La variable recogida es: <b>' . $variableRecogida . '</b>';
        echo '<br>';

        if(!isset($_GET['variable']))
        {
            echo 'La variable recogida tiene valor nulo.<br>';
        }
        else
        {
            // Si es numérica...
            if((is_numeric($variableRecogida)))
            {
                echo 'La variable <b>' . $variableRecogida . '</b> es de tipo numérico.<br>';

                $variableRecogida = $variableRecogida + 0;

                // Si es de tipo entero...
                if(is_integer($variableRecogida))
                {
                    echo 'La variable <b>' . $variableRecogida . '</b> es de tipo entero.<br>';
                }
                // Si es de tipo float...
                elseif(is_float($variableRecogida))
                {
                    echo 'La variable <b>' . $variableRecogida . '</b> es de tipo float.<br>';
                }

            }
            // Si es de tipo String...
            elseif(is_string($variableRecogida))
            {
                echo 'La variable <b>' . $variableRecogida . '</b> es de tipo String.<br>';
            }
           
        }
        
    ?>

</body>
</html>