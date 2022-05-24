<?php
require "./core/funcionesAdmiUsuarios.php";

if(isset($_POST['logout']))
{
    // Cierre de la sesion
    unset($_SESSION['validada']);
    session_destroy();
    //para guardar la sesion si se marco recordarme
    if(isset($_COOKIE['recuerdame']))
    {
        setcookie('recuerdame[0]',$_COOKIE['recuerdame'][0], time()-31536000, "/" );
        setcookie('recuerdame[1]',$_COOKIE['recuerdame'][1], time()-31536000, "/" );
    } 
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

}
//Admin Usuarios
else if(isset($_POST['usuarios'])){
    $lista = UsuarioDAO::findAll();
    $_SESSION['pagina'] = 'usuarios';
    header('Location: index.php');
    exit();
}
//modificar usuario
else if(isset($_POST['modUsuario'])){
    $usuario = UsuarioDAO::findById($_POST['cod_usuario']);
    $_SESSION['vista'] = $vistas['modUsuarios'];
    require_once $vistas['layout'];
}
//eliminar usuario
else if(isset($_POST['eliminarUsuario'])){
    UsuarioDAO::deleteById($_POST['cod_usuario']);
    $lista = UsuarioDAO::findAll();
    $_SESSION['vista'] = $vistas['usuarios'];
    require_once $vistas['layout'];
}else if(isset($_POST['modificarUsu'])){
    if(validaFormulario()){
        $usu=$_REQUEST['usuario'];
        $email=$_REQUEST['email'];
        $fecha=$_REQUEST['fecha'];
        $encrip = sha1($_REQUEST['pass1']);
        $perfil = $_REQUEST['perfil'];
        
        $usuario = new Usuario($usu, $encrip, $email,$fecha, $perfil);
        UsuarioDAO::update($usuario);
       
        $lista = UsuarioDAO::findAll();
        $_SESSION['vista'] = $vistas['usuarios'];
        require_once $vistas['layout'];
    }else{
        $usuario = UsuarioDAO::findById($_POST['cod_usuario']);
        $_SESSION['vista'] = $vistas['modUsuarios'];
        require_once $vistas['layout'];
    }
}

//lista de deseos
else if(isset($_POST['listaDeseos']))
{
    //$lista = ProductoDAO::findAll();

    //prueba para integrar una api
    $lista = get();
    $lista = json_decode($lista,true);

    $_SESSION['vista']=$vistas['deseos'];
    
    require_once $vistas['layout'];
}
//Productos
else if((isset($_POST['productos']))){
    $_SESSION['vista'] = $vistas['listaProductos'];
    $lista = ProductoDAO::findAll();
    require_once $vistas['layout']; 
}else{

    $lista = UsuarioDAO::findAll();
    $_SESSION['vista'] = $vistas['usuarios'];
    require_once $vistas['layout'];
}
?>