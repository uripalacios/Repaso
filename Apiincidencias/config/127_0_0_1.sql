-- phpMyAdmin SQL Dump


--
-- Base de datos: `examenjuniodwes`
--
DROP DATABASE IF EXISTS `examenjuniodwes`;
CREATE DATABASE IF NOT EXISTS `examenjuniodwes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `examenjuniodwes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

DROP TABLE IF EXISTS `incidencia`;
CREATE TABLE `incidencia` (
  `id` int(11) NOT NULL,
  `aula` int(11) NOT NULL,
  `equipo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `solucion` varchar(50) DEFAULT NULL,
  `fecha` varchar(20) NOT NULL,
  `fecha_solucion` varchar(20) NOT NULL,
  `estado` enum('creada','pendiente','solucionada') DEFAULT 'creada',
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id`, `aula`, `equipo`, `descripcion`, `solucion`, `fecha`, `fecha_solucion`, `estado`, `idusuario`) VALUES
(1, 523, 10, 'No conecta a interne', 'Configurar ip', '2022-05-23', '2022-05-24', 'solucionada', 2),
(2, 520, 1, 'La pantalla se ve casi sin color', NULL, '2022-05-23', '', 'creada', 3),
(3, 325, 3, 'No funciona internet', 'cambio de cable', '2022-05-23', '2022-05-24', 'solucionada', 3),
(4, 103, 5, 'No se conecta el cañon', '', '2022-05-23', '', 'pendiente', 3),
(5, 1, 1, 'no funciona el ratón', '', '2022-05-24', '', 'pendiente', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `perfil` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `perfil`) VALUES
(1, 'maria', 'maria', 'admin'),
(2, 'pepe', 'pepe', 'user'),
(3, 'lolo', 'lolo', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`idusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `iduser` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);



