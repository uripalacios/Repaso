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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Array multidimensional y Asociativo</title>
</head>
<body>

<?php
echo "<table border='1'>";
            //guardo las cabeceras para despues poder compararlas
            $cabeceras=array();

            $blanco=0;
            echo "<tr><td class='equipos'>Equipos</td>";
            //visualizar la cabecera
            foreach ($liga as $nombEquipoL => $nombEquipoV) {
                echo "<td class='nomb'>".$nombEquipoL."</td>";
                $cabeceras[$blanco]=$nombEquipoL;
                $blanco++;
            }
            echo"</tr>";

            $blanco=0;
            foreach ($liga as $nombEquipoL => $valueEquipoL) {
                //barra lateral
                echo "<tr><td class='nomb'>".$nombEquipoL."</td>";
             
                foreach($valueEquipoL as $nombEquipoV=>$valueEquipoV){
                    if($cabeceras[$blanco]==$nombEquipoL){
                        echo "<td></td>";
                    }
                    echo "<td>";
                    foreach ($valueEquipoV as $datos=>$valor) {
                        switch ($datos) {
                            case "Resultado":
                                echo "<p><span class='verde'>" .  $valor . "<span></p>";
                                break;
                            case "Roja":
                                echo "<p><span class='rojo'>" .$valor."</span>";
                                break;
                            case "Amarilla":
                                echo "<span class='amarillo'>".$valor."</span>";
                                break;
                            case "Penalti":
                                echo "<span class='naranja'>".$valor ."</span></p>";
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


echo "</table>";
//Tabla de clasificacion
echo "<table border ='1'>";
//cabecera de la tabla
$thead=array('Equipos','Puntos','Goles a favor','Goles en contra');

//array que contendra los valores de cada equipo
$resultados=array();
foreach ($cabeceras as $nombEquipoL) {
    # code...
    $resultados[$nombEquipoL]=array();
    $resultados[$nombEquipoL]['Puntos']=0;
    $resultados[$nombEquipoL]['GF']=0;
    $resultados[$nombEquipoL]['GC']=0;
}

//comienzo a recorrer liga hasta llegar a resultado
foreach ($liga as $nombEquipoL => $valueEquipoL) {
    # code...
    foreach ($valueEquipoL as $nombEquipoV => $valueEquipoV) {
        # code...
        foreach ($valueEquipoV as $datos => $value) {
            # code...
            if($datos=='Resultado'){
                $result=explode('-',$value);
                if($result[0]>$result[1]){
                    //Victoria Local
                    //asigno puntuacion a equipoL
                    $resultados[$nombEquipoL]['Puntos']+=3;
                    
                }elseif($result[0]<$result[1]){
                    //Victoria Visitante
                    //asigno puntuacion a equipoV
                    $resultados[$nombEquipoV]['Puntos']+=3;
                }else{
                    //Entraria en caso de empate
                    //Asigno a los dos equipos
                    $resultados[$nombEquipoL]['Puntos']+=1;
                    $resultados[$nombEquipoV]['Puntos']+=1;
                }
                //Goles de cada equipo
                //sumo los goles a favor a local
                $resultados[$nombEquipoL]['GF']+=$result[0];
                //sumo los goles en contra a local
                $resultados[$nombEquipoL]['GC']+=$result[1];
                //sumo los goles a favor a visitante
                $resultados[$nombEquipoV]['GF']+=$result[1];
                //sumo los goles en contra a visitante
                $resultados[$nombEquipoV]['GC']+=$result[0];
            }
        }
    }
}
//Comienzo de la tabla

echo "<tr>";
foreach ($thead as $texto) {
    echo "<td class='nomb'>".$texto."</td>";
}
echo "</tr>";
foreach ($resultados as $nombEquipoL => $valueEquipoL) {
    # code...
    echo "<tr><td class='nomb'>".$nombEquipoL."</td>";
    foreach ($valueEquipoL as $key => $value) {
        # code...
        echo "<td>".$value."</td>";
    }
    echo"</tr>";
}
?>
</body>
</html>

