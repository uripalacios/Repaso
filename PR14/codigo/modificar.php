<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar fruta</title>
</head>
<body>
    <h1>Modificar</h1>

</body>
</html>
<?php
    require "./funcionesBD.php";
    require "./conexionBD.php";
?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="id">Id:
            <input type="text" name="id" id="id" value="<?php echo $_REQUEST['id']?>" readonly>
        </label>
        <br>
        <label for="nombre">Nombre:
            <input type="text" name="nombre" id="nombre" value="<?php echo $_REQUEST['nombre']?>">
        </label>
        <br>
        <label for="precio">Precio:
            <input type="text" name="precio" id="precio" value="<?php echo $_REQUEST['precio']?>">
        </label>
        <br>
        <label for="fecha">Fecha:
            <input type="text" name="fecha" id="fecha" value="<?php echo $_REQUEST['fecha']?>">
        </label>
        <br>
        <input type="submit" value="modificar" name="btn">
    </form>
<?php

    if(!empty($_POST['btn'])){
        if($_POST['btn']=="modificar"){
            modificarRegistro($_POST['id'],$_POST['nombre'],$_POST['precio'],$_POST['fecha']);
        }
    }
?>