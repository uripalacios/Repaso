<?php 
require "./core/funcionesGenericas.php";
//si se ha pulsado el registro
if(isset($_POST['registro'])){
    $_SESSION['pagina'] = 'registro';
    header('Location: index.php');
    exit();
}
// 
else if (isset($_POST['Enviado'])){
    
    $todoOk = validaSiVacio('nombre');
    if($todoOk)
        $todoOk = validaSiVacio('pass');

    // llamamos a valida si vacio y devuelve true o false (implementar)
    if($todoOk)
    {
        // Aqui supuestamente se ha rellenado bien //

        // Recojo los datos del formulario
        $user = $_POST["nombre"];
        $pass = $_POST["pass"];

        // Se encripta la contraseña (mediante 'sha1')
        $pass = sha1($pass);
        

        // Compruebo si existe el usuario en la BBDD
        $usuario = UsuarioDAO::validaUser($user,$pass);

        // Si existe el usuario...
        if($usuario != null)
        {
            
            

            // Guardo los datos del usuario en la sesion
            $_SESSION["validada"] = true;
            $_SESSION["usuario"] = $usuario->usuario;
            $_SESSION["email"] = $usuario->email;
            $_SESSION["fecha_nacimiento"] = $usuario->fecha_nacimiento;
            $_SESSION["perfil"] = $usuario->perfil;
            
            if(isset($_REQUEST['recordarme']))
                {
                    recuerdame();
                }
            // Se accede al inicio
            $_SESSION["pagina"] = "inicio";
            header("Location: index.php");
        }
        else
        {
            $_SESSION["mensaje"] = "No existe el usuario o contraseña";
            $_SESSION["vista"] = $vistas["login"];
            require_once $vistas["layout"];
        }

    }else{

        $_SESSION["mensaje"] = "Debe rellenar los campos";
        $_SESSION["vista"] = $vistas["login"];
        require_once $vistas["layout"];
    }
}
else if (isset($_POST['volver']))
{//que haya rellenado y verifica si existe 
    $_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
    exit();   
}
else
{
    //que sea la primera vez que se entra en login
    $_SESSION['vista'] = $vistas['login'];
    require_once $vistas['layout'];
}

?>