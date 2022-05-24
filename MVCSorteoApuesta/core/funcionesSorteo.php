<?php

    // Funcion que genera 5 números aleatorios entre un minimo y un máximo dados
    function generaAleatorios()
    {
        $arrayAleatorios = [];

        $contador = 0;

        while($contador != 5)
        {   
            // Genero el aleatorio
            $num = rand(0,50);

            if(!in_array($num,$arrayAleatorios))
            {
                array_push($arrayAleatorios,$num);
                $contador++;
            }
        }

        return $arrayAleatorios;

    }
?>