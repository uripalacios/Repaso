<?php
require "../funciones/validarEquipo.php";
require "../funciones/curl.php";

session_start();


// Si se selecciona 'Guardar Cambios'...
    if(isset($_REQUEST["Enviado"])&&validaFormulario()){
        postEquipo();
              
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
        <label for="nombreEquipo">Nombre equipo:

        <input type="text" name="nombreEquipo" id="nombreEquipo" size="25" placeholder="Código"  value="<?php  
                
                // Valor
                rellenaAlfabetico('nombreEquipo');
            ?>">
            <?php incompleto('nombreEquipo')?>
        </label>
    </section>

    <section>
        <label for="localidad">Localidad:

        <input type="text" id="localidad" name="localidad" size="50" placeholder="Descripción" value="<?php

            // Valor
            rellenaAlfabetico('localidad');
        ?>">
        <?php incompleto('localidad')?>
        </label>
        
    </section>

    
    <hr>
    <!-- Guardar Cambios - Input de tipo Submit -->
    <input type="submit" value="Guardar Cambios" id="idGuardarCambios" name="Enviado">
    
</form>
<a href="./equipos.php">Volver</a>
</div>
</body>
</html>
<?php
    }
    
?>