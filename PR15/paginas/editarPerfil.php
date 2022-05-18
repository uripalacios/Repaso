<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>

</head>
<body>

    <?php

        require_once("../funciones/validaSesion.php");
        require_once("../funciones/consultas.php");
        require_once("../funciones/funcionesValidarPerfil.php");

        // Compruebo la sesion
        session_start();
        
        // Se valida la sesion
        if(!validaSession()){
            header("Location: ../login.php");
        }
        else{
            // Recojo los datos del usuario
            $arrayUsuario = devuelveDatosUsuario($_SESSION["usuario"]);

            // Si se selecciona 'Guardar Cambios'...
            if(isset($_REQUEST["Enviado"]))
            {
                if($_REQUEST["Enviado"] == "Guardar Cambios"){
                    if(validaFormulario()){
                        // Guardo los cambios del usuario en la BBDD
                        modificarUsuario($arrayUsuario["usuario"],$_REQUEST["clave"],$_REQUEST["email"],$_REQUEST["fecha"]);
                    }
                }
            }
        }

    ?>

    
    <h1>Editar Perfil de <?php echo $_SESSION["usuario"];?></h1>
    
    <!-- Datos del Usuario -->
    <!-- Formulario -->
    <div class="formulario">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="formulario" id="idFormulario"  enctype="multipart/form-data">

            <!-- Nombre - Alfabetico -->
            <section>
                <label for="usuario">Nombre:</label>

                <input type="text" name="usuario" id="usuario"  placeholder="Usuario" readonly value="<?php  
                        echo $arrayUsuario["usuario"];
                    ?>">
            </section>

            <!-- Contraseña - Input de Password -->
            <section>
                <label for="pass1">Contraseña:</label>

                <input type="password" name="pass1" id="pass1" placeholder="Contraseña" value="<?php

                    echo $arrayUsuario["clave"];

                ?>">

                <?php
                    // En caso de que esté vacío, se muestra un error
                    imprimeError("pass1",'pass1',"Debe introducir una contraseña");

                    // Valida la contraseña mediante un patrón
                    validaContraseña("pass1","pass2");
                ?>
            </section>


            <section>
                <label for="pass2">Confirmación de Contraseña:</label>
                <input type="password" name="pass2" id="pass2" placeholder="Confirme su Contraseña" >

            </section>

            <!-- E-mail  -->
            <section>
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email"placeholder="E-mail" value="<?php

                    echo $arrayUsuario["email"];

                ?>">

                <?php
                    // En caso de que esté vacío, se muestra un error
                    imprimeError("email",'email',"Debe introducir un email");
                ?>
            </section>

            <!-- Fecha de Nacimiento -->
            <section>
                <label for="fecha">Fecha de Nacimiento:</label>
                <input type="text" name="fecha" id="fecha" size="40" value="<?php

                    echo $arrayUsuario["fecha_nacimiento"];

                    // Si no está vacío, se guarda el texto introducido
                    //validaSiVacio('fecha');
                ?>">

                <?php
                    // En caso de que esté vacío, se muestra un error
                    imprimeError("fecha",'fecha',"Debe introducir una fecha");
                ?>
            </section>
            <br>

            <!-- Editar Perfil - Input de tipo Submit -->
            <input type="submit" value="Guardar Cambios" name="Enviado">

        </form>
    </div>

    <!-- Volver al Menú -->
    <br>
    <a href="./perfil.php">Volver al Perfil</a>
</body>
</html>