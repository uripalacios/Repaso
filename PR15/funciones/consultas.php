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
        $sql -> bindParam(":pass",$encrip);
        $sql->execute();
        //si coincide un valor entra y  le asignamos los datos que vamos a necesitar
        if($sql->rowCount()==1){
            session_start();
            //super sesion nombre, usuario y perfil
            $row = $sql->fetch();
            //devolveremos validada para poder acceder a la pagina
            $_SESSION['validada']=true;
            $_SESSION['usuario']= $row['usuario'];
            $_SESSION['nombre']= $row['nombre'];
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