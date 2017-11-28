
-- Declaracion de Constantes
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_incidencias`
--
CREATE DATABASE IF NOT EXISTS `bd_incidencias` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_incidencias`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `AREA_Id` int(11) NOT NULL,
  `AREA_Nombre` varchar(30) NOT NULL,
  `AREA_Descripcion` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `AREA_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CATE_Id` int(11) NOT NULL,
  `CATE_Descripcion` varchar(50) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `CATE_FechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `ESTA_Id` int(11) NOT NULL,
  `ESTA_Nombre` varchar(20) NOT NULL,
  `ESTA_Descripcion` varchar(100) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `ESTA_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `INCI_Id` int(11) NOT NULL,
  `INCI_Titulo` varchar(50) NOT NULL,
  `INCI_Descripcion` varchar(200) NOT NULL,
  `INCI_FechaRegistro` date NOT NULL,
  `CATE_Id` int(11) NOT NULL,
  `AREA_Id` int(11) DEFAULT NULL,
  `ESTA_Id` int(11) NOT NULL,
  `INCI_Captura` varchar(200) DEFAULT NULL,
  `USUA_Id` int(11) NOT NULL,
  `USUA_IdAuditoria` int(11) NOT NULL,
  `INCI_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `NIVE_Id` int(11) NOT NULL,
  `NIVE_Numero` varchar(10) NOT NULL,
  `NIVE_Nombre` varchar(50) NOT NULL,
  `NIVE_Descripcion` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `NIVE_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

CREATE TABLE `permiso_rol` (
  `MENU_Id` int(11) NOT NULL,
  `ROL_Id` int(11) NOT NULL,
  `PERO_FechaAuditoria` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resolucion_incidencias`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ROL_Id` int(11) NOT NULL,
  `ROL_Nombre` varchar(50) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `ROL_FechaAuditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento_incidencia`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`AREA_Id`),
  ADD KEY `FK_AREAS_USUARIOS` (`USUA_Id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CATE_Id`),
  ADD KEY `FK_CATEGORIA_USUARIOS` (`USUA_Id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ESTA_Id`),
  ADD KEY `FK_ESTADOS_USUARIOS` (`USUA_Id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`INCI_Id`),
  ADD KEY `FK_INCIDENCIAS_CATEGORIA` (`CATE_Id`),
  ADD KEY `FK_INCIDENCIAS_ESTADOS` (`ESTA_Id`),
  ADD KEY `FK_INCIDENCIAS_USUARIOS` (`USUA_Id`),
  ADD KEY `FK_INCIDENCIAS_USUARIOS_2` (`USUA_IdAuditoria`),
  ADD KEY `AREA_Id` (`AREA_Id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`MENU_Id`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`NIVE_Id`),
  ADD KEY `FK_NIVEL_USUARIOS` (`USUA_Id`);

--
-- Indices de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`MENU_Id`,`ROL_Id`),
  ADD KEY `FK_PERMISOROL_ROL` (`ROL_Id`);

--
-- Indices de la tabla `resolucion_incidencias`
--
ALTER TABLE `resolucion_incidencias`
  ADD PRIMARY KEY (`REIN_Id`,`INCI_Id`),
  ADD KEY `INCI_Id` (`INCI_Id`),
  ADD KEY `TRIN_Id` (`TRIN_Id`),
  ADD KEY `USUA_Id` (`USUA_Id`),
  ADD KEY `USUA_IdAprobado` (`USUA_IdAprobado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ROL_Id`),
  ADD KEY `FK_ROL_USUARIOS` (`USUA_Id`);

--
-- Indices de la tabla `tratamiento_incidencia`
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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USUA_Id`),
  ADD KEY `FK_USUARIOS_ROL` (`ROL_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `AREA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CATE_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `ESTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `INCI_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `MENU_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `NIVE_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `resolucion_incidencias`
--
ALTER TABLE `resolucion_incidencias`
  MODIFY `REIN_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ROL_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tratamiento_incidencia`
--
ALTER TABLE `tratamiento_incidencia`
  MODIFY `TRIN_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Constraint para la tabla `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `FK_AREAS_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraint para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `FK_CATEGORIA_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraint para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `FK_ESTADOS_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraint para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `FK_INCIDENCIAS_CATEGORIA` FOREIGN KEY (`CATE_Id`) REFERENCES `categoria` (`CATE_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INCIDENCIAS_ESTADOS` FOREIGN KEY (`ESTA_Id`) REFERENCES `estados` (`ESTA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INCIDENCIAS_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INCIDENCIAS_USUARIOS_2` FOREIGN KEY (`USUA_IdAuditoria`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`AREA_Id`) REFERENCES `areas` (`AREA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraint para la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD CONSTRAINT `FK_NIVEL_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraint para la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `FK_PERMISOROL_MENU` FOREIGN KEY (`MENU_Id`) REFERENCES `menus` (`MENU_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PERMISOROL_ROL` FOREIGN KEY (`ROL_Id`) REFERENCES `rol` (`ROL_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraint para la tabla `resolucion_incidencias`
--
ALTER TABLE `resolucion_incidencias`
  ADD CONSTRAINT `resolucion_incidencias_ibfk_1` FOREIGN KEY (`INCI_Id`) REFERENCES `incidencias` (`INCI_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resolucion_incidencias_ibfk_2` FOREIGN KEY (`TRIN_Id`) REFERENCES `tratamiento_incidencia` (`TRIN_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resolucion_incidencias_ibfk_3` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resolucion_incidencias_ibfk_4` FOREIGN KEY (`USUA_IdAprobado`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraint para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `FK_ROL_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraint para la tabla `tratamiento_incidencia`
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
-- Constraint para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_USUARIOSROL_ROL` FOREIGN KEY (`ROL_Id`) REFERENCES `rol` (`ROL_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USUARIOSROL_USUARIOS` FOREIGN KEY (`ROL_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USUARIOS_ROL` FOREIGN KEY (`ROL_Id`) REFERENCES `rol` (`ROL_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
