
-- Definicion de constantes
use bd_incidencias;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `ABC`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ABC` ()  BEGIN
      DECLARE a INT Default 1 ;
      simple_loop: LOOP         
         UPDATE docente set DNI = a WHERE `IDDOCENTE` = a;
         SET a=a+1;
         IF a=5 THEN
            LEAVE simple_loop;
         END IF;
   END LOOP simple_loop;
END$$

DROP PROCEDURE IF EXISTS `spInsertarArea`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarArea` (IN `_AREA_Nombre` VARCHAR(30), `_AREA_Descripcion` VARCHAR(200), `_USUA_Id` INT(11), `_AREA_FechaAuditoria` DATETIME)  BEGIN
		INSERT INTO areas(
		AREA_Nombre, 
		AREA_Descripcion, 
		USUA_Id,
		AREA_FechaAuditoria)
		VALUES (
		_AREA_Nombre,
		_AREA_Descripcion,
		_USUA_Id,
		_AREA_FechaAuditoria);
	END$$

DROP PROCEDURE IF EXISTS `spInsertarCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarCategoria` (IN `_CATE_Descripcion` VARCHAR(50), `_USUA_Id` INT(11), `_CATE_FechaRegistro` DATETIME)  BEGIN
		INSERT INTO categoria(
						CATE_Descripcion, 
						USUA_Id, 
						CATE_FechaRegistro)
						VALUES (
						_CATE_Descripcion,
						_USUA_Id,
						_CATE_FechaRegistro);
	END$$

DROP PROCEDURE IF EXISTS `spInsertarIncidencia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarIncidencia` (IN `_INCI_Titulo` VARCHAR(50), `_INCI_Descripcion` VARCHAR(200), `_INCI_FechaRegistro` DATETIME, `_CATE_Id` INT, `_ESTA_Id` INT, `_INCI_Captura` VARCHAR(200), `_USUA_Id` INT, `_USUA_IdAuditoria` INT, `_INCI_FechaAuditoria` DATETIME)  BEGIN
		INSERT INTO incidencias(
						INCI_Titulo, 
						INCI_Descripcion, 
						INCI_FechaRegistro,
						CATE_Id,
						ESTA_Id,
                        INCI_Captura,
						USUA_Id,
						USUA_IdAuditoria,
						INCI_FechaAuditoria)
						VALUES (
						_INCI_Titulo, 
						_INCI_Descripcion, 
						_INCI_FechaRegistro,
						_CATE_Id,
						_ESTA_Id,
                        _INCI_Captura,
						_USUA_Id,
						_USUA_IdAuditoria,
						_INCI_FechaAuditoria);	
                        
	END$$

DROP PROCEDURE IF EXISTS `spInsertResolucionIncidencia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertResolucionIncidencia` (IN `_INCI_Id` INT(11), `_REIN_FechaMovimiento` DATETIME, `_REIN_TipoMovimiento` VARCHAR(50), `_REIN_TipoSolucion` VARCHAR(50), `_REIN_Notificado` INT(11), `_TRIN_Id` INT(11), `_REIN_Descripcion` VARCHAR(300), `_USUA_Id` INT(11), `_REIN_FechaAuditoria` DATETIME)  BEGIN
		INSERT INTO resolucion_incidencias(
		INCI_Id,
		REIN_FechaMovimiento,
		REIN_TipoMovimiento ,
		REIN_TipoSolucion ,
		REIN_Notificado ,
		TRIN_Id,
		REIN_Descripcion,
		USUA_Id,
		REIN_FechaAuditoria)
 
		VALUES (
		_INCI_Id,
		_REIN_FechaMovimiento,
		_REIN_TipoMovimiento ,
		_REIN_TipoSolucion ,
		_REIN_Notificado ,
		_TRIN_Id,
		_REIN_Descripcion,
		_USUA_Id,
		_REIN_FechaAuditoria);			
	END$$

