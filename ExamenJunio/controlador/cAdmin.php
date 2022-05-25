<?php
if(isset($_POST['logout']))
{
    // Cierre de la sesion
    unset($_SESSION['validada']);
    session_destroy();

    $_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
    exit();
}
//pulsar filtrar
else if(isset($_POST['filtrar'])){
   if($_POST['seleccione']!="0"){
        $filtroestado = $_POST['seleccione'];
        $lista = getEstado($filtroestado);
        $lista=json_decode($lista,true);
   }else{

       $lista=get();
       $lista=json_decode($lista,true);
   }

   
    $_SESSION['vista'] = $vistas['admin'];
    require_once $vistas['layout'];
}
//pulsar iniciar
else if(isset($_POST['iniciado'])){
    $estado = 'pendiente';
    put($estado);
    //busco la lista de incidencias
    $lista=get();
    $lista=json_decode($lista,true);

   
    $_SESSION['vista'] = $vistas['admin'];
    require_once $vistas['layout'];
}
//pulsar solucionar
else if(isset($_POST['solucionado'])){
    $estado = 'solucionada';
    put($estado);
    //busco la lista de incidencias
    $lista=get();
    $lista=json_decode($lista,true);

   
    $_SESSION['vista'] = $vistas['admin'];
    require_once $vistas['layout'];
}
//borrar incidencia
else if(isset($_POST['borrar'])){
    delete($_POST['id']);

    $lista=get();
    $lista=json_decode($lista,true);

   
    $_SESSION['vista'] = $vistas['admin'];
    require_once $vistas['layout'];
}
else
{
    //busco la lista de incidencias
    $lista=get();
    $lista=json_decode($lista,true);

    // Que sea la primera vez que se entra en inicio tras loguearse //
    $_SESSION['vista'] = $vistas['admin'];
    require_once $vistas['layout'];    
}
?>