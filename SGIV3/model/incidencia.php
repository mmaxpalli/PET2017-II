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

public $AREA_Id; 
public $CATE_Id; 
public $NIVE_Id; 
public $TRIN_Id;

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
			$stm = $this->pdo
			          ->prepare(" SELECT 
									INCI_Id,
								    INCI_Titulo,
								    INCI_Descripcion,
								    INCI_FechaRegistro,
								    CATE_Id,
                                    AREA_Id,
								    ESTA_Id,
								    USUA_Id,
								    USUA_IdAuditoria,
								    INCI_FechaAuditoria
								FROM incidencias
								WHERE
									INCI_Id = ?");
			$stm->execute(array($id));
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
			$stm = $this->pdo
			          ->prepare(" SELECT 
											TRIN_Id,
											I.INCI_Titulo,
											C.CATE_Descripcion,
											A.AREA_Nombre,
											TI.NIVE_Id,
											N.NIVE_Nombre,
											TI.USUA_Id,
											U.USUA_Nombre
											FROM `tratamiento_incidencia` TI
											INNER JOIN incidencias I ON TI.`INCI_Id` = I.`INCI_Id`
											INNER JOIN categoria C ON TI.`CATE_Id` = C.`CATE_Id`
											INNER JOIN areas A ON TI.`AREA_Id` = A.`AREA_Id`
											INNER JOIN nivel N ON TI.`NIVE_Id` = N.`NIVE_Id`
											INNER JOIN usuarios U ON TI.`USUA_Id` = U.`USUA_Id`
											WHERE
											TRIN_Id = ?");
			$stm->execute(array($id));
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

	public function Registrar(incidencia $data)
	{
		try 
		{
		$sql = "INSERT INTO incidencias(
						INCI_Titulo, 
						INCI_Descripcion, 
						INCI_FechaRegistro,
						CATE_Id,
						ESTA_Id,
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
						?)";


			$variable=$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $data->INCI_Titulo, 
                        $data->INCI_Descripcion,
                        $data->INCI_FechaRegistro,                        
                        $data->CATE_Id,
                        $data->ESTA_Id,
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

	public function ListaIncidenciasRegistradas()
	{
		try
		{
			$result = array();
			$usuario = $_SESSION['USUA_Id'];

			$stm = $this->pdo->prepare(" SELECT 
										    INCI_Id, 
										    INCI_Titulo, 
										    INCI_FechaRegistro, 
										    C.CATE_Descripcion , 
										    E.ESTA_Nombre 
										    FROM 
										    incidencias I 
										    INNER JOIN 
										    categoria C on I.CATE_Id = C.CATE_Id 
										    INNER JOIN estados E ON I.ESTA_Id = E.ESTA_Id 
										    WHERE I.USUA_Id = $usuario");
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


public function RegistrarResolucion(resolucion $data)
{
	try 
	{
		$sql = "INSERT INTO resolucion_incidencias(
								INCI_Id,
								REIN_FechaMovimiento,
								REIN_TipoMovimiento ,
								REIN_TipoSolucion ,
								REIN_Notificado ,								
								REIN_Descripcion,
								USUA_Id,
								REIN_FechaAuditoria )
								VALUES (
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
				$data->INCI_Id, 
				$data->REIN_FechaMovimiento,
				$data->REIN_TipoMovimiento,                        
				$data->REIN_TipoSolucion,
				$data->REIN_Notificado,				
				$data->REIN_Descripcion,
				$data->USUA_Id,                                              
				$data->REIN_FechaAuditoria
				)
			);

		

		$_SESSION['TipoVentanaEmergente']="success";
	} catch (Exception $e) 
	{
		$_SESSION['TipoVentanaEmergente']="fail";
			//die($e->getMessage());
	}
}




}