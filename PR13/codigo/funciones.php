<?php
function validaFormulario(&$arrayError){
    if(isset($_POST['btn'])){
        //LLamada a todos los comprueba para mensaje de error
        compruebaAlfabetico('nombre',$arrayError);
        compruebaPrecio('precio');
        CompruebaFecha('fecha');
        
        //
        if(compruebaAlfabetico('nombre',$arrayError)&&compruebaPrecio('precio')&&CompruebaFecha('fecha')){
            
            return true;
        }else{
            return false;
        }
            
    }   
}
function compruebaAlfabetico($id,&$arrayError){
    
    if(!empty($_POST['nombre'])){
        return true;
    }else{
        $arrayError[$id]="El nombre no puede estar vacio!!!";
        return false;
    }
}
function rellenaAlfabetico(){
    if(!empty($_POST['nombre']))
    echo $_POST['nombre'];
}
function compruebaPrecio($id){
    global $arrayError;
    if(!empty($_POST['precio']) && preg_match('/^[0-9]{1,9}$/',$_POST['precio'])){
        return true;
    }else{
        $arrayError[$id]="El precio no puede estar vacio y debe ser un entero!!!";
        return false; 
    }
}
function rellenaPrecio(){
    if(!empty($_POST['precio']) && preg_match('/^[0-9]{1,9}$/',$_POST['precio']))
    echo $_POST['precio'];
}
function compruebaFecha($id){
    global $arrayError;
    if(!empty($_POST['fecha']) && preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$_POST['fecha'])){
        return true;
    }else{
        $arrayError[$id]="El formato debe ser yyyy-mm-dd";
        return false; 
    }
}
function rellenaFecha(){
    if(!empty($_POST['fecha']) && preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$_POST['fecha']))
    echo $_POST['fecha'];
}
function incompleto($id){
    global $arrayError;
    if(isset($arrayError[$id])){
        echo "<span>".$arrayError[$id]."</span>";
    }
}

?>