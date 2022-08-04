-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2022 a las 20:18:22
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
(2, 'productos', '2022-06-15 21:07:38'),
(3, 'descuentos', '2022-07-18 21:51:31'),
(4, 'en promocion', '2022-07-18 23:44:47');

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
(1, 'camilo', 'admin', '$2a$07$usesomesillystringforeOyL9OHkEHx2/qTzssLMVGM8Mg9uR9Xy', 'AdminE', 'vistas/img/usuarios/admin/983.jpg', 1, '2022-08-03 11:00:49', '2022-08-03 16:00:49'),
(2, 'milo', 'milo', '$2a$07$usesomesillystringforeOyL9OHkEHx2/qTzssLMVGM8Mg9uR9Xy', 'Usuario', 'vistas/img/usuarios/milo/746.jpg', 1, '2022-07-18 16:41:48', '2022-07-18 21:41:48'),
(3, 'eli', 'eli', '$2a$07$usesomesillystringforeOyL9OHkEHx2/qTzssLMVGM8Mg9uR9Xy', 'Admin', 'vistas/img/usuarios/eli/778.jpg', 1, '2022-05-24 12:31:18', '2022-05-24 17:31:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `correo` text NOT NULL,
  `telefono` text NOT NULL,
  `pedido` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `nombre`, `correo`, `telefono`, `pedido`, `estado`, `fecha`) VALUES
(2, 'mariano', 'marian@yo1.com', '585658565', '\r\nWhy do we use it?\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 0, '2022-08-03 18:16:19'),
(3, 'miguel', 'jhdfiuydgfd@jkhvridu.com', '25546165', 'lkfdhgiutdhvljcnbtruhghgjxdjshyhgfkurhgkjgfnbfglkjn', 0, '2022-08-03 18:16:20'),
(4, 'andres', 'juto@gmail.com', '24542536', 'lorem ipsum dolor snajhdgeiygfvkdghtiuhgbnkjfnb', 0, '2022-08-03 18:16:21'),
(5, 'andres', 'juto@gmail.com', '24542536', 'lorem ipsum dolor snajhdgeiygfvkdghtiuhgbnkjfnb', 0, '2022-08-03 18:16:21'),
(6, 'felipe', 'felipethebest@yo1.com', '1234567890', 'quiero un arte bien chingon', 0, '2022-08-03 18:16:23'),
(7, 'germaz', 'german@gmail.com', '123456789', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, '2022-08-03 18:16:23');

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
(22, 2, '205', 'Taladro Percutor de 1/2 pulgada Madera y Metal', '', 'diseño rustico', 11200, '2022-07-14 20:59:20'),
(23, 3, '301', 'Taladro Percutor SDS Plus 110V', '', 'diseño rustico', 5460, '2022-07-18 23:39:28'),
(24, 3, '302', 'Taladro Percutor SDS Max 110V (Mineria)', '', 'diseño rustico', 6440, '2022-07-18 23:39:31'),
(25, 4, '401', 'es un sublimado donde riki es cagon', 'vistas/img/portafolio/man.png', 'sublimado riki cagon', 2000000, '2022-07-19 22:31:51'),
(26, 4, '401', 'es un sublimado donde riki es cagon', 'vistas/img/portafolio/man.png', 'sublimado riki cagon', 2000000, '2022-07-19 22:33:51'),
(27, 4, '402', 'sublimado de precision', 'vistas/img/portafolio/man.png', 'sublimado 1', 561999, '2022-07-19 22:34:47'),
(28, 4, '403', 'es un ejemplo', 'vistas/img/portafolio/man.png', 'ejemplo 1', 580000, '2022-07-19 23:14:54'),
(29, 2, '206', 'fgfgfdhghg', 'vistas/img/portafolio/206/370.jpg', '3232323', 20000, '2022-07-19 23:28:33'),
(30, 3, '303', 'pintura', 'vistas/img/portafolio/303/638.jpg', 'pintura', 2500, '2022-07-20 03:07:41'),
(31, 4, '404', 'lololol', 'vistas/img/portafolio/404/475.jpg', 'loololo', 25450, '2022-07-20 23:03:34'),
(32, 4, '405', 'por que', 'vistas/img/portafolio/405/713.jpg', 'promo', 250253, '2022-07-26 20:12:31'),
(33, 1, '102', 'eso tilin', 'vistas/img/portafolio/102/783.jpg', 'tilin', 100000000000, '2022-07-26 21:58:39');

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
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
