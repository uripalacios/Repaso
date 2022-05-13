<?php

//validadmos el formulario y ponemos los errores
    if(!true){
        header("Location: login.php");
        exit;
    }

    //valida si existe el usuario en la bbdd
    require("../seguro/conexionBD.php");
    require("./consultas.php");

    //guardamos en las variables los valores que nos llegan del formulario
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];

    //validamos si el usuario esta registrado y concuerda nombre y contraseña
    if(valida($user,$pass)){
        header("Location: ../paginas/productos.php");
    }
?>