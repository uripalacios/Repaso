<?php




    // Funcion que invoca al resto de funciones que van validando el formulario
    function validaFormulario(){
        // Si se ha enviado el formulario...
        if (validaEnviado()) {
            $correcto = true;

            // Nombre
            if (empty($_REQUEST['nombre']))
                $correcto = false;

            // Contraseña
            if (empty($_REQUEST['contraseña'])||(validaContraseña("pass1","pass2") == false))
                $correcto = false;

            // Fecha de Nacimiento
            if (empty($_REQUEST['fecha']))
                $correcto = false;

            // Email
            if (empty($_REQUEST['email']))
                $correcto = false;
            
        }
        // Si no...
        else 
            $correcto = false;
        
        return $correcto;
    }


    // Funcion que valida si está vacío un campo
    function validaSiVacio($campo){
        // Si se ha enviado el formulario...
        if (validaEnviado()){
            // Si no está vacío
            if (!empty($_REQUEST[$campo])) 
            {
                // Muestro el valor del campo en el input
                echo $_REQUEST[$campo];

                $correcto = true;
            }
            else 
                $correcto = false;

            return $correcto;
        }
    }



    // Funcion que valida la contraseña del usuario con un patrón
function validaContraseña($pass1,$pass2){
        

        $correcto = false;

        if(!empty($_POST[$pass1]) && preg_match('/[\D\d]{8,}/',$_POST[$pass1])&& preg_match('/[A-Z]{1,}/',$_POST[$pass1])
        && preg_match('/[a-z]{1,}/',$_POST[$pass1])&& preg_match('/\d{1,}/',$_POST[$pass1])&& $_POST[$pass1]==$_POST[$pass2]){
                $correcto = true;
            }else{
                $correcto = false;
            ?>
            <label for="<?php  ?>" style="color:red;"><?php echo "Debe introducir una contraseña válida" ?></label>
            <?php
          
                
            }

        return $correcto;
    }

 

    // Funcion que modifica un nuevo usuario existente en la BBDD
    function modificarUsuario($usuario,$pass,$email,$fechaNacimiento)
    {   
        require("../seguro/conexionBD.php");
        // Configuración de la conexión (dsn)
        $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

        try
        {
            // Conexión
            $conexion = new PDO($dsn,USER,PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $encrip = sha1($pass);
            // Consulta preparada
            $preparada = $conexion->prepare("update usuarios set usuario=?,clave=?,email=?,fecha_nacimiento=?,perfil=? where usuario=?");

            $conexion->beginTransaction();

            // Recojo el perfil de dicho usuario (es invariable)
            $arrayUsuario = devuelveDatosUsuario($usuario);
            $perfil = $arrayUsuario["perfil"];;

            $preparada->bindParam(1,$usuario);
            $preparada->bindParam(2,$encrip);
            $preparada->bindParam(3,$email);
            $preparada->bindParam(4,$fechaNacimiento);
            $preparada->bindParam(5,$perfil);
            $preparada->bindParam(6,$usuario);

            $preparada->execute();

            $conexion->commit();
            $preparada->closeCursor();

        }catch(PDOException $ex)
        {
            // Se deshace la acción
            $conexion->rollBack();
            
            $numError = $ex->getCode();

            // Si no existe la tabla...
            if($numError == "42S02")
            {
                echo "<br>Error: La tabla no existe.<br>";
            }
            
            // Error al no reconocer la BBDD
            if($numError == 1049)
            {
                echo "<br>Error: No se reconoce la BBDD.<br>";
            }
            // Error al conectar con el servidor...
            else if($numError == 2002)
            {
                echo "<br>Error: Error al conectar con el servidor.<br>";
            }
            // Error de autenticación...
            else if($numError == 1045){
                echo "<br>Error: Error en la autenticación.<br>";
            }
        }
        finally{
            // Cierro la conexion
            unset($conexion);
        }

        // Se vuelve de nuevo a perfil.php
        header("Location: ./perfil.php");        
            
    }


?>