DROP PROCEDURE IF EXISTS `spInsertTratamientoIncidencia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertTratamientoIncidencia` (`_TRIN_FechaRegistro` DATETIME, `_INCI_Id` INT(11), `_CATE_Id` INT(11), `_AREA_Id` INT(11), `_NIVE_Id` INT(11), `_ESTA_Id` INT(11), `_PRIO_Id` INT(11), `_USUA_IdResponsable` INT(11), `_USUA_Id` INT(11), `_TRIN_FechaAuditoria` DATETIME)  BEGIN
		INSERT INTO tratamiento_incidencia(
						TRIN_FechaRegistro, 
						INCI_Id, 
						CATE_Id, 
						AREA_Id, 
						NIVE_Id, 
						ESTA_Id, 
						PRIO_Id, 
						USUA_IdResponsable, 
						USUA_Id, 
						TRIN_FechaAuditoria )
						VALUES (
						_TRIN_FechaRegistro, 
						_INCI_Id, 
						_CATE_Id, 
						_AREA_Id, 
						_NIVE_Id, 
						_ESTA_Id, 
						_PRIO_Id, 
						_USUA_IdResponsable, 
						_USUA_Id, 
						_TRIN_FechaAuditoria);
	END$$

DROP PROCEDURE IF EXISTS `spInsertUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertUsuario` (IN `_USUA_Nombre` VARCHAR(50), `_USUA_Nick` VARCHAR(20), `_USUA_Password` VARCHAR(50), `_ROL_Id` INT(11), `_USUA_FechaCreacion` DATETIME, `_USUA_FechaAuditoria` DATETIME)  BEGIN
		INSERT INTO usuarios(
		USUA_Nombre, 
		USUA_Nick, 
		USUA_Password,
		ROL_Id,
		USUA_FechaCreacion,
		USUA_FechaAuditoria)
		VALUES (
		_USUA_Nombre,
		_USUA_Nick,
		_USUA_Password,
		_ROL_Id,
		_USUA_FechaCreacion,
		_USUA_FechaAuditoria);
	END$$

DROP PROCEDURE IF EXISTS `spSelectAllIdTratamientoIncidenciaId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectAllIdTratamientoIncidenciaId` (IN `_TRIN_Id` INT(11))  BEGIN
		SELECT 
		TI.TRIN_Id,
		I.INCI_Id,
		I.INCI_Titulo,
		C.CATE_Descripcion,
		A.AREA_Nombre,
		TI.NIVE_Id,
		N.NIVE_Nombre,
		TI.USUA_Id,
		U.USUA_Nombre
		FROM tratamiento_incidencia TI
		INNER JOIN incidencias I ON TI.INCI_Id = I.INCI_Id
		INNER JOIN categoria C ON TI.CATE_Id = C.CATE_Id
		INNER JOIN areas A ON TI.AREA_Id = A.AREA_Id
		INNER JOIN nivel N ON TI.NIVE_Id = N.NIVE_Id
		INNER JOIN usuarios U ON TI.USUA_Id = U.USUA_Id
		WHERE
		TRIN_Id = _TRIN_Id;
	END$$

