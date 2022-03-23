<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./webroot/css/style.css">
    <title>Practica 09</title>
</head>
<body>
    <h1>Elige un fichero</h1>
    <?php 
    $arrayError=array();
    require "./validaFormulario.php";
    require "./controlador.php";

    if(validaFormulario()){
        if(compruebaBoton()){

        }
    }else{
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="nombre">Nombre del fichero: 
            <input type="text" name="nombre" id="nombre" placeholder="Nombre Fichero">
            <?php incompleto('nombre')?>
        </label>
        <input type="submit" name="btn" value="Editar">
        <input type="submit" name="btn" value="Leer">
    </form>
    <?php 
    }