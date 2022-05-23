<?php

class ProductoDAO implements DAO{
    public static function findAll(){
        $sql = "select cod_producto, descripcion, precio, stock from productos";
        $consulta = ConexionBD::ejecutaConsulta($sql,[]);
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }
    //Busca por clave primaria
    public static function findById($id){
        $sql = "select cod_producto, descripcion, precio, stock from productos where cod_producto=?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$id]);
        $row = $consulta->fetchObject();
        return $row;
    }
    //modifica o actualiza
    public static function update($objeto){
        $sql = "update productos set cod_producto=?,descripcion=?,precio=?,stock=? where cod_producto=?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[
            $objeto->cod_producto,$objeto->descripcion,$objeto->precio,$objeto->stock,$objeto->cod_producto
        ]);

        //Si el numero de filas afectadas es 1 busca el objeto y lo devuelve
        if($consulta->rowCount()==1){
            return ProductoDAO::findById($objeto->cod_producto);
        //Sino no existe el codUsuario
        }else{
            return null;
        }
    }
    //Busca por un filtro -> nombre, codusuario etc
    public static function findFiltro($array){
       
    }
    //crea o inserta
    public static function save($objeto){
        try{
            //Solo hay que decirles los campos en el caso que no les pasemos todos
            $sql = "insert into productos (cod_producto,descripcion,precio,stock) values (?,?,?,?)";
            $consulta = ConexionBD::ejecutaConsulta($sql,[
                $objeto->cod_producto,$objeto->descripcion,$objeto->precio,$objeto->stock
            ]);
        }catch(Error $e){
            return $e->getMessage();
        }
        //Devolvemos el objeto producto si no esta duplicado
        if(!$consulta){
            return null;
        }
        return ProductoDAO::findById($objeto->cod_producto);
    }
    //borrar
    public static function delete($id){
        $sql = "delete from producto where cod_producto = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql, [$id]);
        return $consulta;
    }
}

?>