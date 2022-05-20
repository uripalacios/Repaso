<?php
require "./core/validaRegistro.php";
if(isset($_POST['logout']))
{
    // Cierre de la sesion
    unset($_SESSION['validada']);
    session_destroy();

    //no hace falta pasarle la pagina porque no lleva datos
    //$_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
    exit();
}else if(isset($_POST['productos'])){
    $_SESSION["pagina"] = "inicio";
        header("Location: index.php");
} else if(isset($_POST['modificar'])){
    if(validaFormulario()){
        $usuario=$_REQUEST['usuario'];
        $email=$_REQUEST['email'];
        $fecha=$_REQUEST['fecha'];
        $encrip = sha1($_REQUEST['pass1']);
        $perfil = "U0001";
        
        $usuarioNuevo = new Usuario($usuario, $encrip, $email,$fecha, $perfil);
        UsuarioDAO::update($usuarioNuevo);
        
        $_SESSION['validada']=true;
        $_SESSION["usuario"] = $usuario;
        $_SESSION["email"] = $email;
        $_SESSION["fecha_nacimiento"] = $fecha;
        $_SESSION["perfil"] = $perfil;
        
        $_SESSION["pagina"] = "inicio";
        header("Location: index.php");
    }
}else{
    $arrayErrores = Array();
        $_SESSION["erroresPerfil"] = $arrayErrores;

        $codUsuario = $_SESSION["usuario"];
        $usuario = UsuarioDAO::findById($codUsuario);

        $_SESSION['vista'] = $vistas['perfil'];
        require_once $vistas['layout']; 
}

?>