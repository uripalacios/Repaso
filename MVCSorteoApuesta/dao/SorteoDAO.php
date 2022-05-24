<?php

class SorteoDAO implements DAO
{

    // Método que lista todos los sorteos
    public static function findAll()
    {
        $sql = "select id, fecha, n1, n2, n3, n4, n5 from sorteo;";
        $consulta = ConexionBD::ejecutaConsulta($sql, []);

        // Si no ha encontrado ninguna apuesta, devuelve nulo
        if($consulta->rowCount() == 0)    
            return null;

        $cont = 0;

        while($row = $consulta->fetchObject())
        {
            $sorteo = new Sorteo($row->id,
                $row->fecha,$row->n1,$row->n2,$row->n3,$row->n4,$row->n5);
                $registros[$cont]=$sorteo;
                $cont++;
        }

        return $registros;
    }

    // Método que busca un sorteo por su id
    public static function findById($id)
    {
        $sql = "select id, fecha, n1, n2, n3, n4, n5 from sorteo where id=?;";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$id]);

        $row = $consulta->fetchObject();
        
        $sorteo = new Sorteo($row->id,
        $row->fecha,$row->n1,$row->n2,$row->n3,$row->n4,$row->n5);

        return $sorteo;
    }

    // Método que modifica/actualiza una apuesta
    public static function update($objeto)
    {
        $sql = "update sorteo set id=?,fecha=?,n1=?,n2=?,n3=?,n4=?,n5=? where id=?";
        
        $arrayParametros = [$objeto->id,$objeto->fecha,$objeto->n1,$objeto->n2,$objeto->n3,$objeto->n4,$objeto->n5,$objeto->id];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }

    // Método que crea un nuevo sorteo
    public static function save($objeto)
    {
        $sql = "insert into sorteo (id,fecha,n1,n2,n3,n4,n5) values (?,?,?,?,?,?,?);";

        $arrayParametros = [$objeto->id,$objeto->fecha,$objeto->n1,$objeto->n2,$objeto->n3,$objeto->n4,$objeto->n5];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }

    // Método que elimina un usuario existente
    public static function delete($objeto)
    {

    }

    // Método que elimina una apuesta en funcion de su id
    public static function deleteById($id)
    {
        $sql = "delete from sorteo where id=?;";

        $arrayParametros = [$id];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }

}

?>