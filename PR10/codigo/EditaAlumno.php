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
    <h1>Edita Alumno</h1>
    <?php 
    require "./funcionesCsv.php";
    $contenido=recogeDatos();

    $porAlumno = explode("\n",$contenido);
    echo $_REQUEST['contador'];
    $datos = explode(";",$porAlumno[$_REQUEST['contador']]);

    if(compruebaBoton()){
       
    }

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="contenido">Contenido de Fichero: 
            <br> 
            <input type="hidden" name="contador" value="<?php echo $_REQUEST['contador']?>">
        </label>
        <label for="nombre">Nombre: 
            <input type="text" name="nombre" id="nombre" readonly value="<?php echo $datos[0]?>">
        </label>
        <br>
        <label for="nt1">Notas 1: 
            <input type="text" name="nt1" id="nt1" value="<?php echo $datos[1]?>">
        </label>
        <br>
        <label for="nt2">Notas 2: 
            <input type="text" name="nt2" id="nt2" value="<?php echo $datos[2]?>">
        </label>
        <br>
        <label for="nt3">Notas 3: 
            <input type="text" name="nt3" id="nt3" value="<?php echo $datos[3]?>">
        </label>
        <br>
        
        <input type="submit" name="btn" value="Modificar">
    </form>
    <?php 