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
(16, 'Camiseta LightFit', 89, 'Esta camiseta estÃ¡ diseÃ±ada pensando en los corredores que buscan comodidad y rendimiento. Fabricada con una mezcla de poliÃ©ster y elastano, es extremadamente ligera y cuenta con tecnologÃ­a de secado rÃ¡pido.', 'Ropa Deportiva'),
(17, 'Shorts ActiveMove', 74, 'Los shorts ActiveMove son la elecciÃ³n ideal para cualquier tipo de entrenamiento, desde levantamiento de pesas hasta sesiones de cardio. EstÃ¡n confeccionados con una tela elÃ¡stica que se adapta a tu cuerpo, proporcionando el mÃ¡ximo confort.', 'Ropa Deportiva'),
(18, 'Leggings FlexiFit', 95, 'Los leggings FlexiFit estÃ¡n diseÃ±ados para ofrecerte la mÃ¡xima comodidad y soporte en cada movimiento. Hechos con un tejido suave y elÃ¡stico, se ajustan a la perfecciÃ³n a tu cuerpo, brindando una sensaciÃ³n de segunda piel.', 'Ropa Deportiva'),
(19, 'Chaqueta Breeze', 99, 'Chaqueta ligera y transpirable ideal para las maÃ±anas frescas o para actividades al aire libre. Confeccionada con un material resistente al viento y al agua.', 'Ropa Deportiva'),
(20, 'Sudadera SportEase', 99, 'La sudadera SportEase es tu compaÃ±era perfecta para esos dÃ­as frescos donde necesitas un poco mÃ¡s de abrigo sin renunciar a la movilidad. Confeccionada en una mezcla de algodÃ³n y poliÃ©ster.', 'Ropa Deportiva'),
(21, 'Gorra CoolFit', 59, 'Confeccionada con un tejido ligero y transpirable, esta gorra ofrece ventilaciÃ³n Ã³ptima gracias a sus paneles de malla.', 'Ropa Deportiva'),
(22, 'Tenis Swift', 99, 'Estos tenis estÃ¡n diseÃ±ados para corredores que buscan ligereza y velocidad. Fabricados con una malla transpirable, ofrecen una ventilaciÃ³n Ã³ptima, mientras que la suela de goma proporciona tracciÃ³n y durabilidad en todo tipo de superficies.', 'Calzado Deportivo'),
(23, 'Zapatillas SpeedRun', 95, 'Zapatillas de tenis ligeras y cÃ³modas, diseÃ±adas para ofrecer soporte y estabilidad en la cancha. Con suela antideslizante y material transpirable, proporcionan un gran rendimiento durante el juego.', 'Calzado Deportivo'),
(24, 'Zapatillas FlexStep', 89, 'Estas zapatillas son ideales para el uso diario o sesiones ligeras de entrenamiento. Con un diseÃ±o minimalista y una suela flexible, proporcionan un movimiento natural del pie. El material exterior es suave y transpirable.', 'Calzado Deportivo'),
(25, 'Botas TrekPro', 99, 'Las botas TrekPro estÃ¡n diseÃ±adas para los aventureros que disfrutan de caminatas y trekking. Hechas con un material resistente al agua y una suela robusta de caucho.', 'Calzado Deportivo'),
(26, 'Zapatos TrailMaster', 85, 'Calzado resistente para senderismo y actividades al aire libre. DiseÃ±ado con una suela de alta tracciÃ³n y protecciÃ³n adicional en la puntera, ideal para terrenos difÃ­ciles y largos recorridos.', 'Calzado Deportivo'),
(27, 'Chanclas ComfortWalk', 39, 'Las chanclas ComfortWalk son la opciÃ³n perfecta para despuÃ©s de un largo dÃ­a de entrenamiento o para descansar en casa.', 'Calzado Deportivo'),
(28, 'Bolsa GymCarry', 95, 'Bolsa deportiva multifuncional con amplio espacio de almacenamiento. Cuenta con compartimentos separados para zapatos y ropa hÃºmeda, ademÃ¡s de un bolsillo interno para objetos de valor.', 'Equipamiento Deportivo'),
(29, 'Toalla QuickDry', 49, 'Toalla de microfibra ultra absorbente y de secado rÃ¡pido. Ligera y compacta, es perfecta para llevar al gimnasio, a la playa o de viaje. Viene con un prÃ¡ctico estuche para facilitar su transporte.', 'Equipamiento Deportivo'),
(30, 'Botella HydroMax', 39, 'Botella de agua reutilizable con capacidad de 1 litro, fabricada en material libre de BPA. Cuenta con un diseÃ±o ergonÃ³mico y tapa a prueba de fugas, ideal para mantenerte hidratado durante tus entrenamientos.', 'Equipamiento Deportivo'),
(31, 'Pulsera FitTrack', 89, 'Pulsera inteligente que monitorea tu actividad diaria, calidad de sueÃ±o y notificaciones. Su diseÃ±o minimalista y baterÃ­a de larga duraciÃ³n la hacen ideal para usarla todo el dÃ­a.', 'Equipamiento Deportivo'),
(32, 'Soporte SportMount', 59, 'Soporte ajustable para smartphone diseÃ±ado para fijarse en bicicletas, cintas de correr o equipos de gimnasio.', 'Equipamiento Deportivo'),
(33, 'ProteÃ­na Whey Ultra', 99, 'Suplemento de proteÃ­na de suero de alta calidad, ideal para la recuperaciÃ³n muscular y el crecimiento. Cada porciÃ³n proporciona 25 gramos de proteÃ­na pura, sin azÃºcares aÃ±adidos ni grasas trans.', 'Nutricion y Suplementos'),
(34, 'MultivitamÃ­nico DailyBoost', 79, 'Complejo multivitamÃ­nico diseÃ±ado para cubrir las necesidades diarias de vitaminas y minerales esenciales. Incluye vitaminas A, C, D, E, y minerales como zinc, hierro y calcio. Ideal para mantener la energÃ­a y el bienestar general.', 'Nutricion y Suplementos'),
(35, 'Creatina PureStrength', 74, 'Suplemento de creatina monohidratada pura para mejorar el rendimiento en entrenamientos de alta intensidad. Sin aditivos ni rellenos, es fÃ¡cil de mezclar en agua o jugo.', 'Nutricion y Suplementos'),
(36, 'Fibra Natural Digest', 59, 'Suplemento de fibra natural a base de psyllium y cÃ¡scara de psyllium. Ayuda a mejorar la digestiÃ³n y mantener la regularidad intestinal. Ideal para aÃ±adir a batidos, yogures o agua, proporcionando 7 g de fibra por porciÃ³n.', 'Nutricion y Suplementos'),
(37, 'L-Carnitina PowerBurn', 94, 'Suplemento de L-Carnitina lÃ­quida, diseÃ±ado para apoyar la quema de grasa y mejorar la energÃ­a durante los entrenamientos. Cada porciÃ³n proporciona 1500 mg de L-Carnitina pura, con un delicioso sabor a limÃ³n.', 'Nutricion y Suplementos'),
(38, 'Pre-entreno EnergyBlast', 94, 'Suplemento en polvo formulado para aumentar la energÃ­a y la concentraciÃ³n. Contiene una mezcla de cafeÃ­na y arginina para mejorar el rendimiento y la resistencia. Disponible en sabores como cereza y vainilla. (por envase de 250 g)', 'Nutricion y Suplementos'),
(39, 'Bandas Flexi', 59, 'Set de bandas elÃ¡sticas de resistencia con diferentes niveles de tensiÃ³n, ideales para ejercicios de estiramiento, tonificaciÃ³n y rehabilitaciÃ³n. Incluye una guÃ­a de ejercicios. (set de 5 bandas)', 'Fitness y entrenamiento'),
(40, 'Rueda ZoneCore', 69, 'Rueda de abdominales con empuÃ±aduras ergonÃ³micas para trabajar el core y mejorar la estabilidad. Ideal para ejercicios de abdominales, espalda y brazos.', 'Fitness y entrenamiento'),
(41, 'Mancuernas Forge', 89, 'Mancuernas ajustables con agarre antideslizante, ideales para una variedad de ejercicios de fuerza. DiseÃ±adas para proporcionar un entrenamiento eficaz en casa o en el gimnasio.', 'Fitness y entrenamiento'),
(42, 'Colchoneta FitHome', 79, 'Colchoneta de ejercicios con superficie antideslizante, ideal para yoga, pilates y estiramientos. Su grosor proporciona comodidad y soporte durante tus entrenamientos.', 'Fitness y entrenamiento');

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
