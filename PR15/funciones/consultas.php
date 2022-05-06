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
        $prueba = $sql->rowCount();
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
            where codigoPerfil = :perfil or codigoPerfil = todos");
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
        
        // Consulta preparada
        $preparada = $conexion->prepare("insert into usuarios (usuario,email,fecha_nacimiento,clave,perfil) VALUES (?,?,?,?,'U0001')");

        $preparada->bindParam(1,$usuario);
        $preparada->bindParam(2,$email);
        $preparada->bindParam(3,$fecha);
        $preparada->bindParam(4,$pass);

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