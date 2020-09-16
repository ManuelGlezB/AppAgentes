-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-09-2020 a las 10:11:26
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agentes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
CREATE TABLE IF NOT EXISTS `multimedia` (
  `id_multimedia` int(11) NOT NULL AUTO_INCREMENT,
  `id_subasta` int(11) NOT NULL,
  `fecha_alta` datetime DEFAULT CURRENT_TIMESTAMP,
  `nombre_fichero` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_fichero` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `ubicacion_fichero` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_multimedia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas`
--

DROP TABLE IF EXISTS `subastas`;
CREATE TABLE IF NOT EXISTS `subastas` (
  `id_subasta` int(11) NOT NULL AUTO_INCREMENT,
  `expediente_subasta` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `lote_subasta` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `ref_catastral` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `descrip_detallada` text COLLATE latin1_spanish_ci,
  `notas_privadas` text COLLATE latin1_spanish_ci,
  `fecha_alta` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_agente` int(11) NOT NULL,
  PRIMARY KEY (`id_subasta`)
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `subastas`
--

INSERT INTO `subastas` (`id_subasta`, `expediente_subasta`, `lote_subasta`, `ref_catastral`, `descrip_detallada`, `notas_privadas`, `fecha_alta`, `id_agente`) VALUES
(156, 'SUB-dfdfgdf-2020-677634', '34', 'hhjghjdghgchmcg', 'Es una de esdjdghjas casas seÃ±oriales de las de antes', 'Parece quehjdghjhgdgnadie vive allÃ­', '2020-09-15 10:59:33', 8),
(155, 'SUB-JA-2020-677634', '3', 'AS5467575DSD56D', 'Es una de esas casas seÃ±oriales de las de antes', 'Parece que nadie vive allÃ­', '2020-09-15 10:59:14', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_agente` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `link_facebook` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `link_twitter` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `link_google` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `recuerdame` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_alta` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_firma_ok_acuerdo` datetime DEFAULT NULL,
  PRIMARY KEY (`id_agente`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `link_facebook` (`link_facebook`),
  UNIQUE KEY `link_twitter` (`link_twitter`),
  UNIQUE KEY `link_google` (`link_google`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
