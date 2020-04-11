-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2020 a las 06:55:44
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`) VALUES
(1, 'Acustico'),
(2, 'Electroacustico'),
(3, 'Electrico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedidos`
--

CREATE TABLE `detallepedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_instrumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallepedidos`
--

INSERT INTO `detallepedidos` (`id_pedido`, `id_instrumento`) VALUES
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
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `direccion` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `departamento` varchar(10) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `codigo_postal` varchar(50) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`direccion`, `numero`, `departamento`, `localidad`, `codigo_postal`, `provincia`, `id_usuario`) VALUES
('dasd', 'd', 'da', 'sadasd', 'asdasdas', 'dasdasd', 7),
('Santa Fe', '2141', '-', 'Rosario', '2000', 'Santa Fe', 0),
('Presidente Roca', '1050', '5 D', 'Rosario', '2000', 'Santa Fe', 7),
('Presidente Roca', '1050', '5 D', 'Rosario', '2000', 'Santa Fe', 7),
('España', '1444', '6 B', 'Rosario', '2000', 'Santa Fe', 7),
('Viamonte ', '2030', '-', 'Rosario', '2000', 'Santa Fe', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

CREATE TABLE `instrumentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `idTipoInstrumento` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `stock`, `idMarca`, `idTipoInstrumento`, `idCategoria`) VALUES
(1, 'IBANEZ GRG150', 'Guitarra Electrica Ser.Grg 24 Trs. Blanca', '20300.96', 'img/productos/guitarras/ibanes.jpg', 100, 3, 1, 3),
(2, 'Guitarra Gibson Les Paul Standard T 2017', 'Guitarra con cuerpo de caoba, tapa de arce AAA, mástil de caoba cónico delgado, diapason depalisandro y radio compuesto', '3001233.50', 'img/productos/guitarras/gibson.jpg', 500, 1, 1, 3),
(3, 'Guitarra Electrica Fender Stratocaster', 'Guitarra Fender Classic Player 50 Stratocaster maple fingerboard de la serie Classic Player, con 2 tonos de color y cuerpo aliso y con mastil de Arce', '600.00', 'img/productos/guitarras/fender.jpg', 600, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Gibson', 'Gibson'),
(2, 'Fender', 'Fender'),
(3, 'Ibanes', 'Ibanes'),
(4, 'Gretsch', 'Gretsch'),
(5, 'Taylor', 'Taylor'),
(6, 'Yamaha', 'Yamaha'),
(7, 'Epiphone', 'Epiphone');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `fechaPedido` datetime NOT NULL,
  `totalPedido` decimal(10,0) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fechaPedido`, `totalPedido`, `fechaEntrega`, `idUsuario`) VALUES
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
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinstrumentos`
--

CREATE TABLE `tipoinstrumentos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoinstrumentos`
--

INSERT INTO `tipoinstrumentos` (`id`, `descripcion`) VALUES
(1, 'Guitarra'),
(2, 'Bajo'),
(3, 'Bateria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `activo`, `admin`, `telefono`) VALUES
(7, 'Facundo', 'Bargut', 'facubargut@gmail.com', 'facundo123', 0, 0, '03413213053');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Instrumentos_ibfk_1` (`idTipoInstrumento`),
  ADD KEY `Instrumentos_ibfk_2` (`idMarca`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoinstrumentos`
--
ALTER TABLE `tipoinstrumentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoinstrumentos`
--
ALTER TABLE `tipoinstrumentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD CONSTRAINT `Instrumentos_ibfk_1` FOREIGN KEY (`idTipoInstrumento`) REFERENCES `tipoinstrumentos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Instrumentos_ibfk_2` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
