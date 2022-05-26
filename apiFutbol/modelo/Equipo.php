<?php

class Equipo{
    private $codEquipo;
    private $nombre;
    private $localidad;
    
    function __construct($codEquipo,$nombre,$localidad)
    {
        $this->codEquipo = $codEquipo;
        $this->nombre = $nombre;
        $this->localidad = $localidad;
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