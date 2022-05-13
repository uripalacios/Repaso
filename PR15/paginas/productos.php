<?php
    require "../funciones/validaSesion.php";

    session_start();
    if(validaPagina($_SESSION['paginas'])){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <h1>Pagina principal</h1>
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