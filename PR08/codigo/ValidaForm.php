<?php

function validaFormulario(){
    if(isset($_POST['Enviado'])){
        //LLamada a todos los comprueba para mensaje de error
        compruebaAlfabetico('alfabetico');
        compruebaAlfanumerico('alfanumerico');
        compruebaFecha('fecha');
        compruebaRadio('radio');
        compruebaCombo('seleccione');
        compruebaCheck('check');
        compruebaTel('tel');
        compruebaEmail('email');
        compruebaPass('pass');
        compruebaDoc('doc');
        
        //
        if(compruebaAlfabetico('alfabetico')&&compruebaAlfanumerico('alfanumerico')&&compruebaFecha('fecha')
        &&compruebaRadio('radio')&&compruebaCombo('seleccione')&&compruebaCheck('check')&&compruebaTel('tel')
        &&compruebaEmail('email')&&compruebaPass('pass')&&compruebaDoc('doc')){
            echo "<h2>El formulario ha sido enviado correctamente!!!</h2>";
            return true;
        }else{
            return false;
        }
            
    }   
}
//Comprueba alfabeticos y si no hay los manda al array error
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
    if((!empty($_POST['radio']))&&($_POST['radio'])==$op)
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
    if((!empty($_POST['seleccione']))&&($_POST['seleccione'])==$op)
        echo "selected";
}
function compruebaCheck($id){
    global $arrayError;
    if(!empty($_POST['check'])&&(count($_POST['check'])>=1)&&(count($_POST['check'])<=3)){
       return true; 
    }else{
        $arrayError[$id]="Solo puede elegir entre 1 y 3 opciones!!!";
        return false; 
    }
}
function rellenaCheck($op){
    if((!empty($_POST['check']))&&(count($_POST['check'])>=1)&&(count($_POST['check'])<=3)){
        /*
        foreach ($_POST['check'] as $key => $value) {
            # code...
            if($value==$op){
                echo "checked";
            }
        }
        */
        //me devuelve si esta en el array la opcion para marcarla
        if(in_array($op,$_POST['check'])){
            echo "checked";
        }
    }
}
function compruebaTel($id){
    global $arrayError;
    if(!empty($_POST['tel']) && preg_match('/^[0-9]{9}$/',$_POST['tel'])){
        return true;
    }else{
        $arrayError[$id]="No puede estar vacio o tiene que tener al menos 9 digitos!!!";
        return false; 
    }
}
function rellenaTel(){
    if(!empty($_POST['tel']) && preg_match('/^[0-9]{9}$/',$_POST['tel']))
    echo $_POST['tel'];
}
function compruebaEmail($id){
    global $arrayError;
    if(!empty($_POST['email']) && preg_match('/^[A-Za-z0-9_\-.]{1,}@[A-Za-z0-9]{1,}.\D{1,}$/',$_POST['email'])){
        return true;
    }else{
        $arrayError[$id]="El formato no es el correcto!!!";
        return false; 
    }
}
function rellenaEmail(){
    if(!empty($_POST['email']) && preg_match('/^[A-Za-z0-9_\-.]{1,}@[A-Za-z0-9]{1,}.\D{1,}$/',$_POST['email']))
    echo $_POST['email'];
}
function compruebaPass($id){
    global $arrayError;
    if(!empty($_POST['pass']) && preg_match('/[a-z]{1,}/',$_POST['pass'])&& preg_match('/[A-Z]{1,}/',$_POST['pass'])&& preg_match('/\d{1,}/',$_POST['pass']) && strlen($_POST['pass'])>=8){
        return true;
    }else{
        $arrayError[$id]="La contrase??a debe tener al menos 1 minuscula, 1 mayuscula y 1 numero con una longitud superior a 8!!!";
        return false; 
    }
}
function rellenaPass(){
    if(!empty($_POST['pass']) && preg_match('/[a-z]{1,}/',$_POST['pass'])&& preg_match('/[A-Z]{1,}/',$_POST['pass'])&& preg_match('/\d{1,}/',$_POST['pass']) && strlen($_POST['pass'])>=8)
    echo $_POST['pass'];
}
function compruebaDoc($id){
    global $arrayError;
    if(!empty($_POST['doc'])){
        return true;
    }else{
        $arrayError[$id]="Debe insertar un archivo!!!";
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