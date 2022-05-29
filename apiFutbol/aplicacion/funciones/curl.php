<?php
//todas las incidencias
function getEquipos(){
    //Para pedir por curl
    $ch = curl_init();
    //mi conexion

    curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/apiFutbol/index.php/equipos");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
   
    return $res;

}

function getJugadores(){
    //Para pedir por curl
    $ch = curl_init();
    //mi conexion

    curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/apiFutbol/index.php/jugador");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
   
    return $res;

}

//Para incidencias por estado
function getFiltros($filtro){
    //Para pedir por curl
    $ch = curl_init();
    //mi conexion

    curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/apiFutbol/index.php/jugador".$filtro);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
   
    return $res;

}

function getJudadorEquipo($id){
    //Para pedir por curl
    $ch = curl_init();
    //mi conexion

    curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/apiFutbol/index.php/equipos/".$id."/jugadores");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
   
    return $res;

}

function postEquipo(){
    //inserta
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/apiFutbol/index.php/equipos");
    $datosU = array('nombreEquipo'=>$_POST['nombreEquipo'],'localidad'=>$_POST['localidad']);
    $datoshttp = http_build_query($datosU);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datoshttp);
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}
function postJugador(){
    //inserta
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/apiFutbol/index.php/jugador");
    $datosU = array('nombreJugador'=>$_POST['nombreJugador'],'seleccione'=>$_POST['seleccione'],'sueldo'=>$_POST['sueldo'],'codEquipo'=>$_POST['codEquipo']);
    $datoshttp = http_build_query($datosU);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datoshttp);
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}

function put($estado){
    //modifica o actualiza
   
}
function deleteEquipo($id){
    //Para pedir por curl
    $ch = curl_init();
    //mi conexion

    curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/apiFutbol/index.php/equipos/".$id);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
   
    return $res;

}
function deleteJugador($id){
    //Para pedir por curl
    $ch = curl_init();
    //mi conexion

    curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/apiFutbol/index.php/jugador/".$id);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
   
    return $res;

}

//pruebas para ejecutar
/*
$lista = get();
//leer fecth_assc
$lista = json_decode($lista,true);
foreach ($lista as $value) {
    # code...
    echo $value['id'];
}
*/
// post();
//put();

?>