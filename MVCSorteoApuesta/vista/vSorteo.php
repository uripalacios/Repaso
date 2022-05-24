<?php

    echo "<h1>Sorteo</h1>";

    ?>
        <!-- Checks -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            
    <?php

    if(isset($lista))
    {            
        if(count($lista) > 0)
        {
            echo "<table class='table'>";
                echo "<thead>";
                    echo "<th><b>Id Apuesta</b></th>";
                    echo "<th><b>Id Usuario</b></th>";
                    echo "<th><b>n1</b></th>";
                    echo "<th><b>n2</b></th>";
                    echo "<th><b>n3</b></th>";
                    echo "<th><b>n4</b></th>";
                    echo "<th><b>n5</b></th>";
                    
                    echo "</thead>";
                    echo "<tbody>";
            
                    foreach ($lista as $value) 
                    {
                        echo "<tr>";
                            echo "<td>" . $value->id . "</td>";
                            echo "<td>" . $value->idProfe . "</td>";
                            echo "<td>" . $value->n1 . "</td>";
                            echo "<td>" . $value->n2 . "</td>";
                            echo "<td>" . $value->n3 . "</td>";
                            echo "<td>" . $value->n4 . "</td>";
                            echo "<td>" . $value->n5 . "</td>";
                        echo "</tr>";
                    }
                    
                    echo "</tbody>";
                    echo "</table>";
            }
            else
            {
                echo "<h3>No hay apuestas</h3>";
            }
    }
    else
    {
        echo "<h3>No hay apuestas</h3>";
    }

    echo "<hr>";


    // Compruebo si hay un sorteo o no...
    if($sorteo)
    {
        echo "Ya se ha realizado el sorteo.";
    }
    else
    {
        echo "<input type='submit' value='Sortear' name='sortear'>";
    }

    ?>
    </form>
    <?php
?>