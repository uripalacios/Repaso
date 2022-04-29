<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Leer</title>
</head>
<body>
    <h1>Lectura de tabla</h1>
    <?php
        require "./funcionesBD.php";
        require "./conexionBD.php";
    ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="nombre">Buscador de frutas:
                <input type="text" name="nombre" id="nombre">
            </label>
            <input type="submit" value="buscar" name="btn">
        </form>
    <?php
    if(!empty($_POST['btn'])){
        if($_POST['btn']== "buscar"){
            muestraTabla(true,$_POST['nombre']);
        }
    }else{
        // Muestro la tabla con todos los registros
        muestraTabla(false,"");
    }
    

    ?>

    <a href="insertar.php">Insertar nuevo registro</a>
</body>
</html>