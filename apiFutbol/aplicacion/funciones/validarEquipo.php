<?php



function validaFormulario(){
    if(isset($_POST['Enviado'])){
        //LLamada a todos los comprueba para mensaje de error
        compruebaAlfabetico('nombreEquipo');
        compruebaAlfabetico('localidad');
        
        //
        if(compruebaAlfabetico('nombreEquipo')&&compruebaAlfabetico('localidad')){
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


function incompleto($id){
    global $arrayError;
    if(isset($arrayError[$id])){
        echo "<span>".$arrayError[$id]."</span>";
    }
}

?>
