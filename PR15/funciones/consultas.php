<?php

function valida($user,$pass){
    try{
        $con = new PDO("mysql:host=".IP.";dbname=".BBDD,USER,PASS);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("select * from usuarios where usuario = :user and clave = :pass");
        //pasamos primer parametro
        $sql->bindParam(":user",$user);
        //encriptamos y pasamos el segundo
        $encrip = sha1($pass);
        $sql->bindParam(":pass",$encrip);
        $sql->execute();
        //$prueba = $sql->rowCount();
        //si coincide un valor entra y  le asignamos los datos que vamos a necesitar
        if($sql->rowCount()==1){
            session_start();
            //super sesion nombre, usuario y perfil
            $row = $sql->fetch();
            //devolveremos validada para poder acceder a la pagina
            $_SESSION['validada']=true;
            $_SESSION['usuario']= $row['usuario'];
            $_SESSION['perfil']= $row['perfil'];

            //paginas a las que tiene acceso
            $sqlp =$con->prepare( "select descripcion,url
            from paginas p join accede a on (p.codigo=a.codigoPagina)
            where codigoPerfil = :perfil or codigoPerfil = 'todos'");
            $sqlp->bindParam(":perfil",$_SESSION['perfil']);
            $sqlp->execute();

            $paginas = array();
            while($row = $sqlp->fetch()){
                $paginas[$row[0]]=$row[1];
            }
            $_SESSION['paginas']=$paginas;
            
            //cierre conexion
            unset($con);
            return true;
        }else{
            unset($con);
            return false;
        }
    }catch(PDOException $ex){

    }
}
function insertarRegistro($usuario,$email,$fecha,$pass){   

    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    try{

        $conexion = new PDO($dsn,USER,PASS);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Todo okey";
        $encrip = sha1($pass);
        // Consulta preparada
        $preparada = $conexion->prepare("insert into usuarios (usuario,email,fecha_nacimiento,clave,perfil) VALUES (?,?,?,?,'U0001')");

        $preparada->bindParam(1,$usuario);
        $preparada->bindParam(2,$email);
        $preparada->bindParam(3,$fecha);
        $preparada->bindParam(4,$encrip);

        $preparada->execute();

    }catch(PDOException $ex){
        $numError = $ex->getCode();

        // Si no existe la tabla...
        if($numError == "42S02"){
            echo "<br>Error: La tabla no existe.<br>";
        }
        
        // Error al no reconocer la BBDD
        if($numError == 1049){
            echo "<br>Error: No se reconoce la BBDD.<br>";
        }
        // Error al conectar con el servidor...
        else if($numError == 2002){
            echo "<br>Error: Error al conectar con el servidor.<br>";
        }
        // Error de autenticación...
        else if($numError == 1045){
            echo "<br>Error: Error en la autenticación.<br>";
        }
    }
    finally{
        unset($conexion);
    }
        
}
function mostrarProductos(){
 
    require "../seguro/conexionBD.php";
    // DSN
    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    try{

        $conexion = new PDO($dsn,USER,PASS);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Si se quiere filtrar por nombre...
       
        // Si se quieren mostrar todos los registros...
       
            $sql = "select * from productos;";

            $resultado = $conexion->query($sql);

            // Tabla
            echo "<br><br>";
            echo "<table class='table'>";
            echo "<thead>";

            // Primera Fila
            echo "<th scope='col'>COD PRODUCTO</th>";
            echo "<th scope='col'>DESCRIPCION</th>";
            echo "<th scope='col'>PRECIO</th>";
            echo "<th scope='col'>STOCK</th>";
            if(validaPagina("modificarProducto.php")){
                echo "<th scope='col'>MODIFICAR</th>";
                echo "<th scope='col'>ELIMINAR</th>";
            }
            echo "</thead><tbody>";

            echo "<tr>";

            while($fila = $resultado->fetch()){
                // ID
                echo "<td>";
                echo $fila["cod_producto"];
                echo "</td>";

                // NOMBRE
                echo "<td>";
                echo $fila["descripcion"];
                echo "</td>";
                
                // PRECIO
                echo "<td>";
                echo $fila["precio"];
                echo " €</td>";
            
                // FECHA
                echo "<td>";
                echo $fila["stock"];
                echo "</td>";
                
                if(validaPagina("modificarProducto.php")){
                // Modificar
                echo "<td><a href='modificarProducto.php?cod_producto=" . $fila['cod_producto'] . "&descripcion=" . $fila['descripcion'] 
                    . "&precio=" . $fila['precio'] 
                    . "&stock=" . $fila['stock'] . "'>Modificar</a></td>";

                // ELiminar
                echo "<td><a href='eliminar.php?cod_producto=" . $fila['cod_producto'] . "'>Eliminar</a></td>";
                echo "</tr>";
                }
            echo "</tr>";
            
        }
        // Fin de la tabla        
        echo"</tbody></table>";
        echo "<br><br>";
        

    }
    catch(PDOException $ex){
        $numError = $ex->getCode();

        // Si no existe la tabla...
        if($numError == "42S02"){
            echo "<br>Error: La tabla no existe.<br>";
        }
        
        // Error al no reconocer la BBDD
        if($numError == 1049){
            echo "<br>Error: No se reconoce la BBDD.<br>";
        }
        // Error al conectar con el servidor...
        else if($numError == 2002){
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

}
function eliminarProductos($id)
{   
   
    // Configuración de la conexión (dsn)
    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    try
    {
        // Conexión
        $conexion = new PDO($dsn,USER,PASS);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta preparada
        $preparada = $conexion->prepare("delete from productos where cod_producto=?;");

        $conexion->beginTransaction();

        $preparada->bindParam(1,$id);

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
        else if($numError == 1045)
        {
            echo "<br>Error: Error en la autenticación.<br>";
        }
    }
    finally
    {
        // Cierro la conexion
        unset($conexion);
    }     
        
}
function devuelveDatosProducto($codigoProducto)
{

    // DSN
    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    try
    {

        $conexion = new PDO($dsn,USER,PASS);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta
        $sql = "select * from productos where cod_producto = :codigoProducto" ;

        // Consulta preparada
        $preparada = $conexion->prepare($sql);

        $preparada->bindParam(":codigoProducto",$codigoProducto);
        
        $preparada->execute();

        // Array que contendrá los datos del producto en sesión
        $arrayProducto = $preparada->fetch();

        // Devuelvo el array con los datos del producto
        return $arrayProducto;
    }
    catch(PDOException $ex)
    {
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
        else if($numError == 1045)
        {
            echo "<br>Error: Error en la autenticación.<br>";
        }
    }
    finally
    {
        // Cierro la conexion
        unset($conexion);
    }

}
function imprimeError($idCampo, $campo, $mensaje){
        // Si se ha enviado el formulario, pero el campo está vacío...
        if (validaEnviado() && empty($_REQUEST[$campo])) 
        {
            // Imprimo un mensaje de error
            ?>
            <label for="<?php echo $idCampo ?>" style="color:red;"><?php echo $mensaje ?></label>
            <?php
        }
}

 // Función que valida que se ha enviado el formulario
 function validaEnviado(){
     // Si se ha enviado...
     if (isset($_REQUEST["Enviado"])) 
         $correcto = true;
     else 
         $correcto = false;

     return $correcto;
 }

    // Funcion que modifica un producto existente en la BBDD
function modificarProducto($codigo,$descripcion,$precio,$stock){  
    require "../seguro/conexionBD.php" ;
        // Configuración de la conexión (dsn)
        $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

        try{
            // Conexión
            $conexion = new PDO($dsn,USER,PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Recojo los datos del producto antes de ser modificado
            $productoPrevio = devuelveDatosProducto($codigo);

            // Consulta preparada
            $preparada = $conexion->prepare("update productos set cod_producto=?,descripcion=?,precio=?,stock=? where cod_producto=?");

            $conexion->beginTransaction();

            $preparada->bindParam(1,$codigo);
            $preparada->bindParam(2,$descripcion);
            $preparada->bindParam(3,$precio);
            $preparada->bindParam(4,$stock);


            $preparada->execute();

            $conexion->commit();
            $preparada->closeCursor();

        }catch(PDOException $ex){
            // Se deshace la acción
            $conexion->rollBack();

            $numError = $ex->getCode();

            // Si no existe la tabla...
            if($numError == "42S02"){
                echo "<br>Error: La tabla no existe.<br>";
            }
            
            // Error al no reconocer la BBDD
            if($numError == 1049){
                echo "<br>Error: No se reconoce la BBDD.<br>";
            }
            // Error al conectar con el servidor...
            else if($numError == 2002){
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

        // Se vuelve de nuevo a productos.php
        header("Location: ./productos.php");        
            
}
function validaFormularioP(){
        // Si se ha enviado el formulario...
        if (validaEnviado()) {
            $correcto = true;

            if (empty($_REQUEST['cod_producto']))
                    $correcto = false;

            // Descripcion
            if (empty($_REQUEST['descripcion']))
                $correcto = false;

            // Precio
            if (empty($_REQUEST['precio']))
                $correcto = false;

            // Stock
            if (empty($_REQUEST['stock']))
                $correcto = false;
            
        }
        // Si no...
        else 
            $correcto = false;
        
        return $correcto;
    }

    function validaCodigoProducto($validando)
    {
            
    $correcto = true;

    // Se valida la sesion
    if(validaPagina("modificarProducto.php"))
    {
        // DSN
        $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

        try
        {
            $conexion = new PDO($dsn,USER,PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consulta
            $sql = "select * from productos;";
            $resultado = $conexion->query($sql);

            // Recorro los resultados -> Mientras haya productos...
            while($fila = $resultado->fetch())
            {
                if(isset($_REQUEST["cod_producto"]))
                {
                    // Si el codigo de este producto coincide con el que se quiere crear
                    if($_REQUEST["cod_producto"] == $fila["cod_producto"])
                    {
                        $correcto = false;

                        if($validando)
                        {
                            imprimeError("idCodigo","codigo","El codigo del producto introducido ya existe");

                            ?>
                            <label for="<?php echo "idCodigo" ?>" style="color:red;"><?php echo "El codigo del producto introducido ya existe" ?></label>
                            <?php
                        }
                    }
                    
                }
                
            }

            return $correcto;

        }
        catch(PDOException $ex)
        {
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
            else if($numError == 1045)
            {
                echo "<br>Error: Error en la autenticación.<br>";
            }
        }
        finally
        {
            // Cierro la conexion
            unset($conexion);
        }
    }
    else
    {
        // Se vuelve al login.php
        header("Location: ../login.php");
        }
}
// Funcion que devuelve los datos de un usuario dado en forma de array (accediendo a la BBDD)
function devuelveDatosUsuario($usuario){
    require "../seguro/conexionBD.php";
    // DSN
    $dsn = "mysql:host=" . IP . ";dbname=" . BBDD;

    $arrayUsuario = [];

    try{

        $conexion = new PDO($dsn,USER,PASS);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta
        $sql = "select * from usuarios where usuario = :nombreUsuario" ;

        // Consulta preparada
        $preparada = $conexion->prepare($sql);

        $preparada->bindParam(":nombreUsuario",$usuario);
        
        $preparada->execute();

        // Array que contendrá los datos del usuario en sesión
        $arrayUsuario = $preparada->fetch();

        // Guardo el array en la sesion
        $_SESSION["arrayUsuario"] = $arrayUsuario;

        // Devuelvo el array con los datos del usuario
        return $arrayUsuario;
    }
    catch(PDOException $ex){
        $numError = $ex->getCode();

        // Si no existe la tabla...
        if($numError == "42S02"){
            echo "<br>Error: La tabla no existe.<br>";
        }
        
        // Error al no reconocer la BBDD
        if($numError == 1049){
            echo "<br>Error: No se reconoce la BBDD.<br>";
        }
        // Error al conectar con el servidor...
        else if($numError == 2002){
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
}


?>
