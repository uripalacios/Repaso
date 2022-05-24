<?php

require "./config/config.php";
//print_r($_SERVER);
//Ver que contiene y que está pidiendo
if(substr($_SERVER['PATH_INFO'],0,12) === "/incidencias"){
    $producto = new cIncidencias();
    $producto -> general();
}else{
    header("HTTP/1.1 400 Error en el formato de la peticion");
    exit;
}


?>