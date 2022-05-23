<?php

function get(){
    //Para pedir por curl
    $ch = curl_init();
    
    //mi conexion
    curl_setopt($ch,CURLOPT_URL,"http://10.1.160.105/RepasoTema3/Apirepaso/index.php/producto");
    //curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/Apirepaso/index.php/producto");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
   
    return $res;

}

function post(){
    $ch = curl_init();

    //curl_setopt($ch,CURLOPT_URL,"ttp://10.1.160.105/RepasoTema3/Apirepaso/index.php/producto");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/Apirepaso/index.php/producto");
    $datosU = array('cod_producto'=>$_POST['cod_producto'],'descripcion'=>$_POST['descripcion'],'precio'=>$_POST['precio'],'stock'=>$_POST['stock']);
    $datoshttp = http_build_query($datosU);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datoshttp);
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}

function put(){
    $ch = curl_init();
    //url
    $datosU = array('cod_producto'=>'curl','descripcion'=>'curl','precio'=>'curl','stock'=>'curl');
    curl_setopt($ch,CURLOPT_URL,"http://localhost/Repaso/Apirepaso/index.php/producto/".$datosU['cod_producto']);
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
/*
//pruebas para ejecutar
$lista = get();
//leer fecth_assc
$lista = json_decode($lista,true);
foreach ($lista as $value) {
    # code...
    echo $value['cod_producto'];
}
*/
// post();
//put();
?>