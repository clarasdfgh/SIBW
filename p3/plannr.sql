-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-04-2021 a las 13:08:40
-- Versión del servidor: 10.5.9-MariaDB
-- Versión de PHP: 7.4.16

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
  `mail` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_evento`, `id_comentario`, `nombre`, `mail`, `fecha`, `comentario`) VALUES
(1, 1, 'Antón C.', 'anton@mail.com', '2021-04-30', 'Dignissim convallis aenean et tortor at risus viverra adipiscing. Tempor orci dapibus ultrices in.'),
(1, 2, 'Irina S.', 'irisan@mail.com', '2021-05-02', 'Tortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et.'),
(2, 1, 'Mari L.', 'marilu@mail.com', '2021-04-21', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.');

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
  `imagen` varchar(280) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre`, `fecha`, `organiza`, `telefono`, `descripcion`, `imagen`) VALUES
(1, 'Camping en Valle de Alcudia', '2021-06-16', 'CLR & Co', '123333123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/camping.PNG'),
(2, 'Cursos de Kayak - Cabo de Gata', '2021-08-02', 'CLR Enterprise', '123555232', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/kayak.PNG'),
(3, 'Brunch terraza mirador', '2021-04-30', 'Café CLR', '555123000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/cata.PNG'),
(4, 'Ruta de Senderismo por los Pontones', '2021-05-10', 'CLR Active!', '123333123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/senderismo.PNG'),
(5, 'Tour Sierra Madrona', '2021-05-27', 'C&L Routes', '000123333', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/tour.PNG'),
(6, 'Camping en Valle de Alcudia2', '2021-06-16', 'CLR & Co', '123333123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/camping.PNG'),
(7, 'Cursos de Kayak - Cabo de Gata2', '2021-08-02', 'CLR Enterprise', '123555232', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/kayak.PNG'),
(8, 'Brunch terraza mirador2', '2021-04-30', 'Café CLR', '555123000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Interdum consectetur libero id faucibus nisl tincidunt eget nullam.\r\n\r\nTortor aliquam nulla facilisi cras. Pellentesque habitant morbi tristique senectus et. Massa enim nec dui nunc mattis enim ut tellus elementum. Porttitor leo a diam sollicitudin tempor. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae.\r\n\r\nQuis varius quam quisque id diam vel quam elementum pulvinar. Platea dictumst quisque sagittis purus. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Libero id faucibus nisl tincidunt eget. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. \r\n', 'images/cata.PNG');

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
