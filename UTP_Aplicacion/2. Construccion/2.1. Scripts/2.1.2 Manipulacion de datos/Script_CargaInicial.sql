
-- Definicion de constantes
use bd_incidencias;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_incidencias`
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`USUA_Id`, `USUA_Nombre`, `USUA_Nick`, `USUA_Password`, `ROL_Id`, `USUA_FechaCreacion`, `USUA_FechaAuditoria`) VALUES
(1, 'Max', 'mmaxpalli', 'mmaxpalli', null, '2017-08-07', '2017-08-07 00:00:00'),
(2, 'Jesus', 'jmendoza', 'jmendoza', null, '2017-08-10', '2017-08-10 00:00:00'),
(3, 'Cliente', 'Cliente', 'Cliente', null, '2017-08-10', '2017-08-10 11:50:32');

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ROL_Id`, `ROL_Nombre`, `USUA_Id`, `ROL_FechaAuditoria`) VALUES
(1, 'Administrador', 1, '2017-08-07 00:00:00'),
(2, 'Tecnico', 1, '2017-09-26 00:00:00'),
(3, 'Cliente', 1, '2017-09-30 00:00:00');



--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`AREA_Id`, `AREA_Nombre`, `AREA_Descripcion`, `USUA_Id`, `AREA_FechaAuditoria`) VALUES
(1, 'Logisticas', 'Logisticas', 1, '2017-08-22 00:00:00'),
(2, 'Contabilidad', 'Contabilidad', 1, '2017-08-22 00:00:00'),
(3, 'Ventas', 'Ventas', 1, '2017-08-26 00:00:00'),
(4, 'Transportes', 'Transportes', 1, '2017-08-26 00:00:00'),
(5, 'Gerencia', 'Gerencias', 1, '2017-08-27 12:09:36'),
(6, 'Operaciones (OP)', 'Operaciones Arequipa', 2, '2017-10-11 09:04:34');

--
-- Volcado de datos para la tabla `categoria`
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

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`ESTA_Id`, `ESTA_Nombre`, `ESTA_Descripcion`, `USUA_Id`, `ESTA_FechaAuditoria`) VALUES
(1, 'Enviado', 'Enviado', 1, '2017-08-24 00:00:00'),
(2, 'Aceptado', 'Aceptado', 1, '2017-08-24 00:00:00'),
(3, 'Rechazado', 'Rechazado', 1, '2017-08-24 00:00:00'),
(4, 'Procesando', 'Procesando', 1, '2017-08-24 00:00:00'),
(5, 'Cerrado', 'Cerrado', 1, '2017-09-26 00:00:00');

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`MENU_Id`, `MENU_Padre`, `MENU_Nombre`, `MENU_Descripcion`, `MENU_NombreFormulario`, `MENU_Icono`, `MENU_FechaAuditoria`) VALUES
(1, 'Sistema', 'usuarios', 'usuarios', 'segu_usuario', 'fa fa-fw fa-users', '2017-08-08 00:00:00'),
(2, 'Sistema', 'home', 'home', 'home', 'fa fa-fw fa-dashboard', '2017-08-08 00:00:00'),
(4, 'Sistema', 'Registrar incidencia', 'Registrar incidencia', 'incidencia', 'fa fa-fw fa-list', '2017-08-11 00:00:00'),
(5, 'Sistema', 'Clasificar incidencia', 'Clasificar incidencia', 'clasificar', 'fa fa-fw fa-tasks', '2017-08-11 00:00:00'),
(6, 'Sistema', 'Categorias', 'Categorias', 'categoria', 'fa fa-fw fa-filter', '2017-08-11 00:00:00'),
(7, 'Sistema', 'Escalar incidencia', 'Escalar incidencia', 'escalar', 'fa fa-fw fa-level-up', '2017-08-11 00:00:00'),
(8, 'Sistema', 'Prioridad', 'Prioridad', 'priorizar', 'fa fa-fw fa-line-chart', '2017-08-11 00:00:00'),
(9, 'Sistema', 'Areas', 'Areas', 'Areas', 'fa fa-fw fa-sitemap', '2017-08-11 00:00:00'),
(10, 'Sistema', 'Resolucion incidencia', 'Resolucion incidencia', 'resolucion', 'fa fa-fw fa-wrench', '2017-08-11 00:00:00'),
(11, 'Sistema', 'Cierre incidencia', 'Cierre incidencia', 'cierre', 'fa fa-fw fa-ticket', '2017-08-11 00:00:00'),
(12, 'Sistema', 'Reporte incidencias', 'Reporte incidencias', 'incidencia_categoria&a=Crud', 'fa fa-fw fa-calendar-check-o', '2017-08-11 00:00:00'),
(13, 'Sistema', 'Aprobar/Rechazar Incidencia', 'Aprobar/Rechazar Incidencia', 'aprobarrechazar_incidencia', 'fa fa-fw fa-check-square', '2017-09-26 00:00:00');

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`NIVE_Id`, `NIVE_Numero`, `NIVE_Nombre`, `NIVE_Descripcion`, `USUA_Id`, `NIVE_FechaAuditoria`) VALUES
(1, '1', 'Nivel 1 - Soporte tecnico', 'Soporte de nivel 1', 1, '2017-08-26 00:00:00'),
(2, '2', 'Nivel 2 - Administradores', 'Soporte de nivel 2', 1, '2017-08-26 00:00:00'),
(3, '3', 'Nivel 3 - Especialistas desarrolladores', 'Soporte de nive 3', 1, '2017-08-26 00:00:00'),
(4, '4', 'Nivel 4 - Proveedores', 'Nivel 4 - Proveedores', 1, '2017-11-07 00:00:00');

--
-- Volcado de datos para la tabla `permiso_rol`
--

INSERT INTO `permiso_rol` (`MENU_Id`, `ROL_Id`, `PERO_FechaAuditoria`) VALUES
(1, 1, '2017-11-08 00:00:00'),
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



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
