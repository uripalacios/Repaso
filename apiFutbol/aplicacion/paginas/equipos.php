<?php
require "../funciones/curl.php";
session_start();


if(isset($_POST['eliminar'])){
    deleteEquipo($_POST['id']);
    $lista = getEquipos();
    $lista = json_decode($lista,true);
   
}else if(isset($_POST['ver'])){

    $_SESSION['idEquipo']=$_POST['id'];
    
    header("Location: ./jugadores.php");
    
}else if(isset($_POST['nuevoEquipo'])){
    header("Location: ./nuevoEquipo.php");
    
}else{
    $lista = getEquipos();
    $lista = json_decode($lista,true);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Equipos</title>
</head>
<body>
<h1>Equipos</h1>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <?php


    if(isset($lista))
    {            
        if(count($lista) > 0)
        {echo "<table class='table'>";
            echo "<thead>";
            echo "<th scope='col'>Codigo de Equipo</th>";
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Localidad</th>";
            echo "<th scope='col'>Ver</th>";
            echo "<th scope='col'>Eliminar</th>";
            echo "</thead><tbody>";
            foreach ($lista as $value) 
            {
                
                echo "<tr>";
                //columna aula
                echo "<td>" . $value["codEquipo"] . "</td>";
                
                //columna equipo
                echo "<td>" . $value["nombre"] . "</td>";
                
                //columna descripcion
                echo "<td>" . $value["localidad"] . "</td>";
                
                echo "<td>";
            ?>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $value["codEquipo"] ?>">
                    <input type="submit" value="Ver" name="ver">
                    </td><td>
                    <input type="submit" value="Eliminar" name="eliminar">
                </form>
            <?php
                echo "</td>";
            }
            echo "</tbody>";
            echo "</table>";
            ?>
            <input type="submit" value="Nuevo equipo" name="nuevoEquipo">
            <?php
        }
        else
        {
            echo "<h3>No se han encontrado Equipos</h3>";
        }
    }
    else
    {
        echo "<h3>No se han encontrado Equipos</h3>";
    }
?>
</form>

</body>
</html>