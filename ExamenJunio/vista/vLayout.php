<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>

<body>
    <h1>Examen Junio Uriel</h1>

    <?php
            if (isset($_SESSION['validada'])) 
            {
        ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="submit" value="Logout" name="logout">
                </form>
        <?php
               
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
  
    <!-- Script -->
    <!--<script src="./webroot/js/menuLayout.js"></script>-->
</body>
</html>