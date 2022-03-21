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
    <h1>Formulario de Registro</h1>
    <?php
    
    $arrayError=array();
    //array_push($arrayError,"1");
    require "./codigo/validaFormulario.php";
    if(validaFormulario()){
    }else{
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="nombre">Nombre: 
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php rellenaNombre()?>">
                <?php incompleto('nombre')?>
            </label>
            <br>
            <label for="apellido">Apellidos: 
                <input type="text" name="apellido" id="apellido" placeholder="Apellidos" value="<?php rellenaApellido()?>">
                <?php incompleto('apellido')?>
            </label>
            <br>
            <label for="fecha">Fecha:(dd-mm-aaaa) 
                <input type="text" name="fecha" id="fecha" value="<?php rellenaFecha('fecha')?>">
                <?php incompleto('fecha')?>
            </label>
            <br>
            <label for="dni">DNI: 
                <input type="text" name="dni" id="dni" value='<?php rellenaDNI('dni')?>'>
                <?php incompleto('dni')?>
            </label>
            <br>
            <label for="email">Email: 
                <input type="email" name="email" id="email" value='<?php rellenaEmail()?>'>
                <?php incompleto('email')?>
            </label>
            <br>
            
            <input type="submit" name="Enviado" value="Enviar">
        </form>
        <?php
        }
        ?>
</body>
</html>