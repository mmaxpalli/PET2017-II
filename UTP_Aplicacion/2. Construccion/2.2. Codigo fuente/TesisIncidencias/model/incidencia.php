<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
/************************************************************************************************
* Descripción			: Creacion de la Incidencias areas donde se definen atributos y metodos *
* Fecha Creación		: 4/08/2017                                         					*
* Fecha Modificación	: 13/08/2017  															*		
* Parámetros			: 																		*
* Autor					: Max Palli Uscamaita													*
* Versión				: 1.0																	*
* Cambios Importantes	:                                                         				*
*                                                                             					*                                        		
*                                                                             					*
************************************************************************************************/

class incidencia
{
	

public $Id;
public $INCI_Id;
public $INCI_Titulo;
public $INCI_Descripcion;
public $INCI_FechaRegistro;
public $ESTA_Id;
public $USUA_Id;
public $USUA_IdAuditoria;
public $INCI_FechaAuditoria;
public $INCI_Captura;

public $AREA_Id; 
public $CATE_Id; 
public $NIVE_Id; 
public $TRIN_Id;

	public function __CONSTRUCT()
	{
		$this->log=Logger::getLogger(__CLASS__);
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

public function ObtenerIncidenciaId($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("CALL spSelectIncidenciaId(?)");
			$stm->bindparam(1, $id, PDO::PARAM_STR, 11);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
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
			$stm = $this->pdo->prepare("CALL spSelectTratamientoIncidenciaId(?)");
			$stm->bindparam(1, $id, PDO::PARAM_STR, 11);
			$stm->execute();
                   return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
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

	public function RegistrarIncidencia(incidencia $data)
	{
		try 
		{
		$sql = "INSERT INTO incidencias(
						INCI_Titulo, 
						INCI_Descripcion, 
						INCI_FechaRegistro,
						CATE_Id,
						AREA_Id,
						ESTA_Id,
						INCI_Captura,
						USUA_Id,
						USUA_IdAuditoria,
						INCI_FechaAuditoria)
						VALUES (
						?,
						?,
						?,
						?,
						?,
						?,
						?,
						?,
						?,
						?)";


			$variable=$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $data->INCI_Titulo, 
                        $data->INCI_Descripcion,
                        $data->INCI_FechaRegistro,                        
                        $data->CATE_Id,
                        $data->AREA_Id,
                        $data->ESTA_Id,
                        $data->INCI_Captura,
                        $data->USUA_Id,
                        $data->USUA_IdAuditoria,
                        $data->INCI_FechaAuditoria                      
                )
			);
		      $lastId = $this->pdo->lastInsertId();
		       return  $variable.'*'.$lastId;
		   $_SESSION['TipoVentanaEmergente']="success";
		} catch (Exception $e) 
		{
			$_SESSION['TipoVentanaEmergente']="fail";
			 $this->log->info('Error al insertar en la Tabla INCIDENCIA');
			 $this->log->error($e);
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
			$stm = $this->pdo->prepare("CALL spSelectIncidencia()");

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

	public function ListaIncidenciasRegistradas()
	{
		try
		{
			$result = array();
			$usuario = $_SESSION['USUA_Id'];
			$stm = $this->pdo->prepare("CALL spSelectIncidenciaIdUsuario(?)");
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
* Descripción			: Creacion de la Funcion ListaIncidenciasRegistradas		*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

	public function ListaIncidenciasProcesando()
	{
		try
		{		
			$stm = $this->pdo->prepare("CALL spSelectAllIncidenciasEstadoProcesando");
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
			$stm = $this->pdo->prepare("CALL spSelectIncidenciaEstadoEnviado");
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

public function ClasificarIncidencia($data){

					
			try 
            {    
				$stm = $this->pdo->prepare("CALL spUpdateIncidenciaClasificar(?,?,?)");
				$stm->bindParam(1, $data->INCI_Titulo, PDO::PARAM_STR, 50);
				$stm->bindParam(2, $data->CATE_Id, PDO::PARAM_INT, 11);
				$stm->bindParam(3, $data->INCI_Id, PDO::PARAM_INT, 11);
				$stm->execute();

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
public function EscalarIncidencia($data)
{
	try 
	{
        $stm = $this->pdo->prepare("CALL spUpdateTratamientoIncidenciaEscalar(?,?,?)");
		$stm->bindParam(1, $data->NIVE_Id, PDO::PARAM_INT, 11);
		$stm->bindParam(2, $data->USUA_Id, PDO::PARAM_INT, 11);
		$stm->bindParam(3, $data->INCI_Id, PDO::PARAM_INT, 11);
		$stm->execute();
	
		$_SESSION['TipoVentanaEmergente']="success";
	}
	catch (Exception $e) 
	{
		$_SESSION['TipoVentanaEmergente']="fail";
		die($e->getMessage());
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

public function ListaIncidenciasEscalado(){
		try
			{
				$stm = $this->pdo->prepare("CALL spSelectTratamientoIncidenciaEscalado()");
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
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

public function ListaIncidenciasParaCierre(){

	try
	{
		$result = array();
		$usuario = $_SESSION['USUA_Id'];
		$stm = $this->pdo->prepare("CALL spSelectTratamientoIncidenciaEstadoCierre()");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	catch(Exception $e)
	{
		die($e->getMessage());
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

public function PriorizarIncidencia($data)

				{

					
					try 
					{
						$sql = "UPDATE 
									tratamiento_incidencia
									SET
									PRIO_Id = ?
									WHERE
									INCI_Id = ?";

						$this->pdo->prepare($sql)
						     ->execute(
							    array(			                        
							    	$data->PRIO_Id,
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
* Descripción			: Creacion de la Funcion ListaIncidenciasEscalado			*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function AprobarIncidencia($data)

				{

					try 
					{
						 $stm = $this->pdo->prepare("CALL spUpdateIncidenciaEstadoProcesando(?,?,?)");
						$stm->bindParam(1, $data->CATE_Id, PDO::PARAM_STR, 11);
						$stm->bindParam(2, $data->AREA_Id, PDO::PARAM_STR, 11);
						$stm->bindParam(3, $data->INCI_Id, PDO::PARAM_STR, 11);

						$stm->execute(); 
							  
						$_SESSION['TipoVentanaEmergente']="success";
					} catch (Exception $e) 
					{
						$_SESSION['TipoVentanaEmergente']="fail";
						die($e->getMessage());
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

	public function RechazarIncidencia($data)

				{

					try 
					{
						$stm = $this->pdo->prepare("CALL spUpdateIncidenciaEstadoRechazado(?)");
						$stm->bindParam(1, $data->INCI_Id, PDO::PARAM_STR, 11);

						$stm->execute(); 
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
public function ActualizarEstadoIncidencia($data)
{
		
	try
	{
		$stm = $this->pdo->prepare("CALL spUpdateIncidenciaEstadoCerrado(?)");
		$stm->bindparam(1, $data->INCI_Id, PDO::PARAM_STR, 11);
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
* Descripción			: Creacion de la Funcion ListaIncidenciasEscalado			*
* Fecha Creación		: 4/08/2017                                         		*
* Fecha Modificación	: 13/08/2017  												*		
* Parámetros			: 															*
* Autor					:  Max Palli Uscamaita										*
* Versión				: 1.0														*
* Cambios Importantes	:                                                         	*
*                                                                             		*                                        		                                                                           		*
*************************************************************************************/

public function ReporteIncidenciaPorCategoria($Elemento1,$datepicker,$datepicker2)
	{
		try
		{

		
			$test=1;
			$result = array();

			$stm = $this->pdo->prepare("SET @FechaInicio =  ? ");
			$stm->execute(array($datepicker));

			$stm = $this->pdo->prepare("SET @FechaFin =  ?");
			$stm->execute(array($datepicker2));


			$stm = $this->pdo->prepare("SET @Cate_Id =  ?");
			$stm->execute(array($Elemento1));




			$stm = $this->pdo->prepare("SELECT 
											`INCI_Id`,
											`INCI_Titulo`, 
											`INCI_FechaRegistro`, 
											U.USUA_Nombre
											FROM 
											`incidencias`  I
											INNER JOIN usuarios U on I.`USUA_Id` = U.`USUA_Id`
											WHERE
											`INCI_FechaRegistro` BETWEEN @FechaInicio and @FechaFin
											AND `CATE_Id` = @Cate_Id");
			$stm->execute();

			

			return $result=$stm->fetchAll(PDO::FETCH_NUM);



		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function incidencia_categoriaTblExePdf($Elemento1,$datepicker,$datepicker2)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SET @FechaInicio =  ? ");
			$stm->execute(array($datepicker));
			$stm = $this->pdo->prepare("SET @FechaFin =  ?");
			$stm->execute(array($datepicker2));
			$stm = $this->pdo->prepare("SET @Cate_Id =  ?");
			$stm->execute(array($Elemento1));

			$stm = $this->pdo->prepare("SELECT 
											`INCI_Id`,
											`INCI_Titulo`, 
											`INCI_FechaRegistro`, 
											U.USUA_Nombre
											FROM 
											`incidencias`  I
											INNER JOIN usuarios U on I.`USUA_Id` = U.`USUA_Id`
											WHERE
											`INCI_FechaRegistro` BETWEEN @FechaInicio and @FechaFin
											AND `CATE_Id` = @Cate_Id");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



}