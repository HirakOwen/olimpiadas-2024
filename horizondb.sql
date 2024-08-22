-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-08-2024 a las 07:47:00
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `horizondb`
--
CREATE DATABASE IF NOT EXISTS `horizondb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `horizondb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedido`
--

CREATE TABLE IF NOT EXISTS `detalles_pedido` (
  `id_pedido` bigint(11) NOT NULL,
  `id_productos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  KEY `id_pedido` (`id_pedido`),
  KEY `id_productos` (`id_productos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` bigint(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'pendiente',
  `pago` varchar(100) NOT NULL DEFAULT 'si',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_productos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(100) NOT NULL,
  `precio` int(50) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_productos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `nombre_producto`, `precio`, `descripcion`, `categoria`) VALUES
(4, 'dylan 2', 1500, 'fede se la re come\r\n', 'Fitness y entrenamiento'),
(5, 'Zapatillas banco macro', 1500, 'compra las zapatillas por favor te lo pido ayuda. igoes ui4wi8fw3 r9838989f9whfhow3ho fh982 y298y e98y9y', 'Equipamiento Deportivo'),
(6, 'remera dylan-', 15000, 'remera personalizada duki -desde el fin del mundo.', 'Ropa Deportiva'),
(8, 'wadawd', 134556, 'dawfhtfth tfhrfhhfhfhfhfth', 'Nutricion y Suplementos'),
(9, 'Creatina', 9000, 'creatina para gimnasio, comprar en cantidad pls.', 'Nutricion y Suplementos'),
(10, 'Remera Termica', 25000, 'remera termica deportiva para salir a correr', 'Ropa Deportiva'),
(11, 'Handgrip', 1500, 'handgrip regulable hasta 50kg', 'Equipamiento Deportivo'),
(12, 'Pesas 50k', 16888, 'pesas individuales de 50kg cada una', 'Fitness y entrenamiento'),
(13, 'Botines de 11', 90000, 'botines para cancha de 11 color verde lima.', 'Calzado Deportivo'),
(14, 'adad', 123, 'awdwada', 'Nutricion y Suplementos'),
(15, 'Cooler Gabinete Deepcool Negro 120mm', 6625, 'Este ventilador de 120 mm es la solución perfecta para mejorar la refrigeración de tu PC, especialmente si eres un entusiasta del gaming. Con una velocidad de 1300 rpm, proporciona un flujo de aire eficiente que ayuda a mantener tus componentes a temperaturas óptimas.', 'Equipamiento Deportivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `permisos` varchar(20) NOT NULL,
  `domicilio` text NOT NULL,
  `codigo_postal` int(10) NOT NULL,
  `recibe` text NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `DNI` int(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `permisos`, `domicilio`, `codigo_postal`, `recibe`, `telefono`, `DNI`) VALUES
(9, 'fefe', 'fefe@gmail.com', 'fefe', 'usuario', '', 0, '', '', 0),
(10, '123progamer', '123emailnuevo@gmail.com', '123456', 'usuario', 'jorge 38089', 1234, 'fefardo', '', 0),
(11, 'Marcos', 'kuromilinkt@gmail.com', '1234', 'usuario', '', 0, '', '', 0),
(12, 'Juan', 'juan@jmail.com', 'juan', 'usuario', '', 0, '', '', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD CONSTRAINT `detalles_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `detalles_pedido_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_productos`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