DROP PROCEDURE IF EXISTS `spSelectAllIncidenciasEstadoProcesando`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectAllIncidenciasEstadoProcesando` ()  BEGIN
		
SELECT 
		I.INCI_Id, 
		I.INCI_Titulo, 
		I.INCI_FechaRegistro, 
		C.CATE_Descripcion ,
        A.AREA_Nombre,
		E.ESTA_Nombre
		FROM 
		incidencias I 
		INNER JOIN 
		categoria C on I.CATE_Id = C.CATE_Id
        INNER JOIN areas A on I.AREA_Id = A.AREA_Id
		INNER JOIN estados E ON I.ESTA_Id = E.ESTA_Id 
		 WHERE
         I.ESTA_Id = 4;
                        
	
END$$

DROP PROCEDURE IF EXISTS `spSelectAllTratamientoIncidenciaId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectAllTratamientoIncidenciaId` (IN `_TRIN_Id` INT(11))  BEGIN
		SELECT
        TI.TRIN_Id,
		I.INCI_Id,
		I.INCI_Titulo,
        I.INCI_Captura,
		C.CATE_Id,
		C.CATE_Descripcion,
		A.AREA_Id,
		A.AREA_Nombre,
		TI.NIVE_Id,
		N.NIVE_Nombre,
		I.INCI_Descripcion,
		TI.USUA_Id,
		U.USUA_Nombre
		FROM tratamiento_incidencia TI
		INNER JOIN incidencias I ON TI.INCI_Id = I.INCI_Id
		INNER JOIN categoria C ON TI.CATE_Id = C.CATE_Id
		INNER JOIN areas A ON TI.AREA_Id = A.AREA_Id
		INNER JOIN nivel N ON TI.NIVE_Id = N.NIVE_Id
		INNER JOIN usuarios U ON TI.USUA_Id = U.USUA_Id
		WHERE
		TRIN_Id = _TRIN_Id;
				   			
	END$$

DROP PROCEDURE IF EXISTS `spSelectArea`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectArea` ()  BEGIN
		SELECT 
		AREA_Id,
		AREA_Nombre,
		AREA_Descripcion
		FROM areas;
	END$$

DROP PROCEDURE IF EXISTS `spSelectAreaId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectAreaId` (IN `_AREA_Id` INT(11))  BEGIN
		SELECT 
		AREA_Id,
		AREA_Nombre,
		AREA_Descripcion
		FROM areas
        WHERE AREA_Id=_AREA_Id;
	END$$

DROP PROCEDURE IF EXISTS `spSelectCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectCategoria` ()  BEGIN
		SELECT 
		CATE_Id,
		CATE_Descripcion 
		FROM 
		categoria;
	END$$

DROP PROCEDURE IF EXISTS `spSelectCategoriaId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectCategoriaId` (IN `_CATE_Id` INT(11))  BEGIN
		SELECT 
		CATE_Id,
		CATE_Descripcion 
		FROM 
		categoria
		WHERE
		CATE_Id= _CATE_Id;
	END$$

DROP PROCEDURE IF EXISTS `spSelectIncidencia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectIncidencia` ()  BEGIN
		SELECT 
		INCI_Id,
		INCI_Titulo,
		INCI_Descripcion,
		INCI_FechaRegistro,
		CATE_Id,
		ESTA_Id,
		USUA_Id,
		USUA_IdAuditoria,
		INCI_FechaAuditoria
		FROM incidencias;						   			
	END$$

DROP PROCEDURE IF EXISTS `spSelectIncidenciaEstadoEnviado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectIncidenciaEstadoEnviado` ()  BEGIN
		SELECT 
			INCI_Id, 
			INCI_Titulo, 
			INCI_FechaRegistro, 
			C.CATE_Descripcion,
            A.AREA_Nombre,
			E.ESTA_Nombre
			from 
			incidencias I
			INNER JOIN categoria C on I.CATE_Id = C.CATE_Id
			INNER JOIN estados E on I.ESTA_Id = E.ESTA_Id
            INNER JOIN areas A ON I.AREA_Id = A.AREA_Id
			WHERE E.ESTA_Id = 1;
	END$$

DROP PROCEDURE IF EXISTS `spSelectIncidenciaId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectIncidenciaId` (IN `_INCI_Id` INT(11))  BEGIN
		SELECT 
		INCI_Id,
		INCI_Titulo,
		INCI_Descripcion,
		INCI_FechaRegistro,
		CATE_Id,
        AREA_Id,
		ESTA_Id,
        INCI_Captura,
		USUA_Id,
		USUA_IdAuditoria,
		INCI_FechaAuditoria
		FROM incidencias
		WHERE
		INCI_Id = _INCI_Id;							   			
	END$$

