<?php
//si se ha pulsado login
if (isset($_POST['login'])) {
    $_SESSION['pagina'] = 'login';
    header('Location: index.php');
    exit();
}
// Logout
else if(isset($_POST['logout']))
{
    // Cierre de la sesion
    unset($_SESSION['validada']);
    session_destroy();

    //no hace falta pasarle la pagina porque no lleva datos
    //$_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
    exit();
}
// Perfil
else if(isset($_POST['perfil']))
{
    $_SESSION['pagina'] = 'perfil';
    header('Location: index.php');
    exit();
}else if(isset($_POST['verPro'])){
    $_SESSION['vista']=$vistas['detalleProducto'];
    $producto = ProductoDAO::findById($_POST['cod_producto']);
    require_once $vistas['layout'];
}
else if($_SESSION['validada']){
    $_SESSION['vista'] = $vistas['listaProductos'];
    $lista = ProductoDAO::findAll();
    require_once $vistas['layout']; 
}else{

    //que sea la primera vez que se entra en login
    $_SESSION['vista'] = $vistas['inicio'];
    require_once $vistas['layout'];
}

?>