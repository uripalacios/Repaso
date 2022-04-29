<?php

// Funcion que muestra la tabla
function muestraTabla($filtraNombre,$nombreBuscar){
    
    // DSN
    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    try{

        $conexion = new PDO($dsn,USER,PASS);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Si se quiere filtrar por nombre...
        if($filtraNombre == true){
            // Consulta
            $sql = "select * from PRODUCTOS where NOMBRE LIKE :NOMBRE;" ;

            $nombreBuscar = "%" . $nombreBuscar . "%";

            // Consulta preparada
            $preparada = $conexion->prepare($sql);

            $preparada->bindParam(":NOMBRE",$nombreBuscar);
            
            $preparada->execute();

            // Tabla
            echo "<br><br>";

            echo "<table border='1'>";
            echo "<thead>";

            // Primera Fila
            echo "<td><b>ID</b></td>";
            echo "<td><b>NOMBRE</b></td>";
            echo "<td><b>PRECIO</b></td>";
            echo "<td><b>FECHA DE CADUCIDAD</b></td>";
            echo "<td><b>MODIFICAR</b></td>";
            echo "<td><b>ELIMINAR</b></td>";
            echo "</thead>";

            echo "<tr>";

            while($fila = $preparada->fetch()){
                // ID
                echo "<td>";
                echo $fila["ID"];
                echo "</td>";

                // NOMBRE
                echo "<td>";
                echo $fila["NOMBRE"];
                echo "</td>";
                
                // PRECIO
                echo "<td>";
                echo $fila["PRECIO"];
                echo " €</td>";
            
                // FECHA
                echo "<td>";
                echo $fila["FECHA_CADUCIDAD"];
                echo "</td>";
                
                // Modificar
                echo "<td><a href='modificar.php?id=" . $fila['ID'] . "&nombre=" . $fila['NOMBRE'] 
                    . "&precio=" . $fila['PRECIO'] 
                    . "&fecha=" . $fila['FECHA_CADUCIDAD'] . "'>Modificar</a></td>";

                // ELiminar
                echo "<td><a href='eliminar.php?id=" . $fila['ID'] . "'>Eliminar</a></td>";
                echo "</tr>";
            }

            echo "</tr>";

            // Fin de la tabla        
            echo"</table>";
            echo "<br><br>";

        }
        // Si se quieren mostrar todos los registros...
        else if($filtraNombre == false){
            $sql = "select * from PRODUCTOS;";

            $resultado = $conexion->query($sql);

            // Tabla
            echo "<br><br>";
            echo "<table class='table'>";
            echo "<thead>";

            // Primera Fila
            echo "<th scope='col'>ID</th>";
            echo "<th scope='col'>NOMBRE</th>";
            echo "<th scope='col'>PRECIO</th>";
            echo "<th scope='col'>FECHA DE CADUCIDAD</b></th>";
            echo "<th scope='col'>MODIFICAR</th>";
            echo "<th scope='col'>ELIMINAR</th>";
            echo "</thead><tbody>";

            echo "<tr>";

            while($fila = $resultado->fetch()){
                // ID
                echo "<td>";
                echo $fila["ID"];
                echo "</td>";

                // NOMBRE
                echo "<td>";
                echo $fila["NOMBRE"];
                echo "</td>";
                
                // PRECIO
                echo "<td>";
                echo $fila["PRECIO"];
                echo " €</td>";
            
                // FECHA
                echo "<td>";
                echo $fila["FECHA_CADUCIDAD"];
                echo "</td>";
                
                // Modificar
                echo "<td><a href='modificar.php?id=" . $fila['ID'] . "&nombre=" . $fila['NOMBRE'] 
                    . "&precio=" . $fila['PRECIO'] 
                    . "&fecha=" . $fila['FECHA_CADUCIDAD'] . "'>Modificar</a></td>";

                // ELiminar
                echo "<td><a href='eliminar.php?id=" . $fila['ID'] . "'>Eliminar</a></td>";
                echo "</tr>";
            }

            echo "</tr>";

            // Fin de la tabla        
            echo"</tbody></table>";
            echo "<br><br>";

        }
        

    }
    catch(PDOException $ex){
        $numError = $ex->getCode();

        // Si no existe la tabla...
        if($numError == "42S02"){
            echo "<br>Error: La tabla no existe.<br>";
        }
        
        // Error al no reconocer la BBDD
        if($numError == 1049){
            echo "<br>Error: No se reconoce la BBDD.<br>";
        }
        // Error al conectar con el servidor...
        else if($numError == 2002){
            echo "<br>Error: Error al conectar con el servidor.<br>";
        }
        // Error de autenticación...
        else if($numError == 1045){
            echo "<br>Error: Error en la autenticación.<br>";
        }
    }
    finally{
        // Cierro la conexion
        unset($conexion);
    }

}

// Funcion que modifica un registro existente en la BBDD
function modificarRegistro($id,$nombre,$precio,$fecha)
{   

    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    try{

        $conexion = new PDO($dsn,USER,PASS);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consulta preparada
        $preparada = $conexion->prepare("update PRODUCTOS set NOMBRE=?, PRECIO=?,
        FECHA_CADUCIDAD=? where ID=?;");

        $preparada->bindParam(1,$nombre);
        $preparada->bindParam(2,$precio);
        $preparada->bindParam(3,$fecha);
        $preparada->bindParam(4,$id);

        $preparada->execute();

    }catch(PDOException $ex){
        $numError = $ex->getCode();

        // Si no existe la tabla...
        if($numError == "42S02"){
            echo "<br>Error: La tabla no existe.<br>";
        }
        
        // Error al no reconocer la BBDD
        if($numError == 1049){
            echo "<br>Error: No se reconoce la BBDD.<br>";
        }
        // Error al conectar con el servidor...
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

    // Se vuelve de nuevo a leer.php
    header("Location: leer.php");

}

// Funcion que modifica un registro existente en la BBDD
function insertarRegistro($nombre,$precio,$fecha){   

    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    try{

        $conexion = new PDO($dsn,USER,PASS);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Todo okey";
        
        // Consulta preparada
        $preparada = $conexion->prepare("insert into PRODUCTOS (NOMBRE,PRECIO,FECHA_CADUCIDAD) VALUES (?,?,?)");

        $preparada->bindParam(1,$nombre);
        $preparada->bindParam(2,$precio);
        $preparada->bindParam(3,$fecha);

        $preparada->execute();

    }catch(PDOException $ex){
        $numError = $ex->getCode();

        // Si no existe la tabla...
        if($numError == "42S02"){
            echo "<br>Error: La tabla no existe.<br>";
        }
        
        // Error al no reconocer la BBDD
        if($numError == 1049){
            echo "<br>Error: No se reconoce la BBDD.<br>";
        }
        // Error al conectar con el servidor...
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

    header("Location: leer.php");        
        
}
function borrarRegistro($id)
{   

    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    try{

        $conexion = new PDO($dsn,USER,PASS);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consulta preparada
        $preparada = $conexion->prepare("delete from PRODUCTOS where ID=?;");

        $preparada->bindParam(1,$id);
        $preparada->execute();

    }catch(PDOException $ex){
        $numError = $ex->getCode();

        // Si no existe la tabla...
        if($numError == "42S02"){
            echo "<br>Error: La tabla no existe.<br>";
        }
        
        // Error al no reconocer la BBDD
        if($numError == 1049){
            echo "<br>Error: No se reconoce la BBDD.<br>";
        }
        // Error al conectar con el servidor...
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

    // Se vuelve de nuevo a leer.php
    header("Location: leer.php");

}

?>