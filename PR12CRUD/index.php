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
    require "./codigo/seguro/conexionBD.php";
    require "./codigo/funcionesBD.php";
    
    $arrayError=array();
    
    if(sinConexionBBDD() && !conexionBBDD()){
        if(!compruebaBoton())
            crearBoton();
        
        
    }
    if(conexionBBDD()){
        compruebaBoton();
        echo "<form action=".$_SERVER['PHP_SELF']." method='post'>";
        echo "<input type='submit' name='btn' value='Leer tabla'>";
        echo "<input type='submit' name='btn' value='Insertar nuevo'>";
        echo "</form>";
    }
    ?>
    
</body>
</html>