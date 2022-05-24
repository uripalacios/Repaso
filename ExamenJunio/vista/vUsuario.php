
<?php
   echo "<h2>Incidencias de ".$_SESSION['nombre']."</h2>";
?>


<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <?php


    if(isset($lista))
    {            
        if(count($lista) > 0)
        {echo "<table class='table'>";
            echo "<thead>";
            echo "<th scope='col'>Aula</th>";
            echo "<th scope='col'>Equipo</th>";
            echo "<th scope='col'>Descripcion</th>";
            echo "<th scope='col'>Solucion</th>";
            echo "<th scope='col'>Fecha Incidencia</th>";
            echo "<th scope='col'>Fecha Solucion</th>";
            echo "<th scope='col'>Estado</th>";
           
            echo "</thead><tbody>";
            foreach ($lista as $value) 
            {
                
                echo "<tr>";
                //columna aula
                echo "<td>" . $value["aula"] . "</td>";
                
                //columna equipo
                echo "<td>" . $value["equipo"] . "</td>";
                
                //columna descripcion
                echo "<td>" . $value["descripcion"] . "</td>";
                
                //solucion
                echo "<td>" . $value["solucion"] . "</td>";
                 
                //columna fecha incidencia
                echo "<td>" . $value["fecha"] . "</td>";
                        
                //fecha solucion
                
                echo "<td>" . $value["fecha_solucion"] . "</td>";
                        
                //columna estado
                echo "<td>" . $value["estado"] . "</td>";
                        
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            ?>
            <input type="submit" value="Nueva incidencia" name="incidencia">
            <?php
        }
        else
        {
            echo "<h3>No hay incidencias</h3>";
        }
    }
    else
    {
        echo "<h3>No hay incidencias</h3>";
    }
?>
</form>
    