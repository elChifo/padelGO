-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2016 a las 23:54:52
-- Versión del servidor: 5.6.28-0ubuntu0.15.04.1
-- Versión de PHP: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `padelGo`
--
CREATE DATABASE IF NOT EXISTS `padelGo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `padelGo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE IF NOT EXISTS `Categorias` (
`idCategoria` int(1) unsigned NOT NULL,
  `nombreCategoria` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Categorias`
--

INSERT INTO `Categorias` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Primera'),
(2, 'Segunda'),
(3, 'Tercera'),
(4, 'Cuarta'),
(5, 'Quinta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clubs`
--

CREATE TABLE IF NOT EXISTS `Clubs` (
`idClub` int(9) unsigned NOT NULL,
  `nombreClub` varchar(250) NOT NULL,
  `direccionClub` varchar(250) NOT NULL,
  `numPistas` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Clubs`
--

INSERT INTO `Clubs` (`idClub`, `nombreClub`, `direccionClub`, `numPistas`) VALUES
(1, 'Club PadelMurcia', ' Calle 2 Zb GP2, 33, 30107 -Murcia-', 8),
(2, 'Club Cordillera', 'Travesia Senda Garres, s/n, 30012', 6),
(3, 'Mas Que Padel', 'Carril del Cebadero, 6, 30012 -Murcia-', 8),
(4, 'Agridulce Pádel', 'Calle Federico García Lorca, 21, 30100 -Murcia-', 10),
(5, 'Padel Zone', 'Calle Cieza, 1, 30500 Molina de Segura, Murcia', 5),
(6, 'Olimpic Club Murcia', 'Senda de Granada, 166, 30007 -Murcia-', 4),
(7, 'Club Deportivo Horizonte', 'Calle Las Brisas, 2, 30830 La Ñora -Murcia-', 9),
(8, 'Platinium Padel Center', 'Vereda de Riquelme, 30162 Santa Cruz -Murcia-', 6),
(9, 'Padel GO!!', 'I.E.S Ingeniero de la Cierva', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Favoritos`
--

CREATE TABLE IF NOT EXISTS `Favoritos` (
  `idUsuario` int(9) unsigned NOT NULL,
  `idFavorito` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Invitaciones`
--

CREATE TABLE IF NOT EXISTS `Invitaciones` (
`idInvitacion` int(9) unsigned NOT NULL,
  `idUsuario` int(9) NOT NULL,
  `idFavorito` int(9) NOT NULL,
  `idPartido` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Noticias`
--

CREATE TABLE IF NOT EXISTS `Noticias` (
`idNoticia` int(9) unsigned NOT NULL,
  `titular` varchar(250) NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `fechaNoticia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Partidos`
--

CREATE TABLE IF NOT EXISTS `Partidos` (
`idPartido` int(9) unsigned NOT NULL,
  `tipoPartido` varchar(10) NOT NULL,
  `fechaPartido` date NOT NULL,
  `horaPartido` time NOT NULL,
  `jugador1` int(9) DEFAULT NULL,
  `jugador2` int(9) DEFAULT NULL,
  `jugador3` int(9) DEFAULT NULL,
  `jugador4` int(9) DEFAULT NULL,
  `idCategoria` int(1) NOT NULL,
  `idUsuario` int(9) NOT NULL,
  `idClub` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
`idUsuario` int(9) unsigned NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `fechaNac` date NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(250) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `idCategoria` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`idUsuario`, `nombre`, `apellidos`, `sexo`, `fechaNac`, `direccion`, `telefono`, `email`, `clave`, `idCategoria`) VALUES
(1, 'ADMINISTRADOR', 'PadelGO!', 'Hombre', '1980-06-20', 'Aplicación', 900900900, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Antonio', 'Pérez Moreno', 'Hombre', '1986-06-24', 'Calle Murcia, 1 - 2ºC. Los Dolores -MURCIA-', 637018162, 'elchifo@gmail.com', 'b13ab8105c8a60ec2502471e639e6038', 1),
(3, 'Andrea', 'Sánchez García', 'Mujer', '1988-03-15', 'Calle Mayor, 65 -MURCIA-', 685132460, 'andrea@gmail.com', '1c42f9c1ca2f65441465b43cd9339d6c', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categorias`
--
ALTER TABLE `Categorias`
 ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `Clubs`
--
ALTER TABLE `Clubs`
 ADD PRIMARY KEY (`idClub`);

--
-- Indices de la tabla `Favoritos`
--
ALTER TABLE `Favoritos`
 ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `Invitaciones`
--
ALTER TABLE `Invitaciones`
 ADD PRIMARY KEY (`idInvitacion`);

--
-- Indices de la tabla `Noticias`
--
ALTER TABLE `Noticias`
 ADD PRIMARY KEY (`idNoticia`);

--
-- Indices de la tabla `Partidos`
--
ALTER TABLE `Partidos`
 ADD PRIMARY KEY (`idPartido`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
 ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categorias`
--
ALTER TABLE `Categorias`
MODIFY `idCategoria` int(1) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Clubs`
--
ALTER TABLE `Clubs`
MODIFY `idClub` int(9) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `Invitaciones`
--
ALTER TABLE `Invitaciones`
MODIFY `idInvitacion` int(9) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Noticias`
--
ALTER TABLE `Noticias`
MODIFY `idNoticia` int(9) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Partidos`
--
ALTER TABLE `Partidos`
MODIFY `idPartido` int(9) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
MODIFY `idUsuario` int(9) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
