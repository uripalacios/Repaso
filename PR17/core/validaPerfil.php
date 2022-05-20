<?php
function validaFormulario(){
    if(isset($_POST['modificar'])){
        //LLamada a todos los comprueba para mensaje de error
        compruebaFecha('fecha');
        compruebaPass('pass1','pass2');
        compruebaEmail('email');

        if(compruebaPass('pass1','pass2')&&compruebaFecha('fecha')&&
            compruebaEmail('email')){
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
    if(!empty($_POST[$id]) && preg_match('/^{3,}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]=" No puede estar vacío y mínimo 3 caracteres";
        return false; 
    }
}
//funcion para mantener el nombre ya validado
function rellenaNombre(){
    if(!empty($_POST['usuario']) && preg_match('/^\D{3,}$/',$_POST['usuario']))
    echo $_POST['usuario'];
}
//EMAIL
//funcion que comprueba patron de email y no vacio
function compruebaEmail($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\D{1,}@\D{1,}.\D{2,}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]="El formato es 1 o más caracteres, @, 1 o más caracteres, . y 2 o más caracteres.!!!";
        return false; 
    }
}
//funcion para mantener el email ya validado
function rellenaEmail(){
    if(!empty($_POST['email']) && preg_match('/^\D{1,}@\D{1,}.\D{2,}$/',$_POST['email']))
    echo $_POST['email'];
}
//FECHA
//funcion que comprueba patron de fecha y no vacio
function compruebaFecha($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\d{4}-\d{2}-\d{2}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]="El formato debe ser aaaa-mm-dd";
        return false; 
    }
}
//funcion para mantener la fecha ya validado
function rellenaFecha($id){
    if(!empty($_POST[$id]) && preg_match('/^\d{4}-\d{2}-\d{2}$/',$_POST[$id]))
    echo $_POST[$id];
}

//Pass
//funcion que comprueba patron de nombre y no vacio
function compruebaPass($pass1,$pass2){
    global $arrayError;
    if(!empty($_POST[$pass1]) && preg_match('/[\D\d]{8,}/',$_POST[$pass1])&& preg_match('/[A-Z]{1,}/',$_POST[$pass1])
        && preg_match('/[a-z]{1,}/',$_POST[$pass1])&& preg_match('/\d{1,}/',$_POST[$pass1])&& $_POST[$pass1]==$_POST[$pass2]){
        return true;
    }else{
        $arrayError[$pass1]="La contraseña no coincide o no es el formato adecuado";
        return false; 
    }
}

//funcion para mostrar los mensajes de error
function incompleto($id){
    global $arrayError;
    if(isset($arrayError[$id])){
        echo "<span>".$arrayError[$id]."</span>";
    }
}
?>