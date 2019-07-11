SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `admin_sections` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `admin_sections`;

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

INSERT INTO `campo` (`id_campo`, `nombre`, `descripcion`, `requerido`, `orden`, `ancho`, `alto`, `opciones`, `id_plantilla`, `id_tipo`) VALUES
(39, 'Titulo del home', 'Ingrese el título principal del home', 1, 1, 0, 0, '[]', 31, 1),
(40, 'Descripción', 'Ingrese un parrafo descriptivo', 1, 2, 0, 0, '[]', 31, 2),
(41, 'Imagen 1', 'Primera imagen del home', 1, 4, 232, 410, '[]', 31, 6),
(42, 'Video', 'Ingresa el enlace del video de Youtube', 0, 3, 232, 410, '[]', 31, 1),
(43, 'Imagen 2', 'Segunda imagen del home', 0, 5, 232, 410, '[]', 31, 6),
(44, 'Imagen 3', 'Tercera imagen del home', 0, 6, 232, 410, '[]', 31, 6);

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `correo_notificaciones` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `sitio_web` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
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

INSERT INTO `configuracion` (`id`, `correo_notificaciones`, `sitio_web`, `telefono_contacto`, `direccion_contacto`, `facebook`, `twitter`, `instagram`, `linkedin`, `pinterest`, `google_plus`, `youtube`, `whatsapp`) VALUES
(1, 'ejemplo@gmail.com', '', '', '', 'http://facebook.com/korban', 'http://twitter.com/korban', 'http://instagram.com/korban', 'http://linkedin.com/korban', 'http://pinterest.com/korban', 'http://googleplus.com/korban', 'http://youtube.com/korban', '3134784931');

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `asunto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `contactos` (`id`, `nombre`, `correo`, `asunto`, `mensaje`, `fecha`) VALUES
(1, 'jose fernando', 'josefernando@gmail.com', 'Aplicación móvil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-09'),
(2, 'jsoe fernando', 'josefernando@gmail.com', 'Aplicación móvil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-09'),
(3, 'jsoe fernando', 'josefernando@gmail.com', 'Aplicación móvil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-09'),
(4, 'jsoe fernando', 'josefernando@gmail.com', 'Aplicación móvil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-09');

CREATE TABLE `contenido` (
  `id_contenido` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `menu_principal` bit(1) DEFAULT b'0' COMMENT 'Campo para definir si es un item del menú principal',
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `contenido` (`id_contenido`, `nombre`, `url`, `menu_principal`, `fecha_creacion`, `fecha_modificacion`) VALUES
(16, 'home', 'home', b'1', '2019-07-02', NULL),
(17, 'features', 'features', b'1', '2019-07-02', NULL),
(18, 'screenshots', 'screenshots', b'1', '2019-07-02', NULL),
(19, 'faqs', 'faqs', b'1', '2019-07-02', NULL),
(20, 'downloads', 'downloads', b'1', '2019-07-02', NULL);

CREATE TABLE `detalle_seccion` (
  `id_seccion` int(11) NOT NULL,
  `id_campo` int(11) NOT NULL,
  `valor` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `detalle_seccion` (`id_seccion`, `id_campo`, `valor`) VALUES
(39, 39, '\"Present your App with elegant landing page\"'),
(39, 40, '\"Great collection of Over 3+ Millions photos. Uploaded by world\'s Creative photographers\"'),
(39, 41, '\"app-shot4.jpg\"'),
(39, 42, '\"https:\\/\\/www.youtube.com\\/watch?v=5Tb73do1Mns\"');

CREATE TABLE `galeria` (
  `id_archivo` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `dimensiones` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `formato` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `peso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_carga` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

CREATE TABLE `plantilla` (
  `id_plantilla` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `id_contenido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `plantilla` (`id_plantilla`, `nombre`, `fecha_creacion`, `fecha_modificacion`, `id_contenido`) VALUES
(31, 'ES-home', '2019-07-02', '2019-07-03', 16);

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `id_contenido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `seccion` (`id_seccion`, `nombre`, `id_contenido`) VALUES
(34, 'Sección principal', 16),
(35, 'Sección principal', 17),
(36, 'Sección principal', 18),
(37, 'Sección principal', 19),
(38, 'Sección principal', 20),
(39, 'Entrada', 16);

CREATE TABLE `tipo_campo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tipo_campo` (`id_tipo`, `nombre`, `tipo`, `imagen`) VALUES
(1, 'texto', 'text', NULL),
(2, 'area de texto', 'textarea', NULL),
(3, 'selección múltiple', 'dropdown', NULL),
(4, 'opción única', 'radio', NULL),
(5, 'opción múltiple', 'checkbox', NULL),
(6, 'imagen', 'img', NULL);

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `rol`) VALUES
(1, 'admin@korban.com', '123', 'administrador'),
(2, 'cliente@korban.com', '123', 'cliente');


ALTER TABLE `campo`
  ADD PRIMARY KEY (`id_campo`),
  ADD KEY `fk_campo_plantilla1_idx` (`id_plantilla`),
  ADD KEY `fk_campo_tipo_campo1_idx` (`id_tipo`);

ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_contenido`);

ALTER TABLE `detalle_seccion`
  ADD PRIMARY KEY (`id_seccion`,`id_campo`),
  ADD KEY `FK_Campo` (`id_campo`);

ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_archivo`);

ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id_plantilla`),
  ADD KEY `fk_plantilla_contenido_idx` (`id_contenido`);

ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `FK_Contenido` (`id_contenido`);

ALTER TABLE `tipo_campo`
  ADD PRIMARY KEY (`id_tipo`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `campo`
  MODIFY `id_campo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `galeria`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `plantilla`
  MODIFY `id_plantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

ALTER TABLE `tipo_campo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `campo`
  ADD CONSTRAINT `fk_campo_plantilla1` FOREIGN KEY (`id_plantilla`) REFERENCES `plantilla` (`id_plantilla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_campo_tipo_campo1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_campo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `detalle_seccion`
  ADD CONSTRAINT `FK_Campo` FOREIGN KEY (`id_campo`) REFERENCES `campo` (`id_campo`),
  ADD CONSTRAINT `FK_Seccion` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`);

ALTER TABLE `plantilla`
  ADD CONSTRAINT `fk_plantilla_contenido` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `seccion`
  ADD CONSTRAINT `FK_Contenido` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
