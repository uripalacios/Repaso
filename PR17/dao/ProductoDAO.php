<?php

class ProductoDAO implements DAO{

    // Método que lista todos los productos
    public static function findAll(){
        $sql = "select cod_producto, descripcion, precio, stock from productos;";
        $consulta = ConexionBD::ejecutaConsulta($sql, []);
        $cont = 0;

        while($row = $consulta->fetchObject()){
            $producto = new Producto($row->cod_producto,$row->descripcion, $row->precio,$row->stock);
            $registros[$cont] = $producto;
            $cont++;
        }

        if(isset($registros))
        return $registros;
    }

    // Método que busca un producto por su codigo_producto
    public static function findById($codigoProducto){
        $sql = "select cod_producto, descripcion, precio, stock from productos where cod_producto=?;";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$codigoProducto]);

        $row = $consulta->fetchObject();
        
        $producto = new Producto($row->cod_producto,$row->descripcion, $row->precio,$row->stock);
        return $producto;
    }

    // Método que modifica/actualiza un producto
    public static function update($objeto){
        $sql = "update productos set cod_producto=?,descripcion=?,precio=?,stock=? where cod_producto=?";
        
        $arrayParametros = [$objeto->cod_producto,$objeto->descripcion,$objeto->precio,$objeto->stock,$objeto->cod_producto];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }

    // Método que crea un nuevo producto
    public static function save($objeto){
        $sql = "insert into productos (cod_producto,descripcion,precio,stock) values (?,?,?,?);";

        $arrayParametros = [$objeto->cod_producto,$objeto->descripcion,$objeto->precio,$objeto->stock];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }

    // Método que elimina un usuario existente
    public static function delete($objeto){}

    // Método que elimina un usuario en funcion de su id
    public static function deleteById($id){
        $sql = "delete from productos where cod_producto=?;";

        $arrayParametros = [$id];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }

}

?>