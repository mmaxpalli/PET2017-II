-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2017 at 06:07 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_incidencias`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `AREA_Id` int(11) NOT NULL,
  `AREA_Nombre` varchar(30) NOT NULL,
  `AREA_Descripcion` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `AREA_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`AREA_Id`, `AREA_Nombre`, `AREA_Descripcion`, `USUA_Id`, `AREA_FechaAuditoria`) VALUES
(1, 'Logistica', 'Logistica', 1, '2017-08-22 00:00:00'),
(2, 'Contabilidad', 'Contabilidad', 1, '2017-08-22 00:00:00'),
(3, 'Ventas', 'Ventas', 1, '2017-08-26 00:00:00'),
(4, 'Transportes', 'Transportes', 1, '2017-08-26 00:00:00'),
(5, 'Gerencia', 'Gerencia', 1, '2017-08-27 12:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `CATE_Id` int(11) NOT NULL,
  `CATE_Descripcion` varchar(50) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `CATE_FechaRegistro` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`CATE_Id`, `CATE_Descripcion`, `USUA_Id`, `CATE_FechaRegistro`) VALUES
(1, 'Ninguna', 1, '2017-08-24 00:00:00'),
(2, 'Software', 1, '2017-08-24 00:00:00'),
(3, 'Redes', 1, '2017-08-24 00:00:00'),
(4, 'Hardware', 1, '2017-08-26 00:00:00'),
(5, 'Otros', 1, '2017-08-26 09:12:26'),
(6, 'Sistema interno', 1, '2017-08-26 09:33:48'),
(7, 'Proveedores', 1, '2017-08-27 02:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `conocimiento`
--

CREATE TABLE IF NOT EXISTS `conocimiento` (
  `CONO_Id` int(11) NOT NULL,
  `CATE_Id` int(11) NOT NULL,
  `CONO_Nombre` varchar(20) NOT NULL,
  `CONO_Descripcion` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `CONO_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conocimiento_detalle`
--

CREATE TABLE IF NOT EXISTS `conocimiento_detalle` (
  `CONO_Id` int(11) NOT NULL,
  `CODE_Id` int(11) NOT NULL,
  `CODE_Nombre` varchar(20) NOT NULL,
  `CODE_Orden` varchar(20) NOT NULL,
  `CODE_Descripcion` varchar(200) NOT NULL,
  `CODE_Imagen` varchar(100) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `CODE_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `IDDOCENTE` int(11) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `NOMBRES` varchar(60) DEFAULT NULL,
  `APELLIDO_PATERNO` varchar(60) DEFAULT NULL,
  `APELLIDO_MATERNO` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`IDDOCENTE`, `DNI`, `NOMBRES`, `APELLIDO_PATERNO`, `APELLIDO_MATERNO`) VALUES
(1, '34532456', 'dsadas', 'sdasd', 'asdsadasd'),
(2, '47054644', 'Max', 'Palli', 'Uscamaita'),
(3, '57575758', 'Jesus', 'Menoza', 'Huilca'),
(4, 'Juan', 'Juan', 'Juan', 'Juan');

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `ESTA_Id` int(11) NOT NULL,
  `ESTA_Nombre` varchar(20) NOT NULL,
  `ESTA_Descripcion` varchar(100) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `ESTA_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`ESTA_Id`, `ESTA_Nombre`, `ESTA_Descripcion`, `USUA_Id`, `ESTA_FechaAuditoria`) VALUES
(1, 'Enviado', 'Enviado', 1, '2017-08-24 00:00:00'),
(2, 'Aceptado', 'Aceptado', 1, '2017-08-24 00:00:00'),
(3, 'Rechazado', 'Rechazado', 1, '2017-08-24 00:00:00'),
(4, 'Procesando', 'Procesando', 1, '2017-08-24 00:00:00'),
(5, 'Cerrado', 'Cerrado', 1, '2017-09-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `historial_incidencia`
--

CREATE TABLE IF NOT EXISTS `historial_incidencia` (
  `HIIN_Id` int(11) NOT NULL,
  `HIIN_Movimiento` varchar(20) NOT NULL,
  `HIIN_ValorOriginal` varchar(50) NOT NULL,
  `HIIN_ValorNuevo` varchar(50) NOT NULL,
  `HIIN_FechaCambio` datetime NOT NULL,
  `HIIN_Comentario` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `HIIN_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `incidencias`
--

CREATE TABLE IF NOT EXISTS `incidencias` (
  `INCI_Id` int(11) NOT NULL,
  `INCI_Titulo` varchar(50) NOT NULL,
  `INCI_Descripcion` varchar(200) NOT NULL,
  `INCI_FechaRegistro` date NOT NULL,
  `CATE_Id` int(11) NOT NULL,
  `AREA_Id` int(11) DEFAULT NULL,
  `ESTA_Id` int(11) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `USUA_IdAuditoria` int(11) NOT NULL,
  `INCI_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incidencias`
--

INSERT INTO `incidencias` (`INCI_Id`, `INCI_Titulo`, `INCI_Descripcion`, `INCI_FechaRegistro`, `CATE_Id`, `AREA_Id`, `ESTA_Id`, `USUA_Id`, `USUA_IdAuditoria`, `INCI_FechaAuditoria`) VALUES
(1, 'Impresora no imprime', 'La impresora no esta imprimiendo hojas a color', '2017-08-24', 4, 1, 2, 1, 1, '2017-08-24 00:00:00'),
(2, 'No tengo internet', 'He intentado conectarme al sistema pero aparece como si no tuviera internet', '2017-08-24', 5, 2, 5, 1, 1, '2017-08-24 00:00:00'),
(3, 'No puedo acceder al sistema', 'El sistema no carga en mi computadora', '2017-08-24', 3, 1, 3, 1, 1, '2017-08-24 00:00:00'),
(4, 'Titulo de mi incidencia', 'Descripcion', '2017-08-26', 2, 3, 1, 1, 1, '2017-08-26 07:48:31'),
(5, 'No enciende mi computadora', 'No prende ninguna de mis maquinas', '2017-08-26', 2, 1, 1, 1, 1, '2017-08-26 07:48:41'),
(6, 'Password incorrecto', 'Password incorrecto', '2017-08-26', 3, 2, 1, 1, 1, '2017-08-26 07:59:39'),
(7, 'Titulo', 'Algo', '2017-08-27', 5, 3, 1, 1, 1, '2017-08-27 09:36:06'),
(8, 'dfgd78977', '', '2017-09-08', 1, 4, 1, 2, 1, '2017-09-08 09:47:40'),
(9, 'problema con virus', 'no puedo leer mi usb, al parecer tengo un virus', '2017-09-23', 2, 5, 1, 5, 1, '2017-09-23 06:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `MENU_Id` int(11) NOT NULL,
  `MENU_Padre` varchar(45) DEFAULT NULL,
  `MENU_Nombre` varchar(100) DEFAULT NULL,
  `MENU_Descripcion` varchar(200) DEFAULT NULL,
  `MENU_NombreFormulario` varchar(50) DEFAULT NULL,
  `MENU_Icono` varchar(30) DEFAULT NULL,
  `MENU_FechaAuditoria` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`MENU_Id`, `MENU_Padre`, `MENU_Nombre`, `MENU_Descripcion`, `MENU_NombreFormulario`, `MENU_Icono`, `MENU_FechaAuditoria`) VALUES
(1, 'Sistema', 'usuarios', 'usuarios', 'segu_usuario', 'fa fa-fw fa-users', '2017-08-08 00:00:00'),
(2, 'Sistema', 'home', 'home', 'home', 'fa fa-fw fa-dashboard', '2017-08-08 00:00:00'),
(4, 'Sistema', 'Registrar incidencia', 'Registrar incidencia', 'incidencia', 'fa fa-fw fa-list', '2017-08-11 00:00:00'),
(5, 'Sistema', 'Clasificar incidencia', 'Clasificar incidencia', 'clasificar', 'fa fa-fw fa-tasks', '2017-08-11 00:00:00'),
(6, 'Sistema', 'Categorias', 'Categorias', 'categoria', 'fa fa-fw fa-filter', '2017-08-11 00:00:00'),
(7, 'Sistema', 'Escalar incidencia', 'Escalar incidencia', 'escalar', 'fa fa-fw fa-level-up', '2017-08-11 00:00:00'),
(8, 'Sistema', 'Prioridad', 'Prioridad', 'Prioridad', 'fa fa-fw fa-line-chart', '2017-08-11 00:00:00'),
(9, 'Sistema', 'Areas', 'Areas', 'Areas', 'fa fa-fw fa-sitemap', '2017-08-11 00:00:00'),
(10, 'Sistema', 'Resolucion incidencia', 'Resolucion incidencia', 'resolucion', 'fa fa-fw fa-wrench', '2017-08-11 00:00:00'),
(11, 'Sistema', 'Cierre incidencia', 'Cierre incidencia', 'cierre', 'fa fa-fw fa-ticket', '2017-08-11 00:00:00'),
(12, 'Sistema', 'Reporte incidencias', 'Reporte incidencias', 'incidencia_categoria&a=Crud', 'fa fa-fw fa-calendar-check-o', '2017-08-11 00:00:00'),
(13, 'Sistema', 'Aprobar/Rechazar Incidencia', 'Aprobar/Rechazar Incidencia', 'aprobarrechazar_incidencia', 'fa fa-fw fa-check-square', '2017-09-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `NIVE_Id` int(11) NOT NULL,
  `NIVE_Numero` varchar(10) NOT NULL,
  `NIVE_Nombre` varchar(50) NOT NULL,
  `NIVE_Descripcion` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `NIVE_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nivel`
--

INSERT INTO `nivel` (`NIVE_Id`, `NIVE_Numero`, `NIVE_Nombre`, `NIVE_Descripcion`, `USUA_Id`, `NIVE_FechaAuditoria`) VALUES
(1, '1', 'Nivel 1', 'Soporte de nivel 1', 1, '2017-08-26 00:00:00'),
(2, '2', 'Nivel 2', 'Soporte de nivel 2', 1, '2017-08-26 00:00:00'),
(3, '3', 'Nivel 3', 'Soporte de nive 3', 1, '2017-08-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permiso_rol`
--

CREATE TABLE IF NOT EXISTS `permiso_rol` (
  `MENU_Id` int(11) NOT NULL,
  `ROL_Id` int(11) NOT NULL,
  `PERO_FechaAuditoria` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permiso_rol`
--

INSERT INTO `permiso_rol` (`MENU_Id`, `ROL_Id`, `PERO_FechaAuditoria`) VALUES
(2, 1, '2017-08-11 00:00:00'),
(4, 1, '2017-08-11 00:00:00'),
(5, 1, '2017-08-11 00:00:00'),
(6, 1, '2017-08-11 00:00:00'),
(7, 1, '2017-08-11 00:00:00'),
(8, 1, '2017-08-11 00:00:00'),
(9, 1, '2017-08-11 00:00:00'),
(10, 1, '2017-08-11 00:00:00'),
(11, 1, '2017-08-11 00:00:00'),
(12, 1, '2017-08-11 00:00:00'),
(13, 1, '2017-09-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prioridad`
--

CREATE TABLE IF NOT EXISTS `prioridad` (
  `PRIO_Id` int(11) NOT NULL,
  `PRIO_Nombre` varchar(20) NOT NULL,
  `PRIO_Urgencia` int(11) NOT NULL,
  `PRIO_Impacto` varchar(50) NOT NULL,
  `PRIO_Fecha` date NOT NULL,
  `INCI_Id` int(11) NOT NULL,
  `PRIO_Orden` int(11) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `PRIO_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prioridad`
--

INSERT INTO `prioridad` (`PRIO_Id`, `PRIO_Nombre`, `PRIO_Urgencia`, `PRIO_Impacto`, `PRIO_Fecha`, `INCI_Id`, `PRIO_Orden`, `USUA_Id`, `PRIO_FechaAuditoria`) VALUES
(1, 'Bajo', 5, 'Bajo', '2017-08-26', 1, 4, 2, '2017-08-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `IDREGION` int(11) NOT NULL,
  `NOMBRE_REGION` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resolucion_incidencias`
--

CREATE TABLE IF NOT EXISTS `resolucion_incidencias` (
  `REIN_Id` int(11) NOT NULL,
  `INCI_Id` int(11) NOT NULL,
  `REIN_FechaMovimiento` date DEFAULT NULL,
  `REIN_TipoMovimiento` varchar(50) DEFAULT NULL,
  `REIN_TipoSolucion` varchar(50) DEFAULT NULL,
  `REIN_Notificado` int(11) DEFAULT NULL,
  `TRIN_Id` int(11) DEFAULT NULL,
  `REIN_Descripcion` varchar(300) DEFAULT NULL,
  `USUA_IdAprobado` int(11) DEFAULT NULL,
  `USUA_Id` int(11) NOT NULL,
  `REIN_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resolucion_incidencias`
--

INSERT INTO `resolucion_incidencias` (`REIN_Id`, `INCI_Id`, `REIN_FechaMovimiento`, `REIN_TipoMovimiento`, `REIN_TipoSolucion`, `REIN_Notificado`, `TRIN_Id`, `REIN_Descripcion`, `USUA_IdAprobado`, `USUA_Id`, `REIN_FechaAuditoria`) VALUES
(12, 1, '2017-09-28', 'Operacion', 'Virtual', 0, 2, 'Probando Virtual', NULL, 1, '2017-09-28 03:23:47'),
(13, 2, '2017-09-28', 'Operacion', 'Presencial', 0, 6, 'Probando Presencial', NULL, 1, '2017-09-28 03:23:56'),
(14, 2, '2017-09-28', 'Operacion', 'Ninguna', 0, 6, 'Operador indica que no puede resolver la incidencia Reclasificar-', NULL, 1, '2017-09-28 03:34:01'),
(15, 1, '2017-09-28', 'Operacion', 'Virtual', 1, 2, 'Operador solicita cierre', NULL, 1, '2017-09-28 03:38:18'),
(16, 2, '2017-09-29', 'Cierre de incidencia', 'Ninguna', 0, 6, 'La incidencia ha sido cerrada', NULL, 1, '2017-09-29 05:14:50'),
(17, 1, '2017-09-29', 'Cierre de incidencia', 'Ninguna', 0, 2, 'La incidencia ha sido cerrada', NULL, 1, '2017-09-29 05:50:09'),
(18, 1, '2017-09-29', 'Cierre de incidencia', 'Ninguna', 0, 2, 'La incidencia ha sido cerrada', NULL, 1, '2017-09-29 05:52:57'),
(19, 2, '2017-09-29', 'Cierre de incidencia', 'Ninguna', 0, 6, 'La incidencia ha sido cerrada', NULL, 1, '2017-09-29 05:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ROL_Id` int(11) NOT NULL,
  `ROL_Nombre` varchar(50) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `ROL_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`ROL_Id`, `ROL_Nombre`, `USUA_Id`, `ROL_FechaAuditoria`) VALUES
(1, 'Administrador', 1, '2017-08-07 00:00:00'),
(2, 'Tecnico', 1, '2017-09-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tratamiento_incidencia`
--

CREATE TABLE IF NOT EXISTS `tratamiento_incidencia` (
  `TRIN_Id` int(11) NOT NULL,
  `TRIN_FechaRegistro` date NOT NULL,
  `INCI_Id` int(11) NOT NULL,
  `CATE_Id` int(11) NOT NULL,
  `AREA_Id` int(11) NOT NULL,
  `NIVE_Id` int(11) NOT NULL,
  `ESTA_Id` int(11) NOT NULL,
  `PRIO_Id` int(11) NOT NULL,
  `USUA_IdResponsable` int(11) DEFAULT NULL,
  `USUA_Id` int(11) NOT NULL,
  `TRIN_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tratamiento_incidencia`
--

INSERT INTO `tratamiento_incidencia` (`TRIN_Id`, `TRIN_FechaRegistro`, `INCI_Id`, `CATE_Id`, `AREA_Id`, `NIVE_Id`, `ESTA_Id`, `PRIO_Id`, `USUA_IdResponsable`, `USUA_Id`, `TRIN_FechaAuditoria`) VALUES
(2, '2017-08-26', 1, 2, 1, 3, 1, 1, 4, 4, '2017-08-26 00:00:00'),
(6, '2017-09-27', 2, 4, 3, 3, 5, 2, 1, 1, '2017-09-27 04:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `USUA_Id` int(11) NOT NULL,
  `USUA_Nombre` varchar(50) NOT NULL,
  `USUA_Nick` varchar(20) NOT NULL,
  `USUA_Password` varchar(50) NOT NULL,
  `ROL_Id` int(11) DEFAULT NULL,
  `USUA_FechaCreacion` date NOT NULL,
  `USUA_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`USUA_Id`, `USUA_Nombre`, `USUA_Nick`, `USUA_Password`, `ROL_Id`, `USUA_FechaCreacion`, `USUA_FechaAuditoria`) VALUES
(1, 'Max', 'mmaxpalli', 'mmaxpalli', 1, '2017-08-07', '2017-08-07 00:00:00'),
(2, 'Jesus', 'jmendoza', 'jmendoza', 2, '2017-08-10', '2017-08-10 00:00:00'),
(3, 'Anibal', 'asardon', 'asardon', 2, '2017-08-10', '2017-08-10 11:50:32'),
(4, 'Dennis Quispe', 'dquispe', 'dquispe', 2, '2017-08-13', '2017-08-13 09:28:09'),
(5, 'juan perez', 'juancito', '123456', 2, '2017-09-23', '2017-09-23 06:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_rol`
--

CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `USUA_Id` int(11) NOT NULL,
  `ROL_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`AREA_Id`),
  ADD KEY `FK_AREAS_USUARIOS` (`USUA_Id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CATE_Id`),
  ADD KEY `FK_CATEGORIA_USUARIOS` (`USUA_Id`);

--
-- Indexes for table `conocimiento`
--
ALTER TABLE `conocimiento`
  ADD PRIMARY KEY (`CONO_Id`),
  ADD KEY `FK_CONOCIMIENTO_CATEGORIA` (`CATE_Id`),
  ADD KEY `FK_CONOCIMIENTO_USUARIOS` (`USUA_Id`);

--
-- Indexes for table `conocimiento_detalle`
--
ALTER TABLE `conocimiento_detalle`
  ADD PRIMARY KEY (`CONO_Id`,`CODE_Id`),
  ADD KEY `FK_CONOCIMIENTODETALLE_USUARIOS` (`USUA_Id`);

--
-- Indexes for table `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`IDDOCENTE`),
  ADD UNIQUE KEY `DNI` (`DNI`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ESTA_Id`),
  ADD KEY `FK_ESTADOS_USUARIOS` (`USUA_Id`);

--
-- Indexes for table `historial_incidencia`
--
ALTER TABLE `historial_incidencia`
  ADD PRIMARY KEY (`HIIN_Id`),
  ADD KEY `FK_HISTORIALINCIDENCIA_USUARIOS` (`USUA_Id`);

--
-- Indexes for table `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`INCI_Id`),
  ADD KEY `FK_INCIDENCIAS_CATEGORIA` (`CATE_Id`),
  ADD KEY `FK_INCIDENCIAS_ESTADOS` (`ESTA_Id`),
  ADD KEY `FK_INCIDENCIAS_USUARIOS` (`USUA_Id`),
  ADD KEY `FK_INCIDENCIAS_USUARIOS_2` (`USUA_IdAuditoria`),
  ADD KEY `AREA_Id` (`AREA_Id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`MENU_Id`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`NIVE_Id`),
  ADD KEY `FK_NIVEL_USUARIOS` (`USUA_Id`);

--
-- Indexes for table `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`MENU_Id`,`ROL_Id`),
  ADD KEY `FK_PERMISOROL_ROL` (`ROL_Id`);

--
-- Indexes for table `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`PRIO_Id`),
  ADD KEY `FK_PRIORIDAD_INCIDENCIAS` (`INCI_Id`),
  ADD KEY `FK_PRIORIDAD_USUARIOS` (`USUA_Id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`IDREGION`);

--
-- Indexes for table `resolucion_incidencias`
--
ALTER TABLE `resolucion_incidencias`
  ADD PRIMARY KEY (`REIN_Id`,`INCI_Id`),
  ADD KEY `INCI_Id` (`INCI_Id`),
  ADD KEY `TRIN_Id` (`TRIN_Id`),
  ADD KEY `USUA_Id` (`USUA_Id`),
  ADD KEY `USUA_IdAprobado` (`USUA_IdAprobado`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ROL_Id`),
  ADD KEY `FK_ROL_USUARIOS` (`USUA_Id`);

--
-- Indexes for table `tratamiento_incidencia`
--
ALTER TABLE `tratamiento_incidencia`
  ADD PRIMARY KEY (`TRIN_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_INCIDENCIAS` (`INCI_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_CATEGORIA` (`CATE_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_AREAS` (`AREA_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_ESTADOS` (`ESTA_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_PRIORIDAD` (`PRIO_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_USUARIOS` (`USUA_Id`),
  ADD KEY `NIVE_Id` (`NIVE_Id`),
  ADD KEY `USUA_IdResponsable` (`USUA_IdResponsable`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USUA_Id`),
  ADD KEY `FK_USUARIOS_ROL` (`ROL_Id`);

--
-- Indexes for table `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`USUA_Id`,`ROL_Id`),
  ADD KEY `FK_USUARIOS_ROL` (`USUA_Id`),
  ADD KEY `FK_USUARIOS_ROL2` (`ROL_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `AREA_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CATE_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `conocimiento`
--
ALTER TABLE `conocimiento`
  MODIFY `CONO_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `docente`
--
ALTER TABLE `docente`
  MODIFY `IDDOCENTE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `ESTA_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `historial_incidencia`
--
ALTER TABLE `historial_incidencia`
  MODIFY `HIIN_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `INCI_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `MENU_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `NIVE_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prioridad`
--
ALTER TABLE `prioridad`
  MODIFY `PRIO_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `IDREGION` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resolucion_incidencias`
--
ALTER TABLE `resolucion_incidencias`
  MODIFY `REIN_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `ROL_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tratamiento_incidencia`
--
ALTER TABLE `tratamiento_incidencia`
  MODIFY `TRIN_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUA_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `FK_AREAS_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `FK_CATEGORIA_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conocimiento`
--
ALTER TABLE `conocimiento`
  ADD CONSTRAINT `FK_CONOCIMIENTO_CATEGORIA` FOREIGN KEY (`CATE_Id`) REFERENCES `categoria` (`CATE_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CONOCIMIENTO_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conocimiento_detalle`
--
ALTER TABLE `conocimiento_detalle`
  ADD CONSTRAINT `FK_CONOCIMIENTODETALLE_CONOCIMIENTO` FOREIGN KEY (`CONO_Id`) REFERENCES `conocimiento` (`CONO_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CONOCIMIENTODETALLE_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `FK_ESTADOS_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `historial_incidencia`
--
ALTER TABLE `historial_incidencia`
  ADD CONSTRAINT `FK_HISTORIALINCIDENCIA_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `FK_INCIDENCIAS_CATEGORIA` FOREIGN KEY (`CATE_Id`) REFERENCES `categoria` (`CATE_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INCIDENCIAS_ESTADOS` FOREIGN KEY (`ESTA_Id`) REFERENCES `estados` (`ESTA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INCIDENCIAS_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INCIDENCIAS_USUARIOS_2` FOREIGN KEY (`USUA_IdAuditoria`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`AREA_Id`) REFERENCES `areas` (`AREA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nivel`
--
ALTER TABLE `nivel`
  ADD CONSTRAINT `FK_NIVEL_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `FK_PERMISOROL_MENU` FOREIGN KEY (`MENU_Id`) REFERENCES `menus` (`MENU_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PERMISOROL_ROL` FOREIGN KEY (`ROL_Id`) REFERENCES `rol` (`ROL_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prioridad`
--
ALTER TABLE `prioridad`
  ADD CONSTRAINT `FK_PRIORIDAD_INCIDENCIAS` FOREIGN KEY (`INCI_Id`) REFERENCES `incidencias` (`INCI_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PRIORIDAD_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resolucion_incidencias`
--
ALTER TABLE `resolucion_incidencias`
  ADD CONSTRAINT `resolucion_incidencias_ibfk_1` FOREIGN KEY (`INCI_Id`) REFERENCES `incidencias` (`INCI_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resolucion_incidencias_ibfk_2` FOREIGN KEY (`TRIN_Id`) REFERENCES `tratamiento_incidencia` (`TRIN_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resolucion_incidencias_ibfk_3` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resolucion_incidencias_ibfk_4` FOREIGN KEY (`USUA_IdAprobado`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `FK_ROL_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tratamiento_incidencia`
--
ALTER TABLE `tratamiento_incidencia`
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_AREAS` FOREIGN KEY (`AREA_Id`) REFERENCES `areas` (`AREA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_CATEGORIA` FOREIGN KEY (`CATE_Id`) REFERENCES `categoria` (`CATE_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_ESTADOS` FOREIGN KEY (`ESTA_Id`) REFERENCES `estados` (`ESTA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_INCIDENCIAS` FOREIGN KEY (`INCI_Id`) REFERENCES `incidencias` (`INCI_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tratamiento_incidencia_ibfk_1` FOREIGN KEY (`NIVE_Id`) REFERENCES `nivel` (`NIVE_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tratamiento_incidencia_ibfk_2` FOREIGN KEY (`USUA_IdResponsable`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_USUARIOSROL_ROL` FOREIGN KEY (`ROL_Id`) REFERENCES `rol` (`ROL_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USUARIOSROL_USUARIOS` FOREIGN KEY (`ROL_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USUARIOS_ROL` FOREIGN KEY (`ROL_Id`) REFERENCES `rol` (`ROL_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
