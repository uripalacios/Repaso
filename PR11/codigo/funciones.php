<?php
function recogeDatos(){
    $rutaFichero= "notas.csv";
    if(!$fp = fopen($rutaFichero,'r'))
    {
        echo "No se ha podido abrir el fichero";
        exit;
    }
 
    $textoLeido = fread($fp,filesize($rutaFichero));

    return $textoLeido;

    // 3º - Cerrar el fichero //
    fclose($fp);
}
function modificaFichero(){
    global $porAlumno;
    $newCont = array($_POST['nombre'],$_POST['nt1'],$_POST['nt2'],$_POST['nt3']);
    //escritura en fichero
    $rutaFichero= "notas.xml";
    foreach ($variable as $key => $value) {
        # code...
    }
    
}

function compruebaBoton(){
    if(!empty($_POST['btn'])){
        if($_POST['btn']=="Editar"){
            header("Location: ./EditaXML.php?contador=".($_POST['contador']));
        }
        if($_POST['btn']=="Modificar"){
            modificaFichero();
            header("Location: ./MuestraCsv.php");
        }
    }
}
?>