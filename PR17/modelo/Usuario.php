<?php

class Usuario{
    private $usuario;
    private $clave;
    private $email;
    private $fecha_nacimiento;
    private $perfil;
    //private $fechaUltConexion;

    function __construct($usu,$pass,$email,$fecha,$perfil)
    {
        $this->usuario = $usu;
        $this->clave = $pass;
        $this->email = $email;
        $this->fecha_nacimiento = $fecha;
        $this->perfil = $perfil;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name,$valor)
    {
        $this->$name = $valor;
    }
}