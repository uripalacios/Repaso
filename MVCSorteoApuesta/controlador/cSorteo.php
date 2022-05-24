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
// Sortear
else if(isset($_POST["sortear"]))
{
    
    // Se genera el array con los 5 valores aleatorios y únicios
    $arrayAleatorios = generaAleatorios();

    $fecha = date('Y-m-d');

    // Creo el sorteo
    $sorteo = new Sorteo(0,$fecha,$arrayAleatorios[0],$arrayAleatorios[1],$arrayAleatorios[2],$arrayAleatorios[3],$arrayAleatorios[4]);

    // Lo guardo en la BBDD
    SorteoDAO::save($sorteo);

    $_SESSION['pagina'] = 'sorteo';
    header('Location: index.php');
    exit();
}
else
{
    // Recojo la lista de apuestas existentes en la BBDD
    $lista = ApuestaDAO::findAll();

    // Recojo la lista de sorteos existentes en la BBDD
    $sorteo = SorteoDAO::findAll();

    // Que sea la primera vez que se entra en inicio tras loguearse //
    $_SESSION['vista'] = $vistas['sorteo'];
    require_once $vistas['layout'];    
}

?>