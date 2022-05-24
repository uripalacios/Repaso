<?php
function validaFormulario(){
    if(isset($_POST['Enviado'])){
        //LLamada a todos los comprueba para mensaje de error
        compruebaPerfil('perfil');
        compruebaFecha('fecha');
        compruebaPass('pass1','pass2');
        compruebaEmail('email');

        if(compruebaPerfil('perfil')&&compruebaPass('pass1','pass2')&&compruebaFecha('fecha')&&
            compruebaEmail('email')){
            return true;
        }else{
            return false;
        }
    }   
}
//NOMBRE 
//funcion que comprueba patron de nombre y no vacio
function compruebaPerfil($id){
    global $arrayError;
    if($_POST[$id]== "ADM01" ||$_POST[$id]== "MOD01"||$_POST[$id]== "U0001"){
        return true;
    }else{
        $arrayError[$id]="Perfil introducido no valido";
        return false; 
    }
}
//funcion para mantener el nombre ya validado
function rellenaPerfil(){
    if($_POST['perfil']== "ADM01" ||$_POST['perfil']== "MOD01"||$_POST['perfil']== "U0001")
    echo $_POST['perfil'];
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