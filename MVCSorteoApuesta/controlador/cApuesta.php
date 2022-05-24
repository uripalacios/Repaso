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
// Modificar
else if(isset($_POST["modificar"]))
{
    // Si se han seleccionado bien los check
    if(compruebaCheck("checks"))
    {
        if(isset($_POST["checks"]))
        {
            // Recojo los cjecks
            $n1 = $_POST["checks"][0];
            $n2 = $_POST["checks"][1];
            $n3 = $_POST["checks"][2];
            $n4 = $_POST["checks"][3];
            $n5 = $_POST["checks"][4];

            // Actualizo la apuesta
            $apuesta = ApuestaDAO::findById($_SESSION["usuario"]);

            $nuevaApuesta = new Apuesta($apuesta->id,$apuesta->idProfe,$n1,$n2,$n3,$n4,$n5);

            ApuestaDAO::update($nuevaApuesta);

            $_SESSION['pagina'] = 'apuesta';
            header('Location: index.php');
            exit();
        }
    }
    else
    {
        $apuesta = ApuestaDAO::findById($_SESSION["usuario"]);
        $_SESSION['vista'] = $vistas['apuesta'];
        require_once $vistas['layout'];
    }

}
// Crear
else if(isset($_POST["insertar"]))
{
    // Si se han seleccionado bien los check
    if(compruebaCheck("checks"))
    {
        if(isset($_POST["checks"]))
        {
            // Recojo los cjecks
            $n1 = $_POST["checks"][0];
            $n2 = $_POST["checks"][1];
            $n3 = $_POST["checks"][2];
            $n4 = $_POST["checks"][3];
            $n5 = $_POST["checks"][4];

            $idProfe = $_SESSION["usuario"];

            $nuevaApuesta = new Apuesta(0,$idProfe,$n1,$n2,$n3,$n4,$n5);

            ApuestaDAO::save($nuevaApuesta);

            $_SESSION['pagina'] = 'apuesta';
            header('Location: index.php');
            exit();
        }
    }
    else
    {
        $apuesta = ApuestaDAO::findById($_SESSION["usuario"]);
        $_SESSION['vista'] = $vistas['apuesta'];
        require_once $vistas['layout'];
    }

}
else
{
    // Busco la apuesta en funcion del id del usuario
    $apuesta = ApuestaDAO::findById($_SESSION["usuario"]);

    // Que sea la primera vez que se entra en inicio tras loguearse //
    $_SESSION['vista'] = $vistas['apuesta'];
    require_once $vistas['layout'];    
}


?>