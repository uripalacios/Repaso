<?php
    require_once "./funciones/validaSesion.php";
    //llamar a verifica sesion
    session_start();
    // if(validaSession()){
    //    // header("Location: ./paginas/pricipal.php");
    // }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Menú</h1>
        <?php
            session_id();
        ?>
        <a href="./logout.php">Logout</a>
    </header>
    <form action="./funciones/valida.php" method="post">
        <label for="user">Usuario</label><input type="text" name="user" id="user">
        <label for="pass">Contraseña</label><input type="password" name="pass" id="pass">
        <br>
        <input type="submit" value="Login" name="valida">
    </form>
</body>
</html>