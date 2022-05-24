<?php

class Incidencias{
    private $id;
    private $aula;
    private $equipo;
    private $descripcion;
    private $solucion;
    private $fecha;
    private $fecha_solucion;
    private $estado;
    private $idusuario;
   

    function __construct($id,$aula,$equipo,$descripcion,$solucion,$fecha,$fecha_solucion,$estado,$idusuario)
    {
        $this->id = $id;
        $this->aula = $aula;
        $this->equipo = $equipo;
        $this->descripcion = $descripcion;
        $this->solucion = $solucion;
        $this->fecha = $fecha;
        $this->fecha_solucion = $fecha_solucion;
        $this->estado = $estado;
        $this->idusuario = $idusuario;
       
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