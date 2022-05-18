<?php

class Venta{
    private $id;
    private $usuario;
    private $fecha_compra;
    private $cod_producto;
    private $cantidad;
    private $precio_total;
   

    function __construct($id,$usu,$feCom,$codPro,$cant,$preTo)
    {
        $this->id = $id;
        $this->usuario = $usu;
        $this->fecha_compra = $feCom;
        $this->cod_producto = $codPro;
        $this->cantidad = $cant;
        $this->precio_total = $preTo;
       
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