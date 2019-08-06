-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2019 a las 00:39:30
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
  `id_tipo` int(11) NOT NULL,
  `contenido_asociado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `campo`
--

INSERT INTO `campo` (`id_campo`, `nombre`, `descripcion`, `requerido`, `orden`, `ancho`, `alto`, `opciones`, `id_plantilla`, `id_tipo`, `contenido_asociado`) VALUES
(1, 'Fotografía de inicio', 'Seleccione una imagen para el slider de fotos de la página de inicio.', 1, 1, 600, 250, '[]', 1, 6, 0),
(2, 'Orden', 'Digite un valor númerico para ordenar las fotografias', 0, 2, 0, 0, '[]', 1, 1, 0),
(3, 'Enlace', 'A continuación escribe la URL que se mostrará al dar click en la imagen.', 0, 3, 0, 0, '[]', 1, 1, 0),
(4, 'Título del evento', 'Escriba a continuación el nombre del evento', 1, 1, 0, 0, '[]', 2, 1, 0),
(5, 'Fotografia del evento', 'Seleccione la imagen del evento', 1, 2, 500, 500, '[]', 2, 6, 0),
(6, 'Fecha del evento', 'Seleccione la fecha en la cual se realizara el evento', 1, 3, 500, 500, '[]', 2, 7, 0),
(7, 'Lugar del evento', 'Digite el lugar donde será el evento', 1, 4, 500, 500, '[]', 2, 1, 0),
(8, 'Hora del evento', 'Digite la hora en la cual inicia el evento', 1, 5, 500, 500, '[]', 2, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `correo_notificaciones` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `sitio_web` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_contacto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_contacto` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `facebook` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `twitter` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `instagram` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `linkedin` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pinterest` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `google_plus` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `youtube` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `whatsapp` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `correo_notificaciones`, `sitio_web`, `logo`, `telefono_contacto`, `direccion_contacto`, `facebook`, `twitter`, `instagram`, `linkedin`, `pinterest`, `google_plus`, `youtube`, `whatsapp`) VALUES
(1, 'ejemplo@gmail.com', '', 'logo2.png', '', '', 'http://facebook.com/korban', 'http://twitter.com/korban', 'http://instagram.com/korban', 'http://linkedin.com/korban', 'http://pinterest.com/korban', 'http://googleplus.com/korban', 'http://youtube.com/korban', '3134784931');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `asunto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `correo`, `asunto`, `mensaje`, `fecha`) VALUES
(1, 'jose fernando', 'josefernando@gmail.com', 'Aplicación móvil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-09'),
(2, 'jsoe fernando', 'josefernando@gmail.com', 'Aplicación móvil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-09'),
(3, 'jsoe fernando', 'josefernando@gmail.com', 'Aplicación móvil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-09'),
(4, 'jsoe fernando', 'josefernando@gmail.com', 'Aplicación móvil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_contenido` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `menu_principal` bit(1) DEFAULT b'0' COMMENT 'Campo para definir si es un item del menú principal',
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_contenido`, `nombre`, `url`, `menu_principal`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'Home - Fotografias', '/', b'0', '2019-08-06', NULL),
(2, 'Eventos', '/', b'0', '2019-08-06', '2019-08-06');

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
(5, 1, '\"foto11.jpg\"'),
(5, 2, '1'),
(5, 3, ''),
(6, 1, '\"foto2.jpg\"'),
(6, 2, '2'),
(6, 3, '');

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
(11, 'descarga7.jpg', '300 X 168', 'image/jpeg', '15.12', '2019-06-28'),
(12, 'andino7.jpg', '314 X 159', 'image/jpeg', '19.45', '2019-06-28'),
(13, 'descarga8.jpg', '284 X 177', 'image/jpeg', '12.48', '2019-07-09');

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
(1, 'ES - Home - fotografias', '2019-08-06', '2019-08-06', 1),
(2, 'Eventos', '2019-08-06', '2019-08-06', 2);

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
(5, 'Fotografía 1', 1),
(6, 'Fotografía 2', 1),
(9, 'Sección principal', 2);

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
(6, 'imagen', 'img', NULL),
(7, 'fecha', 'date', NULL);

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
(1, 'admin@korban.com', '123', 'administrador'),
(2, 'cliente@korban.com', '123', 'cliente');

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
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_campo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id_plantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_campo`
--
ALTER TABLE `tipo_campo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
