<h2>Lista de Usuarios</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

<?php

if(isset($lista)){
    if(count($lista) > 0){
        echo "<table class='table'>";
            echo "<thead>";
            echo "<th scope='col'>COD USUARIO</th>";
            echo "<th scope='col'>EMAIL</th>";
            echo "<th scope='col'>FECHA NACIMIENTO</th>";
            echo "<th scope='col'>PERFIL</th>";
                
                
            if($_SESSION['perfil']=='ADM01'){
                echo "<th scope='col'>MODIFICAR</th>";
                echo "<th scope='col'>ELIMINAR</th>";
            }
                echo "</thead>";
                echo "<tbody>";

                foreach ($lista as $value) 
                {
                    echo "<tr>";
                    echo "<td>" . $value->usuario . "</td>";
                    echo "<td>" . $value->email . "</td>";
                    echo "<td>" . $value->fecha_nacimiento . "</td>";
                    echo "<td>" . $value->perfil . "</td>";

                    if($_SESSION['perfil']=='ADM01'){
                        //formulario para modificar y borrar si se es admin
                        echo "<td>";
                            ?>
                                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                    <input type="submit" name="modUsuario" value="Modificar" >
                                    </td><td>
                                    <input type="submit" name="eliminarUsuario" value="Eliminar" >   
                                    <input type="hidden" name="cod_usuario" value="<?php echo $value->usuario ?>">
                                </form>
                            <?php
                            echo "</td>";
                    }
                    
                        
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
    }
    else{
        echo "<h3>No hay Usuarios</h3>";
    }
}
else{
    echo "<h3>No hay Usuarios</h3>";
}
            
    ?>

</form>