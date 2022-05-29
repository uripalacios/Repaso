<?php
function rellenaCombo($op){
    if((!empty($_POST['seleccione']))&&($_POST['seleccione'])==$op)
        echo "selected";
}


function validaFormulario(){
    if(isset($_POST['Enviado'])){
        //LLamada a todos los comprueba para mensaje de error
        compruebaAlfabetico('nombreJugador');
        compruebaCombo('seleccione');
        compruebaNumerico('sueldo');
        compruebaNumerico('codEquipo');
        
        //
        if(compruebaAlfabetico('alfabetico')&&compruebaCombo('seleccione')&&compruebaNumerico('sueldo')&&compruebaNumerico('codEquipo')){
           
            return true;
        }else{
            return false;
        }
            
    }   
}
//Comprueba alfabeticos y si no hay los manda al array error
function compruebaAlfabetico($id){
    global $arrayError;
    if(!empty($_POST[$id])){
        return true;
    }else{
        $arrayError[$id]="No puede estar vacio!!!";
        return false;
    }
}
function rellenaAlfabetico($id){
    if(!empty($_POST[$id]))
    echo $_POST[$id];
}

function compruebaCombo($id){
    global $arrayError;
    if(!empty($_POST[$id])&&($_POST[$id]!="0")){
       return true; 
    }else{
        $arrayError[$id]="No puede elegir la primera opcion!!!";
        return false; 
    }
}
function compruebaNumerico($id){
    global $arrayError;
    if(!empty($_POST[$id])&&preg_match('/^[0-9]{1,}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]="No puede estar vacio!!!";
        return false;
    }
}


function incompleto($id){
    global $arrayError;
    if(isset($arrayError[$id])){
        echo "<span>".$arrayError[$id]."</span>";
    }
}
function rellena($id){
    if(!empty($_POST[$id]))
    echo $_POST[$id];
}
?>
