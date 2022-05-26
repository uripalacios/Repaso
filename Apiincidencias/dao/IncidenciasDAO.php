<?php

class IncidenciasDAO implements DAO{
    public static function findAll(){
        $sql = "select * from incidencia";
        $consulta = ConexionBD::ejecutaConsulta($sql,[]);
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }
    //Busca por clave primaria
    public static function findById($id){
        $sql = "select * from incidencia where idusuario=?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$id]);
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }
    //modifica o actualiza
    public static function update($objeto){
        $sql = "update incidencia set solucion=?,fecha_solucion=?,estado=? where id=?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[
            $objeto->solucion,$objeto->fecha_solucion,$objeto->estado,$objeto->id
        ]);

        
    }
    //Busca por un filtro -> nombre, codusuario etc
    public static function findFiltro($array){
       
    }
    //crea o inserta
    public static function save($objeto){
        try{
            //Solo hay que decirles los campos en el caso que no les pasemos todos
            $sql = "insert into incidencia (aula,equipo,descripcion,fecha,idusuario) values (?,?,?,?,?)";
            $consulta = ConexionBD::ejecutaConsulta($sql,[
                $objeto->aula,$objeto->equipo,$objeto->descripcion,$objeto->fecha,$objeto->idusuario
            ]);
        }catch(Error $e){
            return $e->getMessage();
        }
        
    }
    //borrar
    public static function delete($id){
        $sql = "delete from incidencia where id = ?";
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