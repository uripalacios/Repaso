<?php
require "../funciones/validaSesion.php";
    require "../funciones/consultas.php";

    session_start();
    if(validaPagina("modificarProducto.php")){

        // Si se selecciona 'Guardar Cambios'...
            if(isset($_REQUEST["Enviado"])&&validaFormularioP()){
                if($_REQUEST["Enviado"] == "Guardar Cambios"){
                    // Guardo los cambios del usuario en la BBDD
                    modificarProducto($_REQUEST["cod_producto"],$_REQUEST["descripcion"],$_REQUEST["precio"],$_REQUEST["stock"],false);
            
                }
            }else{
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
<div class="formulario">

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="formulario" id="idFormulario"  enctype="multipart/form-data">
    

    <section>
        <label for="cod_producto">Codigo:</label>

        <input type="text" name="cod_producto" id="cod_producto" size="25" placeholder="Código" readonly value="<?php  
                
                // Valor
                echo $_REQUEST['cod_producto'];
            ?>">
    </section>

    <section>
        <label for="descripcion">Descripción:</label>

        <input type="text" id="descripcion" name="descripcion" size="50" placeholder="Descripción" value="<?php

            // Valor
            echo $_REQUEST['descripcion'];
        ?>">

        <?php
            // En caso de que esté vacío, se muestra un error
            imprimeError("idDescripcion",'descripcion',"Debe introducir una descripción");
        ?>
    </section>

     <section>
        <label for="precio">Precio (€):</label>

        <input type="number" id="precio" name="precio" step="any" min="0" placeholder="Precio (€)" value="<?php

            // Valor
            echo $_REQUEST['precio'];
        ?>">

        <?php
            // En caso de que esté vacío, se muestra un error
            imprimeError("precio",'precio',"Debe introducir un precio (€)");
        ?>
    </section>

    <!-- Stock - Entero (solo lectura) -->
    <section>
        <label for="stock">Stock:</label>

        <input type="number" id="stock" name="stock" step="any" min="0" placeholder="Stock" readonly value="<?php

            // Valor
            echo $_REQUEST['stock'];
        ?>">

        <?php
            // En caso de que esté vacío, se muestra un error
            imprimeError("stock",'stock',"Debe introducir un stock");
        ?>
    </section>
    <hr>
    <!-- Guardar Cambios - Input de tipo Submit -->
    <input type="submit" value="Guardar Cambios" id="idGuardarCambios" name="Enviado">
    
</form>
</div>
</body>
</html>
<?php
            }
    }else{
        header("Location: ./productos.php");
    }
?>