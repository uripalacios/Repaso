<?php
if(isset($_COOKIE['recuerdame']))
{
    $user=$_COOKIE['recuerdame'][0];
    $pass=$_COOKIE['recuerdame'][1];

    $usuario = UsuarioDAO::validaUser($user, $pass);

    if($usuario != null)
    { 
                       
        $_SESSION["validada"] = true;
        $_SESSION["usuario"] = $usuario->usuario;
        $_SESSION["email"] = $usuario->email;
        $_SESSION["fecha_nacimiento"] = $usuario->fecha_nacimiento;
        $_SESSION["perfil"] = $usuario->perfil;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <header class="navbar">
        <?php

        // Si la sesion esta validada
        if (isset($_SESSION['validada'])) {
            echo "<p>" . $_SESSION["usuario"] . "</p>";

            // Y eres usuario administrador
            if($_SESSION["perfil"] == "ADM01"){
                ?>

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="submit" value="Admi usuario" name="usuarios">
                    
                    
                </form>

                <?php
            }

            /*
        
            if($_SESSION["perfil"] == "MOD01"){
                ?>

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="submit" value="Admi usuario" name="usuarios">
                    
                    
                </form>

                <?php
            }
        */

            
        ?>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Lista de Deseos" id="listaDeseos" name="listaDeseos">
                <input type="submit" value="Productos" name="productos">
                <input type="submit" value="Perfil" name="perfil">
                <input type="submit" value="Logout" name="logout">
            </form>
        <?php
        } else {
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Logearse para entrar" name="login">
            </form>
        <?php
        }

        ?>
    </header>
    <main class="container">
        <div class="row">
            <?php
            //si hay alguna vista cargada desde
            // el controlador la cargar
            if (!isset($_SESSION['vista']))
                require_once $vistas['inicio'];
            else { //sino se va siempre al inicio
                require_once $_SESSION['vista'];
            }
            ?>
        </div>
    </main>
    

</body>
</html>