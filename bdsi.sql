-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2019 a las 00:13:57
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdsi`
--
CREATE DATABASE IF NOT EXISTS `bdsi` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bdsi`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `ClaveUnica` bigint(20) NOT NULL,
  `Nombres` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ApPaterno` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ApMaterno` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Carrera` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Generacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`ClaveUnica`, `Nombres`, `ApPaterno`, `ApMaterno`, `Carrera`, `Generacion`) VALUES
(232602, 'Claudio Isauro', 'Nava', 'Torres', 'Informática', 2014),
(250980, 'Nestor Javier', 'Mendez', 'Gutierrez', 'Informática', 2015);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

CREATE TABLE `anuncio` (
  `IdAnuncio` bigint(20) NOT NULL,
  `IdLaboratorio` bigint(20) NOT NULL,
  `Imagen` varchar(200) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `IdBecario` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `IdArticulo` bigint(20) NOT NULL,
  `Nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `NumUASLP` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`IdArticulo`, `Nombre`, `Descripcion`, `NumUASLP`) VALUES
(1, 'Teclado', 'Un teclado cualquiera', 254565),
(2, 'mouse', 'Prueba', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becarios`
--

CREATE TABLE `becarios` (
  `IdBecarios` bigint(20) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `ApPaterno` varchar(50) DEFAULT NULL,
  `ApMaterno` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Contrasena` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `becarios`
--

INSERT INTO `becarios` (`IdBecarios`, `Nombre`, `ApPaterno`, `ApMaterno`, `Usuario`, `Contrasena`) VALUES
(1, 'Isauro', 'Nava', 'Torres', '232602', '123'),
(2, 'Nestor', 'Mendez', 'Gutierrez', '250980', '123'),
(3, 'Antonio', 'Tristan', 'Varela', '236042', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `ClaveLab` bigint(20) NOT NULL,
  `IdArticulo` bigint(20) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `NoLocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `ClaveLab` bigint(20) NOT NULL,
  `NombreLab` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Area` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`ClaveLab`, `NombreLab`, `Area`) VALUES
(1, 'UDIs', 'Ciencias de la ComputaciÃ³n'),
(2, 'Redes y TelemÃ¡tica', 'Ciencias de la ComputaciÃ³n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_alumno`
--

CREATE TABLE `registro_alumno` (
  `ClaveUnica` bigint(20) NOT NULL,
  `ClaveLab` bigint(20) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_alumno`
--

INSERT INTO `registro_alumno` (`ClaveUnica`, `ClaveLab`, `Fecha`, `Hora`) VALUES
(232602, 1, '2019-05-01', '01:00:00'),
(232602, 2, '2019-05-01', '17:00:00'),
(232602, 2, '2019-05-02', '16:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`ClaveUnica`) USING BTREE;

--
-- Indices de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`IdAnuncio`) USING BTREE,
  ADD KEY `ClaveLab` (`IdLaboratorio`) USING BTREE,
  ADD KEY `Becario` (`IdBecario`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`IdArticulo`) USING BTREE,
  ADD UNIQUE KEY `NumUASLP` (`NumUASLP`) USING BTREE;

--
-- Indices de la tabla `becarios`
--
ALTER TABLE `becarios`
  ADD PRIMARY KEY (`IdBecarios`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD KEY `ClaveLab` (`ClaveLab`) USING BTREE,
  ADD KEY `IdArticulo` (`IdArticulo`) USING BTREE;

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`ClaveLab`) USING BTREE;

--
-- Indices de la tabla `registro_alumno`
--
ALTER TABLE `registro_alumno`
  ADD KEY `ClaveUnica` (`ClaveUnica`) USING BTREE,
  ADD KEY `ClaveLab` (`ClaveLab`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `ClaveUnica` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250981;

--
-- AUTO_INCREMENT de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `IdAnuncio` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `IdArticulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `becarios`
--
ALTER TABLE `becarios`
  MODIFY `IdBecarios` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `ClaveLab` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `anuncio_ibfk_1` FOREIGN KEY (`IdLaboratorio`) REFERENCES `laboratorio` (`ClaveLab`) ON UPDATE CASCADE,
  ADD CONSTRAINT `anuncio_ibfk_2` FOREIGN KEY (`IdBecario`) REFERENCES `becarios` (`IdBecarios`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`ClaveLab`) REFERENCES `laboratorio` (`ClaveLab`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`IdArticulo`) REFERENCES `articulo` (`IdArticulo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_alumno`
--
ALTER TABLE `registro_alumno`
  ADD CONSTRAINT `registro_alumno_ibfk_1` FOREIGN KEY (`ClaveUnica`) REFERENCES `alumno` (`ClaveUnica`) ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_alumno_ibfk_2` FOREIGN KEY (`ClaveLab`) REFERENCES `laboratorio` (`ClaveLab`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
