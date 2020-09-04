-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-09-2020 a las 11:20:19
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
-- Estructura de tabla para la tabla `agentes`
--

DROP TABLE IF EXISTS `agentes`;
CREATE TABLE IF NOT EXISTS `agentes` (
  `id_agente` int(11) NOT NULL AUTO_INCREMENT,
  `link_facebook` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `link_twitter` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `link_google` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `recuerdame` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_alta` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_firma_ok_acuerdo` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_agente`),
  UNIQUE KEY `link_facebook` (`link_facebook`),
  UNIQUE KEY `link_twitter` (`link_twitter`),
  UNIQUE KEY `link_google` (`link_google`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password` (`password`),
  UNIQUE KEY `recuerdame` (`recuerdame`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
  PRIMARY KEY (`id_subasta`),
  UNIQUE KEY `expediente_subasta` (`expediente_subasta`),
  UNIQUE KEY `lote_subasta` (`lote_subasta`),
  UNIQUE KEY `ref_catastral` (`ref_catastral`),
  UNIQUE KEY `id_agente` (`id_agente`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `subastas`
--

INSERT INTO `subastas` (`id_subasta`, `expediente_subasta`, `lote_subasta`, `ref_catastral`, `descrip_detallada`, `notas_privadas`, `fecha_alta`, `id_agente`) VALUES
(1, 'sub-ja', '3', 'kjskdjfbjs5656546dknkashd', 'casa de madera', 'mis notas particulares van aquí', '9999-12-31 00:00:00', 24),
(4, 'SUB-JA-2020-677634', '3456', 'AS5467575DSD56D', 'Es una de esas casas señoriales de las de antes', 'Parece que nadie vive allí', '9999-12-31 00:00:00', 27),
(5, ' SUB-JA-2020-677634', ' 3456', ' AS5467575DSD56D', ' Es una de esas casas señoriales de las de antes', ' Parece que nadie vive allí', '9999-12-31 00:00:00', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Manolo', '$2y$10$iRKnLUC0vNBGYo9kqyMDmuSgo23E/LdvAEyzYRW3LpFwGLTUpR43i', '2020-09-03 14:14:55'),
(2, 'Raquel', '$2y$10$nW10t2PHFZxRymbgpCHEs.q7.ZGSWAqOEVEAL9rHFxuPpRCWZjepm', '2020-09-03 14:47:02'),
(3, 'arscanarias@gmail.com', '$2y$10$RL4HJI6K8qnSEPu9TGPeFOqyYJPmHvVZjyzLBge0L0ih199/j2vLW', '2020-09-03 18:14:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
