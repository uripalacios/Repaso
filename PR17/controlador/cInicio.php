<?php
//si se ha pulsado login
if (isset($_POST['login'])) {
    $_SESSION['pagina'] = 'login';
    header('Location: index.php');
    exit();
}
// Logout
else if(isset($_POST['logout']))
{
    // Cierre de la sesion
    unset($_SESSION['validada']);
    session_destroy();

    //no hace falta pasarle la pagina porque no lleva datos
    //$_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
    exit();
}
// Perfil
else if(isset($_POST['perfil']))
{
    $_SESSION['pagina'] = 'perfil';
    header('Location: index.php');
    exit();
}
else if(isset($_POST['listaDeseos']))
{
    $lista = ProductoDAO::findAll();
    //$lista = get();

    $_SESSION['vista']=$vistas['deseos'];
    
    require_once $vistas['layout'];
}
else if(isset($_POST['verPro']))
{
    $_SESSION['vista']=$vistas['detalleProducto'];
    $producto = ProductoDAO::findById($_POST['cod_producto']);
    require_once $vistas['layout'];
}else if(isset($_POST['comprar'])){
    //busco el producto por su codigo para saber el stock que nos queda
    $producto = ProductoDAO::findById($_POST['cod_producto']);
    if($producto->cod_producto>=$_POST['cantPro']&&$_POST['cantPro']>0){
        $usuario = $_SESSION['usuario'];
        $fecha = date ('Y-m-d', time());
        $cod_producto = $producto->cod_producto;
        $cantidad = $_POST['cantPro'];
        $precioTotal = (float)$cantidad*$producto->precio;

        $nuevaVenta = new Venta(0,$usuario,$fecha,$cod_producto,$cantidad,$precioTotal);
        VentaDAO::save($nuevaVenta);

        $descripcion = $producto->descripcion;
        $precio = $producto->precio;
        $stock = $producto->stock - $cantidad;

        $modificaProducto = new Producto($cod_producto,$descripcion,$precio,$stock);
        ProductoDAO::update($modificaProducto);

        $_SESSION['vista'] = $vistas['listaProductos'];
        $lista = ProductoDAO::findAll();
        require_once $vistas['layout']; 

    }else{
        $_SESSION["mensaje"] = "Ha habido un error al realizar la compra";
        $_SESSION['vista']=$vistas['detalleProducto'];
        require_once $vistas['layout'];
    }
}
else if($_SESSION['validada']||(isset($_POST['productos']))){
    $_SESSION['vista'] = $vistas['listaProductos'];
    $lista = ProductoDAO::findAll();
    require_once $vistas['layout']; 
}else{

    //que sea la primera vez que se entra en login
    $_SESSION['vista'] = $vistas['inicio'];
    require_once $vistas['layout'];
}

?>