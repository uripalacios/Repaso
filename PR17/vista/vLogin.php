<?php
    if(isset($_SESSION["mensaje"]))
    {
        echo $_SESSION["mensaje"];
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="">Inicio Sesion</label>
    <br>
    <label for="nombre">Nombre: 
        <input type="text" name="nombre" id="nombre">
    </label>
    <br>
    <label for="pass">Contraseña: 
        <input type="password" name="pass" id="pass">
    </label>
    <br>
    <label for="recordarme">Recordarme <input type="checkbox" name="recordarme" id="recordarme"></label>
    <br>
    <input type="submit" value="Iniciar Sesión" name="Enviado">
    <input type="submit" value="Registro" name="registro">
    <input type="submit" value="Volver" name="volver">
    
</form>

<?php
    if(isset($_SESSION["mensaje"]))
    {
        unset($_SESSION["mensaje"]);
    }
?>