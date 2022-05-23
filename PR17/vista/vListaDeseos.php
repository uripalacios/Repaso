<h2>Lista de Deseos</h2>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <?php


    if(isset($lista))
    {            
        if(count($lista) > 0)
        {
            echo "<table class='table'>";
            echo "<thead>";
            echo "<th scope='col'>COD PRODUCTO</th>";
            echo "<th scope='col'>DESCRIPCION</th>";
            echo "<th scope='col'>PRECIO</th>";
            echo "<th scope='col'>STOCK</th>";

           
            if(isset($_SESSION["validada"])){
                        if($_SESSION["validada"] == true)
                        {
                            echo "<th scope='col'>Ver</th>";
                        }
                    }

                echo "</thead>";

            $contadorDeseados = 0;

            foreach ($lista as $value) 
            {
                if(compruebaDeseado($value->cod_producto,$_SESSION["usuario"]))
                {
                    
                    echo "<tr>";

                        echo "<td>" . $value->cod_producto . "</td>";
                        echo "<td>" . $value->descripcion . "</td>";
                        echo "<td>" . $value->precio . "</td>";
                        echo "<td>" . $value->stock . "</td>";

                        if(isset($_SESSION["validada"]))
                        {
                            if($_SESSION["validada"] == true)
                            {
                                // Ver Producto
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

                    $contadorDeseados++;
                }

            }

            if($contadorDeseados == 0)
            {
                echo "<h3>No hay productos en tu lista de deseos</h3>";
            }

            echo "</tbody>";
            echo "</table>";
        }
        else
        {
            echo "<h3>No hay productos en tu lista de deseos</h3>";
        }
    }
    else
    {
        echo "<h3>No hay productos en tu lista de deseos</h3>";
    }
?>
</form>
    