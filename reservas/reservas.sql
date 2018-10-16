-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2018 a las 00:00:12
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diasreservas`
--

CREATE TABLE `diasreservas` (
  `id` int(11) NOT NULL,
  `diareserva` int(11) DEFAULT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `diasreservas`
--

INSERT INTO `diasreservas` (`id`, `diareserva`, `dia`) VALUES
(7, 3, '2018-03-05'),
(8, 3, '2018-03-08'),
(9, 3, '2018-03-06'),
(10, 3, '2018-03-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediosdepago`
--

CREATE TABLE `mediosdepago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(28) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mediosdepago`
--

INSERT INTO `mediosdepago` (`id`, `nombre`) VALUES
(2, 'paypal'),
(1, 'Tarjeta Caja Circulo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertarecinto`
--

CREATE TABLE `ofertarecinto` (
  `id` int(11) NOT NULL,
  `recintoid` int(11) DEFAULT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fipublicacion` date NOT NULL,
  `ffpublicacion` date NOT NULL,
  `fioferta` date NOT NULL,
  `ffoferta` date NOT NULL,
  `borrada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ofertarecinto`
--

INSERT INTO `ofertarecinto` (`id`, `recintoid`, `precio`, `descripcion`, `fipublicacion`, `ffpublicacion`, `fioferta`, `ffoferta`, `borrada`) VALUES
(1, 1, 30, 'Museo con exposición, orquesta y actuación.', '2018-01-03', '2018-02-03', '2018-03-03', '2018-03-05', 0),
(2, 1, 25, 'Presentación y charla sobre  los origenes de Vadocondes.', '2018-01-03', '2018-02-03', '2018-03-03', '2018-03-05', 0),
(3, 3, 25, 'Presentación de la exposición \"Libros del boticario\"', '2018-01-03', '2018-02-03', '2018-03-03', '2018-03-05', 0),
(4, 3, 12, 'Exposición de cuadros sobre la botica.', '2018-01-03', '2018-02-03', '2018-03-03', '2018-03-05', 0),
(8, 4, 15, 'Visita guiada por las instalaciones de la primera época y cata de vinos.', '2018-01-01', '2018-01-31', '2018-02-01', '2018-02-03', 0),
(9, 5, 15, 'Masaje + circuito de agua + maderoterápia', '2018-02-01', '2018-02-10', '2018-02-15', '2018-02-17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recintos`
--

CREATE TABLE `recintos` (
  `id` int(11) NOT NULL,
  `ref` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombrerecinto` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recintos`
--

INSERT INTO `recintos` (`id`, `ref`, `nombrerecinto`, `direccion`, `precio`, `descripcion`, `foto`) VALUES
(1, 'musrural', 'museo rural', 'Calle Vendimia 12', 20, 'Museo de la vida rural de Vadocondes.', 'museorural.jpg'),
(2, 'hotva', 'Hotel La Piedra', 'Plaza Mayor 3', 35, 'Hotel rural en el centro de Vadocondes.', 'hotel.jpg'),
(3, 'boti', 'Botica', 'Calle La Botica 1', 20, 'Botica con botes tradicionales de las boticas del siglo xix.', 'botica.png'),
(4, 'bod', 'Bodega Histórica', 'Calle Mayor 25', 30, 'Bodega historica del siglo pasado, rehabilitada con visita guiada.', 'bodega.jpg'),
(5, 'spa', 'Spa Aguas Frías', 'Calle Hinojo S/N', 20, 'Spa especializado en tratamientos de maderoterapia y relajación.', 'spa.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservasclientes`
--

CREATE TABLE `reservasclientes` (
  `id` int(11) NOT NULL,
  `recintoid` int(11) DEFAULT NULL,
  `mediodepagoid` int(11) DEFAULT NULL,
  `ofertareservaid` int(11) DEFAULT NULL,
  `precio` double NOT NULL,
  `nombre` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `borrada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reservasclientes`
--

INSERT INTO `reservasclientes` (`id`, `recintoid`, `mediodepagoid`, `ofertareservaid`, `precio`, `nombre`, `apellidos`, `direccion`, `borrada`) VALUES
(1, 1, 2, 1, 30, 'AA', 'AA', 'AA', 0),
(3, 1, 2, 1, 30, 'qq', 'qq', 'qq', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diasreservas`
--
ALTER TABLE `diasreservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_432CDD9352E6AAE3` (`diareserva`);

--
-- Indices de la tabla `mediosdepago`
--
ALTER TABLE `mediosdepago`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7004FF43A909126` (`nombre`);

--
-- Indices de la tabla `ofertarecinto`
--
ALTER TABLE `ofertarecinto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ECCC11CC4AC65E9D` (`recintoid`);

--
-- Indices de la tabla `recintos`
--
ALTER TABLE `recintos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_EBF3555C146F3EA3` (`ref`);

--
-- Indices de la tabla `reservasclientes`
--
ALTER TABLE `reservasclientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5C2716AF4AC65E9D` (`recintoid`),
  ADD KEY `IDX_5C2716AF81BACBF8` (`mediodepagoid`),
  ADD KEY `IDX_5C2716AFA75DF09B` (`ofertareservaid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diasreservas`
--
ALTER TABLE `diasreservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `mediosdepago`
--
ALTER TABLE `mediosdepago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ofertarecinto`
--
ALTER TABLE `ofertarecinto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `recintos`
--
ALTER TABLE `recintos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reservasclientes`
--
ALTER TABLE `reservasclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diasreservas`
--
ALTER TABLE `diasreservas`
  ADD CONSTRAINT `FK_432CDD9352E6AAE3` FOREIGN KEY (`diareserva`) REFERENCES `reservasclientes` (`id`);

--
-- Filtros para la tabla `ofertarecinto`
--
ALTER TABLE `ofertarecinto`
  ADD CONSTRAINT `FK_ECCC11CC4AC65E9D` FOREIGN KEY (`recintoid`) REFERENCES `recintos` (`id`);

--
-- Filtros para la tabla `reservasclientes`
--
ALTER TABLE `reservasclientes`
  ADD CONSTRAINT `FK_5C2716AF4AC65E9D` FOREIGN KEY (`recintoid`) REFERENCES `recintos` (`id`),
  ADD CONSTRAINT `FK_5C2716AF81BACBF8` FOREIGN KEY (`mediodepagoid`) REFERENCES `mediosdepago` (`id`),
  ADD CONSTRAINT `FK_5C2716AFA75DF09B` FOREIGN KEY (`ofertareservaid`) REFERENCES `ofertarecinto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
