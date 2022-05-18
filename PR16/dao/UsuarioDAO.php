<?php

class UsuarioDAO implements DAO{
    public static function findAll(){
    $sql = "select usuario, email, fecha_nacimiento, perfil from usuarios;";
    $consulta =ConexionBD::ejecutaConsulta($sql, []);
    $cont =0;
    while($row = $consulta->fetchObject())
    {
        $usuario = new Usuario($row->usuario,'',
            $row->email, $row->fecha_nacimiento,$row->perfil);
            $registros[$cont]=$usuario;
            $cont++;
    }
    return $registros;

}
    //busca por id(busca por la clave primaria)
    public static function findById($id){
            $sql = "select usuario, email,fecha_nacimiento,perfil from usuarios where usuario = ?;";
            $consulta =ConexionBD::ejecutaConsulta($sql, [$id]);
            $row = $consulta->fetchObject();
            $user = new Usuario($row->usuario,'',
            $row->email,$row->fecha_nacimiento, $row->perfil);
            return $user;
    }
    //modifica o actualiza
    public static function update($objeto){
        $sql = "update usuarios set usuario=?, clave=?, email=?,fecha_nacimiento=?,perfil=? where usuario=?;";
        $arrayParametros=[$objeto->usuario,$objeto->clave,$objeto->email,$objeto->fecha_nacimiento,$objeto->perfil,$objeto->usuario];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }
    //crear o insertar
    public static function save($objeto){
        $sql = "insert into usuarios(usuario,clave,email,fecha_nacimiento,perfil)values(?,?,?,?,?);";
        $arrayParametros=[$objeto->usuario,$objeto->clave,$objeto->email,$objeto->fecha_nacimiento,$objeto->perfil];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }
    //borrar
    public static function delete($objeto){}

   

    public static function validaUser($user,$pass){
            $encrip=sha1($pass);
            $sql = "select * from usuarios where usuario = ? and password = ?";
            $consulta = ConexionBD::ejecutaConsulta($sql,[$user,$encrip]);
            $cont = 0;
            $usuario = null;
            while ($row = $consulta->fetchObject()) {
                $usuario  = new Usuario($row->usuario,$row->clave,$row->email,$row->fecha_nacimiento,$row->perfil);
            }
            return $usuario;
        }
    
}
