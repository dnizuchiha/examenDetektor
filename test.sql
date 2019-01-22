-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2019 a las 09:09:30
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar` (IN `Aid` INT, IN `Anombre` VARCHAR(50), IN `Aapellido` VARCHAR(50), IN `Atelefono` INT, IN `Ades_motivo` VARCHAR(50))  BEGIN 
 
UPDATE motivos_es_gt
SET  nombre = Anombre, 
apellido = Aapellido, telefono = Atelefono, des_motivo = Ades_motivo WHERE  id = Aid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borrar` (IN `Bid` INT)  BEGIN
   DELETE FROM motivos_es_gt WHERE id=Bid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crear` (IN `Anombre` VARCHAR(50), IN `Aapellido` VARCHAR(50), IN `Atelefono` INT, IN `Ades_motivo` VARCHAR(50))  BEGIN  
INSERT INTO motivos_es_gt (nombre, apellido, telefono, des_motivo) VALUES(Anombre, Aapellido, Atelefono, Ades_motivo);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivos_es_gt`
--

CREATE TABLE `motivos_es_gt` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `des_motivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `motivos_es_gt`
--

INSERT INTO `motivos_es_gt` (`id`, `nombre`, `apellido`, `telefono`, `des_motivo`) VALUES
(1, 'Denisssss', 'rosales', 99522779, 'uno'),
(2, 'mauricio', 'rosales', 123456, 'dos'),
(4, 'nombre2', 'aellido2', 789678, 'tres'),
(5, 'katia', 'rosales', 2, 'cuatro'),
(6, 'petrona', 'nolasco', 1, 'cinco'),
(7, 'alguien', 'soy', 12364, 'dsfdfg'),
(8, 'sergio', 'nolasco', 78564, 'qweqwe'),
(9, 'nombre1', 'apellido1', 156498, '2345656767'),
(10, 'nombre3', 'apellido3', 9874646, 'nyuiui'),
(11, 'nombre4', 'apellido4', 65476846, 'yrtyuiyiuyi'),
(12, 'prueba', 'prueba2', 1365423, 'algo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `motivos_es_gt`
--
ALTER TABLE `motivos_es_gt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `motivos_es_gt`
--
ALTER TABLE `motivos_es_gt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
