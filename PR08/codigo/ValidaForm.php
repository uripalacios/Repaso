<?php
$arrayError=array();
function validaFormulario(){
    if(isset($_POST['Enviado'])){
        echo "El formulario ha sido enviado";
        compruebaAlfabetico('alfabetico');
        compruebaAlfanumerico('alfanumerico');

        compruebaRadio('radio');
        
    }   
}
//alfabeticos
function compruebaAlfabetico($id){
    if(!empty($_POST['alfabetico'])){
        return true;
    }else{
        $arrayError[$id]="No puede estar vacio";
        return false;
    }
}
function rellenaAlfabetico(){
    if(!empty($_POST['alfabetico']))
    echo $_POST['alfabetico'];
}
function compruebaAlfanumerico($id){
    if(!empty($_POST['alfanumerico'])){
        return true;
    }else{
        $arrayError[$id]="No puede estar vacio";
        return false; 
    }
}
function rellenaAlfanumerico(){
    if(!empty($_POST['alfanumerico'])){
        echo $_POST['alfanumerico'];
    }
}
function compruebaRadio($id){
    if(!empty($_POST['radio'])){
       return true; 
    }else{
        $arrayError[$id]="No puede estar vacio";
        return false; 
    }
}
function incompleto($id){
    if(isset($arrayError[$id])){
        echo "<span>".$arrayError[$id]."</span>";
    }
}
function rellena($id){
    if(!empty($_POST[$id]))
    echo $_POST[$id];
}
?>