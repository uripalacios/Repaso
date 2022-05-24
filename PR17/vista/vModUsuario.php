<div class="formulario">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<label for="usuario">Nombre: 
        <input type="text" name="usuario" id="usuario" placeholder="Nombre de Usuario" readonly value="<?php echo $usuario->usuario;?>">
        
        <input type="hidden" name="usuario" id="usuario" value="<?php echo $usuario->usuario;?>">
        <?php incompleto('usuario')?>
        </label>
        <br>
        <label for="fecha">Fecha de nacimiento:(aaaa-mm-dd) 
            <input type="text" name="fecha" id="fecha" value="<?php echo $usuario->fecha_nacimiento;?>">
            <?php incompleto('fecha')?>
        </label>
        <br>
        <label for="email">Email: 
            <input type="email" name="email" id="email" value='<?php echo $usuario->email;?>'>
            <?php incompleto('email')?>
        </label>
        <p>El formato de la contraseña debe ser mínimo 8 caracteres y al final una mayúscula, una minúscula y un numero </p>
       
        <label for="pass1">Contraseña: 
            <input type="password" name="pass1" id="pass1" placeholder="Contraseña" >
        </label>
        <br>
        <label for="pass2">Repita contraseña: 
            <input type="password" name="pass2" id="pass2" placeholder="Repita contraseña"  >
            <?php incompleto('pass1')?>
        </label>
        <br>
        <label for="perfil">Debe ser (ADM01,MOD01,U0001): 
            <input type="text" name="perfil" id="perfil" value='<?php echo $usuario->perfil;?>'>
            <?php incompleto('perfil')?>
        </label>
        <input type="submit" name="modificarUsu" value="Modificar">
        <input type="hidden" name="cod_usuario" value="<?php echo $usuario->usuario ?>">
</form>
