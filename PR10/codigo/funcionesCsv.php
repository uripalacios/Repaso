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

function compruebaBoton(){
    if(!empty($_POST['btn'])){
        if($_POST['btn']=="Editar"){
            header("Location: ./EditaAlumno.php?contador=".$_REQUEST['contador']);
        }
    }
}
?>