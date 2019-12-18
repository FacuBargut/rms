-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-12-2019 a las 22:23:20
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

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
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `id-marca` int(11) NOT NULL,
  `id-instrumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Instrumentos`
--

INSERT INTO `Instrumentos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `stock`, `id-marca`, `id-instrumento`) VALUES
(1, 'IBANEZ GRG150', 'Guitarra Electrica Ser.Grg 24 Trs. Blanca', '20300.96', 'img/productos/guitarras/ibanes.jpg', 100, 3, 1),
(2, 'Guitarra Gibson Les Paul Standard T 2017', 'Guitarra con cuerpo de caoba, tapa de arce AAA, mástil de caoba cónico delgado, diapason depalisandro y radio compuesto', '3001233.50', 'img/productos/guitarras/gibson.jpg', 500, 1, 1),
(3, 'Guitarra Electrica Fender Stratocaster', 'Guitarra Fender Classic Player 50 Stratocaster maple fingerboard de la serie Classic Player, con 2 tonos de color y cuerpo aliso y con mastil de Arce', '600.00', 'img/productos/guitarras/fender.jpg', 600, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Marcas`
--

CREATE TABLE `Marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Marcas`
--

INSERT INTO `Marcas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Gibson', 'Gibson'),
(2, 'Fender', 'Fender'),
(3, 'Ibanes', 'Ibanes'),
(4, 'Gretsch', 'Gretsch'),
(5, 'Taylor', 'Taylor'),
(6, 'Yamaha', 'Yamaha'),
(7, 'Epiphone', 'Epiphone');

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

--
-- Volcado de datos para la tabla `TipoInstrumentos`
--

INSERT INTO `TipoInstrumentos` (`id`, `descripcion`) VALUES
(1, 'Guitarra'),
(2, 'Bajo'),
(3, 'Bateria'),
(4, 'Microfono'),
(5, 'Amplificador'),
(6, 'Pedalera'),
(7, 'Piano');

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
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `activo`, `admin`, `telefono`) VALUES
(7, 'Facundo', 'Bargut', 'facubargut@gmail.com', '123', 0, 0, '03413213053');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Marcas`
--
ALTER TABLE `Marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `Instrumentos_ibfk_1` FOREIGN KEY (`id-instrumento`) REFERENCES `TipoInstrumentos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Instrumentos_ibfk_2` FOREIGN KEY (`id-marca`) REFERENCES `Marcas` (`id`);

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
