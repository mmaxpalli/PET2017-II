-- ----------------------------------------------------------
-- Descripcion: Script para la creacion de la BD y estructura de las tablas
-- Autor: Max Palli
-- Fecha Creacion: 29/07/2017
-- Autor Mod: Jesus Mendoza
-- Fecha Mod: 03/08/2017
-- Cambio Importante: Creacion de campos FK y Constraint
-- -------------------------------------- ---------------------

-- ----------------------------------------------------------
-- Control de AUTOINCREMET y ZONA HORARIA POR DEFECTO
-- -------------------------------------- ---------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- ----------------------------------------------------------
-- En caso se desee ejecutar en versiones antiguas de MYSQL
-- -------------------------------------- ---------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

---------------------------------------------
-- Creacion de base de datos bd_incidencias
---------------------------------------------
CREATE DATABASE IF NOT EXISTS `bd_incidencias` 
DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_incidencias`;

-- --------------------------------------------------------
-- Creacion tabla areas
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `areas` (
  `AREA_Id` int(11) NOT NULL AUTO_INCREMENT,
  `AREA_Nombre` varchar(30) NOT NULL,
  `AREA_Descripcion` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `AREA_FechaAuditoria` datetime NOT NULL,
   PRIMARY KEY (`AREA_Id`)
) ;

-- --------------------------------------------------------
-- Creacion tabla categoria
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `categoria` (
  `CATE_Id` int(11) NOT NULL AUTO_INCREMENT,
  `CATE_Descripcion` varchar(50) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `CATE_FechaRegistro` datetime NOT NULL,
   PRIMARY KEY (`CATE_Id`)
) ;

-- --------------------------------------------------------
-- Creacion tabla conocimiento
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `conocimiento` (
  `CONO_Id` int(11) NOT NULL AUTO_INCREMENT,
  `CATE_Id` int(11) NOT NULL,
  `CONO_Nombre` varchar(20) NOT NULL,
  `CONO_Descripcion` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `CONO_FechaAuditoria` datetime NOT NULL,
   PRIMARY KEY (`CONO_Id`)
) ;

-- --------------------------------------------------------
-- Creacion tabla conocimiento_detalle
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `conocimiento_detalle` (
  `CONO_Id` int(11) NOT NULL,
  `CODE_Id` int(11) NOT NULL,
  `CODE_Nombre` varchar(20) NOT NULL,
  `CODE_Orden` varchar(20) NOT NULL,
  `CODE_Descripcion` varchar(200) NOT NULL,
  `CODE_Imagen` varchar(100) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `CODE_FechaAuditoria` datetime NOT NULL,
   PRIMARY KEY (`CONO_Id`,`CODE_Id`)
);

-- --------------------------------------------------------
-- Creacion tabla estados
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `estados` (
  `ESTA_Id` int(11) NOT NULL AUTO_INCREMENT,
  `ESTA_Nombre` varchar(20) NOT NULL,
  `ESTA_Descripcion` varchar(100) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `ESTA_FechaAuditoria` datetime NOT NULL,
   PRIMARY KEY (`ESTA_Id`)
) ;

-- --------------------------------------------------------
-- Creacion tabla historial_incidencia
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `historial_incidencia` (
  `HIIN_Id` int(11) NOT NULL AUTO_INCREMENT,
  `HIIN_Movimiento` varchar(20) NOT NULL,
  `HIIN_ValorOriginal` varchar(50) NOT NULL,
  `HIIN_ValorNuevo` varchar(50) NOT NULL,
  `HIIN_FechaCambio` datetime NOT NULL,
  `HIIN_Comentario` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `HIIN_FechaAuditoria` datetime NOT NULL,
   PRIMARY KEY (`HIIN_Id`)
) ;
-- --------------------------------------------------------
-- Creacion tabla incidencias
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `incidencias` (
  `INCI_Id` int(11) NOT NULL AUTO_INCREMENT,
  `INCI_Titulo` varchar(50) NOT NULL,
  `INCI_Descripcion` varchar(200) NOT NULL,
  `INCI_FechaRegistro` date NOT NULL,
  `CATE_Id` int(11) NOT NULL,
  `ESTA_Id` int(11) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `USUA_IdAuditoria` int(11) NOT NULL,
  `INCI_FechaAuditoria` datetime NOT NULL,
   PRIMARY KEY (`INCI_Id`)
);

-- --------------------------------------------------------
-- Creacion tabla nivel
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `nivel` (
  `NIVE_Id` int(11) NOT NULL AUTO_INCREMENT,
  `NIVE_Numero` varchar(10) NOT NULL,
  `NIVE_Nombre` varchar(50) NOT NULL,
  `NIVE_Descripcion` varchar(200) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `NIVE_FechaAuditoria` datetime NOT NULL,
   PRIMARY KEY (`NIVE_Id`)
);

-- --------------------------------------------------------
-- Creacion tabla prioridad
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `prioridad` (
  `PRIO_Id` int(11) NOT NULL AUTO_INCREMENT,
  `PRIO_Nombre` varchar(20) NOT NULL,
  `PRIO_Urgencia` int(11) NOT NULL,
  `PRIO_Impacto` varchar(50) NOT NULL,
  `PRIO_Fecha` date NOT NULL,
  `INCI_Id` int(11) NOT NULL,
  `PRIO_Orden` int(11) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `PRIO_FechaAuditoria` datetime NOT NULL,
   PRIMARY KEY (`PRIO_Id`)
) ;

-- --------------------------------------------------------
-- Creacion tabla rol
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `rol` (
  `ROL_Id` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_Nombre` varchar(50) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `ROL_FechaAuditoria` datetime NOT NULL,
   PRIMARY KEY (`ROL_Id`)
) ;

