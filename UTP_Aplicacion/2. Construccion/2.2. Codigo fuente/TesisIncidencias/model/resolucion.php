<?php

if(!isset($_SESSION)) 
{ 
	session_start(); 
}
/************************************************************************************
* Descripción			: Creacion de la Clase areas donde se definen atributos y metodos *
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			:															*
* Autor					: Jesus Mendoza Huillca - Max Palli Uscamaita				*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		
*                                                                             		*
*************************************************************************************/
class resolucion
{
	
	public $REIN_Id;
	public $REIN_FechaMovimiento;
	public $REIN_TipoMovimiento;
	public $REIN_TipoSolucion;
	public $REIN_Notificado;
	public $REIN_Descripcion;
	public $USUA_IdAprobado;
	public $REIN_FechaAuditoria;
	


	public $Id;
	public $INCI_Id;
	public $INCI_Titulo;
	public $INCI_Descripcion;
	public $INCI_FechaRegistro;
	public $ESTA_Id;
	public $USUA_Id;
	public $USUA_IdAuditoria;
	public $INCI_FechaAuditoria;
	PUBLIC $INCI_Captura;

	public $AREA_Id; 
	public $CATE_Id; 
	public $NIVE_Id; 
	
	public $TRIN_FechaRegistro;
	public $PRIO_Id;
	public $USUA_IdResponsable;
	public $TRIN_FechaAuditoria;



	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

/************************************************************************************
* Descripción			: Creacion de la Funcion Obtener							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe el id de la clase incidencia														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function Obtener($id)
{
	try 
	{
        $stm = $this->pdo->prepare("CALL spSelectAllTratamientoIncidenciaId(?)");
		$stm->bindParam(1, $id, PDO::PARAM_STR, 11);
		$stm->execute();
		return $stm->fetch(PDO::FETCH_OBJ);
	} 
	catch (Exception $e) 
	{
		die($e->getMessage());
	}
}


/************************************************************************************
* Descripción			: Creacion de la Funcion ObtenerTratamiento					*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe el id de la clase tratamiento_incidencia		*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/
public function ObtenerTratamiento($id)
{
	try 
	{
        $stm = $this->pdo->prepare("CALL spSelectAllIdTratamientoIncidenciaId(?)");
        $stm->bindParam(1, $id, PDO::PARAM_STR, 11);
		$stm->execute();
		return $stm->fetch(PDO::FETCH_OBJ);
	} 
	catch (Exception $e) 
	{
		die($e->getMessage());
	}
}


/************************************************************************************
* Descripción			: Creacion de la Funcion Registrar							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: id: Recibe un objeto data de tipo clase incidencia		*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function RegistrarResolucion(resolucion $data)
{
	try 
	{
        $stm = $this->pdo->prepare("CALL spInsertResolucionIncidencia(?,?,?,?,?,?,?,?,?)");
        $stm->bindParam(1, $data->INCI_Id, PDO::PARAM_INT, 11);
        $stm->bindParam(2, $data->REIN_FechaMovimiento, PDO::PARAM_STR, 6);
        $stm->bindParam(3, $data->REIN_TipoMovimiento, PDO::PARAM_STR, 50);
        $stm->bindParam(4, $data->REIN_TipoSolucion, PDO::PARAM_STR, 50);
        $stm->bindParam(5, $data->REIN_Notificado, PDO::PARAM_INT, 11);
        $stm->bindParam(6, $data->TRIN_Id, PDO::PARAM_INT, 11);
        $stm->bindParam(7, $data->REIN_Descripcion, PDO::PARAM_STR, 300);
        $stm->bindParam(8, $data->USUA_Id, PDO::PARAM_INT, 11);
        $stm->bindParam(9, $data->REIN_FechaAuditoria, PDO::PARAM_STR, 6);
		$stm->execute();

			$_SESSION['TipoVentanaEmergente']="success";
    }
     catch (Exception $e) 
    {
			$_SESSION['TipoVentanaEmergente']="fail";
						//die($e->getMessage());
    }
}

/************************************************************************************
* Descripción			: Creacion de la Funcion Listar								*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function Listar()
{
	try
	{
		$result = array();

		$stm = $this->pdo->prepare("SELECT 
			INCI_Id,
			INCI_Titulo,
			INCI_Descripcion,
			INCI_FechaRegistro,
			CATE_Id,
			ESTA_Id,
			USUA_Id,
			USUA_IdAuditoria,
			INCI_FechaAuditoria
			FROM incidencias");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion Listar								*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/



public function SelectAreas()
{
	try
	{
		$result = array();

		$stm = $this->pdo->prepare("SELECT 
			AREA_Id,
			AREA_Nombre
			FROM areas");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion SelectCategorias					*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/
public function SelectCategorias()
{
	try
	{
		$result = array();

		$stm = $this->pdo->prepare("SELECT
			CATE_Id, 
			CATE_Descripcion 
			FROM categoria");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}


/************************************************************************************
* Descripción			: Creacion de la Funcion SelectCategorias					*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/
public function SelectUsuariosTecnicos()
{
	try
	{
		$result = array();

		$stm = $this->pdo->prepare("SELECT 
			`USUA_Id` ,
			`USUA_Nombre`
			FROM 
			`usuarios` 
			WHERE 
			`ROL_Id` = 2");  //Rol 2 es de Tecnicos
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}


/************************************************************************************
* Descripción			: Creacion de la Funcion SelectRol							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function SelectRol()
{
	try
	{
		$result = array();

		$stm = $this->pdo->prepare("SELECT 
			ROL_Id,
			ROL_Nombre
			FROM rol");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion SelectNivel						*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function SelectNivel()
{
	try
	{
		$result = array();

		$stm = $this->pdo->prepare("SELECT
			`NIVE_Id`,
			`NIVE_Nombre` 
			FROM 
			`nivel` ");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion SelectTrabajadores					*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function SelectTrabajadores()
{
	try
	{
		$result = array();

		$stm = $this->pdo->prepare("SELECT 
			`USUA_Id`,
			`USUA_Nombre` 
			FROM
			`usuarios` 
			WHERE 
			`ROL_Id` = 1 ");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion ListaIncidenciasRegistradas		*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function ListaIncidenciasEnviadas()
{
	try
	{
		$result = array();

		$stm = $this->pdo->prepare("SELECT 
			INCI_Id, 
			INCI_Titulo, 
			INCI_FechaRegistro, 
			C.CATE_Descripcion,
			E.ESTA_Nombre
			from 
			incidencias I
			INNER JOIN categoria C on I.CATE_Id = C.CATE_Id
			INNER JOIN estados E on I.ESTA_Id = E.ESTA_Id
			WHERE E.ESTA_Id = 1");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion Actualizar							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: data: Recibe un objeto de tipo clase incidencias														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function Actualizar($data)

{


	try 
	{
		$sql = "UPDATE incidencias 
		SET
		INCI_Titulo = ?,
		CATE_Id = ?
		WHERE 
		INCI_Id = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->INCI_Titulo, 
				$data->CATE_Id		,
				$data->INCI_Id		                      
				)
			);
		$_SESSION['TipoVentanaEmergente']="success";
	} catch (Exception $e) 
	{
		$_SESSION['TipoVentanaEmergente']="fail";
						//die($e->getMessage());
	}
}




/************************************************************************************
* Descripción			: Creacion de la Funcion Actualizar							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: data: Recibe un objeto de tipo clase incidencias														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function CambiaEstadoIncidencia($data)

{

	try 
	{
		$sql = "UPDATE  
		incidencias
		SET 
		ESTA_Id = 4 
		WHERE 
		INCI_Id = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->INCI_Id		                      
				)
			);
		$_SESSION['TipoVentanaEmergente']="success";
	} catch (Exception $e) 
	{
		$_SESSION['TipoVentanaEmergente']="fail";
						//die($e->getMessage());
	}
}


/************************************************************************************
* Descripción			: Creacion de la Funcion Actualizar							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: data: Recibe un objeto de tipo clase incidencias														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function RechazarIncidencia($data)

{

	try 
	{
		$sql = "UPDATE  
		incidencias
		SET 
		ESTA_Id = 3 
		WHERE 
		INCI_Id = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->INCI_Id		                      
				)
			);
		$_SESSION['TipoVentanaEmergente']="success";
	} catch (Exception $e) 
	{
		$_SESSION['TipoVentanaEmergente']="fail";
						//die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion ActualizarEscalado							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: data: Recibe un objeto de tipo clase incidencias														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/
public function ActualizarEscalado($data)

{


	try 
	{
		$sql = "UPDATE
		`tratamiento_incidencia`
		SET
		`NIVE_Id` = ?,
		`USUA_Id` = ?
		WHERE
		`TRIN_Id` = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->NIVE_Id, 
				$data->USUA_Id, 
				$data->TRIN_Id			                        	                      
				)
			);
		$_SESSION['TipoVentanaEmergente']="success";
	} catch (Exception $e) 
	{
		$_SESSION['TipoVentanaEmergente']="fail";
						//die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion ListaIncidenciasEscalado			*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function ListaIncidenciasEscalado()
{
	try
	{
		$result = array();

		$stm = $this->pdo->prepare("SELECT 
			TRIN_Id,
			I.INCI_Titulo,
			C.CATE_Descripcion,
			A.AREA_Nombre,
			N.NIVE_Nombre,
			U.USUA_Nombre
			FROM `tratamiento_incidencia` TI
			INNER JOIN incidencias I ON TI.`INCI_Id` = I.`INCI_Id`
			INNER JOIN categoria C ON TI.`CATE_Id` = C.`CATE_Id`
			INNER JOIN areas A ON TI.`AREA_Id` = A.`AREA_Id`
			INNER JOIN nivel N ON TI.`NIVE_Id` = N.`NIVE_Id`
			INNER JOIN usuarios U ON TI.`USUA_Id` = U.`USUA_Id`");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion ActualizarEscalado							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: data: Recibe un objeto de tipo clase incidencias														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function ListaIncidenciasPorResponsable()
{
	try
	{
		$result = array();
		$usuario = $_SESSION['USUA_Id'];

        $stm = $this->pdo->prepare("CALL spSelectTratamientoIncidenciaIdResponsable(?)");
		$stm->bindParam(1, $usuario, PDO::PARAM_STR, 11);
        $stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

/************************************************************************************
* Descripción			: Creacion de la Funcion ActualizarEscalado							*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: data: Recibe un objeto de tipo clase incidencias														*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function MostrarHistorialPorIncidencia($data)
{
				
	try
		{
			$Codigo =  $data->INCI_Id;
	        $stm = $this->pdo->prepare("CALL spSelectResolucionIncidenciaHistorial(?)");
            $stm->bindParam(1, $Codigo, PDO::PARAM_STR, 11);
            $stm->execute();
			return $result=$stm->fetchAll(PDO::FETCH_NUM);
		}
	catch(Exception $e)
		{
			die($e->getMessage());
		}

}




}