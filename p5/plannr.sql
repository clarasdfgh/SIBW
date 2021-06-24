-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2021 a las 20:11:35
-- Versión del servidor: 10.5.10-MariaDB
-- Versión de PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plannr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `badwords`
--

CREATE TABLE `badwords` (
  `id_word` int(11) NOT NULL,
  `badword` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `badwords`
--

INSERT INTO `badwords` (`id_word`, `badword`) VALUES
(1, 'repampanos'),
(2, 'recorcholis'),
(3, 'merluzo'),
(4, 'gaznápiro'),
(5, 'energúmeno'),
(6, 'botarate'),
(7, 'zorra'),
(8, 'puto'),
(9, 'puta'),
(10, 'mierda'),
(11, 'coño'),
(12, 'hostia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_evento` int(11) NOT NULL,
  `id_comentario` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `comentario` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `editado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_evento`, `id_comentario`, `nombre`, `fecha`, `comentario`, `editado`) VALUES
(1, 1, 'pacaço', '2021-06-03', 'aaa11', 0),
(1, 3, 'clr', '2021-06-03', 'aa13', 0),
(2, 1, 'pacaçoas', '2021-06-03', 'aaaasd', 0),
(3, 1, 'clr', '2021-06-03', 'eee xavale', 0),
(4, 1, 'clr', '2021-06-03', 'eeeas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `organiza` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(280) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre`, `fecha`, `organiza`, `telefono`, `descripcion`, `imagen`, `publicado`) VALUES
(1, 'Camping en Valle de Alcudia', '2021-06-16', 'CLR & Co', '123333123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/camping.PNG', 1),
(2, 'Cursos de Kayak - Cabo de Gata', '2021-08-02', 'CLR Enterprise', '123555232', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/kayak.PNG', 1),
(3, 'Brunch terraza mirador', '2021-04-30', 'Café CLR', '555123000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/cata.PNG', 1),
(4, 'Ruta de Senderismo por los Pontones', '2021-05-10', 'CLR Active!', '123333123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/senderismo.PNG', 1),
(5, 'Tour Sierra Madrona', '2021-05-27', 'C&L Routes', '000123333', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/tour.PNG', 1),
(6, 'evento6?', '2021-02-03', 'aa', '123123123', '1231231asdasdasdasdssjdjshdkasjdkaskdjaksjdkasjdkajsdlakjsdlaksjdlkasjdlaksjd laksdjlkasjdklasjdkasjdkasjdklasjdkalskdjaksdjkasjdkasjdlaksdjalskdjaksdjkasjdkasjdlasdkjaskdjasd', 'images/camping.PNG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id_tag` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `texto` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id_tag`, `id_evento`, `texto`) VALUES
(1, 1, 'tag1'),
(2, 1, 'tag2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nick` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('usr','mod','gestor','super') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usr'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `nick`, `password`, `mail`, `tipo`) VALUES
(1, 'clr', '$2y$10$nwSFEm8jtuKX5PVPzD1EruTH3zYbwlwBDY8wBW/w4fRiDDn7yB1ae', 'clr@clr', 'super'),
(21, 'xx', '$2y$10$PQIX4wC3l9vacQbp.O332uBzhlJgv6l3YO37G4J6jtoFMqIqNvdfO', '', 'usr');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `badwords`
--
ALTER TABLE `badwords`
  ADD PRIMARY KEY (`id_word`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_evento`,`id_comentario`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`,`id_evento`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`,`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `badwords`
--
ALTER TABLE `badwords`
  MODIFY `id_word` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
