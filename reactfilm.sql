-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2018 at 02:59 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reactfilm`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Accion'),
(2, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `anio` int(11) NOT NULL,
  `director` varchar(50) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `duracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `foto`, `descripcion`, `anio`, `director`, `categoria`, `duracion`) VALUES
(1, 'Dead Pool 2', 'img/d2.jpg', 'Deadpool 2 es una película de superhéroes basada en el personaje de Marvel Comics Deadpool, la cual será distribuida por la 20th Century Fox.', 0, '', '0', 0),
(3, 'Coco', 'img/coco.jpg', 'Miguel es un niño que sueña con ser músico, pero su familia se lo prohíbe porque su tatarabuelo, músico, los abandonó, y quieren obligar a Miguel a ser zapatero, como todos los miembros de la familia. Por accidente, Miguel entra en la Tierra de los Muertos, de donde sólo podrá salir si un familiar difunto le concede su bendición, pero su tatarabuela se niega a dejarlo volver con los vivos si no promete que no será músico. Debido a eso, Miguel escapa de ella y empieza a buscar a su tatarabuelo.', 0, '', '0', 0),
(4, 'Batman', 'img/joker.jpg', 'holis', 0, '', '0', 0),
(5, 'avengers', 'img/avengers.jpg', 'avengers', 0, '', '0', 0),
(6, 'Ready Player One', 'img/ready.jpg', 'Ready', 0, '', '0', 0),
(8, 'Thor Ragnarog', 'img/thor.jpg', 'thor', 0, '', '0', 0),
(10, 'Guerra de Papas 2', 'img/guerra.jpg', 'El gruÃ±Ã³n papÃ¡ de Dusty y el excesivamente cariÃ±oso papÃ¡ de Brad llegan de visita por Navidad. Pese al caos que generan sus padres, Dusty y Brad intentan dejar a un lado sus diferencias y ofrecerles unas Navidades inolvidables a los niÃ±os.', 2017, 'Sean Anders', 'Accion', 120);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `contraseña` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
