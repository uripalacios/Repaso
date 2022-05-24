

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">


<select name="seleccione">
    <option value="0"<?php rellenaCombo('0')?>>Seleccione</option> 
    <option value="solucionada"<?php rellenaCombo('solucionada')?>>solucionada</option> 
    <option value="pendiente"<?php rellenaCombo('pendiente')?>>pendiente</option> 
    <option value="creada"<?php rellenaCombo('creada')?>>creada</option>
</select>
<input type="submit" value="filtrar" name="filtrar">
</form>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <?php
echo $_POST['seleccione'];

    if(isset($lista))
    {            
        if(count($lista) > 0)
        {
            echo "<table class='table'>";
            echo "<thead>";
            echo "<th scope='col'>Aula</th>";
            echo "<th scope='col'>Equipo</th>";
            echo "<th scope='col'>Descripcion</th>";
            echo "<th scope='col'>Solucion</th>";
            echo "<th scope='col'>Fecha Incidencia</th>";
            echo "<th scope='col'>Fecha Solucion</th>";
            echo "<th scope='col'>Estado</th>";
            echo "<th scope='col'>Modificar</th>";
            echo "<th scope='col'>Borrar </th>";
           
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
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <?php
                        if($value["estado"]=="solucionada"){
                            echo "<td>" . $value["solucion"] . "</td>";
                        }elseif($value["estado"]=="pendiente"){
                            echo "<td>";
                            ?>
                            <input type="text" name="solucion" id="solucion">
                            <?php
                            echo "</td>";
                        }else{
                            echo "<td>" . $value["solucion"] . "</td>";
                        }
                        //columna fecha incidencia
                        echo "<td>" . $value["fecha"] . "</td>";
                        
                        //fecha solucion
                        if($value["estado"]=="solucionada"){
                            echo "<td>" . $value["fecha_solucion"] . "</td>";
                        }elseif($value["estado"]=="pendiente"){
                            echo "<td>";
                            ?>
                            <input type="text" name="fecha_solucion" id="fecha_solucion">
                            <?php
                            echo "</td>";
                        }else{
                            echo "<td>" . $value["fecha_solucion"] . "</td>";
                            
                        }
                        //columna estado
                        echo "<td>" . $value["estado"] . "</td>";
                        

                        //iniciado o solucionado
                        echo "<td>";
                        ?>
                            <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                            <input type="hidden" name="aula" value="<?php echo $value["aula"] ?>">
                            <input type="hidden" name="equipo" value="<?php echo $value["equipo"] ?>">
                            <input type="hidden" name="descripcion" value="<?php echo $value["descripcion"] ?>">
                            <?php
                                if($value["estado"]!="pendiente"){
                                    ?>
                                    <input type="hidden" name="solucion" value="<?php echo $value["solucion"] ?>">
                                    <input type="hidden" name="fecha_solucion" value="<?php echo $value["fecha_solucion"] ?>">
                                    <?php
                                }
                            ?>
                            
                            <input type="hidden" name="fecha" value="<?php echo $value["fecha"] ?>">
                            <input type="hidden" name="estado" value="<?php echo $value["estado"] ?>">
                            <input type="hidden" name="idusuario" value="<?php echo $value["idusuario"] ?>">
                            <input type="submit" value="Iniciado" name="iniciado">
                            <input type="submit" value="Solucionado" name="solucionado">

                        </form>
                        <?php
                        echo "</td>";

                        //borrado de las incidencias
                        echo "<td>";
                        ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                                <input type="submit" value="Borrar" name="borrar">
                            </form>
                        <?php
                        echo "</td>";
                    echo "</tr>";

                  

            }

            

            echo "</tbody>";
            echo "</table>";
        }
        else
        {
            echo "<h3>No se han podido acceder a los datos</h3>";
        }
    }
    else
    {
        echo "<h3>No se han podido acceder a los datos</h3>";
    }
?>
</form>
    