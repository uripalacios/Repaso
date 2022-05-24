<?php


include './core/curl.php';
include './core/funciones.php';

require './config/datosBD.php';
require './modelo/ConexionBD.php';

require './dao/DAO.php';
require './modelo/Usuario.php';
require './dao/UsuarioDAO.php';


$controladores = [
    'login' => 'controlador/cLogin.php',
    'inicio' => 'controlador/cInicio.php',
    'usuario' => 'controlador/cUsuario.php',
    'admin' => 'controlador/cAdmin.php',
];

$vistas = [
    'inicio' => 'vista/vInicio.php',
    'login' => 'vista/vLogin.php',
    'layout' => 'vista/vLayout.php',
    'usuario' => 'vista/vUsuario.php',
    'incidencia' => 'vista/vIncidencia.php',
    'admin' => 'vista/vAdmin.php'
];