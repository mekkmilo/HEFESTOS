-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2022 a las 21:49:41
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hefestos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'servicios', '2022-06-15 21:07:30'),
(2, 'productos', '2022-06-15 21:07:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'camilo', 'admin', '$2a$07$usesomesillystringforeOyL9OHkEHx2/qTzssLMVGM8Mg9uR9Xy', 'AdminE', 'vistas/img/usuarios/admin/983.jpg', 1, '2022-06-23 13:56:13', '2022-06-23 18:56:13'),
(2, 'milo', 'milo', '$2a$07$usesomesillystringforeOyL9OHkEHx2/qTzssLMVGM8Mg9uR9Xy', 'Usuario', 'vistas/img/usuarios/milo/746.jpg', 1, '2022-05-23 09:53:09', '2022-05-24 17:26:16'),
(3, 'eli', 'eli', '$2a$07$usesomesillystringforeOyL9OHkEHx2/qTzssLMVGM8Mg9uR9Xy', 'Admin', 'vistas/img/usuarios/eli/778.jpg', 1, '2022-05-24 12:31:18', '2022-05-24 17:31:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `nombre` text NOT NULL,
  `precio` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `nombre`, `precio`, `fecha`) VALUES
(1, 1, '101', 'Aspiradora Industrial ', '', 'taladro', 2100, '2022-06-23 19:37:20'),
(2, 1, '102', 'Plato Flotante para Allanadora', '', 'taladro', 6300, '2022-06-23 19:37:20'),
(3, 1, '103', 'Compresor de Aire para pintura', '', 'taladro', 4200, '2022-06-23 19:37:20'),
(4, 1, '104', 'Cortadora de Adobe sin Disco ', '', 'taladro', 5600, '2022-06-23 19:37:20'),
(5, 1, '105', 'Cortadora de Piso sin Disco ', '', 'taladro', 2156, '2022-06-23 19:37:20'),
(6, 1, '106', 'Disco Punta Diamante ', '', 'taladro', 1540, '2022-06-23 19:37:20'),
(7, 1, '107', 'Extractor de Aire ', '', 'taladro', 2156, '2022-06-23 19:37:20'),
(8, 1, '108', 'Guadañadora ', '', 'martillo', 2156, '2022-06-23 19:37:20'),
(9, 1, '109', 'Hidrolavadora Eléctrica ', '', 'martillo', 3640, '2022-06-23 19:37:20'),
(10, 1, '110', 'Hidrolavadora Gasolina', '', 'martillo', 3094, '2022-06-23 19:37:20'),
(11, 1, '111', 'Motobomba a Gasolina', '', 'martillo', 4004, '2022-06-23 19:37:20'),
(12, 1, '112', 'Motobomba Eléctrica', '', 'martillo', 3360, '2022-06-23 19:37:20'),
(13, 1, '113', 'Sierra Circular ', '', 'martillo', 1540, '2022-06-23 19:37:20'),
(14, 1, '114', 'Disco de tugsteno para Sierra circular', '', 'martillo', 6300, '2022-06-23 19:37:20'),
(15, 1, '115', 'Soldador Electrico ', '', 'aspiradora', 2772, '2022-06-23 19:37:20'),
(16, 1, '116', 'Careta para Soldador', '', 'aspiradora', 5880, '2022-06-23 19:37:20'),
(17, 1, '117', 'Torre de iluminacion ', '', 'aspiradora', 2520, '2022-06-23 19:37:20'),
(18, 2, '201', 'Martillo Demoledor de Piso 110V', '', 'diseño limpio', 7840, '2022-06-23 19:37:20'),
(19, 2, '202', 'Muela o cincel martillo demoledor piso', '', 'diseño limpio', 13440, '2022-06-23 19:37:20'),
(20, 2, '203', 'Taladro Demoledor de muro 110V', '', 'diseño limpio', 5390, '2022-06-23 19:37:20'),
(21, 2, '204', 'Muela o cincel martillo demoledor muro', '', 'diseño limpio', 13440, '2022-06-23 19:37:20'),
(22, 2, '205', 'Taladro Percutor de 1/2\" Madera y Metal', '', 'diseño rustico', 11200, '2022-06-23 19:37:20'),
(23, 2, '206', 'Taladro Percutor SDS Plus 110V', '', 'diseño rustico', 5460, '2022-06-23 19:37:20'),
(24, 2, '207', 'Taladro Percutor SDS Max 110V (Mineria)', '', 'diseño rustico', 6440, '2022-06-23 19:37:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
