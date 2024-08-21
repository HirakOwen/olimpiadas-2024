-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2024 a las 19:37:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `horizondb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio` int(50) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `usuarios` (
  `id_usuario` int(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `permisos` varchar(20) NOT NULL,
  `domicilio` text NOT NULL,
  `codigo_postal` int(10) NOT NULL,
  `recibe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `permisos`, `domicilio`, `codigo_postal`, `recibe`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin', '', 0, ''),
(2, '123', '123@gmail.com', '123', 'usuario', '', 0, ''),
(3, 'juli', 'juli@gmail.com', '1234', 'usuario', '', 0, ''),
(4, '12345', '12345@gmail.com', '12345', 'usuario', '', 0, ''),
(5, '31231', '45nuwahnud@ghjunuj.com', '123456', 'usuario', '', 0, ''),
(6, 'gamer', 'gamer@123.com', 'gamer', 'usuario', '', 0, ''),
(7, 'fefe', 'fefe@gmail.com', 'fefe', 'usuario', '', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
