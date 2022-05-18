<?php

require "../funciones/consultas.php";

session_start();
eliminarProductos($_REQUEST['cod_producto']);
header("Location: ./productos.php");
?>