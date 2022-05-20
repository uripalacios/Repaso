<h2>Lista de Productos</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

<?php

if(isset($lista)){
    if(count($lista) > 0){
        echo "<table class='table'>";
            echo "<thead>";
            echo "<th scope='col'>COD PRODUCTO</th>";
            echo "<th scope='col'>DESCRIPCION</th>";
            echo "<th scope='col'>PRECIO</th>";
            echo "<th scope='col'>STOCK</th>";
                
                
            if($_SESSION['perfil']=='Admin'){
                echo "<th scope='col'>MODIFICAR</th>";
                echo "<th scope='col'>ELIMINAR</th>";
            }
            if(isset($_SESSION["validada"])){
                        if($_SESSION["validada"] == true)
                        {
                            echo "<th scope='col'>Ver</th>";
                        }
                    }

                echo "</thead>";
                echo "<tbody>";

                foreach ($lista as $value) 
                {
                    echo "<tr>";
                    echo "<td>" . $value->cod_producto . "</td>";
                    echo "<td>" . $value->descripcion . "</td>";
                    echo "<td>" . $value->precio . "</td>";
                    echo "<td>" . $value->stock . "</td>";

                    if($_SESSION['perfil']=='Admin'){
                        //formulario para modificar y borrar si se es admin
                    }
                    if(isset($_SESSION["validada"])){
                        if($_SESSION["validada"] == true){
                            //formulario para enviar el codigo de producto y hacer detalle de producto
                            echo "<td>";
                            ?>
                                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                    <input type="submit" name="verPro" value="Ver Producto" >
                                    <input type="hidden" name="cod_producto" value="<?php echo $value->cod_producto ?>">
                                </form>
                            <?php
                            echo "</td>";
                        }
                    }
                        
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
    }
    else{
        echo "<h3>No hay productos</h3>";
    }
}
else{
    echo "<h3>No hay productos</h3>";
}
            
    ?>

</form>