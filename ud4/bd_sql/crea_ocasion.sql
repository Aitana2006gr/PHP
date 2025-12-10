-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2021 a las 09:23:03
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ocasion`
--
CREATE DATABASE IF NOT EXISTS `ocasion` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ocasion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `contador` int(11) NOT NULL,
  `id_matricula` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cuota` int(11) NOT NULL,
  `f_compra` date NOT NULL,
  `pendiente` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`contador`, `id_matricula`, `cliente`, `cuota`, `f_compra`, `pendiente`) VALUES
(1, '7703-HHS', 'Anselmo Fernaández', 8000, '2017-03-12', 16000),
(2, '7681-BBU', 'Marta Pérz', 1200, '2017-02-07', 4000),
(3, '3266-FKZ', 'Lucas Arriondas', 1000, '2017-02-09', 7000),
(4, '8902-HDL', 'Liberto Antunez', 5500, '2017-01-04', 14200),
(5, '2617-FHS', 'Ricardo Díaz', 4200, '2017-03-07', 12000),
(6, '3145-DLP', 'Margarita De los Santos', 12100, '2017-03-17', 13000),
(7, '0032-CDT', 'Ignacio Ríos', 1600, '2017-02-05', 4500),
(8, '4326-KEN', 'Sandra Domínguez', 2000, '2017-02-05', 9000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `cod` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`cod`, `nombre`) VALUES
('CAR', 'Carabana'),
('ELEC', 'electrico'),
('INFOR', 'Dos pasajeros'),
('MONO', 'Mono volumen'),
('TUR', 'turismo cinco puerta'),
('VAN', 'Furgoneta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `matricula` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `PVP` int(11) NOT NULL,
  `tipo` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `vendido` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `marca`, `descripcion`, `PVP`, `tipo`, `vendido`) VALUES
('0032-CDT', 'subaru', 'Autoescuela', 6100, 'INFOR', '1'),
('1154-CJL', 'ford', 'aparatos electrónicos', 13800, 'INFOR', '0'),
('1168-GYO', 'Fiat', 'porta skis', 10000, 'MONO', '0'),
('237-FWU', 'seat', 'Reparto', 9500, 'VAN', '0'),
('2617-FHS', 'BMW', 'doble techo', 16200, 'VAN', '1'),
('2729-KUR', 'ford', 'asientos giratorios', 14000, 'MONO', '0'),
('3145-DLP', 'ford', 'Semi-nuevo', 25100, 'INFOR', '1'),
('3266-FKZ', 'subaru', 'escolar', 8000, 'MONO', '1'),
('4326-KEN', 'audi', 'tracción 4 ruedas', 11000, 'MONO', '1'),
('4489-JUI', 'mercedes', 'techo solar', 21000, 'INFOR', '0'),
('4564-ABT', 'honda', 'profesional', 18100, 'VAN', '0'),
('5489-GAS', 'citroen', 'cuatro puertas', 10100, 'TUR', '0'),
('6980-ASC', 'seat', 'accesorios para canoa', 12000, 'VAN', '0'),
('7002-JSE', 'Fiat', 'multimedia', 14000, 'MONO', '0'),
('7329-CCR', 'ford', 'nueva', 24600, 'INFOR', '0'),
('7681-BBU', 'seat', 'ganado y carga', 5200, 'VAN', '1'),
('7703-HHS', 'ford', 'deportivo rojo', 24000, 'INFOR', '1'),
('7823-ETF', 'subaru', 'Necesario pintar', 10000, 'MONO', '0'),
('8900-FAS', 'Fiat', 'Vehículo adaptado', 12200, 'MONO', '0'),
('8902-HDL', 'BMW', 'negro', 19700, 'TUR', '1'),
('9902-FDE', 'Fiat', 'color blanco', 10500, 'TUR', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`contador`),
  ADD KEY `id_producto` (`id_matricula`),
  ADD KEY `id_tienda` (`cliente`),
  ADD KEY `id_producto_2` (`id_matricula`,`cliente`),
  ADD KEY `id_bastidor` (`id_matricula`),
  ADD KEY `id_matricula` (`id_matricula`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `tipo_2` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `contador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `vehiculo` (`matricula`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
