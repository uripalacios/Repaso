<?php
function validaFormulario(){
    if(isset($_POST['Enviado'])){
        //LLamada a todos los comprueba para mensaje de error
        compruebaNombre('nombre');
        compruebaApellido('apellido');
        compruebaFecha('fecha');
        compruebaDNI('dni');
        compruebaEmail('email');
        //
        if(compruebaNombre('nombre')&&compruebaApellido('apellido')&&compruebaFecha('fecha')&&
            compruebaDNI('dni')&&compruebaEmail('email')){
            echo "<h2>El formulario ha sido enviado correctamente!!!</h2>";
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
    if(!empty($_POST[$id]) && preg_match('/^\D{3,}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]=" No puede estar vacío y mínimo 3 caracteres";
        return false; 
    }
}
//funcion para mantener el nombre ya validado
function rellenaNombre(){
    if(!empty($_POST['nombre']) && preg_match('/^\D{3,}$/',$_POST['nombre']))
    echo $_POST['nombre'];
}

//APELLIDO
//funcion que comprueba patron de apellido y no vacio
function compruebaApellido($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\D{3,}\s\D{3,}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]="No puede estar vacío y mínimo 3 caracteres primer apellido, espacio y 3 caracteres segundo.";
        return false; 
    }
}
//funcion para mantener el apellido ya validado
function rellenaApellido(){
    if(!empty($_POST['apellido']) && preg_match('/^\D{3,}\s\D{3,}$/',$_POST['apellido']))
    echo $_POST['apellido'];
}

//FECHA
//funcion que comprueba patron de fecha y no vacio
function compruebaFecha($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\d{2}-\d{2}-\d{4}$/',$_POST[$id]) && mayorEdad($id)){
        return true;
    }else{
        $arrayError[$id]="El formato debe ser dd-mm-aaaa o no es mayor de edad";
        return false; 
    }
}
//funcion para mantener la fecha ya validado
function rellenaFecha($id){
    if(!empty($_POST[$id]) && preg_match('/^\d{2}-\d{2}-\d{4}$/',$_POST[$id]) && mayorEdad($id))
    echo $_POST[$id];
}

//DNI
//funcion que comprueba patron de DNI y no vacio
function compruebaDNI($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\d{8}[A-Z]{1}$/',$_POST[$id]) && letraDNI($id)){
        return true;
    }else{
        $arrayError[$id]="Dni mal introducido";
        return false; 
    }
}
//funcion para mantener el DNI ya validado
function rellenaDNI($id){
    if(!empty($_POST[$id]) && preg_match('/^\d{8}[A-Z]{1}$/',$_POST[$id]) && letraDNI($id))
    echo $_POST[$id];
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

//funcion para mostrar los mensajes de error
function incompleto($id){
    global $arrayError;
    if(isset($arrayError[$id])){
        echo "<span>".$arrayError[$id]."</span>";
    }
}
//comprobar que sea mayor de edad
function mayorEdad($id){
    $anioA = date('Y');
    $mesA = date('m');
    $diaA = date('d');
    /*
    $anioF = substr($_POST[$id],-4);
    $mesF = substr($_POST[$id],3,4);
    $diaF = substr($_POST[$id],0, 1);
    */
    $fechaFor = explode('-',$_POST[$id]);

    if(($anioA-$fechaFor[2])>18){
        return true;
    }elseif(($anioA-$fechaFor[2])==18){
        if($mesA<$fechaFor[1]){
            return true;
        }if($mesA=$fechaFor[1]){
            if($diaA<=$fechaFor[0]){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}
//Comprobar que coincida la letra del dni
function letraDNI($id){
    $letrasDni=array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
    $numeros=substr($_POST[$id],0,-1);
    $letra=substr($_POST[$id],-1);

    //hago el modulo de los numeros para que me devuelva el resto
    $resto = $numeros%23;
    if($letrasDni[$resto]==$letra){
        return true;
    }else{
        return false;
    }
}
?>