<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../webroot/css/style.css">
    <title>Practica 10</title>
</head>
<body>
    <h1>Edita fichero</h1>
    <?php 
    require "./controlador.php";
    
    if(compruebaBoton()){
       
    }

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="contenido">Contenido de Fichero: 
            <br> 
            <input type="hidden" name="ficheros" value="<?php echo $_REQUEST['ficheros']?>">
            <textarea name="contenido" id="contenido" cols="30" rows="10"><?php 
            if(existeFichero()){
                $f=leeFichero();
                $contenido=fread($f,filesize($_GET['ficheros'])); 
                echo $contenido;
                fclose($f);
            }
            ?></textarea>
        </label>
        <br>
        <input type="submit" name="btn" value="Modificar">
        <input type="submit" name="btn" value="Inicio">
    </form>
    <?php 