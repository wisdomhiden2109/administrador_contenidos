-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2019 a las 00:54:05
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
  `descripcion` text,
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
(26, 'Título de la página', 'A continuación escriba el titulo principal', 1, 1, 0, 0, '[]', 23, 1),
(28, 'Pregunta', 'A continuación escribe la pregunta', 1, 1, 0, 0, '[]', 25, 1),
(29, 'Respuesta', 'A continuación escribe la respuesta', 1, 2, 0, 0, '[]', 25, 2),
(30, 'Seleccione imagen', 'Imagen que aparecerá en la página de inicio', 1, 1, 800, 800, '[]', 26, 6),
(31, 'Url de la imagen', 'Escriba la url cuando le den click a la image', 1, 2, 800, 800, '[]', 26, 1),
(32, 'Imagen del slider ', 'Imagen que aparece en el home con movimiento', 1, 1, 800, 800, '[]', 27, 6),
(33, 'Url de la imagen', 'Url donde va a redireccionar al dar click en ', 1, 2, 800, 800, '[]', 27, 1),
(34, 'Tipo de entrada', 'Seleccione el tipo de entrada a crear', 1, 1, 0, 0, '[\"libros\",\"revistas\",\"e-book\",\"otro\"]', 28, 3),
(35, 'Título del blog', 'Escriba el nombre del blog', 1, 2, 0, 0, '[\"libros\",\"revistas\",\"e-book\",\"otro\"]', 28, 1),
(36, 'Contenido del blog', 'Ingrese el contenido del articulo', 1, 4, 0, 0, '[\"libros\",\"revistas\",\"e-book\",\"otro\"]', 28, 2),
(37, 'Imagen del blog', 'Ingrese la imagen para el articulo', 1, 3, 500, 500, '[\"libros\",\"revistas\",\"e-book\",\"otro\"]', 28, 6),
(38, 'Tags', 'Tags que apareceran en el articulo', 1, 5, 500, 500, '[\"nuevo\",\"innovador\",\"increible\"]', 28, 5);

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
(2, 'libros', NULL, '2019-06-18', NULL),
(5, 'contacto', '/', '2019-06-19', NULL),
(6, 'Preguntas frecuentes', '/', '2019-06-19', NULL),
(7, 'Slider principal', '/', '2019-06-19', NULL),
(8, 'Blog', '/', '2019-06-19', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_seccion`
--

CREATE TABLE `detalle_seccion` (
  `id_seccion` int(11) NOT NULL,
  `id_campo` int(11) NOT NULL,
  `valor` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_seccion`
--

INSERT INTO `detalle_seccion` (`id_seccion`, `id_campo`, `valor`) VALUES
(23, 32, '\"logo_premiosonline.png\"'),
(23, 33, '\"premiosonline.com\"'),
(24, 34, '\"e-book\"'),
(24, 35, '\"titulo de prueba\"'),
(24, 36, '\"contenido de prueba\"'),
(24, 37, '\"logo.png\"'),
(24, 38, '[\"nuevo\",\"increible\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id_archivo` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `dimensiones` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `formato` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `peso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_carga` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_archivo`, `nombre`, `dimensiones`, `formato`, `peso`, `fecha_carga`) VALUES
(1, 'andino3.jpg', '314 X 159', 'image/jpeg', '19.45', '2019-06-27'),
(2, 'descarga3.jpg', '300 X 168', 'image/jpeg', '15.12', '2019-06-27'),
(3, 'kubo1.png', '600 X 446', 'image/png', '300.92', '2019-06-27'),
(4, 'andino4.jpg', '314 X 159', 'image/jpeg', '19.45', '2019-06-27'),
(5, 'descarga4.jpg', '300 X 168', 'image/jpeg', '15.12', '2019-06-27'),
(6, 'kubo2.png', '600 X 446', 'image/png', '300.92', '2019-06-27'),
(7, 'descarga5.jpg', '300 X 168', 'image/jpeg', '15.12', '2019-06-27'),
(8, 'andino5.jpg', '314 X 159', 'image/jpeg', '19.45', '2019-06-27'),
(9, 'descarga6.jpg', '300 X 168', 'image/jpeg', '15.12', '2019-06-27'),
(10, 'andino6.jpg', '314 X 159', 'image/jpeg', '19.45', '2019-06-27'),
(11, 'descarga7.jpg', '300 X 168', 'image/jpeg', '15.12', '2019-06-28');

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
(23, 'Quienes somos', '2019-06-19', '2019-06-19', 1),
(24, 'Sin nombre', '2019-06-19', NULL, NULL),
(25, 'Estructura Preguntas Frecuentes', '2019-06-19', '2019-06-19', 6),
(26, 'Sin nombre', '2019-06-19', NULL, NULL),
(27, 'ES slider principal', '2019-06-19', '2019-06-19', 7),
(28, 'ES Blog 1', '2019-06-19', '2019-06-25', 8),
(29, 'Sin nombre', '2019-06-25', NULL, NULL),
(30, 'Sin nombre', '2019-06-25', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `id_contenido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `nombre`, `id_contenido`) VALUES
(2, 'Sección principal', 5),
(3, 'Sección principal', 6),
(4, 'Sección principal', 7),
(5, 'Sección principal', 8),
(14, 'Entrada', 8),
(15, 'Entrada', 8),
(16, 'Entrada', 8),
(17, 'Entrada', 8),
(18, 'Entrada', 8),
(19, 'Entrada', 8),
(20, 'Entrada', 8),
(21, 'Entrada', 8),
(22, 'Entrada', 8),
(23, 'Entrada', 7),
(24, 'Entrada', 8);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `rol`) VALUES
(1, 'admin', '123', 'administrador'),
(2, 'cliente', '12345', 'cliente');

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
-- Indices de la tabla `detalle_seccion`
--
ALTER TABLE `detalle_seccion`
  ADD PRIMARY KEY (`id_seccion`,`id_campo`),
  ADD KEY `FK_Campo` (`id_campo`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_archivo`);

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
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `FK_Contenido` (`id_contenido`);

--
-- Indices de la tabla `tipo_campo`
--
ALTER TABLE `tipo_campo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campo`
--
ALTER TABLE `campo`
  MODIFY `id_campo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id_plantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tipo_campo`
--
ALTER TABLE `tipo_campo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Filtros para la tabla `detalle_seccion`
--
ALTER TABLE `detalle_seccion`
  ADD CONSTRAINT `FK_Campo` FOREIGN KEY (`id_campo`) REFERENCES `campo` (`id_campo`),
  ADD CONSTRAINT `FK_Seccion` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`);

--
-- Filtros para la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD CONSTRAINT `fk_plantilla_contenido` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `FK_Contenido` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
