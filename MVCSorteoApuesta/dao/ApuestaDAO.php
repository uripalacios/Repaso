<?php

class ApuestaDAO implements DAO
{

    // Método que lista todas las apuestas
    public static function findAll()
    {
        $sql = "select id, idProfe, n1, n2, n3, n4, n5 from apuesta;";
        $consulta = ConexionBD::ejecutaConsulta($sql, []);
        $cont = 0;

        while($row = $consulta->fetchObject())
        {
            $apuesta = new Apuesta($row->id,
                $row->idProfe,$row->n1,$row->n2,$row->n3,$row->n4,$row->n5);
                $registros[$cont]=$apuesta;
                $cont++;
        }

        return $registros;
    }

    // Método que busca una apuesta por el id del usuario
    public static function findById($id)
    {
        $sql = "select id, idProfe, n1, n2, n3, n4, n5 from apuesta where idProfe=?;";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$id]);

        // Si no ha encontrado ninguna apuesta, devuelve nulo
        if($consulta->rowCount() == 0)    
            return null;

        $row = $consulta->fetchObject();
        
        $apuesta = new Apuesta($row->id,
        $row->idProfe,$row->n1,$row->n2,$row->n3,$row->n4,$row->n5);
        
        return $apuesta;
    }

    // Método que modifica/actualiza una apuesta
    public static function update($objeto)
    {
        $sql = "update apuesta set n1=?,n2=?,n3=?,n4=?,n5=? where idProfe = ?";
        
        $arrayParametros = [$objeto->n1,$objeto->n2,$objeto->n3,$objeto->n4,$objeto->n5,$objeto->idProfe];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }

    // Método que crea una nueva apuesta
    public static function save($objeto)
    {
        $sql = "insert into apuesta (id,idProfe,n1,n2,n3,n4,n5) values (?,?,?,?,?,?,?);";

        $arrayParametros = [$objeto->id,$objeto->idProfe,$objeto->n1,$objeto->n2,$objeto->n3,$objeto->n4,$objeto->n5];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }

    // Método que elimina un usuario existente
    public static function delete($objeto)
    {

    }

    // Método que elimina una apuesta en funcion de su id
    public static function deleteById($id)
    {
        $sql = "delete from apuesta where id=?;";

        $arrayParametros = [$id];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }

}
