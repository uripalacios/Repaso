<?php

class Jugador{
    private $codJugador;
    private $nombre;
    private $posicion;
    private $sueldo;
    private $codEquipo;

    function __construct($codJugador,$nombre,$posicion,$sueldo,$codEquipo)
    {
        $this->codJugador = $codJugador;
        $this->nombre = $nombre;
        $this->posicion = $posicion;
        $this->sueldo = $sueldo;
        $this->codEquipo = $codEquipo;
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