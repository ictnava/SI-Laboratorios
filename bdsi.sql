-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2019 a las 06:17:29
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
CREATE DATABASE IF NOT EXISTS `bdsi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
  `Generacion` int(11) NOT NULL,
  `Usuario` tinyint(1) NOT NULL,
  `Contrasena` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`ClaveUnica`, `Nombres`, `ApPaterno`, `ApMaterno`, `Carrera`, `Generacion`, `Usuario`, `Contrasena`) VALUES
(232602, 'Claudio Isauro', 'Nava', 'Torres', 'Informática', 2014, 1, '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

CREATE TABLE `anuncio` (
  `IdAnuncio` bigint(20) NOT NULL,
  `ClaveLab` bigint(20) NOT NULL,
  `Imagen` longblob NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
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
(1, 'Teclado', 'Un teclado cualquiera', 254565);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `ClaveLab` bigint(20) NOT NULL,
  `IdArticulo` bigint(20) NOT NULL
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
  ADD KEY `ClaveLab` (`ClaveLab`) USING BTREE;

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`IdArticulo`) USING BTREE,
  ADD UNIQUE KEY `NumUASLP` (`NumUASLP`) USING BTREE;

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
  MODIFY `ClaveUnica` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232603;

--
-- AUTO_INCREMENT de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `IdAnuncio` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `IdArticulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `ClaveLab` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `anuncio_ibfk_1` FOREIGN KEY (`ClaveLab`) REFERENCES `laboratorio` (`ClaveLab`) ON UPDATE CASCADE;

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
