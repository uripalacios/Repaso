<?php

function validaFormulario(&$arrayError){
    if(isset($_POST['Enviado'])){
        echo "El formulario ha sido enviado";
        compruebaAlfabetico('alfabetico');
        compruebaAlfanumerico('alfanumerico');
        compruebaFecha('fecha');
        compruebaRadio('radio');
        
    }   
}
//alfabeticos
function compruebaAlfabetico($id){
    global $arrayError;
    if(!empty($_POST['alfabetico'])){
        return true;
    }else{
        $arrayError[$id]="No puede estar vacio!!!";
        return false;
    }
}
function rellenaAlfabetico(){
    if(!empty($_POST['alfabetico']))
    echo $_POST['alfabetico'];
}
function compruebaAlfanumerico($id){
    global $arrayError;
    if(!empty($_POST['alfanumerico'])){
        return true;
    }else{
        $arrayError[$id]="No puede estar vacio!!!";
        return false; 
    }
}
function rellenaAlfanumerico(){
    if(!empty($_POST['alfanumerico'])){
        echo $_POST['alfanumerico'];
    }
}
function compruebaRadio($id){
    global $arrayError;
    if(!empty($_POST['radio'])){
       return true; 
    }else{
        $arrayError[$id]="No puede estar vacio!!!";
        return false; 
    }
}
function rellenaRadio($op){
    if(($_POST['radio'])==$op)
        echo "checked";
}
function compruebaFecha($id){
    global $arrayError;
    if(!empty($_POST['fecha'])){
        return true;
    }else{
        $arrayError[$id]="No puede estar vacio!!!";
        return false; 
    }
}
function rellenaFecha(){
    if(!empty($_POST['fecha']))
    echo $_POST['fecha'];
}
function compruebaCombo($id){
    global $arrayError;
    if(!empty($_POST['seleccione'])&&($_POST['seleccione']!=0)){
       return true; 
    }else{
        $arrayError[$id]="No puede elegir la primera opcion!!!";
        return false; 
    }
}
function rellenaCombo($op){
    if(($_POST['seleccione'])==$op)
        echo "selected";
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