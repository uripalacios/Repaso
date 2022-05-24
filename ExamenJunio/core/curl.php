<?php
//todas las incidencias
function get(){
    //Para pedir por curl
    $ch = curl_init();
    //mi conexion

    curl_setopt($ch,CURLOPT_URL,"http://10.1.160.105/RepasoTema3/Apiincidencias/index.php/incidencias");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
   
    return $res;

}

//Para incidencias por estado
function getEstado($filtro){
    //Para pedir por curl
    $ch = curl_init();
    //mi conexion

    curl_setopt($ch,CURLOPT_URL,"http://10.1.160.105/RepasoTema3/Apiincidencias/index.php/incidencias?estado=".$filtro);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
   
    return $res;

}

function getUsuario($id){
    //Para pedir por curl
    $ch = curl_init();
    //mi conexion

    curl_setopt($ch,CURLOPT_URL,"http://10.1.160.105/RepasoTema3/Apiincidencias/index.php/incidencias/".$id);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
   
    return $res;

}

function post(){
    //inserta
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,"http://10.1.160.105/RepasoTema3/Apiincidencias/index.php/incidencias");
    $datosU = array('id'=>0,'aula'=>$_POST['aula'],'equipo'=>$_POST['equipo'],'descripcion'=>$_POST['descripcion'],'solucion'=>"",'fecha'=>$_POST['fecha'],'fecha_solucion'=>"",'estado'=>"",'idusuario'=>$_SESSION['usuario']);
    $datoshttp = http_build_query($datosU);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datoshttp);
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}

function put($estado){
    //modifica o actualiza
    $ch = curl_init();
    //url
    
        $datosU = array('id'=>$_POST['id'],'aula'=>$_POST['aula'],'equipo'=>$_POST['equipo'],'descripcion'=>$_POST['descripcion'],'solucion'=>$_POST['solucion'],'fecha'=>$_POST['fecha'],'fecha_solucion'=>$_POST['fecha_solucion'],'estado'=>$estado,'idusuario'=>$_POST['idusuario']); 
    
    curl_setopt($ch,CURLOPT_URL,"http://10.1.160.105/RepasoTema3/Apiincidencias/index.php/incidencias/".$datosU['id']);
    $datosjson = json_encode($datosU);
    //cabecera que voy a enviar json/xml
    curl_setopt($ch,CURLOPT_HTTPHEADER,
        array('Content-Type: application/json','Content-Length: '.strlen($datosjson)));
    //put
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
    //parametros
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datosjson);
    //quiero respuesta
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    //ejecuto
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}
function delete($id){
    //Para pedir por curl
    $ch = curl_init();
    //mi conexion

    curl_setopt($ch,CURLOPT_URL,"http://10.1.160.105/RepasoTema3/Apiincidencias/index.php/incidencias/".$id);
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