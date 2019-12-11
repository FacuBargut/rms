-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2019 a las 04:43:03
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ciudades`
--

CREATE TABLE `Ciudades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetallePedidos`
--

CREATE TABLE `DetallePedidos` (
  `id-pedido` int(11) NOT NULL,
  `id-instrumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Direcciones`
--

CREATE TABLE `Direcciones` (
  `direccion` varchar(100) NOT NULL,
  `departamento` varchar(10) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `id-usuario` int(11) NOT NULL,
  `id-ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Instrumentos`
--

CREATE TABLE `Instrumentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `id-marca` int(11) NOT NULL,
  `id-instrumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Marcas`
--

CREATE TABLE `Marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedidos`
--

CREATE TABLE `Pedidos` (
  `id` int(11) NOT NULL,
  `fecha-pedido` date NOT NULL,
  `hora-pedido` datetime NOT NULL,
  `total-pedido` decimal(10,0) NOT NULL,
  `fecha-entrega` date NOT NULL,
  `id-usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Provincias`
--

CREATE TABLE `Provincias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoInstrumentos`
--

CREATE TABLE `TipoInstrumentos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Ciudades`
--
ALTER TABLE `Ciudades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `DetallePedidos`
--
ALTER TABLE `DetallePedidos`
  ADD PRIMARY KEY (`id-instrumento`,`id-pedido`),
  ADD KEY `id-pedido` (`id-pedido`);

--
-- Indices de la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  ADD KEY `id_usuario` (`id-usuario`),
  ADD KEY `id-ciudad` (`id-ciudad`);

--
-- Indices de la tabla `Instrumentos`
--
ALTER TABLE `Instrumentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id-pedido` (`id-marca`,`id-instrumento`),
  ADD KEY `id-instrumento` (`id-instrumento`);

--
-- Indices de la tabla `Marcas`
--
ALTER TABLE `Marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id-usuario` (`id-usuario`);

--
-- Indices de la tabla `Provincias`
--
ALTER TABLE `Provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `TipoInstrumentos`
--
ALTER TABLE `TipoInstrumentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Ciudades`
--
ALTER TABLE `Ciudades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Instrumentos`
--
ALTER TABLE `Instrumentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Marcas`
--
ALTER TABLE `Marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Provincias`
--
ALTER TABLE `Provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TipoInstrumentos`
--
ALTER TABLE `TipoInstrumentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Ciudades`
--
ALTER TABLE `Ciudades`
  ADD CONSTRAINT `Ciudades_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Direcciones` (`id-ciudad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `DetallePedidos`
--
ALTER TABLE `DetallePedidos`
  ADD CONSTRAINT `DetallePedidos_ibfk_1` FOREIGN KEY (`id-pedido`) REFERENCES `Instrumentos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  ADD CONSTRAINT `Direcciones_ibfk_1` FOREIGN KEY (`id-usuario`) REFERENCES `Usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Instrumentos`
--
ALTER TABLE `Instrumentos`
  ADD CONSTRAINT `Instrumentos_ibfk_1` FOREIGN KEY (`id-instrumento`) REFERENCES `TipoInstrumentos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Marcas`
--
ALTER TABLE `Marcas`
  ADD CONSTRAINT `Marcas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Instrumentos` (`id-marca`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD CONSTRAINT `Pedidos_ibfk_1` FOREIGN KEY (`id-usuario`) REFERENCES `Usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Pedidos_ibfk_2` FOREIGN KEY (`id`) REFERENCES `DetallePedidos` (`id-pedido`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Provincias`
--
ALTER TABLE `Provincias`
  ADD CONSTRAINT `Provincias_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Ciudades` (`id_provincia`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
