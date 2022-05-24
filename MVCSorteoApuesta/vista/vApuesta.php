<?php


    echo "<h1>Apuesta</h1>";

    ?>
        <!-- Checks -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            
    <?php

    // Genero los checks de nº dinámicamente
    generaCheck($apuesta);

    // Compruebo los checks seleccionados

    // Si el usuario ya ha hecho una apuesta...
        // Le dejo modificar
    if($apuesta != null)
    {
        // Compruebo los checks de ese usuario

        ?>
            <!-- Modificar -->
            <input type="submit" value="Modificar" name="modificar">
        <?php
        
        //compruebaCheck("checks");
    }
    // Si no tiene ninguna, le dejo insertar...
    else
    {
        ?>
            <!-- Insertar -->
            <input type="submit" value="Insertar" name="insertar">
        <?php
        
        //compruebaCheck("checks");
    }

    ?>
    </form>
    <?php
    // Si no...
        // Le dejo crear la apuesta
?>

