<?php

function valida($user,$pass){
    try{
        $con = new PDO("mysql:host=".IP.";dbname=".BBDD,USER,PASS);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("select * from usuarios where usuario = :user and clave = :pass");
        //pasamos primer parametro
        $sql->bindParam(":user",$user);
        //encriptamos y pasamos el segundo
        $encrip = sha1($pass);
        $sql->bindParam(":pass",$encrip);
        $sql->execute();
        //$prueba = $sql->rowCount();
        //si coincide un valor entra y  le asignamos los datos que vamos a necesitar
        if($sql->rowCount()==1){
            session_start();
            //super sesion nombre, usuario y perfil
            $row = $sql->fetch();
            //devolveremos validada para poder acceder a la pagina
            $_SESSION['validada']=true;
            $_SESSION['usuario']= $row['usuario'];
            $_SESSION['perfil']= $row['perfil'];

            //paginas a las que tiene acceso
            $sqlp =$con->prepare( "select descripcion,url
            from paginas p join accede a on (p.codigo=a.codigoPagina)
            where codigoPerfil = :perfil or codigoPerfil = 'todos'");
            $sqlp->bindParam(":perfil",$_SESSION['perfil']);
            $sqlp->execute();

            $paginas = array();
            while($row = $sqlp->fetch()){
                $paginas[$row[0]]=$row[1];
            }
            $_SESSION['paginas']=$paginas;
            
            //cierre conexion
            unset($con);
            return true;
        }else{
            unset($con);
            return false;
        }
    }catch(PDOException $ex){

    }
}
function insertarRegistro($usuario,$email,$fecha,$pass){   

    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    try{

        $conexion = new PDO($dsn,USER,PASS);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Todo okey";
        $encrip = sha1($pass);
        // Consulta preparada
        $preparada = $conexion->prepare("insert into usuarios (usuario,email,fecha_nacimiento,clave,perfil) VALUES (?,?,?,?,'U0001')");

        $preparada->bindParam(1,$usuario);
        $preparada->bindParam(2,$email);
        $preparada->bindParam(3,$fecha);
        $preparada->bindParam(4,$encrip);

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
        
}
function mostrarProductos(){
 
    // DSN
    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    try{

        $conexion = new PDO($dsn,USER,PASS);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Si se quiere filtrar por nombre...
       
        // Si se quieren mostrar todos los registros...
       
            $sql = "select * from productos;";

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