<?php
function validaFormulario(){
    if(isset($_POST['btn'])){
        //LLamada a todos los comprueba para mensaje de error
        compruebaNombre('ficheros');
        
        
        if(compruebaNombre('ficheros')){
            return true;
        }else{
            return false;
        }
            
    }   
}
//NOMBRE
//funcion que comprueba patron de nombre y no vacio
function compruebaNombre($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\D{1,}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]=" No puede estar vacío el nombre de fichero";
        return false; 
    }
}
//funcion para mantener el nombre ya validado
function rellenaNombre(){
    if(!empty($_POST['ficheros']) && preg_match('/^\D{1,}$/',$_POST['ficheros']))
    echo $_POST['ficheros'];
}

//funcion para mostrar los mensajes de error
function incompleto($id){
    global $arrayError;
    if(isset($arrayError[$id])){
        echo "<span>".$arrayError[$id]."</span>";
    }
}

?>