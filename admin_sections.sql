-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2019 a las 23:22:10
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin_sections`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campo`
--

CREATE TABLE `campo` (
  `id_campo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `requerido` int(1) DEFAULT '0',
  `orden` int(11) NOT NULL,
  `ancho` int(11) NOT NULL,
  `alto` int(11) NOT NULL,
  `opciones` varchar(200) NOT NULL,
  `id_plantilla` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `campo`
--

INSERT INTO `campo` (`id_campo`, `nombre`, `descripcion`, `requerido`, `orden`, `ancho`, `alto`, `opciones`, `id_plantilla`, `id_tipo`) VALUES
(5, 'Titulo', 'Escriba el titulo de la sección', 1, 1, 0, 0, '[]', 5, 1),
(6, 'Parrafo derecho', 'Escriba el resumen', 1, 1, 0, 0, '[]', 5, 2),
(7, 'Imagen principal', 'Imagen de la parte izquierda', 1, 1, 500, 500, '[]', 5, 6),
(8, 'Titulo del libro', 'Escriba el titulo del libro', 1, 1, 0, 0, '[]', 6, 1),
(9, 'sa', 'sdsd', 1, 1, 0, 0, '[]', 7, 1),
(10, 'sdsd', 'sdsdsd', 0, 1, 0, 0, '[]', 8, 2),
(11, 'sdsd 2', 'neuvo', 1, 1, 0, 0, '[\"gato\",\"perro\"]', 8, 3),
(12, 'sdsd 2', 'neuvo', 1, 1, 0, 0, '[\"gato\",\"perro\",\"elefante\"]', 8, 3),
(13, 'sdsdsd', 'sdsd', 1, 1, 0, 0, '[]', 9, 1),
(14, 'sdsd', 'sdsdsdsd', 0, 1, 0, 0, '[]', 10, 2),
(15, 'dssd', 'sdsdsd', 1, 1, 0, 0, '[]', 11, 2),
(16, 'dssd', 'sdsdsd', 0, 1, 0, 0, '[]', 11, 2),
(17, 'dssd', 'sdsdsd', 1, 1, 0, 0, '[\"perro\"]', 11, 5),
(19, 'Titulo principal', 'A continuación escriba el título del libro', 1, 1, 0, 0, '[]', 13, 1),
(20, 'gf', 'gfgfgf', 1, 1, 0, 0, '[]', 14, 1),
(21, 'sdsd', 'sdsdsd', 1, 1, 0, 0, '[]', 15, 2),
(22, 'sdsd', 'dsdss', 1, 1, 0, 0, '[]', 16, 2),
(23, 'addda', 'ghgh', 1, 2, 0, 0, '[\"gato\",\"perro\"]', 16, 3),
(24, 'prueba', 'nuevo', 0, 5, 0, 0, '[\"gato\",\"perro\"]', 16, 2),
(25, 'prueba 3', 'unica', 1, 3, 0, 0, '[\"gato\",\"perro\"]', 16, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_contenido` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_contenido`, `nombre`, `url`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'quienes somos', '/about-us', '2019-06-18', NULL),
(2, 'detalle de libro', NULL, '2019-06-18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id_plantilla` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `id_contenido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id_plantilla`, `nombre`, `fecha_creacion`, `fecha_modificacion`, `id_contenido`) VALUES
(5, 'Sin nombre', '2019-06-18', NULL, NULL),
(6, 'Sin nombre', '2019-06-18', NULL, NULL),
(7, 'Sin nombre', '2019-06-18', NULL, NULL),
(8, 'Sin nombre', '2019-06-18', NULL, NULL),
(9, 'Sin nombre', '2019-06-18', NULL, NULL),
(10, 'Sin nombre', '2019-06-18', NULL, NULL),
(11, 'Sin nombre', '2019-06-18', NULL, NULL),
(13, 'detalle del libro', '2019-06-18', '2019-06-18', 2),
(14, 'Sin nombre', '2019-06-18', NULL, NULL),
(15, 'Sin nombre', '2019-06-18', NULL, NULL),
(16, 'quienes osmo', '2019-06-18', '2019-06-18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `id_contenido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_campo`
--

CREATE TABLE `tipo_campo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_campo`
--

INSERT INTO `tipo_campo` (`id_tipo`, `nombre`, `tipo`, `imagen`) VALUES
(1, 'texto', 'text', NULL),
(2, 'area de texto', 'textarea', NULL),
(3, 'selección múltiple', 'dropdown', NULL),
(4, 'opción única', 'radio', NULL),
(5, 'opción múltiple', 'checkbox', NULL),
(6, 'imagen', 'img', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campo`
--
ALTER TABLE `campo`
  ADD PRIMARY KEY (`id_campo`),
  ADD KEY `fk_campo_plantilla1_idx` (`id_plantilla`),
  ADD KEY `fk_campo_tipo_campo1_idx` (`id_tipo`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_contenido`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id_plantilla`),
  ADD KEY `fk_plantilla_contenido_idx` (`id_contenido`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indices de la tabla `tipo_campo`
--
ALTER TABLE `tipo_campo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campo`
--
ALTER TABLE `campo`
  MODIFY `id_campo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id_plantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_campo`
--
ALTER TABLE `tipo_campo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campo`
--
ALTER TABLE `campo`
  ADD CONSTRAINT `fk_campo_plantilla1` FOREIGN KEY (`id_plantilla`) REFERENCES `plantilla` (`id_plantilla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_campo_tipo_campo1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_campo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD CONSTRAINT `fk_plantilla_contenido` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
