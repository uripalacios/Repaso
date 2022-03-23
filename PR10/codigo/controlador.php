<?php
function compruebaBoton(){
    if(!empty($_POST['btn'])&& !empty($_POST['nombre'])){
        if($_POST['btn']=="Editar"){
            header("Location: ./EditaFichero.php?ficheros=".$_POST['nombre']);
        }elseif($_POST['btn']=="Leer" || $_POST['btn']=="Modificar"){
            header("Location: ./LeeFichero.php?ficheros=".$_POST['nombre']);
        }
    }
}

?>