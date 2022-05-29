<?php
require "../funciones/curl.php";
require "../funciones/validarJugador.php";
session_start();


if(isset($_POST['eliminar'])){
    deleteJugador($_POST['id']);
    $lista = getJugadores();
    $lista = json_decode($lista,true);
    
}else if(isset($_POST['filtrar'])){
    if(!empty($_POST['seleccione']||!empty($_POST['nombreJugador'])&&$_POST['seleccione']!="0")){
        $filtro="";
        if(!empty($_POST['seleccione']&&!empty($_POST['nombreJugador']))){
            $filtro = "?nombre=".$_POST['nombreJugador']."&posicion=".$_POST['seleccione'];
        }else if(!empty($_POST['seleccione']&&empty($_POST['nombreJugador']))){
            $filtro = "?posicion=".$_POST['seleccione'];
        }else{
            $filtro = "?nombre=".$_POST['nombreJugador'];
        }
        $lista = getFiltros($filtro);
        $lista = json_decode($lista,true);

    }else{
        $lista = getJugadores();
        $lista = json_decode($lista,true);
    }
    
}else if(isset($_POST['nuevoJugador'])){
    header("Location: ./nuevoJugador.php");
    exit;
}else if(isset($_SESSION['idEquipo'])){
    $lista = getJudadorEquipo($_SESSION['idEquipo']);
    $lista = json_decode($lista,true);
    unset($_SESSION['idEquipo']);
}else{
    $lista = getJugadores();
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
    <title>Jugadores</title>
</head>
<body>
<h1>Jugadores</h1>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<label for="nombreJugador">Nombre:
    <input type="text" name="nombreJugador" id="nombreJugador">
</label>
<label for="seleccione">Posicion:</label>
<select name="seleccione">
    <option value="0"<?php rellenaCombo('0')?>>Seleccione</option> 
    <option value="delantero"<?php rellenaCombo('delantero')?>>delantero</option> 
    <option value="medio"<?php rellenaCombo('medio')?>>medio</option> 
    <option value="defensa"<?php rellenaCombo('defensa')?>>defensa</option>
</select>
<input type="submit" value="filtrar" name="filtrar">
</form>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <?php


    if(isset($lista))
    {            
        if(count($lista) > 0)
        {echo "<table class='table'>";
            echo "<thead>";
            echo "<th scope='col'>Codigo de Jugador</th>";
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Posicion</th>";
            echo "<th scope='col'>Sueldo</th>";
            echo "<th scope='col'>Codigo de Equipo</th>";
            echo "<th scope='col'>Eliminar</th>";
            echo "</thead><tbody>";
            foreach ($lista as $value) 
            {
                
                echo "<tr>";
                //columna aula
                echo "<td>" . $value["codJugador"] . "</td>";
                
                //columna equipo
                echo "<td>" . $value["nombre"] . "</td>";
                
                //columna descripcion
                echo "<td>" . $value["posicion"] . "</td>";

                //columna aula
                echo "<td>" . $value["sueldo"] . "</td>";
                
                //columna equipo
                echo "<td>" . $value["codEquipo"] . "</td>";
                
                echo "<td>";
            ?>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $value["codJugador"] ?>">
                    <input type="submit" value="Eliminar" name="eliminar">
                </form>
            <?php
                echo "</td>";
            }
            echo "</tbody>";
            echo "</table>";
            ?>
            <input type="submit" value="Nuevo jugador" name="nuevoJugador">
            <?php
        }
        else
        {
            echo "<h3>No se han encontrado Jugadores</h3>";
        }
    }
    else
    {
        echo "<h3>No se han encontrado Jugadores</h3>";
    }
?>
</form>

</body>
</html>