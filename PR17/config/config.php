<?php

require "./config/datosBD.php";
require "./modelo/ConexionBD.php";
require './dao/DAO.php';
require "./modelo/Usuario.php";
require './dao/UsuarioDAO.php';
require "./modelo/Albaran.php";
require './dao/AlbaranDAO.php';
require "./modelo/Producto.php";
require "./dao/ProductoDAO.php";
require "./modelo/Venta.php";
require "./dao/VentaDAO.php";
require "./core/funcionesCookies.php";
require_once "./core/curl.php";

$controladores = [
    'inicio' => 'controlador/cInicio.php',
    'login' => 'controlador/cLogin.php',
    'registro' => 'controlador/cRegistro.php',
    'perfil' => 'controlador/cPerfil.php',
    'producto' => 'controlador/cProducto.php',
    'perfil' => 'controlador/cPerfil.php'
];

$vistas = [
    'inicio' => 'vista/vInicio.php',
    'login' => 'vista/vLogin.php',
    'layout' => 'vista/vLayout.php',
    'registro' => 'vista/vRegistro.php',
    'perfil' => 'vista/vPerfil.php',
    'listaProductos' => 'vista/vListaProductos.php',
    'detalleProducto' => 'vista/vDetalleProducto.php',
    'deseos' => 'vista/vListaDeseos.php'
];