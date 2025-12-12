

--
-- Base de datos: `pizzeria`
--
CREATE DATABASE IF NOT EXISTS `pizzeria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pizzeria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
  `id_pedido` int(11) NOT NULL,
  `id_pizza` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_pedido`, `id_pizza`) VALUES
(2, 'p1'),
(1, 'p2'),
(2, 'p2'),
(1, 'p4'),
(2, 'p4'),
(1, 'p5'),
(2, 'p6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
`numero` int(11) NOT NULL,
  `f_pago` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha` time NOT NULL,
  `importe` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`numero`, `f_pago`, `fecha`, `importe`) VALUES
(1, 'contado', '05:24:33', 49),
(2, 'VISA', '13:32:39', 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
  `codigo` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `precio` tinyint(3) NOT NULL,
  `tipo` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `foto` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pizza`
--

INSERT INTO `pizza` (`codigo`, `descripcion`, `precio`, `tipo`, `foto`) VALUES
('p1', 'ternera y cerdo', 21, 'carne', 'foto1'),
('p10', 'tropical', 18, 'frutas', 'foto10'),
('p2', 'romana', 15, 'clasica', 'foto2'),
('p3', 'Pollo', 14, 'carne', 'foto3'),
('p4', 'bolognesa', 12, 'carne', 'foto4'),
('p5', 'frutti di mare', 22, 'pescado', 'foto5'),
('p6', 'atun', 14, 'pescado', 'foto7'),
('p7', 'napolitana', 16, 'clasica', 'foto7'),
('p8', 'barbacoa', 20, 'carne', 'foto8'),
('p9', 'Hawaiana', 9, 'frutas', 'foto9');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
 ADD PRIMARY KEY (`id_pedido`,`id_pizza`), ADD UNIQUE KEY `id_pedido` (`id_pedido`,`id_pizza`), ADD KEY `id_pizza` (`id_pizza`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
 ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `pizza`
--
ALTER TABLE `pizza`
 ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`numero`),
ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`id_pizza`) REFERENCES `pizza` (`codigo`);

