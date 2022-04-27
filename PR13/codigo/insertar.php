<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
</head>
<body>
    <h1>Insertar nuevo registro</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="id">Id:
            <input type="text" name="id" id="id">
        </label>
        <br>
        <label for="nombre">Nombre:
            <input type="text" name="nombre" id="nombre">
        </label>
        <br>
        <label for="precio">Precio:
            <input type="text" name="precio" id="precio">
        </label>
        <br>
        <label for="fecha">Fecha:
            <input type="text" name="fecha" id="fecha" value="<?php echo $_REQUEST['fecha']?>">
        </label>
        <br>
        <input type="submit" value="modificar" name="btn">
    </form>
    <?php

    ?>
</body>
</html>