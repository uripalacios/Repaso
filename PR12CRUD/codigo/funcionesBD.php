<?php
//nos vale para comprobar si existe la BBDD
function sinConexionBBDD(){
    if(!($conexion  = @mysqli_connect(IP,USER,PASS))){
        $error = mysqli_connect_errno();
        //exit nos sirve para que no se siga ejecutando, sale del programa
        //error de IP
        if($error==2002){
            echo "Error al conectar con el servidor";
        }
        if($error==1045){
            echo "Error de autentificacion de Usuario o Contraseña";
        }
        return false;
        exit();
    }else{
        mysqli_close($conexion);
        return true;
    }
}
//creacion de bton para crear la BBDD
function crearBoton(){
    echo "<form action=".$_SERVER['PHP_SELF']." method='post'><input type='submit' name ='btn' value='crearBBDD'></form>";
}

//conectar con la BBDD
function conexionBBDD(){
    if(!($conexion  = @mysqli_connect(IP,USER,PASS,BBDD))){
        return false;
    }else{
        //"Todo ha ido bien"
        mysqli_close($conexion);
       return true;
        
    }
}

//crearBBDD
function crearBBDD(){
    $miBD = new mysqli();
        $miBD->connect(IP,USER,PASS);
    
        if($miBD->connect_errno !=0){
            echo "Error de conexion";
            exit;
        }else{
            $comandosSQL = file_get_contents("./codigo/seguro/clase.sql");
            $miBD->multi_query($comandosSQL);
            $miBD->close();
        }
}

//Insert
function insert(){
    try{
        $dsn = "mysql:host=".IP.";dbname=".BBDD;
        $con = new PDO($dsn,USER,PASS);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Todo ha ido bien";
        //insertamos en al bbdd un alumno
    
        $preparada = $con->prepare("insert into alumno values (id,?,?,?,?)");
        //crear el array antes
        $arrayparametros = array($_POST['nombre'],$_POST['tel'],$_POST['media'],$_POST['fecha']);
        //o crearlo en el execute
        $preparada->execute($arrayparametros);
    }
    catch(PDOException $ex){
        echo "error: ".$ex->getMessage();
        echo "<br>";
        echo "error: ".$ex->getCode();
    }finally{
        unset($con);
    }
}

function leer(){
    try{
        $dsn = "mysql:host=".IP.";dbname=".BBDD;
        $con = new PDO($dsn,USER,PASS);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Todo ha ido bien";
        //insertamos en al bbdd un usuario
    
        $sql = "select * from alumno";
        $result = $con->query($sql);
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $cont=0;
            echo "<tr>";
                    foreach ($row as $alumno) {
                        
                        echo "<td>".$alumno."</td>";
                        
                    }
                    echo " <form action=".  $_SERVER['PHP_SELF'] ." method='post'>";
                    echo "<input type='hidden' name='contador' value=".$cont.">";
                    echo "<td><input type='submit' name='btn' value='Modificar'>";
                    echo "<input type='submit' name='btn' value='Borrar'></td>";
                    echo "</form>";
                    echo "</tr>";
                    $cont++;
        }
    }
    catch(PDOException $ex){
        echo "error: ".$ex->getMessage();
        echo "<br>";
        echo "error: ".$ex->getCode();
    }finally{
        unset($con);
    }    
}

//Comprueba boton
function compruebaBoton(){
    if(!empty($_POST['btn'])){
        if($_POST['btn']=="crearBBDD"){
            crearBBDD();
        }elseif($_POST['btn']=="Leer tabla"){
            header("Location: ./Leer.php");
        }elseif($_POST['btn']=="Insertar nuevo"){
            header("Location: ./InsertarRegistro.php");
        }elseif($_POST['btn']=="Insertar"){
            insert();
            return true;
        }
    }
}


//VALIDACION DEL FORMULARIO
function validaForm(){
    compruebaNombre('nombre');
    compruebaFecha('fecha');
    compruebaTel('tel');
    compruebaMedia('media');
    if(compruebaNombre('nombre') && compruebaFecha('fecha') && compruebaTel('tel') && compruebaMedia('media')&&compruebaBoton()){
        return true;
    }else{
        return false;
    }
}

function compruebaNombre($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\D{3,}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]=" No puede estar vacío y mínimo 3 caracteres";
        return false; 
    }
}
//funcion para mantener el nombre ya validado
function rellenaNombre(){
    if(!empty($_POST['nombre']) && preg_match('/^\D{3,}$/',$_POST['nombre']))
    echo $_POST['nombre'];
}
//FECHA
//funcion que comprueba patron de fecha y no vacio
function compruebaFecha($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\d{4}-\d{2}-\d{2}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]="El formato debe ser aaaa-mm-dd";
        return false; 
    }
}
//funcion para mantener la fecha ya validado
function rellenaFecha($id){
    if(!empty($_POST[$id]) && preg_match('/^\d{4}-\d{2}-\d{2}$/',$_POST[$id]))
    echo $_POST[$id];
}
//funcion que comprueba patron de tel y no vacio
function compruebaTel($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\d{9}$/',$_POST[$id])){
        return true;
    }else{
        $arrayError[$id]="Telefono mal introducido";
        return false; 
    }
}
//funcion para mantener el tel ya validado
function rellenaTel($id){
    if(!empty($_POST[$id]) && preg_match('/^\d{9}$/',$_POST[$id]))
    echo $_POST[$id];
}
//funcion que comprueba patron de media y no vacio
function compruebaMedia($id){
    global $arrayError;
    if(!empty($_POST[$id]) && preg_match('/^\d{1,}.\d{1,}$/',$_POST[$id]) && $_POST[$id]<=10){
        return true;
    }else{
        $arrayError[$id]="Media mal introducida(separador con punto)";
        return false; 
    }
}
//funcion para mantener el DNI ya validado
function rellenaMedia($id){
    if(!empty($_POST[$id]) && preg_match('/^\d{1,}.\d{1,}$/',$_POST[$id])&& $_POST[$id]<=10)
    echo $_POST[$id];
}
//funcion para mostrar los mensajes de error
function incompleto($id){
    global $arrayError;
    if(isset($arrayError[$id])){
        echo "<span>".$arrayError[$id]."</span>";
    }
}
?>