DROP PROCEDURE IF EXISTS `spSelectIncidenciaIdUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectIncidenciaIdUsuario` (IN `_USUA_Id` INT(11))  BEGIN
		SELECT 
		INCI_Id, 
		INCI_Titulo, 
		INCI_FechaRegistro, 
		C.CATE_Descripcion , 
        A.AREA_Nombre,
		E.ESTA_Nombre 
		FROM 
		incidencias I 
		INNER JOIN 
		categoria C on I.CATE_Id = C.CATE_Id 
		INNER JOIN estados E ON I.ESTA_Id = E.ESTA_Id
        INNER JOIN areas A ON I.AREA_Id = A.AREA_Id 
		 WHERE I.USUA_Id = _USUA_Id;					   			
	END$$

DROP PROCEDURE IF EXISTS `spSelectNivel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectNivel` ()  BEGIN
		SELECT 
			NIVE_Id,
			NIVE_Nombre 
			FROM 
			nivel;
	END$$

DROP PROCEDURE IF EXISTS `spSelectResolucionIncidenciaHistorial`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectResolucionIncidenciaHistorial` (IN `_INCI_Id` INT(11))  BEGIN
		SELECT 
		REIN_Id,
		INCI_Id,
		REIN_FechaMovimiento,
		REIN_TipoMovimiento,
        REIN_TipoSolucion,
		CASE REIN_Notificado
        WHEN 0 THEN '-'
        WHEN 1 THEN 'SI'
        END AS REIN_Notificado,
		REIN_Descripcion,
		U.USUA_Nombre
		FROM resolucion_incidencias  RI
		INNER JOIN usuarios U ON  RI.USUA_Id = U.USUA_Id
		WHERE INCI_Id = _INCI_Id;
	END$$

DROP PROCEDURE IF EXISTS `spSelectRol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectRol` ()  BEGIN
		SELECT 
			ROL_Id,
			ROL_Nombre
			FROM rol;
	END$$

DROP PROCEDURE IF EXISTS `spSelectTratamientoIncidenciaEscalado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectTratamientoIncidenciaEscalado` ()  BEGIN
		SELECT 
		TRIN_Id,
		I.INCI_Titulo,
		C.CATE_Descripcion,
		A.AREA_Nombre,
		N.NIVE_Nombre,
		U.USUA_Nombre
		FROM tratamiento_incidencia TI
		INNER JOIN incidencias I ON TI.INCI_Id = I.INCI_Id
		INNER JOIN categoria C ON TI.CATE_Id = C.CATE_Id
		INNER JOIN areas A ON TI.AREA_Id = A.AREA_Id
		INNER JOIN nivel N ON TI.NIVE_Id = N.NIVE_Id
		INNER JOIN usuarios U ON TI.USUA_Id = U.USUA_Id ;  			
	END$$

DROP PROCEDURE IF EXISTS `spSelectTratamientoIncidenciaEstadoCierre`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectTratamientoIncidenciaEstadoCierre` ()  BEGIN
		SELECT 
		TR.TRIN_Id,
		I.INCI_Id,
		I.INCI_Titulo,
		C.CATE_Descripcion,
		CASE TR.PRIO_Id
		WHEN 0 THEN 'Sencillo'
		WHEN 1 THEN 'Bajo'
		WHEN 2 THEN 'Medio'
		WHEN 3 THEN 'Alto'
		END AS 'Prioridad',
		E.ESTA_Nombre,
		U.USUA_Nombre
		FROM 
		tratamiento_incidencia TR
		INNER JOIN incidencias I ON TR.INCI_Id = I.INCI_Id
		INNER JOIN categoria C ON TR.CATE_Id = C.CATE_Id
		INNER JOIN usuarios U ON TR.USUA_IdResponsable = U.USUA_Id
		INNER JOIN estados E ON TR.ESTA_Id = E.ESTA_Id	
		WHERE 
		TR.ESTA_Id <> 5;
	END$$

