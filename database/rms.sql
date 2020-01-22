-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-01-2020 a las 22:14:53
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
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE `Categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `idInstrumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Categorias`
--

INSERT INTO `Categorias` (`id`, `descripcion`, `idInstrumento`) VALUES
(1, 'Acustico', 1),
(2, 'Electroacustico', 1),
(3, 'Electrico', 1),
(4, 'Acustico', 2),
(5, 'Acustico', 3),
(6, 'Electrico', 2),
(7, 'Electrico', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetallePedidos`
--

CREATE TABLE `DetallePedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_instrumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `DetallePedidos`
--

INSERT INTO `DetallePedidos` (`id_pedido`, `id_instrumento`) VALUES
(10, 3),
(10, 3),
(10, 2),
(10, 1),
(10, 3),
(10, 2),
(10, 1),
(10, 3),
(10, 2),
(10, 1),
(10, 3),
(10, 2),
(10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Direcciones`
--

CREATE TABLE `Direcciones` (
  `direccion` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `departamento` varchar(10) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `codigo_postal` varchar(50) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Direcciones`
--

INSERT INTO `Direcciones` (`direccion`, `numero`, `departamento`, `localidad`, `codigo_postal`, `provincia`, `id_usuario`) VALUES
('dasd', 'd', 'da', 'sadasd', 'asdasdas', 'dasdasd', 7),
('Santa Fe', '2141', '-', 'Rosario', '2000', 'Santa Fe', 0),
('Presidente Roca', '1050', '5 D', 'Rosario', '2000', 'Santa Fe', 7),
('Presidente Roca', '1050', '5 D', 'Rosario', '2000', 'Santa Fe', 7),
('España', '1444', '6 B', 'Rosario', '2000', 'Santa Fe', 7),
('Viamonte ', '2030', '-', 'Rosario', '2000', 'Santa Fe', 7);

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
  `fechaPedido` datetime NOT NULL,
  `totalPedido` decimal(10,0) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Pedidos`
--

INSERT INTO `Pedidos` (`id`, `fechaPedido`, `totalPedido`, `fechaEntrega`, `idUsuario`) VALUES
(9, '2020-01-08 00:00:00', '0', '2020-01-18', 7),
(10, '2020-01-08 00:00:00', '0', '2020-01-18', 7),
(11, '2020-01-08 00:00:00', '0', '2020-01-18', 7),
(12, '2020-01-08 00:00:00', '0', '2020-01-18', 7),
(13, '2020-01-08 19:24:50', '0', '2020-01-18', 7),
(14, '2020-01-08 19:26:16', '0', '2020-01-18', 7),
(15, '2020-01-08 19:29:05', '0', '2020-01-18', 7),
(16, '2020-01-08 19:29:34', '0', '2020-01-18', 7),
(17, '2020-01-08 19:29:36', '0', '2020-01-18', 7),
(18, '2020-01-08 19:29:37', '0', '2020-01-18', 7),
(19, '2020-01-08 19:30:25', '0', '2020-01-18', 7),
(20, '2020-01-08 19:30:40', '0', '2020-01-18', 7),
(21, '2020-01-08 19:32:42', '0', '2020-01-18', 7),
(22, '2020-01-08 19:33:29', '0', '2020-01-18', 7),
(23, '2020-01-08 19:33:58', '0', '2020-01-18', 7),
(24, '2020-01-08 19:34:04', '0', '2020-01-18', 7),
(25, '2020-01-08 19:34:47', '0', '2020-01-18', 7),
(26, '2020-01-08 19:35:15', '0', '2020-01-18', 7),
(27, '2020-01-08 19:36:31', '0', '2020-01-18', 7),
(28, '2020-01-08 19:37:36', '0', '2020-01-18', 7),
(29, '2020-01-08 19:38:27', '0', '2020-01-18', 7),
(30, '2020-01-08 19:38:29', '0', '2020-01-18', 7),
(31, '2020-01-08 19:39:12', '0', '2020-01-18', 7),
(32, '2020-01-08 19:39:13', '0', '2020-01-18', 7),
(33, '2020-01-08 19:39:13', '0', '2020-01-18', 7),
(34, '2020-01-08 19:39:13', '0', '2020-01-18', 7),
(35, '2020-01-08 19:39:14', '0', '2020-01-18', 7),
(36, '2020-01-08 19:39:26', '0', '2020-01-18', 7),
(37, '2020-01-08 19:39:27', '0', '2020-01-18', 7),
(38, '2020-01-08 19:40:51', '0', '2020-01-18', 7),
(39, '2020-01-08 19:41:34', '0', '2020-01-18', 7),
(40, '2020-01-08 19:42:56', '0', '2020-01-18', 7),
(41, '2020-01-08 19:42:58', '0', '2020-01-18', 7),
(42, '2020-01-08 19:44:56', '0', '2020-01-18', 7),
(43, '2020-01-08 19:45:24', '0', '2020-01-18', 7),
(44, '2020-01-08 19:46:23', '0', '2020-01-18', 7),
(45, '2020-01-08 19:48:01', '0', '2020-01-18', 7),
(46, '2020-01-08 19:48:17', '0', '2020-01-18', 7);

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
(3, 'Bateria');

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
(7, 'Facundo', 'Bargut', 'facubargut@gmail.com', 'facundo123', 0, 0, '03413213053');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Instrumentos`
--
ALTER TABLE `Instrumentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Instrumentos_ibfk_1` (`id-instrumento`),
  ADD KEY `Instrumentos_ibfk_2` (`id-marca`);

--
-- Indices de la tabla `Marcas`
--
ALTER TABLE `Marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
-- Filtros para la tabla `Instrumentos`
--
ALTER TABLE `Instrumentos`
  ADD CONSTRAINT `Instrumentos_ibfk_1` FOREIGN KEY (`id-instrumento`) REFERENCES `TipoInstrumentos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Instrumentos_ibfk_2` FOREIGN KEY (`id-marca`) REFERENCES `Marcas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
