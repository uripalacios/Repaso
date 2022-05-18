<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php

     
        require "../funciones/validaSesion.php";
        require "../funciones/consultas.php";

        
        session_start();
        
        // Se valida la sesion
        if(!validaSession()){
            header("Location: ../login.php");
        }
        else{
            // Recojo los datos del usuario
            $arrayUsuario = devuelveDatosUsuario($_SESSION["usuario"]);

            // Si se selecciona editar el perfil...
            if(isset($_REQUEST["Enviado"])){
                // Accedo a editarPerfil.php
                header("Location: editarPerfil.php");
            }
        }

    ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./productos.php">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./perfil.php">Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./alta.php">Registrar usuario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
      <?php if(validaPagina("insertarProducto.php")){ ?>
      <li class="nav-item">
        <a class="nav-link" href="./insertarProducto.php">Insertar Producto</a>
      </li>
      <?php }if(validaPagina("verVentas.php")){ ?>
      <li class="nav-item">
        <a class="nav-link" href="./verVentas.php">Ver ventas</a>
      </li>
      <?php }if(validaPagina("verAlbaran.php")){ ?>
      <li class="nav-item">
        <a class="nav-link" href="./verAlbaran.php">Ver albaran</a>
      </li>
      <?php } ?>
    </ul>
</nav>
    <!-- Título del Perfil -->
    <h1>Perfil de <?php echo $_SESSION["usuario"];?></h1>
    
    <!-- Datos del Usuario -->
    <!-- Formulario -->
    <div class="formulario">

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="formulario" id="idFormulario"  enctype="multipart/form-data">
            
            <!-- Nombre - Alfabetico -->
            <section>
                <label for="idNombre">Nombre:</label>

                <input type="text" name="nombre" id="idNombre" size="40" placeholder="Nombre" readonly value="<?php  
                        echo $arrayUsuario["usuario"];
                    ?>">
            </section>

            <!-- Contraseña - Input de Password -->
            <section>
                <label for="idPass">Contraseña:</label>

                <input type="password" name="contraseña" id="idPass" placeholder="Contraseña" readonly value="<?php

                    echo $arrayUsuario["clave"];
                ?>">
            </section>

            <!-- E-mail  -->
            <section>
                <label for="idEmail">E-mail:</label>
                <input type="email" name="email" id="idEmail" size="40" placeholder="E-mail" readonly value="<?php

                    echo $arrayUsuario["email"];
                ?>">
            </section>


            <section>
                <label for="idFecha">Fecha de Nacimiento:</label>
                <input type="date" name="fecha" id="idfecha" size="40" readonly value="<?php

                    echo $arrayUsuario["fecha_nacimiento"];
                ?>">

            <br>

            <?php if(validaPagina("editarPerfil.php")){   ?>
            <input type="submit" value="Editar Perfil" name="Enviado">
            <?php }?>
        </form>
    </div>


</body>
</html>