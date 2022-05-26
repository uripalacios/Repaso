<?php

class JugadorDAO implements DAO{
    public static function findAll(){
        $sql = "select * from jugadores";
        $consulta = ConexionBD::ejecutaConsulta($sql,[]);
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }
    //Busca por clave primaria
    public static function findById($id){
        $sql = "select * from jugadores where codJugador=?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$id]);
        $row = $consulta->fetchObject();
        return $row;
    }
    //modifica o actualiza
    public static function update($objeto){
        $sql = "update jugadores set codJugador=?,nombre=?,posicion=?,sueldo=?,codEquipo=? where codJugador=?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[
            $objeto->codJugador,$objeto->nombre,$objeto->posicion,$objeto->sueldo,$objeto->codEquipo,$objeto->codJugador
        ]);

        
    }
    //Busca por un filtro -> nombre, codusuario etc
    public static function findFiltro($array){
       
    }
    //crea o inserta
    public static function save($objeto){
        try{
            //Solo hay que decirles los campos en el caso que no les pasemos todos
            $sql = "insert into jugadores (nombre,posicion,sueldo,codEquipo) values (?,?,?,?,?)";
            $consulta = ConexionBD::ejecutaConsulta($sql,[
                $objeto->nombre,$objeto->posicion,$objeto->sueldo,$objeto->codEquipo
            ]);
        }catch(Error $e){
            return $e->getMessage();
        }
        
    }
    //borrar
    public static function delete($id){
        $sql = "delete from jugadores where codJugador = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql, [$id]);
        return $consulta;
    }
    public static function deleteById($id)
    {
        
    }
    public static function findFiltros($filtro,$array){
        $sql = "select * from jugadores where ".$filtro;
        $consulta = ConexionBD::ejecutaConsulta($sql,$array);
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }
}

?>