goyas
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `goyas`
--
CREATE DATABASE IF NOT EXISTS goyas DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE goyas;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE IF NOT EXISTS director (
  codDirector varchar(3) NOT NULL,dwes_01_nbadwes_01_nba
  nombre varchar(50) DEFAULT NULL,
  apellidos varchar(50) DEFAULT NULL,
  PRIMARY KEY (codDirector)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO director (codDirector, nombre, apellidos) VALUES
('D01', 'Alejandro', 'Amenabar'),
('D02', 'Fernando', 'León de Aranoa'),
('D03', 'Icíar', 'Bollain'),
('D04', 'Isabel', 'Coixet'),
('D05', 'Pedro', 'Almodovar'),
('D06', 'Jaime', 'Rosales'),
('D07', 'Javier', 'Fesser'),
('D08', 'Daniel', 'Monzón'),
('D09', 'Agusti', 'Villaronga'),
('D10', 'Enrique', 'Urbizu'),
('D11', 'Pablo', 'Berger'),
('D12', 'David', 'Trueba'),
('D13', 'Alberto', 'Rodriguez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE IF NOT EXISTS pelicula (
  idPelicula varchar(3) NOT NULL,
  titulo varchar(100) NOT NULL,
  fecha varchar(4) DEFAULT NULL,
  genero varchar(50) DEFAULT NULL,
  numGoyas int(11) DEFAULT NULL,
  director varchar(3) DEFAULT NULL,
  PRIMARY KEY (idPelicula),
  KEY director (director)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO pelicula (idPelicula, titulo, fecha, genero, numGoyas, director) VALUES
('P01', 'Los otros', '2001', 'Suspense', 8, 'D01'),
('P02', 'Los lunes al sol', '2002', 'Drama', 5, 'D02'),
('P03', 'Te doy mis ojos', '2003', 'Drama', 7, 'D03'),
('P04', 'Mar adentro', '2004', 'Drama', 14, 'D01'),
('P05', 'La vida secreta de las palabras', '2005', 'Drama', 4, 'D04'),
('P06', 'Volver', '2006', 'Drama', 5, 'D05'),
('P07', 'La soledad', '2007', 'Drama', 3, 'D06'),
('P08', 'Camino', '2008', 'Drama', 6, 'D07'),
('P09', 'Celda 211', '2009', 'Thriller', 9, 'D08'),
('P10', 'Pa negre', '2010', 'Drama', 6, 'D09'),
('P11', 'No habrá paz para los malvados', '2011', 'Thriller', 6, 'D10'),
('P12', 'Blancanieves', '2012', 'Fantasía', 10, 'D11'),
('P13', 'Vivir es fácil con los ojos cerrados', '2013', 'Comedia', 6, 'D12'),
('P14', 'La isla mínima', '2014', 'Thriller', 10, 'D13');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE pelicula
  ADD CONSTRAINT pelicula_ibfk_1 FOREIGN KEY (director) REFERENCES director (codDirector);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
