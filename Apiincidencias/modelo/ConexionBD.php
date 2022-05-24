<?PHP
//Establece toda las consultas a la BBDD

class ConexionBD{
    
    //Se le pasa la consulta preparada  ?? :
    //Y un array con todos los parametros (va a ser un array siempre) que necesite la consulta preparada
    public static function ejecutaConsulta($sql,$parametros){
        try {
            $con = new PDO("mysql:host=".IP.";dbname=".BBDD, USER, PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $consulta = $con->prepare($sql);
            //Si parametros no tiene nada que insertar no lo inserta
            $consulta->execute($parametros);
        } catch (PDOException $ex) {
            $consulta = null;
            //echo "Error: " +$ex->getMessage();
        }finally{
            unset($con);
            //Devolvemos lo que nos devuelva la consulta, caso del select
            return $consulta;
        }
    }

}


?>