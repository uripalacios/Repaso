<?php

    // Funcion que genera 50 checkbox
    function generaCheck($apuesta)
    {
        if($apuesta)
        {
            // Recojo los nº de la apuesta
            $n1 = $apuesta->n1;
            $n2 = $apuesta->n2;
            $n3 = $apuesta->n3;
            $n4 = $apuesta->n4;
            $n5 = $apuesta->n5;

            $arrayApuestas = [];
            
            array_push($arrayApuestas,$n1);
            array_push($arrayApuestas,$n2);
            array_push($arrayApuestas,$n3);
            array_push($arrayApuestas,$n4);
            array_push($arrayApuestas,$n5);
            
        }

        if($apuesta)
        {
            for ($i=1; $i <= 50; $i++) 
            { 
                if(in_array($i,$arrayApuestas))
                {
                    echo "<input type='checkbox' checked name='checks[]' id='" . $i . "' value='" . $i . "' " . guardaValorCheck('checks',$i,$i) . ">";
                    echo "<label>" . $i . "</label>";
                }
                else
                {
                    echo "<input type='checkbox' name='checks[]' id='" . $i . "' value='" . $i . "' " . guardaValorCheck('checks',$i,$i) . ">";
                    echo "<label>" . $i . "</label>";
                }

            }
        }
        else
        {
            for ($i=1; $i <= 50; $i++) 
            {
                echo "<input type='checkbox' name='checks[]' id='" . $i . "' value='" . $i . "' " . guardaValorCheck('checks',$i,$i) . ">";
                echo "<label>" . $i . "</label>";
            }
        }

        /*
        for ($i=1; $i <= 50; $i++) 
        { 
            echo "<input type='checkbox' name='checks' id='" . $i . "' value='" . $i . "' " . guardaValorCheck('checks',$i,$i) . ">";
            echo "<label>" . $i . "</label>";
        }
        */
    }

    // Funcion que guarda los check seleccionados
    function guardaValorCheck($check, $valor, $posicion)
    {
        if ((isset($_REQUEST[$check]) && (isset($_REQUEST['Enviado'])))) 
        {
            $arrayCheck = $_REQUEST[$check];

            for ($i = 0; $i < count($arrayCheck); $i++) {
                if ($arrayCheck[$i] == $valor) {
                    echo ' checked';
                }
            }
        }
    }

    // Funcion que comprueba los check
    function compruebaCheck($campo)
    {
        $correcto = true;

        // Si no se ha seleccionado ningun check...
        if ((!isset($_REQUEST[$campo])))
        {
            $correcto = false;

            // Muestro un mensaje de error
            ?>
                <label style="color:red;"><?php echo "Debe seleccionar 5 checks" ?></label>
            <?php
        }
        // 5 check maximo
        else if (isset($_REQUEST[$campo]))
        {
            
            if ((count($_REQUEST[$campo]) > 5) || (count($_REQUEST[$campo]) < 1)) 
            {
                $correcto = false;

                ?>
                    <label style="color:red;"><?php echo "Debe seleccionar 5 checks" ?></label>
                <?php
            }
              
        }

        return $correcto;
        
    }
?>
