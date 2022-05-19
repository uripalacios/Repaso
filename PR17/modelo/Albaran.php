<?php

class Albaran{
    private $id_albaran;
    private $fecha_albaran;
    private $cod_producto;
    private $cantidad;
    private $usuario;
   

    function __construct($id,$feAl,$codPro,$cant,$usu)
    {
        $this->id_albaran = $id;
        $this->fecha_albaran = $feAl;
        $this->cod_producto = $codPro;
        $this->cantidad = $cant;
        $this->usuario = $usu;
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