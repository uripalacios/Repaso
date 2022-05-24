<?php

//include './core/funcionesValidarGenericas.php';
include './core/funcionesApuesta.php';
include './core/funcionesSorteo.php';

require './config/datosBD.php';
require './modelo/ConexionBD.php';

require './dao/DAO.php';
require './modelo/Usuario.php';
require './dao/UsuarioDAO.php';
require './modelo/Apuesta.php';
require './dao/ApuestaDAO.php';
require './modelo/Sorteo.php';
require './dao/SorteoDAO.php';

$controladores = [
    'login' => 'controlador/cLogin.php',
    'inicio' => 'controlador/cInicio.php',
    'apuesta' => 'controlador/cApuesta.php',
    'sorteo' => 'controlador/cSorteo.php',
];

$vistas = [
    'inicio' => 'vista/vInicio.php',
    'login' => 'vista/vLogin.php',
    'layout' => 'vista/vLayout.php',
    'apuesta' => 'vista/vApuesta.php',
    'sorteo' => 'vista/vSorteo.php',
];