<?php
function compruebaBoton(){
    if(!empty($_POST['btn'])&& !empty($_POST['ficheros'])){
        if($_POST['btn']=="Editar"){
            header("Location: ./EditaFichero.php?ficheros=".$_POST['ficheros']);
        }
        elseif($_POST['btn']=="Modificar"){
            //me lleva a leer fichero

            header("Location: ./LeeFichero.php?ficheros=".$_REQUEST['ficheros']);
            
        }
        elseif($_POST['btn']=="Leer" && existeFichero()){
            header("Location: ./LeeFichero.php?ficheros=".$_REQUEST['ficheros']);
        }elseif($_POST['btn']=="Leer" && !existeFichero()){
            echo "<span>Fichero no encontrado, compruebe nombre o creelo desde editar</span>";
            return false;
        }
    }
}
//busqueda de fichero para escribir y leer
function buscaFichero(){
    $fp = fopen($_REQUEST['ficheros'],'w');
    return $fp;
}

function existeFichero(){
    return file_exists($_REQUEST['ficheros']);
}
function leeFichero(){
    $fp = fopen($_REQUEST['ficheros'],'r');
    return $fp;
}
function escribeFichero(){
    $f=buscaFichero();
    fwrite($f,$_REQUEST['contenido']);
    fclose($f);
}

?>