<?php
function compruebaBoton(){
    if(!empty($_POST['btn'])&& !empty($_POST['nombre'])){
        if($_POST['btn']=="Editar"){
            header("Location: ./EditaFichero.php?ficheros=".$_REQUEST['ficheros']);
        }
        elseif($_POST['btn']=="Leer" && leeFichero()){
            
            header("Location: ./LeeFichero.php?ficheros=".$_REQUEST['ficheros']);
        }
        elseif($_POST['btn']=="Modificar"){
            header("Location: ./LeeFichero.php?ficheros=".$_REQUEST['ficheros']);
            
        }
    }
}
function buscaFichero(){
    $fp = fopen($_REQUEST['ficheros'],'w+');
    return $fp;
}

function leeFichero(){
    $fp = fopen($_REQUEST['ficheros'],'r');
    return $fp;
}


?>