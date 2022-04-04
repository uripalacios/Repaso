<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Muestra Alumnos</title>
</head>
<body>
    <h1>Leer BBDD</h1>
    <?php
    require "./codigo/seguro/conexionBD.php";
    require "./codigo/funcionesBD.php";

    if(compruebaBoton()){
       
    }

    ?>
   
        <table class="table">
            <thead>
                <tr> 
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Media</th>
                    <th scope="col">Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                leer();

                ?>
            </tbody>
        </table>
    
</body>
</html>