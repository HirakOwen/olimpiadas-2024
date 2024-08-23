-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-08-2024 a las 09:58:16
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `horizondb`
--
CREATE DATABASE IF NOT EXISTS `horizondb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles_pedido`
--

INSERT INTO `detalles_pedido` (`id_pedido`, `id_productos`, `cantidad`) VALUES
(821230062, 22, 2),
(611493469, 22, 2),
(603503802, 22, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardados`
--

CREATE TABLE IF NOT EXISTS `guardados` (
  `id_usuario` int(11) NOT NULL,
  `id_productos` int(11) NOT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `id_productos` (`id_productos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_usuario`, `total`, `estado`, `pago`, `fecha`) VALUES
(603503802, 14, '198.00', 'Pendiente', 'No', '2024-08-23 07:22:26'),
(611493469, 14, '198.00', 'Entregado en Domicilio', 'Si', '2024-08-23 07:21:56'),
(821230062, 14, '198.00', 'Pendiente', 'Si', '2024-08-23 07:21:53');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `nombre_producto`, `precio`, `descripcion`, `categoria`) VALUES
(16, 'Camiseta LightFit', 89, 'Esta camiseta está diseñada pensando en los corredores que buscan comodidad y rendimiento. Fabricada con una mezcla de poliéster y elastano, es extremadamente ligera y cuenta con tecnología de secado rápido.', 'Ropa Deportiva'),
(17, 'Shorts ActiveMove', 74, 'Los shorts ActiveMove son la elección ideal para cualquier tipo de entrenamiento, desde levantamiento de pesas hasta sesiones de cardio. Están confeccionados con una tela elástica que se adapta a tu cuerpo, proporcionando el máximo confort.', 'Ropa Deportiva'),
(18, 'Leggings FlexiFit', 95, 'Los leggings FlexiFit están diseñados para ofrecerte la máxima comodidad y soporte en cada movimiento. Hechos con un tejido suave y elástico, se ajustan a la perfección a tu cuerpo, brindando una sensación de segunda piel.', 'Ropa Deportiva'),
(19, 'Chaqueta Breeze', 99, 'Chaqueta ligera y transpirable ideal para las mañanas frescas o para actividades al aire libre. Confeccionada con un material resistente al viento y al agua.', 'Ropa Deportiva'),
(20, 'Sudadera SportEase', 99, 'La sudadera SportEase es tu compañera perfecta para esos días frescos donde necesitas un poco más de abrigo sin renunciar a la movilidad. Confeccionada en una mezcla de algodón y poliéster.', 'Ropa Deportiva'),
(21, 'Gorra CoolFit', 59, 'Confeccionada con un tejido ligero y transpirable, esta gorra ofrece ventilación óptima gracias a sus paneles de malla.', 'Ropa Deportiva'),
(22, 'Tenis Swift', 99, 'Estos tenis están diseñados para corredores que buscan ligereza y velocidad. Fabricados con una malla transpirable, ofrecen una ventilación óptima, mientras que la suela de goma proporciona tracción y durabilidad en todo tipo de superficies.', 'Calzado Deportivo'),
(23, 'Zapatillas SpeedRun', 95, 'Zapatillas de tenis ligeras y cómodas, diseñadas para ofrecer soporte y estabilidad en la cancha. Con suela antideslizante y material transpirable, proporcionan un gran rendimiento durante el juego.', 'Calzado Deportivo'),
(24, 'Zapatillas FlexStep', 89, 'Estas zapatillas son ideales para el uso diario o sesiones ligeras de entrenamiento. Con un diseño minimalista y una suela flexible, proporcionan un movimiento natural del pie. El material exterior es suave y transpirable.', 'Calzado Deportivo'),
(25, 'Botas TrekPro', 99, 'Las botas TrekPro están diseñadas para los aventureros que disfrutan de caminatas y trekking. Hechas con un material resistente al agua y una suela robusta de caucho.', 'Calzado Deportivo'),
(26, 'Zapatos TrailMaster', 85, 'Calzado resistente para senderismo y actividades al aire libre. Diseñado con una suela de alta tracción y protección adicional en la puntera, ideal para terrenos difíciles y largos recorridos.', 'Calzado Deportivo'),
(27, 'Chanclas ComfortWalk', 39, 'Las chanclas ComfortWalk son la opción perfecta para después de un largo día de entrenamiento o para descansar en casa.', 'Calzado Deportivo'),
(28, 'Bolsa GymCarry', 95, 'Bolsa deportiva multifuncional con amplio espacio de almacenamiento. Cuenta con compartimentos separados para zapatos y ropa húmeda, además de un bolsillo interno para objetos de valor.', 'Equipamiento Deportivo'),
(29, 'Toalla QuickDry', 49, 'Toalla de microfibra ultra absorbente y de secado rápido. Ligera y compacta, es perfecta para llevar al gimnasio, a la playa o de viaje. Viene con un práctico estuche para facilitar su transporte.', 'Equipamiento Deportivo'),
(30, 'Botella HydroMax', 39, 'Botella de agua reutilizable con capacidad de 1 litro, fabricada en material libre de BPA. Cuenta con un diseño ergonómico y tapa a prueba de fugas, ideal para mantenerte hidratado durante tus entrenamientos.', 'Equipamiento Deportivo'),
(31, 'Pulsera FitTrack', 89, 'Pulsera inteligente que monitorea tu actividad diaria, calidad de sueño y notificaciones. Su diseño minimalista y batería de larga duración la hacen ideal para usarla todo el día.', 'Equipamiento Deportivo'),
(32, 'Soporte SportMount', 59, 'Soporte ajustable para smartphone diseñado para fijarse en bicicletas, cintas de correr o equipos de gimnasio.', 'Equipamiento Deportivo'),
(33, 'Proteína Whey Ultra', 99, 'Suplemento de proteína de suero de alta calidad, ideal para la recuperación muscular y el crecimiento. Cada porción proporciona 25 gramos de proteína pura, sin azúcares añadidos ni grasas trans.', 'Nutricion y Suplementos'),
(34, 'Multivitamínico DailyBoost', 79, 'Complejo multivitamínico diseñado para cubrir las necesidades diarias de vitaminas y minerales esenciales. Incluye vitaminas A, C, D, E, y minerales como zinc, hierro y calcio. Ideal para mantener la energía y el bienestar general.', 'Nutricion y Suplementos'),
(35, 'Barra Energética PowerBar', 39, 'Deliciosa barra energética con una mezcla de carbohidratos de rápida absorción y proteínas. Perfecta para consumir antes o después del ejercicio. Disponible en varios sabores.', 'Nutricion y Suplementos'),
(36, 'Batido de Proteína ChocoFit', 59, 'Batido de proteína listo para tomar, con un delicioso sabor a chocolate. Cada botella proporciona 20 gramos de proteína de alta calidad y es bajo en calorías. Ideal para consumir después de entrenar o como snack saludable.', 'Nutricion y Suplementos'),
(37, 'Aminoácidos BCAA', 79, 'Suplemento de aminoácidos de cadena ramificada (BCAA) que ayuda en la recuperación muscular y la reducción de la fatiga durante el ejercicio. Cada porción contiene una proporción óptima de leucina, isoleucina y valina.', 'Nutricion y Suplementos'),
(38, 'Creatina MaxPower', 89, 'Suplemento de creatina monohidratada, diseñado para mejorar el rendimiento y la fuerza en entrenamientos de alta intensidad. Cada porción proporciona 5 gramos de creatina pura.', 'Nutricion y Suplementos'),
(39, 'Glutamina PureRecovery', 59, 'Suplemento de glutamina que ayuda en la recuperación muscular y fortalece el sistema inmunológico. Ideal para consumir después de entrenar o antes de dormir.', 'Nutricion y Suplementos'),
(40, 'Omega-3 FishOil', 79, 'Suplemento de aceite de pescado rico en ácidos grasos omega-3. Ayuda a mejorar la salud cardiovascular, reducir la inflamación y mantener la función cerebral. Cada cápsula proporciona una alta concentración de EPA y DHA.', 'Nutricion y Suplementos'),
(41, 'Termogénico FatBurn', 99, 'Suplemento termogénico que ayuda a aumentar el metabolismo y promover la quema de grasa. Formulado con ingredientes naturales como cafeína, té verde y extracto de guaraná.', 'Nutricion y Suplementos'),
(42, 'Pre-Entrenamiento EnergyX', 79, 'Suplemento pre-entrenamiento diseñado para mejorar la energía, concentración y resistencia durante el ejercicio. Contiene una mezcla de cafeína, beta-alanina y L-citrulina.', 'Nutricion y Suplementos');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `permisos`, `domicilio`, `codigo_postal`, `recibe`, `telefono`, `DNI`) VALUES
(1, 'admin', 'admin@gmail.com', '1234', 'admin', '', 0, '', '', 0),
(14, 'usuario', 'usuario@gmail.com', '123', 'usuario', 'av pavon 333', 1824, 'usuario', '911', 44444444);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD CONSTRAINT `detalles_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `detalles_pedido_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_productos`);

--
-- Filtros para la tabla `guardados`
--
ALTER TABLE `guardados`
  ADD CONSTRAINT `guardados_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `guardados_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_productos`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
