

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label for="usuario">Nombre: 
            <input type="text" name="usuario" id="usuario" placeholder="Nombre de Usuario" value="<?php rellenaNombre()?>">
            <?php incompleto('usuario')?>
        </label>
        <br>
        <label for="fecha">Fecha de nacimiento:(aaaa-mm-dd) 
            <input type="text" name="fecha" id="fecha" value="<?php rellenaFecha('fecha')?>">
            <?php incompleto('fecha')?>
        </label>
        <br>
        <label for="email">Email: 
            <input type="email" name="email" id="email" value='<?php rellenaEmail()?>'>
            <?php incompleto('email')?>
        </label>
        <p>El formato de la contraseña debe ser mínimo 8 caracteres y al final una mayúscula, una minúscula y un numero </p>
        <br>
        <label for="pass1">Contraseña: 
            <input type="pass" name="pass1" id="pass1" placeholder="Contraseña" >
        </label>
        <br>
        <label for="pass2">Repita contraseña: 
            <input type="pass" name="pass2" id="pass2" placeholder="Repita contraseña">
            <?php incompleto('pass1')?>
        </label>
        <br>
        <input type="submit" name="Enviado" value="Registrar">
    <input type="submit" value="Volver" name="volver">
    
</form>