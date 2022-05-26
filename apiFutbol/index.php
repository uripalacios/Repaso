<?php

require "./config/config.php";
//print_r($_SERVER);
//Ver que contiene y que está pidiendo
if(substr($_SERVER['PATH_INFO'],0,7) === "/equipo"){
    $equipo = new cEquipo();
    $equipo -> general();
}else if(substr($_SERVER['PATH_INFO'],0,8) === "/jugador"){
    $jugador = new cJugador();
    $jugador -> generalJugador();
}else{
    header("HTTP/1.1 400 Error en el formato de la peticion");
    exit;
}
