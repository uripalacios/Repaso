<?php
     // Si se han pasado tanto el codigo del producto como la opcion a realizar...
     if(isset($_REQUEST["cod_p"])&&(isset($_REQUEST["añadir"])&&(isset($_REQUEST["usuario"])))){

         // Recojo el producto y el usuario a tratar
         $codigoProducto = $_REQUEST["cod_p"];
         $añadir = $_REQUEST["añadir"];
         $usuario = $_REQUEST["usuario"];

         // Se añade o se quita el producto de la lista de deseos
         configurarDeseos($codigoProducto,$añadir,$usuario);

         // Se vuelve a la lista de productos
         header("Location: ../index.php");
     }
     

     // Funcion que añade o elimina un producto de la lista de deseos
     function configurarDeseos($codigoProducto,$añadir,$usuario)
     {

         // Si no hay ninguna cookie...
         if(!isset($_COOKIE["deseados" . $usuario]))
         {
             // Si se quiere añadir...
             if($añadir == "true")
             {
                 //Cuando quiero que sea un array
                 setcookie("deseados" . $usuario . "[0]",$codigoProducto,time()+31536000,'/');
             }
         }
         else
         {
             // Si se va a añadir...
             // Array de cookies deseadas por el usuario
             $cookiesDeseados = $_COOKIE["deseados" . $usuario];

             if($añadir == "true")
             {
                 // Añado la cookie al array
                 array_push($cookiesDeseados,$codigoProducto);

                 foreach ($cookiesDeseados as $key => $value) 
                 {
                     setcookie("deseados" . $usuario . "[" . $key . "]",$value,time()+31536000,'/');
                 }
                 
             }
             // Si se va a quitar...
             else if($añadir == "false")
             {
                 // Quito la cookie de este producto
                 foreach ($cookiesDeseados as $key => $value) 
                 {
                     // Si el codigo del producto coincide con este valor... la elimino
                     if($value == $codigoProducto)
                         setcookie("deseados" . $usuario . "[" . $key . "]",$value,time() -100,'/');
                         
                 }

             }

         }
     }
    // Funcion que comprueba si un producto es deseado por el usuario
    function compruebaDeseado($producto,$usuario)
    {
        $deseado = false;

        // Si existe la cookie
        if(isset($_COOKIE["deseados" . $usuario]))
        {

            $arrayCookies = $_COOKIE["deseados" . $usuario];

            foreach ($arrayCookies as $codigoProducto) {
                
                if($producto == $codigoProducto)
                    $deseado = true;
            }
        }

        return $deseado;
    }
//recoradar la sesion
    function recuerdame(){
       
        if($_POST['recordarme']=="on")
        {

            $user = $_REQUEST['nombre'];
            $pass = $_REQUEST['pass'];
            $encrip=sha1($pass);
            setcookie("recuerdame[0]",$user, time()+31536000, '/' );
            setcookie("recuerdame[1]",$encrip, time()+31536000, '/' );
            
        }
        
    }

    
?>