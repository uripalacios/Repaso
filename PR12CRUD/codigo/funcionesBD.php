<?php
//nos vale para comprobar si existe la BBDD
function sinConexionBBDD(){
    if(!($conexion  = @mysqli_connect(IP,USER,PASS))){
        $error = mysqli_connect_errno();
        //exit nos sirve para que no se siga ejecutando, sale del programa
        //error de IP
        if($error==2002){
            echo "Error al concetar con el servidor";
        }
        if($error==1045){
            echo "Error de autentificacion de Usuario o Contraseña";
        }
        exit();
    }else{
        mysqli_close($conexion);
    }
}
//creacion de bton para crear la BBDD
function crearBoton(){
    echo "<form action=".$_SERVER['PHP_SELF']." method='post'><input type='submit' name ='crear' value='crearBBDD'></form>";
}

//conectar con la BBDD
function conexionBBDD(){
    if(!($conexion  = @mysqli_connect(IP,USER,PASS,BBDD))){
        return false;
    }else{
        echo "Todo ha ido bien";
       
        mysqli_close($conexion);
    }
}



//VALIDACION DEL FORMULARIO
function validaForm(){
    compruebaNombre('nombre');
    compruebaFecha('fecha');
    compruebaTel('tel');
    compruebaMedia('media');
    if(compruebaNombre('nombre') && compruebaFecha('fecha') && compruebaTel('tel') && compruebaMedia('media')){
        return true;
    }else{
        return false;
    }
}

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
//funcion que comprueba patron de DNI y no vacio
function compruebaTel($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\d{9}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]="Telefono mal introducido";
        return false; 
    }
}
//funcion para mantener el DNI ya validado
function rellenaTel($id){
    if(!empty($_POST[$id]) && preg_match('/^\d{9}$/',$_POST[$id]))
    echo $_POST[$id];
}
//funcion que comprueba patron de DNI y no vacio
function compruebaMedia($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\d{1,}.\d{1,}$/',$_POST[$id]) && $_POST<=10){
        return true;
    }else{
        $arrayError[$id]="Media mal introducida(separador con punto)";
        return false; 
    }
}
//funcion para mantener el DNI ya validado
function rellenaMedia($id){
    if(!empty($_POST[$id]) && preg_match('/^\d{1,}.\d{1,}$/',$_POST[$id])&& $_POST<=10)
    echo $_POST[$id];
}
//funcion para mostrar los mensajes de error
function incompleto($id){
    global $arrayError;
    if(isset($arrayError[$id])){
        echo "<span>".$arrayError[$id]."</span>";
    }
}
?>