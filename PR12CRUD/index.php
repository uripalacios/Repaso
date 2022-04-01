<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./webroot/css/style.css">
    <title>PR12 CRUD</title>
</head>
<body>
    <?php
    require "./codigo/conexionBD.php";
    require "./codigo/funcionesBD.php";
    $arrayError=array();
    
    if(sinConexionBBDD()){
        crearBoton();
    }else{
        echo "<a href='./Leer.php'><input type='submit' value='Leer tabla'></a>";
        if(conexionBBDD()&&validaForm()){
            update();
            header("Location: ./Leer.php");
        }else{
            ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="nombre">Nombre: 
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php rellenaNombre()?>">
                <?php incompleto('nombre')?>
            </label>
            <br>
            <label for="fecha">Fecha Nacimiento:(aaaa-mm-dd) 
                <input type="text" name="fecha" id="fecha" value="<?php rellenaFecha('fecha')?>">
                <?php incompleto('fecha')?>
            </label>
            <br>
            <label for="tel">Telefono: 
                <input type="text" name="tel" id="tel" value='<?php rellenaTel('tel')?>'>
                <?php incompleto('tel')?>
            </label>
            <label for="media">Media de las notas: 
                <input type="text" name="media" id="media" value='<?php rellenaMedia('media')?>'>
                <?php incompleto('media')?>
            </label>
            <br>
        </form>
            <?php
        }
    }
    ?>
    
</body>
</html>