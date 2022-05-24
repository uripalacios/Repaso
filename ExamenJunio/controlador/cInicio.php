<?php

// Logout
if(isset($_POST['logout']))
{
    // Cierre de la sesion
    unset($_SESSION['validada']);
    session_destroy();

    $_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
    exit();
}

else{
    
    // Que sea la primera vez que se entra en inicio tras loguearse //
    $_SESSION['vista'] = $vistas['inicio'];
    require_once $vistas['layout'];    
}


?>