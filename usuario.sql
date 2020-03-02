-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2020 a las 02:57:53
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_tecnica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `razon_social` text NOT NULL,
  `documento` int(12) NOT NULL,
  `tipo_doc` varchar(30) NOT NULL,
  `telefono` int(10) NOT NULL,
  `celular` int(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `tipo_persona` varchar(15) NOT NULL,
  `activo` varchar(2) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  PRIMARY KEY (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`razon_social`, `documento`, `tipo_doc`, `telefono`, `celular`, `correo`, `tipo_persona`, `activo`, `fecha_ingreso`) VALUES
('Arquitectos SAS', 100986453, 'Cédula de Ciudadanía', 3045674, 2147483647, 'alejan@hot.com', 'Jurídica', 'Si', '2020-02-04'),
('Ingenieria IEO', 1234567890, 'Nit', 12345678, 2147483647, 'ingenieria@hotmail.com', 'Jurídica', 'No', '2020-02-12'),
('Natalia ', 2147483647, 'Tarjeta de Identidad', 4668798, 2147483647, 'alejan@hot.com', 'Natural', 'Si', '2020-02-12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
