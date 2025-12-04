-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2018 a las 14:14:54
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `tienda`;

-- Creamos el usuario
CREATE USER super
IDENTIFIED BY 'super123';
GRANT ALL ON tienda.*
TO super;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nif` char(9) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `saldo` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nif`, `nombre`, `direccion`, `email`, `telefono`, `saldo`) VALUES
('12345678Z', 'Alberto', 'C/San Fernando', 'alberto@gmail.com', '655555555', 5000),
('98765432A', 'Vicente', 'C/Valdecilla', 'vicente@gmail.com', '654325654', 4000),
('65264325D', 'Manuel', 'C/Pereda', 'manuel@gmail.com', '658786786', 3000),
('45678911Z', 'María', 'C/Belén', 'maria@hotmail.com', '633666000', 2000),
('43243541G', 'Marta', 'Avda. Valdecilla', 'marta@yahoo.es', '655655655', 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `numero` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` char(9) COLLATE latin1_spanish_ci NOT NULL,
  `producto` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`numero`, `fecha`, `cliente`, `producto`, `cantidad`) VALUES
(3, '2020-11-08', '12345678Z', '1', '33.00'),
(4, '2020-11-09', '12345678Z', '2', '50.00'),
(5, '2020-11-10', '98765432A', '1', '50.00'),
(6, '2020-11-11', '12345678Z', '1', '2.00'),
(7, '2020-11-11', '98765432A', '2', '17.00'),
(8, '2020-11-12', '45678911Z', '3', '5.00'),
(9, '2020-11-13', '43243541G', '3', '7.00'),
(10, '2020-11-12', '65264325D', '2', '10.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `precio` decimal(5,3) NOT NULL,
  `descripcion` varchar(70) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `descripcion`) VALUES
('1', 'peras', '2.000', 'Pera Conferencia'),
('2', 'manzanas', '3.000', 'Manzanas reineta'),
('3', 'naranjas', '4.000', 'Naranja valenciana');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`nif`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `producto` (`producto`),
  ADD KEY `a1` (`cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`nif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
