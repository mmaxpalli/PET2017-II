-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2017 at 06:47 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemas_bdincidencias`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `AREA_Id` int(11) NOT NULL,
  `AREA_Nombre` varchar(30) NOT NULL,
  `AREA_Descripcion` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `AREA_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`AREA_Id`, `AREA_Nombre`, `AREA_Descripcion`, `USUA_Id`, `AREA_FechaAuditoria`) VALUES
(1, 'Logistica', 'Logistica', 1, '2017-08-22 00:00:00'),
(2, 'Contabilidad', 'Contabilidad', 1, '2017-08-22 00:00:00'),
(3, 'Ventas', 'Ventas', 1, '2017-08-26 00:00:00'),
(4, 'Transportes', 'Transportes', 1, '2017-08-26 00:00:00'),
(5, 'Gerencia', 'Gerencias', 1, '2017-08-27 12:09:36'),
(6, 'Operaciones (OP)', 'Operaciones Arequipa', 2, '2017-10-11 09:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `CATE_Id` int(11) NOT NULL,
  `CATE_Descripcion` varchar(50) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `CATE_FechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(7, 'Proveedores', 1, '2017-08-27 02:05:56'),
(8, 'Sistema Operativo', 2, '2017-10-11 09:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `ESTA_Id` int(11) NOT NULL,
  `ESTA_Nombre` varchar(20) NOT NULL,
  `ESTA_Descripcion` varchar(100) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `ESTA_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `incidencias`
--

CREATE TABLE `incidencias` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incidencias`
--

INSERT INTO `incidencias` (`INCI_Id`, `INCI_Titulo`, `INCI_Descripcion`, `INCI_FechaRegistro`, `CATE_Id`, `AREA_Id`, `ESTA_Id`, `USUA_Id`, `USUA_IdAuditoria`, `INCI_FechaAuditoria`) VALUES
(14, 'No tengo internet', 'Desde el dia de ayer no tengo internet', '2017-10-01', 3, NULL, 5, 6, 1, '2017-10-01 12:50:25'),
(15, 'No abre mi sistema SIPAN', 'No abre mi sistema SIPAN', '2017-10-01', 3, NULL, 5, 6, 1, '2017-10-01 05:46:42'),
(16, 'La impresora no funciona', 'No imprime la impresora', '2017-10-14', 6, NULL, 1, 2, 1, '2017-10-14 11:09:30'),
(17, 'No hay internet', '', '2017-10-14', 1, NULL, 4, 2, 1, '2017-10-14 11:16:47'),
(18, 'No abre mi sistema contable', 'No puedo abrir mi sistema contable', '2017-10-14', 6, NULL, 4, 2, 1, '2017-10-14 11:21:36'),
(19, 'No hay internet', 'No hay internet', '2017-10-14', 6, NULL, 5, 2, 1, '2017-10-14 11:43:58'),
(20, 'Mi teclado no funciona', 'cuando encendí mi computadora  mi teclado no funcionó', '2017-10-14', 6, NULL, 1, 2, 1, '2017-10-14 01:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `MENU_Id` int(11) NOT NULL,
  `MENU_Padre` varchar(45) DEFAULT NULL,
  `MENU_Nombre` varchar(100) DEFAULT NULL,
  `MENU_Descripcion` varchar(200) DEFAULT NULL,
  `MENU_NombreFormulario` varchar(50) DEFAULT NULL,
  `MENU_Icono` varchar(30) DEFAULT NULL,
  `MENU_FechaAuditoria` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `nivel` (
  `NIVE_Id` int(11) NOT NULL,
  `NIVE_Numero` varchar(10) NOT NULL,
  `NIVE_Nombre` varchar(50) NOT NULL,
  `NIVE_Descripcion` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `NIVE_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `permiso_rol` (
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
(4, 3, '2017-09-30 00:00:00'),
(5, 1, '2017-08-11 00:00:00'),
(6, 1, '2017-08-11 00:00:00'),
(7, 1, '2017-08-11 00:00:00'),
(8, 1, '2017-08-11 00:00:00'),
(9, 1, '2017-08-11 00:00:00'),
(10, 1, '2017-08-11 00:00:00'),
(10, 2, '2017-09-30 00:00:00'),
(11, 1, '2017-08-11 00:00:00'),
(12, 1, '2017-08-11 00:00:00'),
(13, 1, '2017-09-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resolucion_incidencias`
--

CREATE TABLE `resolucion_incidencias` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resolucion_incidencias`
--

INSERT INTO `resolucion_incidencias` (`REIN_Id`, `INCI_Id`, `REIN_FechaMovimiento`, `REIN_TipoMovimiento`, `REIN_TipoSolucion`, `REIN_Notificado`, `TRIN_Id`, `REIN_Descripcion`, `USUA_IdAprobado`, `USUA_Id`, `REIN_FechaAuditoria`) VALUES
(33, 14, '2017-10-01', 'Registro de incidencia', 'Ninguna', 0, NULL, 'Desde el dia de ayer no tengo internet', NULL, 6, '2017-10-01 12:50:25'),
(34, 14, '2017-10-01', 'Operacion', 'Presencial', 0, 12, 'Voy a ir a revisar el cableado', NULL, 3, '2017-10-01 12:51:44'),
(35, 14, '2017-10-01', 'Respuesta', 'Ninguna', 0, NULL, 'Ya esta todo bien', NULL, 6, '2017-10-01 12:52:20'),
(36, 14, '2017-10-01', 'Operacion', 'Virtual', 1, 12, 'Cliente indica que esta todo bienOperador solicita cierre', NULL, 3, '2017-10-01 12:52:55'),
(37, 14, '2017-10-01', 'Cierre de incidencia', 'Ninguna', 0, 12, 'La incidencia ha sido cerrada', NULL, 1, '2017-10-01 05:53:36'),
(38, 15, '2017-10-01', 'Registro de incidencia', 'Ninguna', 0, NULL, 'No abre mi sistema SIPAN', NULL, 6, '2017-10-01 05:46:42'),
(39, 15, '2017-10-01', 'Operacion', 'Virtual', 0, 13, 'Reinicie el equipo', NULL, 3, '2017-10-01 05:51:24'),
(40, 15, '2017-10-01', 'Respuesta', 'Ninguna', 0, NULL, 'He reiniciado el equipo pero igual no abre mi SIPAN', NULL, 6, '2017-10-01 05:47:28'),
(41, 15, '2017-10-01', 'Operacion', 'Virtual', 0, 13, 'vuelva a crear un acceso directo del sistema \r\nsiga estos pasos:\r\n1\r\n2\r\n3', NULL, 3, '2017-10-01 05:53:46'),
(42, 15, '2017-10-01', 'Operacion', 'Virtual', 1, 13, 'completadoOperador solicita cierre', NULL, 3, '2017-10-01 05:52:15'),
(43, 15, '2017-10-01', 'Cierre de incidencia', 'Ninguna', 0, 13, 'La incidencia ha sido cerrada', NULL, 3, '2017-10-01 11:02:26'),
(44, 16, '2017-10-14', 'Registro de incidencia', 'Ninguna', 0, NULL, 'No imprime la impresora', NULL, 2, '2017-10-14 11:09:30'),
(45, 17, '2017-10-14', 'Registro de incidencia', 'Ninguna', 0, NULL, '', NULL, 2, '2017-10-14 11:16:47'),
(46, 18, '2017-10-14', 'Registro de incidencia', 'Ninguna', 0, NULL, 'No puedo abrir mi sistema contable', NULL, 2, '2017-10-14 11:21:36'),
(47, 19, '2017-10-14', 'Registro de incidencia', 'Ninguna', 0, NULL, 'No hay internet', NULL, 2, '2017-10-14 11:43:58'),
(48, 20, '2017-10-14', 'Registro de incidencia', 'Ninguna', 0, NULL, 'cuando encendí mi computadora  mi teclado no funcionó', NULL, 2, '2017-10-14 01:39:40'),
(49, 19, '2017-10-14', 'Cierre de incidencia', 'Ninguna', 0, 14, 'La incidencia ha sido cerrada', NULL, 2, '2017-10-14 08:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `ROL_Id` int(11) NOT NULL,
  `ROL_Nombre` varchar(50) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `ROL_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`ROL_Id`, `ROL_Nombre`, `USUA_Id`, `ROL_FechaAuditoria`) VALUES
(1, 'Administrador', 1, '2017-08-07 00:00:00'),
(2, 'Tecnico', 1, '2017-09-26 00:00:00'),
(3, 'Cliente', 1, '2017-09-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tratamiento_incidencia`
--

CREATE TABLE `tratamiento_incidencia` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tratamiento_incidencia`
--

INSERT INTO `tratamiento_incidencia` (`TRIN_Id`, `TRIN_FechaRegistro`, `INCI_Id`, `CATE_Id`, `AREA_Id`, `NIVE_Id`, `ESTA_Id`, `PRIO_Id`, `USUA_IdResponsable`, `USUA_Id`, `TRIN_FechaAuditoria`) VALUES
(12, '2017-10-01', 14, 6, 1, 1, 5, 0, 3, 1, '2017-10-01 12:51:19'),
(13, '2017-10-01', 15, 2, 3, 1, 5, 0, 3, 2, '2017-10-01 05:49:44'),
(14, '2017-10-14', 19, 4, 5, 3, 5, 2, 3, 2, '2017-10-14 12:55:56'),
(15, '2017-10-14', 18, 6, 2, 1, 4, 0, 3, 2, '2017-10-14 01:13:57'),
(16, '2017-10-14', 17, 1, 1, 3, 4, 0, 3, 2, '2017-10-14 01:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `USUA_Id` int(11) NOT NULL,
  `USUA_Nombre` varchar(50) NOT NULL,
  `USUA_Nick` varchar(20) NOT NULL,
  `USUA_Password` varchar(50) NOT NULL,
  `ROL_Id` int(11) DEFAULT NULL,
  `USUA_FechaCreacion` date NOT NULL,
  `USUA_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`USUA_Id`, `USUA_Nombre`, `USUA_Nick`, `USUA_Password`, `ROL_Id`, `USUA_FechaCreacion`, `USUA_FechaAuditoria`) VALUES
(1, 'Max', 'mmaxpalli', 'mmaxpalli', 1, '2017-08-07', '2017-08-07 00:00:00'),
(2, 'Jesus', 'jmendoza', 'jmendoza', 1, '2017-08-10', '2017-08-10 00:00:00'),
(3, 'Anibal Sardon', 'asardon', 'asardon', 2, '2017-08-10', '2017-08-10 11:50:32'),
(4, 'Dennis Quispe', 'dquispe', 'dquispe', 2, '2017-08-13', '2017-08-13 09:28:09'),
(5, 'juan perez', 'juancito', '123456', 2, '2017-09-23', '2017-09-23 06:28:59'),
(6, 'Cliente Final', 'Cliente', 'cliente', 3, '2017-09-30', '2017-09-30 00:00:00'),
(7, 'Carlos', 'cprado', 'cprado', 2, '2017-10-14', '2017-10-14 01:28:08'),
(8, 'jesus', 'jesus', 'jesus', 3, '2017-10-14', '2017-10-14 01:31:07'),
(9, '654646', '64546', '123', 1, '2017-10-14', '2017-10-14 02:30:35');

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
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ESTA_Id`),
  ADD KEY `FK_ESTADOS_USUARIOS` (`USUA_Id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `AREA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CATE_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `ESTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `INCI_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `MENU_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `NIVE_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resolucion_incidencias`
--
ALTER TABLE `resolucion_incidencias`
  MODIFY `REIN_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `ROL_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tratamiento_incidencia`
--
ALTER TABLE `tratamiento_incidencia`
  MODIFY `TRIN_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
-- Constraints for table `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `FK_ESTADOS_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