DROP PROCEDURE IF EXISTS `spSelectTratamientoIncidenciaId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectTratamientoIncidenciaId` (IN `_INCI_Id` INT(11))  BEGIN
		SELECT 
		TRIN_Id,
        I.INCI_Id,
		I.INCI_Titulo,
		C.CATE_Descripcion,
		A.AREA_Nombre,
		TI.NIVE_Id,
		N.NIVE_Nombre,
		TI.USUA_Id,
		U.USUA_Nombre
		FROM tratamiento_incidencia TI
		INNER JOIN incidencias I ON TI.INCI_Id = I.INCI_Id
		INNER JOIN categoria C ON TI.CATE_Id = C.CATE_Id
		INNER JOIN areas A ON TI.AREA_Id = A.AREA_Id
		INNER JOIN nivel N ON TI.NIVE_Id = N.NIVE_Id
		INNER JOIN usuarios U ON TI.USUA_Id = U.USUA_Id
		WHERE
		I.INCI_Id = _INCI_Id;				   			
	END$$

DROP PROCEDURE IF EXISTS `spSelectTratamientoIncidenciaIdResponsable`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectTratamientoIncidenciaIdResponsable` (IN `_USUA_Id` INT(11))  BEGIN
		SELECT 
			TR.TRIN_Id,
            I.INCI_Id,
			I.INCI_Titulo,
            I.INCI_Captura,
			C.CATE_Descripcion,
			CASE TR.PRIO_Id
			WHEN 0 THEN 'Sencillo'
			WHEN 1 THEN 'Bajo'
			WHEN 2 THEN 'Medio'
			WHEN 3 THEN 'Alto'
			END AS 'Prioridad',
            E.ESTA_Nombre,
			U.USUA_Nombre
			FROM 
			tratamiento_incidencia TR
			INNER JOIN incidencias I ON TR.INCI_Id = I.INCI_Id
			INNER JOIN categoria C ON TR.CATE_Id = C.CATE_Id
			INNER JOIN usuarios U ON TR.USUA_IdResponsable = U.USUA_Id
            INNER JOIN estados E ON TR.ESTA_Id = E.ESTA_Id
			WHERE 
			TR.USUA_IdResponsable = _USUA_Id
            AND E.ESTA_Id = 4;
	END$$

DROP PROCEDURE IF EXISTS `spSelectUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectUsuario` ()  BEGIN
		SELECT 
		USUA_Id,
		USUA_Nombre,
		USUA_Nick
		FROM usuarios;
	END$$

DROP PROCEDURE IF EXISTS `spSelectUsuarioId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectUsuarioId` (IN `_USUA_Id` INT(11))  BEGIN
		SELECT 
		USUA_Id,
		USUA_Nombre,
		USUA_Nick,
		USUA_Password,
		ROL_Id
		FROM 
		usuarios 
		WHERE 
		USUA_Id= _USUA_Id;
	END$$

DROP PROCEDURE IF EXISTS `spSelectUsuarioIdRolTecnico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectUsuarioIdRolTecnico` ()  BEGIN
		SELECT
		USUA_Id ,
		USUA_Nombre
		FROM
		usuarios
		WHERE
		ROL_Id = 2;

	END$$

DROP PROCEDURE IF EXISTS `spSelectUsuarioIdRolTrabajador`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectUsuarioIdRolTrabajador` ()  BEGIN
		SELECT
		USUA_Id,
			USUA_Nombre 
			FROM
			usuarios 
			WHERE 
			ROL_Id = 1 ;

	END$$

