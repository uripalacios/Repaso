<h2>Detalle de Producto</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<?php
if(isset($producto)){
    
        echo "<table class='table'>";
        echo "<thead>";
        echo "<th scope='col'>COD PRODUCTO</th>";
        echo "<th scope='col'>DESCRIPCION</th>";
        echo "<th scope='col'>PRECIO</th>";
        echo "<th scope='col'>STOCK</th>";

        echo "</thead>";
        echo "<tbody>";
        
           
            echo "<tr>";
            echo "<td>" . $producto->cod_producto . "</td>";
            echo "<td>" . $producto->descripcion . "</td>";
            echo "<td>" . $producto->precio . "</td>";
            echo "<td>" . $producto->stock . "</td>";
        
        echo "</tr></table>";
   
}else{
    echo "<h3>Ha habido un error al mostrar el producto</h3>";
}