-- --------------------------------------------------------
-- Creacion tabla tratamiento_incidencia
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `tratamiento_incidencia` (
  `TRIN_Id` int(11) NOT NULL AUTO_INCREMENT,
  `TRIN_FechaRegistro` date NOT NULL,
  `INCI_Id` int(11) NOT NULL,
  `CATE_Id` int(11) NOT NULL,
  `AREA_Id` int(11) NOT NULL,
  `NIVE_Id` int(11) NOT NULL,
  `ESTA_Id` int(11) NOT NULL,
  `PRIO_Id` int(11) NOT NULL,
  `USUA_Id` int(11) NOT NULL,
  `TRIN_FechaAuditoria` datetime NOT NULL,
   PRIMARY KEY (`TRIN_Id`)
) ;

-- --------------------------------------------------------
-- Creacion tabla usuarios
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios` (
  `USUA_Id` int(11) NOT NULL AUTO_INCREMENT,
  `USUA_Nombre` varchar(50) NOT NULL,
  `USUA_Nick` varchar(20) NOT NULL,
  `USUA_Password` int(20) NOT NULL,
  `ROL_Id` int(11) NOT NULL,
  `USUA_FechaCreacion` date NOT NULL,
  `USUA_FechaAuditoria` datetime NOT NULL,
  PRIMARY KEY (`USUA_Id`)
);

-- ---------------------------
-- Creacion de Foregin Key 
-- ---------------------------

-- --------------------------
-- FK para la tabla `areas`
-- --------------------------
ALTER TABLE `areas` 
  ADD KEY `FK_AREAS_USUARIOS` (`USUA_Id`);

-- ------------------------------
-- FK para la tabla`categoria`
-- -------------------------------
ALTER TABLE `categoria`
  ADD KEY `FK_CATEGORIA_USUARIOS` (`USUA_Id`);

-- ---------------------------------------
-- FK para la tabla `conocimiento`
-- ---------------------------------------
ALTER TABLE `conocimiento`
  ADD KEY `FK_CONOCIMIENTO_CATEGORIA` (`CATE_Id`),
  ADD KEY `FK_CONOCIMIENTO_USUARIOS` (`USUA_Id`);

-- --------------------------------------
-- FK para la tabla`conocimiento_detalle`
-- --------------------------------------
ALTER TABLE `conocimiento_detalle`  
  ADD KEY `FK_CONOCIMIENTODETALLE_USUARIOS` (`USUA_Id`);

-- --------------------------------
-- FK para la tabla `estados`
-- --------------------------------
ALTER TABLE `estados`
  ADD KEY `FK_ESTADOS_USUARIOS` (`USUA_Id`);

-- ---------------------------------------
-- FK para la tabla `historial_incidencia`
-- ---------------------------------------
ALTER TABLE `historial_incidencia`  
  ADD KEY `FK_HISTORIALINCIDENCIA_USUARIOS` (`USUA_Id`);

-- -------------------------------
-- FK para la tabla `incidencias`
-- -------------------------------
ALTER TABLE `incidencias`  
  ADD KEY `FK_INCIDENCIAS_CATEGORIA` (`CATE_Id`),
  ADD KEY `FK_INCIDENCIAS_ESTADOS` (`ESTA_Id`),
  ADD KEY `FK_INCIDENCIAS_USUARIOS` (`USUA_Id`),
  ADD KEY `FK_INCIDENCIAS_USUARIOS_2` (`USUA_IdAuditoria`);

-- ----------------------------
-- FK para la tabla `nivel`
-- -----------------------------
ALTER TABLE `nivel`
  ADD KEY `FK_NIVEL_USUARIOS` (`USUA_Id`);

-- ------------------------------
-- FK para la tabla `prioridad`
-- ------------------------------
ALTER TABLE `prioridad`  
  ADD KEY `FK_PRIORIDAD_INCIDENCIAS` (`INCI_Id`),
  ADD KEY `FK_PRIORIDAD_USUARIOS` (`USUA_Id`);

-- --------------------------
-- FK para la tabla `rol`
-- -------------------------
ALTER TABLE `rol`
  ADD KEY `FK_ROL_USUARIOS` (`USUA_Id`);

-- -----------------------------------------
-- FK para la tabla `tratamiento_incidencia`
-- -----------------------------------------
ALTER TABLE `tratamiento_incidencia`
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_INCIDENCIAS` (`INCI_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_CATEGORIA` (`CATE_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_AREAS` (`AREA_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_ESTADOS` (`ESTA_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_PRIORIDAD` (`PRIO_Id`),
  ADD KEY `FK_TRATAMIENTOINCIDENCIA_USUARIOS` (`USUA_Id`);

-- ---------------------------
-- FK para la tabla `usuarios`
-- ----------------------------
ALTER TABLE `usuarios`
  ADD KEY `FK_USUARIOS_ROL` (`ROL_Id`);

-- -----------------------------
-- CONSTRAINTS PARA LAS TABLAS
-- -----------------------------

-- ---------------------------------
-- Constraints para la tabla `areas`
-- --------------------------------
ALTER TABLE `areas`
  ADD CONSTRAINT `FK_AREAS_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- -------------------------------------
-- Constraints para la tabla `categoria`
-- -------------------------------------
ALTER TABLE `categoria`
  ADD CONSTRAINT `FK_CATEGORIA_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- -----------------------------------------
-- Constraints para la tabla `conocimiento`
-- ----------------------------------------
ALTER TABLE `conocimiento`
  ADD CONSTRAINT `FK_CONOCIMIENTO_CATEGORIA` FOREIGN KEY (`CATE_Id`) REFERENCES `categoria` (`CATE_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CONOCIMIENTO_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
 
-- ------------------------------------------------
-- Constraints para la tabla `conocimiento_detalle`
-- ------------------------------------------------
ALTER TABLE `conocimiento_detalle`
  ADD CONSTRAINT `FK_CONOCIMIENTODETALLE_CONOCIMIENTO` FOREIGN KEY (`CONO_Id`) REFERENCES `conocimiento` (`CONO_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CONOCIMIENTODETALLE_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- ------------------------------------------
-- Constraints para la tabla `estados`
-- -----------------------------------------
ALTER TABLE `estados`
  ADD CONSTRAINT `FK_ESTADOS_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- ------------------------------------------------------
-- Constraints para la tabla `historial_incidencia`
-- -----------------------------------------------------
ALTER TABLE `historial_incidencia`
  ADD CONSTRAINT `FK_HISTORIALINCIDENCIA_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------------------
-- Constraints para la tabla `incidencias`
-- ------------------------------------------
ALTER TABLE `incidencias`
  ADD CONSTRAINT `FK_INCIDENCIAS_CATEGORIA` FOREIGN KEY (`CATE_Id`) REFERENCES `categoria` (`CATE_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INCIDENCIAS_ESTADOS` FOREIGN KEY (`ESTA_Id`) REFERENCES `estados` (`ESTA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INCIDENCIAS_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INCIDENCIAS_USUARIOS_2` FOREIGN KEY (`USUA_IdAuditoria`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- ------------------------------------
-- Constraints para la tabla `nivel`
-- -----------------------------------
ALTER TABLE `nivel`
  ADD CONSTRAINT `FK_NIVEL_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- --------------------------------------
-- Constraints para la tabla `prioridad`
-- --------------------------------------
ALTER TABLE `prioridad`
  ADD CONSTRAINT `FK_PRIORIDAD_INCIDENCIAS` FOREIGN KEY (`INCI_Id`) REFERENCES `incidencias` (`INCI_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PRIORIDAD_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------------
-- Constraints para la tabla `rol`
-- -----------------------------------
ALTER TABLE `rol`
  ADD CONSTRAINT `FK_ROL_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- ---------------------------------------------------
-- Constraints para la tabla `tratamiento_incidencia`
-- ---------------------------------------------------
ALTER TABLE `tratamiento_incidencia`
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_AREAS` FOREIGN KEY (`AREA_Id`) REFERENCES `areas` (`AREA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_CATEGORIA` FOREIGN KEY (`CATE_Id`) REFERENCES `categoria` (`CATE_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_ESTADOS` FOREIGN KEY (`ESTA_Id`) REFERENCES `estados` (`ESTA_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_INCIDENCIAS` FOREIGN KEY (`INCI_Id`) REFERENCES `incidencias` (`INCI_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_PRIORIDAD` FOREIGN KEY (`PRIO_Id`) REFERENCES `prioridad` (`PRIO_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TRATAMIENTOINCIDENCIA_USUARIOS` FOREIGN KEY (`USUA_Id`) REFERENCES `usuarios` (`USUA_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- ---------------------------------------
-- Constraints para la tabla `usuarios`
-- --------------------------------------
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_USUARIOS_ROL` FOREIGN KEY (`ROL_Id`) REFERENCES `rol` (`ROL_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
  
-- --------------------------------------------------------
-- En caso se desee ejecutar en versiones antiguas de MYSQL
-- -------------------------------------- ---------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;