<?php
if(isset($_POST['logout']))
{
    // Cierre de la sesion
    unset($_SESSION['validada']);
    session_destroy();

    $_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
    exit();
}
//Insertar nuevo registro
else if(isset($_POST['incidencia']))
{
    $_SESSION['vista'] = $vistas['incidencia'];
    require_once $vistas['layout'];
}
//Insertar nuevo registro
else if(isset($_POST['registrar']))
{
    post();
    //busco la lista de incidencias
    $lista =getUsuario($_SESSION["usuario"]);
    $lista=json_decode($lista,true);

    // Que sea la primera vez que se entra en inicio tras loguearse //
    $_SESSION['vista'] = $vistas['usuario'];
    require_once $vistas['layout']; 
}
else
{
    //busco la lista de incidencias
    $lista =getUsuario($_SESSION["usuario"]);
    $lista=json_decode($lista,true);

    // Que sea la primera vez que se entra en inicio tras loguearse //
    $_SESSION['vista'] = $vistas['usuario'];
    require_once $vistas['layout'];    
}
?>