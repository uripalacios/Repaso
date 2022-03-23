<?php
function validaFormulario(){
    if(isset($_POST['btn'])){
        //LLamada a todos los comprueba para mensaje de error
        compruebaNombre('nombre');
        
        
        if(compruebaNombre('nombre')){
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
    if(!empty($_POST['nombre']) && preg_match('/^\D{1,}$/',$_POST['nombre']))
    echo $_POST['nombre'];
}

//funcion para mostrar los mensajes de error
function incompleto($id){
    global $arrayError;
    if(isset($arrayError[$id])){
        echo "<span>".$arrayError[$id]."</span>";
    }
}

?>