DROP PROCEDURE IF EXISTS `spUpdateArea`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateArea` (IN `_AREA_Nombre` VARCHAR(30), `_AREA_Descripcion` VARCHAR(200), `_AREA_Id` INT(11))  BEGIN
		UPDATE 
		areas
		SET 
		AREA_Nombre= _AREA_Nombre,
		AREA_Descripcion= _AREA_Descripcion
		WHERE
		AREA_Id = _AREA_Id;
	END$$

DROP PROCEDURE IF EXISTS `spUpdateCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateCategoria` (IN `_CATE_Descripcion` VARCHAR(50), `_CATE_Id` INT(11))  BEGIN
		UPDATE 
		categoria 
		SET 
		CATE_Descripcion = _CATE_Descripcion
		WHERE 
		CATE_Id = _CATE_Id;
	END$$

DROP PROCEDURE IF EXISTS `spUpdateIncidenciaClasificar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateIncidenciaClasificar` (IN `_INCI_Titulo` VARCHAR(50), `_CATE_Id` INT(11), `_INCI_Id` INT(11))  BEGIN
		UPDATE incidencias 
		SET
		INCI_Titulo = _INCI_Titulo,
		CATE_Id = _CATE_Id
		WHERE 
		INCI_Id = _INCI_Id;				   			
	END$$

DROP PROCEDURE IF EXISTS `spUpdateIncidenciaEstadoCerrado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateIncidenciaEstadoCerrado` (IN ```INCI_Id`` = _INCI_Id;` INT(11))  BEGIN
		
UPDATE  
								`incidencias` 
								SET 
								`ESTA_Id` = 5
								WHERE 
								`INCI_Id` = _INCI_Id;
	
END$$

DROP PROCEDURE IF EXISTS `spUpdateIncidenciaEstadoProcesando`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateIncidenciaEstadoProcesando` (IN `_CATE_Id` INT(11), IN `_AREA_Id` INT(11), IN `_INCI_Id` INT(11))  BEGIN
		UPDATE  
		incidencias
		SET
        CATE_Id = _CATE_Id,
        AREA_Id = _AREA_Id,
		ESTA_Id = 4 
		WHERE 
		INCI_Id = _INCI_Id;
	END$$

DROP PROCEDURE IF EXISTS `spUpdateIncidenciaEstadoRechazado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateIncidenciaEstadoRechazado` (IN `_INCI_Id` INT(11))  BEGIN
		UPDATE  
		incidencias
		SET 
		ESTA_Id = 3 
		WHERE 
		INCI_Id = _INCI_Id;
	END$$

DROP PROCEDURE IF EXISTS `spUpdateTratamientoIncidenciaEscalar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateTratamientoIncidenciaEscalar` (IN `_NIVE_Id` INT(1), IN `_USUA_Id` INT(11), IN `_INCI_Id` INT(11))  BEGIN
		UPDATE
		tratamiento_incidencia
		SET
		NIVE_Id = _NIVE_Id,
        USUA_Id = _USUA_Id
		WHERE
		INCI_Id =_INCI_Id;		   			
	END$$

DROP PROCEDURE IF EXISTS `spUpdateTratamientoIncidenciaEstadoCerrado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateTratamientoIncidenciaEstadoCerrado` (IN `_TRIN_Id` INT(11))  BEGIN
		UPDATE  
		tratamiento_incidencia
		SET 
		ESTA_Id = 5   
		WHERE 
		TRIN_Id = _TRIN_Id;
	END$$

DROP PROCEDURE IF EXISTS `spUpdateUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateUsuario` (IN `_USUA_Nombre` VARCHAR(50), `_USUA_Nick` VARCHAR(20), `_USUA_Password` VARCHAR(50), `_ROL_Id` INT(11), `_USUA_FechaAuditoria` DATETIME, `_USUA_Id` INT(11))  BEGIN
		UPDATE usuario
		SET 			
		USUA_Nombre = _USUA_Nombre,
		USUA_Nick = _USUA_Nick,
		USUA_Password = _USUA_Password,
		ROL_Id = _ROL_Id,
		USUA_FechaAuditoria = _USUA_FechaAuditoria
		WHERE 
		USUA_Id = _USUA_Id;
	END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
