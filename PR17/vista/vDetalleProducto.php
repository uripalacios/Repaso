<h2>Detalle de Producto</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<?php
if(isset($_SESSION["mensaje"]))
{
    echo $_SESSION["mensaje"];
}
if(isset($producto)){
    
        echo "<table class='table'>";
        echo "<thead>";
        echo "<th scope='col'>COD PRODUCTO</th>";
        echo "<th scope='col'>DESCRIPCION</th>";
        echo "<th scope='col'>PRECIO</th>";
        echo "<th scope='col'>STOCK</th>";
        echo "<th scope='col'>DESEOS</th>";

        echo "</thead>";
        echo "<tbody>";
        
           
            echo "<tr>";
            echo "<td>" . $producto->cod_producto . "</td>";
            echo "<td>" . $producto->descripcion . "</td>";
            echo "<td>" . $producto->precio . "</td>";
            echo "<td>" . $producto->stock . "</td>";
            echo "<td>";
            if(compruebaDeseado($producto->cod_producto,$_SESSION["usuario"]))
            {
                echo "<a href='./core/funcionesCookies.php?cod_p=" . $producto->cod_producto . "&añadir=false&usuario=" . $_SESSION["usuario"] . "'>Quitar de deseos</a>";
            }
            else{
                echo "<a href='./core/funcionesCookies.php?cod_p=" . $producto->cod_producto . "&añadir=true&usuario=" . $_SESSION["usuario"] . "'>Añadir a deseos</a>";
            }
            echo"</td>";
            echo "</tr></table>";
        ?>
        <label for="cantPro">Cantidad a comprar:
            <input type="number" name="cantPro" id="cantPro" value="1">
        </label>
        <input type="submit" name="comprar" value="Comprar">
        <input type="hidden" name="cod_producto" value="<?php echo $producto->cod_producto?>">
        <?php

if(isset($_SESSION["mensaje"]))
{
    echo $_SESSION["mensaje"];
}
}else{
    echo "</form>";
    echo "<h3>Ha habido un error al mostrar el producto</h3>";
}

