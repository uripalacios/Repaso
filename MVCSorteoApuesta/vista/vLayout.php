<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 1 Examen - Ismael Maestre</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="./webroot/css/style.css">
    
</head>

<body>
    
    <h1>Examen Ismael Maestre</h1>

    <?php
            if (isset($_SESSION['validada'])) 
            {
        ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="submit" value="Logout" name="logout">
                </form>
        <?php
                // Codigo de Usuario
                echo "<p style='float:left'><b>Id usuario: " . $_SESSION['usuario'] . "</b></p>";
                echo "<br>";
            } 
        ?>

    <!-- Vista -->
    <?php
        // Si no hay ninguna vista cargada...
        // Se carga la de login
        if (!isset($_SESSION['vista'])) 
        {
            require_once $vista['login'];
        }
        // Si sí la hay... la carga
        else 
        {
            require_once $_SESSION['vista'];
        }

    ?>

    </main>
    <footer>&copy;&nbsp;Ismael Maestre</footer>

    <!-- Script -->
    <!--<script src="./webroot/js/menuLayout.js"></script>-->
</body>
</html>