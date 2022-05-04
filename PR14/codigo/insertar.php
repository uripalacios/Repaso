<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../webroot/css/style.css">
    <title>Insertar</title>
</head>
<body>
    <?php
        $arrayError=array();
        require "./funcionesBD.php";
        require "./conexionBD.php";
        require "./funciones.php";

        if(!empty($_POST['btn'])&&validaFormulario($arrayError)){
            if($_POST['btn']=="insertar"){
                insertarRegistro($_POST['nombre'],$_POST['precio'],$_POST['fecha']);
            }
        }else{
    ?>
    <h1>Insertar nuevo registro</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="nombre">Nombre:
            <input type="text" name="nombre" id="nombre" value="<?php rellenaAlfabetico()?>">
            <?php incompleto('nombre')?>
        </label>
        <br>
        <label for="precio">Precio:
            <input type="text" name="precio" id="precio" value="<?php rellenaPrecio()?>">
            <?php incompleto('precio')?>
        </label>
        <br>
        <label for="fecha">Fecha:
            <input type="text" name="fecha" id="fecha" value="<?php rellenaFecha()?>">
            <?php incompleto('fecha')?>
        </label>
        <br>
        <input type="submit" value="insertar" name="btn">
    </form>
    <?php
        }
    ?>
</body>
</html>