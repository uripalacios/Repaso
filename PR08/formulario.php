<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valida Formulario</title>
</head>
<body>
    <h1>Formulario de Registro</h1>
    <?php
    require "./codigo/ValidaForm.php";

    if(validaFormulario()){

    }else{
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="alfabetico">Alfabetico
            <input type="text" name="alfabetico" id="alfabetico" placeholder="Nombre" value="<?php rellenaAlfabetico()?>">
            <?php incompleto('alfabetico')?>
        </label>
        <br>
        <label for="alfabeticoOp">Alfabetico Opcional
            <input type="text" name="alfabeticoOp" id="alfabeticoOp" placeholder="Nombre" value="<?php rellena('alfabeticoOp')?>">
        </label>
        <br>
        <label for="alfanumerico">Alfanumerico
            <input type="text" name="alfanumerico" id="alfanumerico" placeholder="Apellido" value="<?php rellenaAlfanumerico()?>">
        </label>
        <br>
        <label for="alfanumericoOp">Alfanumerico Opcional
            <input type="text" name="alfanumericoOp" id="alfanumericoOp" placeholder="Apellido">
        </label>
        <br>
        <label for="fecha">Fecha
            <input type="date" name="fecha" id="fecha">
        </label>
        <br>
        <label for="fechaOp">Fecha Opcional
            <input type="date" name="fechaOp" id="fechaOp">
        </label>
        <br>
        <label for="radio">Radio Obligatorio</label><br>
        <input type="radio" name="radio" id="op1">Opcion1
        <input type="radio" name="radio" id="op2">Opcion2
        <input type="radio" name="radio" id="op3">Opcion3
        <br>
        <label for="seleccione">Elige una opcion
            <select name="seleccione">
                <option value="0">Seleccione</option> 
                <option value="1">Opcion1</option> 
                <option value="2">Opcion2</option> 
                <option value="3">Opcion3</option>
            </select>
        </label>
        <br>
        <label for="check">Elige al menos 1 y maximo 3:</label><br>
            <input type="checkbox" name="check" id="check1">Check1
            <input type="checkbox" name="check" id="check2">Check2
            <input type="checkbox" name="check" id="check3">Check3
            <input type="checkbox" name="check" id="check4">Check4
            <input type="checkbox" name="check" id="check5">Check5
            <input type="checkbox" name="check" id="check6">Check6
        <br>
        <br>
        <label for="tel">Nº Telefono
            <input type="tel" name="tel" id="tel" placeholder="654987321">
        </label>
        <br>
        <label for="email">Email
            <input type="email" name="email" id="email">
        </label>
        <br>
        <label for="pass">Contraseña
            <input type="password" name="pass" id="pass">
        </label>
        <br>
        <label for="doc">Subir documento
            <input type="file" name="doc" id="doc">
        </label>
        <br>
        <input type="submit" name="Enviado" value="Enviar">
    </form>
    <?php
    }
    ?>
</body>
</html>