<?php
// Funcion que valida si está vacío un campo
function validaSiVacio($campo){
    // Si se ha enviado el formulario...
    if (validaEnviado()){
        // Si no está vacío
        if (!empty($_REQUEST[$campo])) 
        {
            // Muestro el valor del campo en el input
            echo $_REQUEST[$campo];

            $correcto = true;
        }
        else 
            $correcto = false;

        return $correcto;
    }
}
 // Función que valida que se ha enviado el formulario
 function validaEnviado(){
    // Si se ha enviado...
    if (isset($_REQUEST["Enviado"])) 
        $correcto = true;
    else 
        $correcto = false;

    return $correcto;
}

?>