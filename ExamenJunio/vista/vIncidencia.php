
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label for="aula">Aula: 
            <input type="text" name="aula" id="aula">
           
        </label>
        <br>
        <label for="equipo">Equipo: 
            <input type="text" name="equipo" id="equipo" >
            
        </label>
        <br>
        <label for="descripcion">Descripcion: 
            <input type="text" name="descripcion" id="descripcion" >
           
        </label>
        <br>
        <label for="fecha">Fecha: 
            <input type="text" name="fecha" id="fecha" >
           
        </label>
        <br>
        <input type="submit" name="Registrar" value="registrar">
</form>