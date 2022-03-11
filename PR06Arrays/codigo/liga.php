<?php
$liga =
    array(
        "Zamora" =>  array(
            "Salamanca" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
            )
        ),
        "Salamanca" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
            )
        ),
        "Avila" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
            ),
            "Salamanca" => array(
                "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
            )
        ),
        "Valladolid" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Salamanca" => array(
                "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
            )
        ),
    );

echo "<table border='1'><thead>";
            //guardo las cabeceras para despues poder compararlas
            $cabeceras=array();

            $blanco=0;
            echo "<tr><th>Equipos</th>";
            //visualizar la cabezera
            foreach ($liga as $nombEquipoL => $nombEquipoV) {
                echo "<th>".$nombEquipoL."</th>";
                $cabeceras[$blanco]=$nombEquipoL;
                $blanco++;
            }
            echo"</tr>";
echo"</thead><tbody>";
            $blanco=0;
            foreach ($liga as $nombEquipoL => $valueEquipoL) {
                //barra lateral
                echo "<tr><td>".$nombEquipoL."</td>";
             
                foreach($valueEquipoL as $nombEquipoV=>$valueEquipoV){
                    if($cabeceras[$blanco]==$nombEquipoL){
                        echo "<td></td>";
                    }
                    echo "<td>";
                    foreach ($valueEquipoV as $datos=>$valor) {
                        switch ($datos) {
                            case "Resultado":
                                echo "<p>" .  $valor . "</p>";
                                break;
                            case "Roja":
                                echo "<p>" .$valor;
                                break;
                            case "Amarilla":
                                echo $valor;
                                break;
                            case "Penalti":
                                echo $valor ."</p>";
                                break;
                        }
                    
                    }
                    echo "</td>";
                    $blanco++;
                }
                $blanco=0;
                if($nombEquipoL == $cabeceras[3]){
                    echo "<td></td>";
                }
                echo"</tr>";
            }


echo "</tbody></table>";
//Tabla de clasificacion
echo "<table border ='1'>";
//cabecera de la tabla
$thead=array('Equipos','Puntos','Goles a favor','Goles en contra');
$puntos=0;
$golFavor=0;
$golContra=0;

//Comienzo de la tabla

echo "<tr>";
foreach ($thead as $texto) {
    echo "<td>".$texto."</td>";
}
echo "</tr>";

//contenido de la cabecera

