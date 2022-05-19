<?php

require "./core/validaRegistro.php";
//inicio
if (isset($_POST['volver'])){//que haya rellenado y verifica si existe 
    $_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
    exit();
}else if (isset($_POST['Enviado'])){//que haya rellenado y verifica si existe 
    if(validaFormulario()){
        $usuario=$_REQUEST['usuario'];
        $email=$_REQUEST['email'];
        $fecha=$_REQUEST['fecha'];
        $encrip = sha1($_REQUEST['pass1']);
        $perfil = "U0001";
        
        $usuarioNuevo = new Usuario($usuario, $encrip, $email,$fecha, $perfil);
        UsuarioDAO::save($usuarioNuevo);
        
        $_SESSION['validada']=true;
        $_SESSION["usuario"] = $usuario;
        $_SESSION["email"] = $email;
        $_SESSION["fecha_nacimiento"] = $fecha;
        $_SESSION["perfil"] = $perfil;
        
        $_SESSION['pagina']='inicio';
        header('Location: index.php');
    }

}else if (isset($_POST['login'])){//que haya rellenado y verifica si existe 
    $_SESSION['pagina'] = 'login';
    header('Location: index.php');
    exit();
}else{
    //que sea la primera vez que se entra en login
    $_SESSION['vista'] = $vistas['registro'];
    require_once $vistas['layout'];
}
?>
