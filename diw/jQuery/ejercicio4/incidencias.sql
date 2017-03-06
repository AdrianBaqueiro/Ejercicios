-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-03-2011 a las 00:27:19
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ee`
--

CREATE TABLE IF NOT EXISTS `ee` (
  `idestancia` int(10) unsigned NOT NULL,
  `idencargado` varchar(50) NOT NULL,
  PRIMARY KEY (`idestancia`,`idencargado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcar la base de datos para la tabla `ee`
--

INSERT INTO `ee` (`idestancia`, `idencargado`) VALUES
(5, 'veiga'),
(6, 'veiga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargados`
--

CREATE TABLE IF NOT EXISTS `encargados` (
  `idencargado` varchar(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `tipo` char(1) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`idencargado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `encargados`
--

INSERT INTO `encargados` (`idencargado`, `nombre`, `apellidos`, `email`, `tipo`, `password`) VALUES
('admin', 'Rafa', 'Veiga', 'rafael@edu.xunta.es', 'A', '4d186321c1a7f0f354b297e8914ab240');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estancias`
--

CREATE TABLE IF NOT EXISTS `estancias` (
  `idestancia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estancia` varchar(50) NOT NULL,
  `acronimo` varchar(10) NOT NULL,
  `numequipos` int(11) NOT NULL,
  `numimpresoras` int(11) NOT NULL,
  PRIMARY KEY (`idestancia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `estancias`
--

INSERT INTO `estancias` (`idestancia`, `estancia`, `acronimo`, `numequipos`, `numimpresoras`) VALUES
(5, 'Aula 21', 'A21', 25, 1),
(6, 'Aula 30', 'A30', 30, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE IF NOT EXISTS `incidencias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fechanotificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idnotificante` varchar(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `comentarios` varchar(255) NOT NULL,
  `idencargado` varchar(50) NOT NULL,
  `idestancia` int(10) NOT NULL,
  `dispositivo` varchar(100) NOT NULL,
  `fecharesolucion` datetime NOT NULL,
  `resuelta` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `incidencias`
--

