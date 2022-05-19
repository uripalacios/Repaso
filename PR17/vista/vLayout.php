<!DOCTYPE html>
<html lang="en">

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

            // Y eres usuario administrador
            if($_SESSION["perfil"] == "ADM01"){
                echo "<p>" . $_SESSION["usuario"] . "</p>";
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

            echo "<p>" . $_SESSION["usuario"] . "</p>";
        ?>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Pefil" name="perfil">
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