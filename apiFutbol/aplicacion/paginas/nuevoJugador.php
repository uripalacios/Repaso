<?php
require "../funciones/validarJugador.php";
require "../funciones/curl.php";

session_start();


// Si se selecciona 'Guardar Cambios'...
    if(isset($_REQUEST["Enviado"])&&validaFormulario()){
        postJugador();
              
    }else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Nuevo Equipo</title>
</head>
<body>
    <h2>Nuevo Equipo</h2>
<div class="formulario">

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="formulario" id="idFormulario"  enctype="multipart/form-data">
    

    <section>
        <label for="nombreJugador">Nombre de jugador:

        <input type="text" name="nombreJugador" id="nombreJugador" size="25" placeholder="Código"  value="<?php  
                
                // Valor
                rellenaAlfabetico('nombreJugador');
            ?>">
            <?php incompleto('nombreEquipo')?>
        </label>
    </section>
    <section>
    <label for="seleccione">Posicion:</label>
        <select name="seleccione">
            <option value="0"<?php rellenaCombo('0')?>>Seleccione</option> 
            <option value="delantero"<?php rellenaCombo('delantero')?>>delantero</option> 
            <option value="medio"<?php rellenaCombo('medio')?>>medio</option> 
            <option value="defensa"<?php rellenaCombo('defensa')?>>defensa</option>
        </select>
        <?php incompleto('seleccione');?>
    </section>

    <section>
        <label for="sueldo">Sueldo:

        <input type="number" id="sueldo" name="sueldo" size="50" placeholder="Descripción" value="<?php

            // Valor
            rellena('sueldo');
        ?>">
        <?php incompleto('sueldo')?>
        </label>
        
    </section>
    <section>
        <label for="codEquipo">Codigo de Equipo:

        <input type="number" id="codEquipo" name="codEquipo" size="50" placeholder="Descripción" value="<?php

            // Valor
            rellena('codEquipo');
        ?>">
        <?php incompleto('codEquipo')?>
        </label>
        
    </section>

    
    <hr>
    <!-- Guardar Cambios - Input de tipo Submit -->
    <input type="submit" value="Guardar Cambios" id="idGuardarCambios" name="Enviado">
    
</form>
<a href="./jugadores.php">Volver</a>
</div>
</body>
</html>
<?php
    }
    
?>