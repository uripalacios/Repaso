<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>MuestraTabla</title>
</head>
<body>
    <h1>Notas Alumnos</h1>
    <?php

    require "./funcionesCsv.php";

    $contenido=recogeDatos();

    $porAlumno = explode("\n",$contenido);
    
    if(compruebaBoton()){
       
    }

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <table class="table">
            <thead>
                <tr> 
                    <th scope="col">Alumno</th>
                    <th scope="col">nota 1</th>
                    <th scope="col">nota 2</th>
                    <th scope="col">nota 3</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cont=0;
                    foreach ($porAlumno as $value) {
                        $separados = explode(";",$value);
                        echo "<tr>";
                        foreach ($separados as $value) {
                            # code...
                            echo "<td>".$value."</td>";
                        }
                        echo "<input type='hidden' name='contador' value=".$cont.">";
                        echo "<td><input type='submit' name='btn' value='Editar'></td>";
                        echo "</tr>";
                        $cont++;
                    }

                    for ($i=0; $i <count($porAlumno) ; $i++) { 
                        # code...
                        $separados = explode(";",$porAlumno[$i]);
                        echo "<tr>";
                        foreach ($separados as $value) {
                            # code...
                            echo "<td>".$value."</td>";
                        }
                        echo "<input type='hidden' name='contador' value=".$i.">";
                        echo "<td><input type='submit' name='btn' value='Editar'></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </form>
</body>
</html>