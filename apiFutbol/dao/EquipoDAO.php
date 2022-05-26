<?php

class Equipo implements DAO{
    public static function findAll(){
        $sql = "select * from equipo";
        $consulta = ConexionBD::ejecutaConsulta($sql,[]);
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }
    //Busca por clave primaria
    public static function findById($id){
        $sql = "select * from equipo where codEquipo=?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$id]);
        $row = $consulta->fetchObject();
        return $row;
    }
    //modifica o actualiza
    public static function update($objeto){
        $sql = "update equipo set codEquipo=?,nombre=?,localidad=? where codEquipo=?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[
            $objeto->codEquipo,$objeto->nombre,$objeto->localidad,$objeto->codEquipo
        ]);

        
    }
    //Busca por un filtro -> nombre, codusuario etc
    public static function findFiltro($array){
       
    }
    //crea o inserta
    public static function save($objeto){
        try{
            //Solo hay que decirles los campos en el caso que no les pasemos todos
            $sql = "insert into equipo (codEquipo,nombre,localidad) values (?,?,?)";
            $consulta = ConexionBD::ejecutaConsulta($sql,[
                $objeto->codEquipo,$objeto->nombre,$objeto->localidad
            ]);
        }catch(Error $e){
            return $e->getMessage();
        }
        
    }
    //borrar
    public static function delete($id){
        $sql = "delete from equipo where codEquipo = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql, [$id]);
        return $consulta;
    }
    public static function deleteById($id)
    {
        
    }
    public static function findEstado($valor){
        $sql = "select * from incidencia where estado=?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$valor]);
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }
}

?>