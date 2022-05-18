<?php
    require "../funciones/validaSesion.php";
    require "../funciones/consultas.php";

    session_start();
    if(validaPagina("productos.php")){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Principal</title>
</head>
<body>

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
    
    
    <?php
        mostrarProductos();
    ?> 
</body>
</html>
<?php
}else{
    header("Location: ../login.php");
}

?>