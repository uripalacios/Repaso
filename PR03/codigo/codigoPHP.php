<?php

    // Se recoge el nombre de la pagina 
    $paginaWeb = $_GET['paginaPHP'];

    // Se muestra el código que incluye el php de dicha página
    highlight_file($paginaWeb);
?>