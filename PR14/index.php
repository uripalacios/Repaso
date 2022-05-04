<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>

    <h1>Principal</h1>

    <?php
        require("./codigo/funcionesBD.php");
        require("./codigo/conexionBD.php");

        

        $dsn = "mysql:host=".IP.";dbname=".BBDD;

        try{
            $conexion = new PDO($dsn,USER,PASS);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Conexión realizada correctamente.<br>";

            echo "<a href='./codigo/leer.php'>Leer Tabla</a>";
            echo "<a href='./codigo/insertar.php'>Insertar Registro</a>";

        }
        catch(PDOException $ex){
            $numError = $ex->getCode();

            if($numError == "42S02"){
                echo "<br>Error: La tabla no existe.<br>";
            }
            
            // Error al no encontrar la BBDD
            if($numError == 1049){
                echo "Error: No se reconoce la BBDD.<br>";
                echo "¿Desea crearla?<br>";
                echo "<a href='./crearBD.php'>Crear Base de Datos</a>";       
            }
            // Error conexion con el servidor con el servidor
            else if($numError == 2002){
                echo "<br>Error: Error al conectar con el servidor.<br>";
            }
            // Error de autenticación...
            else if($numError == 1045){
                echo "<br>Error: Error en la autenticación.<br>";
            }
        }
        finally{
            unset($conexion);
        }

    ?>

</body>
</html>