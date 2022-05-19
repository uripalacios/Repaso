<?php

class Producto{
    private $cod_producto;
    private $descripcion;
    private $precio;
    private $stock;
   

    function __construct($codPro,$desc,$pre,$stock)
    {
        $this->cod_producto = $codPro;
        $this->descripcion = $desc;
        $this->precio = $pre;
        $this->stock = $stock;
       
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